<template>
    <div class="sm:flex items-center gap-4">
        <div class="w-full flex flex-col mt-2">
            <label class="font-semibold leading-none" for="pickup-date">
                Pickup Date:
            </label>
            <input
                id="pickup-date"
                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"
                name="pickup_date" type="date">
        </div>
        <div class="w-full flex flex-col mt-2">
            <label class="font-semibold leading-none" for="pickup-time">
                Pickup Time:
            </label>
            <input
                id="pickup-time"
                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"
                name="pickup_time" type="time" value="17:00">
        </div>
        <div class="w-full flex flex-col mt-2">
            <label class="font-semibold leading-none" for="deadline-date">
                Delivery Date:
            </label>
            <input
                id="deadline-date"
                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"
                name="deadline_date" type="date">
        </div>
        <div class="w-full flex flex-col mt-2">
            <label class="font-semibold leading-none" for="deadline-time">
                Delivery Time:
            </label>
            <input
                id="deadline-time"
                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"
                name="deadline_time" type="time" value="17:00">
        </div>
    </div>
    <div class="sm:flex items-center gap-4">
        <div class="w-full flex flex-col mt-2">
            <label class="font-semibold leading-none" for="laundry_type_id">Laundry Type:</label>
            <select
                id="laundry_type"
                v-model="input.type"
                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded">
                <option disabled value="">Select Type...</option>
                <optgroup v-for="category in categories" :label="category.name">
                    <option v-for="laundry in category.laundry_types" :value="laundry">{{ laundry.name }}</option>
                </optgroup>
            </select>
        </div>
        <div class="w-full flex flex-col mt-2">
            <label class="font-semibold leading-none" for="service_type">Service Type (Price):</label>
            <select
                id="service_type"
                :disabled="input.type === ''"
                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded disabled:bg-gray-400"
                v-model="input.service">
                <option disabled value="">Select Service...</option>
                <option v-for="item in input.type.services" :value="item">{{ item.name }}({{
                        item.pivot.price
                    }})
                </option>
            </select>
        </div>
        <div class="w-full flex flex-col mt-2">
            <label class="font-semibold leading-none" for="amount">Amount:</label>
            <input
                id="amount"
                v-model="input.amount"
                class="sm:max-w-[10.5rem] leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"
                max="100" min="1" type="number">
        </div>
        <div class="w-full flex flex-col mt-2">
            <label class="font-semibold leading-none" for="add">Action</label>
            <button id="add"
                    class="leading-none text-gray-50 p-4 mt-4 border-0 bg-green-500 rounded"
                    type="button" @click="add_to_cart">
                Add to cart
            </button>
        </div>
    </div>
    <div class="sm:flex items-center gap-4">
        <div class="w-full flex flex-col mt-2">
            <label class="font-semibold leading-none" for="voucher-code">
                Voucher
                <span v-if="voucher_msg" :class="{'bg-green-500':voucher_model.id, 'bg-red-500':!voucher_model.id}"
                      class="text-xs rounded p-1">
                    {{ voucher_msg }}
                </span>
            </label>
            <input
                id="voucher-code"
                v-model="voucher"
                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"
                name="voucher_code" type="text" @input="check_voucher_availability">
        </div>
        <div class="flex w-full mt-2 self-end sm:mb-2">
            <input id="use_point" v-model="use_point" class="w-4 h-4"
                   name="use_point" type="checkbox">
            <div class="ml-2">
                <label class="font-semibold leading-none" for="use_point">
                    Use Point
                </label>
                <p id="helper-checkbox-text" class="text-sm font-normal">
                    You can use upto {{ point.total }} point as credit.
                </p>
            </div>
        </div>
    </div>
    <table v-show="subtotal > 0" class="divide-y divide-gray-300 w-full text-sm sm:text-base mt-4">
        <thead class="bg-gray-50">
        <tr>
            <th class="sm:px-6 py-2 text-s text-gray-500">Laundry Type</th>
            <th class="sm:px-6 py-2 text-s text-gray-500">Service Type</th>
            <th class="sm:px-6 py-2 text-s text-gray-500">Amount</th>
            <th class="sm:px-6 py-2 text-s text-gray-500">Action</th>
        </tr>
        </thead>
        <tbody id="laundries" class="bg-white divide-y divide-gray-300">
        <tr v-for="(cart_item, index) in cart" :key="index">
            <td class="sm:px-6 py-4 text-center">
                <input type="hidden" :name="`items[${index}][laundry_type_id]`" :value="cart_item.type.id">
                {{ cart_item.type.name }}
            </td>
            <td class="sm:px-6 py-4 text-center">
                <input type="hidden" :name="`items[${index}][service_id]`" :value="cart_item.service.id">
                {{ cart_item.service.name }} ({{ cart_item.service.pivot.price }})
            </td>
            <td class="sm:px-6 py-4 text-center">
                <input type="hidden" :name="`items[${index}][amount]`" :value="cart_item.amount">
                {{ cart_item.amount }}
            </td>
            <td class="text-right" style="width: 40px">
                <button class="bg-red-600 text-white py-1 px-2 rounded" type="button"
                        @click="remove_item_from_cart(index)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        </tr>
        </tbody>
        <tfoot class="bg-gray-50">
        <tr>
            <th class="sm:px-6 py-2 text-s text-gray-500" colspan="3">Subtotal</th>
            <th class="sm:px-6 py-2 text-s text-gray-500">{{ subtotal }}</th>
        </tr>
        <tr v-if="voucher_model && subtotal > voucher_model.minimum">
            <th class="sm:px-6 py-2 text-s text-gray-500" colspan="3">Voucher</th>
            <th class="sm:px-6 py-2 text-s text-gray-500">-{{ voucher_model.discount }}</th>
        </tr>
        <tr v-if="use_point">
            <th class="sm:px-6 py-2 text-s text-gray-500" colspan="3">Point</th>
            <th class="sm:px-6 py-2 text-s text-gray-500">-{{ usable_point }}</th>
        </tr>
        <tr>
            <th class="sm:px-6 py-2 text-s text-gray-500" colspan="3">Total</th>
            <th class="sm:px-6 py-2 text-s text-gray-500">{{ total }}</th>
        </tr>
        </tfoot>
    </table>
</template>
<script>
export default {
    props: ['categories', 'point'],
    data() {
        return {
            cart: [],
            input: {
                type: '',
                service: '',
                amount: 1,
            },
            voucher: '',
            voucher_msg: '',
            voucher_model: {},
            use_point: false,
        }
    },
    computed: {
        subtotal() {
            let total = 0;
            for (const cartElement of this.cart) {
                total += cartElement.service.pivot.price * cartElement.amount;
                // console.log(cartElement);
            }
            return total;
        },
        total() {
            let temp_total = this.subtotal;
            if (this.voucher_model && this.subtotal > this.voucher_model.minimum) {
                temp_total -= this.voucher_model.discount;
            }
            if (this.use_point) {
                temp_total -= this.usable_point
            }
            return temp_total;

        },
        usable_point() {
            return Math.min(this.subtotal, this.point.total);
        }
    },
    mounted() {
        document.querySelector('#deadline-date').valueAsDate = new Date();
        document.querySelector('#pickup-date').valueAsDate = new Date();
    },
    methods: {
        add_to_cart() {
            if (this.input.type === '' || this.input.service === '' || this.input.amount === 0) {
                return;
            }
            let temp_cart = this.cart.find(e => this.input.type === e.type && this.input.service === e.service);
            if (temp_cart) {
                temp_cart.amount += this.input.amount;
            } else {
                let cart = {
                    type: this.input.type,
                    service: this.input.service,
                    amount: this.input.amount
                };
                this.cart.push(cart);
            }
            this.input.type = '';
            this.input.service = '';
            this.input.amount = 1;
        },
        remove_item_from_cart(cart) {
            this.cart.splice(cart, 1);
        },
        check_voucher_availability: _.debounce(function () {
            axios.post('/check_voucher', {
                voucher_code: this.voucher
            })
                .then(r => {
                    if (r.data.id) {
                        this.voucher_msg = 'Valid. Only applicable over ' + r.data.minimum ?? 0 + ' taka';
                        this.voucher_model = r.data;
                    } else {
                        this.voucher_msg = 'Invalid Voucher';
                    }
                    console.log(r.data);
                })
                .catch(r => {
                    console.log(r.data);
                })
        }, 500)
    }
}
</script>
