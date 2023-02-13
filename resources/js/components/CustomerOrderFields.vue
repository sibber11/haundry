<script setup>
import {computed, ref} from 'vue'
import axios from 'axios'
import Alert from "@/components/Alert.vue";

const props = defineProps({
    services: {
        type: Object,
        required: true
    },
    route: {
        type: String,
        required: true
    },
    cart: {
        type: Object
    }
})

const selected = ref(props.services[0]); // selected service
const cart = ref(props.cart ?? []); // cart items
//add the item to cart if it is not already in the cart else increase the amount
const addToCart = (item) => {
    const index = cart.value.findIndex((cartItem) => cartItem.id === item.id && cartItem.service_id === selected.value.id);
    if (index === -1) {
        cart.value.push({
            id: item.id,
            name: item.name,
            amount: 1,
            service: selected.value.name,
            service_id: selected.value.id,
            price: getPrice(item)
        });
    } else {
        cart.value[index].amount++;
    }
}
//remove the item from the cart if amount is 1 else decrease the amount

const removeFromCart = (item) => {
    const index = cart.value.findIndex((cartItem) => cartItem.id === item.id);
    if (cart.value[index].amount === 1) {
        cart.value.splice(index, 1);
    } else {
        cart.value[index].amount--;
    }
}

// returns the amount of the item in the cart
const getQuantity = (item) => {
    const index = cart.value.findIndex((cartItem) => cartItem.id === item.id && cartItem.service === selected.value.name);
    if (index === -1) {
        return 0;
    } else {
        return cart.value[index].amount;
    }
}

const getPrice = (item) => {
    const index = item.services.findIndex((service) => service.id === selected.value.id);
    return item.services[index].pivot.price;
}

const getTotal = () => {
    return cart.value.reduce((total, item) => total + item.amount * item.price, 0)
}

function submit() {
    axios.post(props.route, {
        cart: cart.value
    }).then((response) => {
        if (response.data.status === 'success')
            location.href = response.data.redirect;
        else {
            hasAlert.value = true;
            //scroll to top
            window.scrollTo(0, 0);
        }


    }).catch((error) => {
        console.log(error);
    })
}

function getCount(service) {
    return cart.value.reduce((carry, cartItem) => {
        if (cartItem.service_id === service.id) {
            return carry + cartItem.amount;
        } else {
            return carry;
        }
    }, 0)
}

const keyword = ref('');
const list = computed(() => {
    return selected.value.laundry_type.filter(laundry => laundry.name.toLowerCase().match(keyword.value.toLowerCase()))
})

const hasAlert = ref(false);
</script>

<template>
    <section>
        <Alert v-if="hasAlert" class="mt-4" message="Your cart is empty!" type="warning"
               @close="hasAlert = false"></Alert>
        <div class="flex flex-col sm:flex-row justify-between items-center">
            <h1 class="text-2xl font-bold my-4">Add Items To Cart</h1>
            <div class="mb-3 sm:mb-0">
                <span>Search: </span>
                <input v-model="keyword"
                       class="p-1 rounded px-2 shadow-sm"
                       type="text">
                <button
                    class="py-1 px-2 bg-white rounded m-1 mr-0 font-bold hover:bg-gray-300 shadow-sm"
                    type="button"
                    @click="keyword = ''"
                >
                    Reset
                </button>
            </div>
        </div>
        <!--    4 buttons with same size-->
        <div class="flex justify-between">
            <button v-for="service in props.services"
                    :class="{'bg-white': selected.id === service.id, 'bg-gray-400': selected.id !== service.id}"
                    class="p-2 rounded w-40 rounded-b-none relative"
                    type="button" @click="selected = service">
                {{ service.name }}
                <span
                    class="bg-gray-700 absolute inline-block top-0 right-2 bottom-auto left-auto translate-x-2/4 -translate-y-1/2 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 py-1 px-2.5 text-xs leading-none text-center whitespace-nowrap align-baseline font-bold text-white rounded-full z-10">
                    {{ getCount(service) }}
                </span>
            </button>
        </div>
        <table class="w-full bg-white">
            <tr>
                <th class="border-b">Icon</th>
                <th class="border-b">Name</th>
                <th class="border-b">Price</th>
                <th class="border-b">Quantity</th>
            </tr>
            <tr v-for="laundry in list" class="odd:bg-blue-100">
                <td><i :class="'fa-'+laundry.icon" class="fa px-3"></i></td>
                <td>{{ laundry.name }}</td>
                <td>{{ getPrice(laundry) }}</td>
                <td class="text-right">
                    <button class="p-2 py-1" type="button" @click="removeFromCart(laundry)">
                        <i class="fas fa-minus"></i>
                    </button>
                    <span class="px-2">{{ getQuantity(laundry) }}</span>
                    <button class="p-2 py-1 mr-2" type="button" @click="addToCart(laundry)">
                        <i class="fas fa-plus"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="border-t py-3" colspan="3">
                    <h3 class="font-bold text-md px-4">Total:</h3>
                </td>
                <td class="font-bold text-md text-right border-t">
                    <span class="mr-4">
                        {{ getTotal() }}
                    </span>
                </td>
            </tr>
        </table>
        <div class="bg-gray-50 p-4 mt-6 rounded shadow">
            <div class="flex justify-around items-center w-full space-x-4">
                <a class="w-full text-center mt-6 md:mt-0 py-5 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 border border-gray-800 font-medium text-base font-medium leading-4 text-gray-800"
                   href="/"
                >
                    Back
                </a>
                <button
                    class="w-full mt-6 md:mt-0 py-5 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 border border-gray-800 font-medium text-base font-medium leading-4 text-gray-800"
                    type="button"
                    @click="submit"
                >
                    Place Order
                </button>
            </div>
        </div>
    </section>
</template>
