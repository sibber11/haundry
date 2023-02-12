<script setup>
import {ref} from 'vue'

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
        type: Object,
        required: true
    },
    user: {
        type: Object,
        required: true
    },
    edit_profile: {
        type: String,
        required: true
    }
})

const selected = ref(props.services[0]); // selected service
const cart = ref(props.cart); // cart items


const getTotal = () => {
    return cart.value.reduce((total, item) => total + item.amount * item.price, 0)
}

</script>

<template>
    <div class="py-4 px-4 md:px-3 2xl:container 2xl:mx-auto">
        <div
            class="flex flex-col xl:flex-row justify-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
            <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
                <div
                    class="flex flex-col justify-start items-start bg-gray-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full rounded shadow">
                    <p class="text-xl md:text-xl font-bold leading-6 xl:leading-5 text-gray-800">
                        Customer’s Cart</p>
                    <!--item-->
                    <template v-for="item in cart">
                        <div
                            class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
                            <!--<div class="pb-4 md:pb-8 w-full md:w-40">-->
                            <!--<img alt="dress" class="w-full hidden md:block"-->
                            <!--src="https://i.ibb.co/84qQR4p/Rectangle-10.png"/>-->
                            <!--<img alt="dress" class="w-full md:hidden"-->
                            <!--src="https://i.ibb.co/L039qbN/Rectangle-10.png"/>-->
                            <!--</div>-->
                            <div
                                class="border-b border-gray-200 md:flex-row flex-col flex justify-between items-start w-full pb-3 space-y-4 md:space-y-0">
                                <div class="w-full flex flex-col justify-start items-start space-y-2">
                                    <h3 class="text-lg xl:text-xl font-semibold leading-6 text-gray-800">
                                        {{ item.name }}
                                    </h3>
                                    <div class="flex justify-start items-start flex-col space-y-2">
                                        <p class="text-sm  leading-none text-gray-800">
                                            <span class="-400 text-gray-600">
                                                Service:
                                            </span>
                                            {{ item.service }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex justify-between space-x-8 items-start w-full">
                                    <p class="text-base  xl:text-md leading-6">
                                        <span class="-400 text-gray-600">
                                                Unit Price:
                                        </span>
                                        ${{ item.price }}
                                        <!--<span class="text-red-300 line-through"> $45.00</span>-->
                                    </p>
                                    <p class="text-base  xl:text-md leading-6 text-gray-800">
                                        <span class="-400 text-gray-600">
                                                Qty:
                                        </span>
                                        {{ item.amount }}</p>
                                    <p class="text-base  xl:text-md font-semibold leading-6 text-gray-800">
                                        ${{ item.price * item.amount }}</p>
                                </div>
                            </div>
                        </div>
                    </template>
                    <!--enditem-->
                </div>
                <div class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 space-y-6 rounded shadow">
                    <h3 class="text-lg  font-semibold leading-5 text-gray-800">Summary</h3>
                    <div
                        class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                        <div class="flex justify-between w-full">
                            <p class="text-base  leading-4 text-gray-800">Subtotal</p>
                            <p class="text-base -300 leading-4 text-gray-600">${{ getTotal() }}</p>
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <p class="text-base  leading-4 text-gray-800">
                                Discount
                            </p>
                            <p class="text-base -300 leading-4 text-gray-600">-$0.00</p>
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <p class="text-base  leading-4 text-gray-800">Delivery Charge</p>
                            <p class="text-base -300 leading-4 text-gray-600">$0.00</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <p class="text-base  font-semibold leading-4 text-gray-800">Total</p>
                        <p class="text-base -300 font-semibold leading-4 text-gray-600">
                            ${{ getTotal() }}
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="bg-gray-50 rounded shadow w-full xl:w-96 flex justify-between items-center md:items-start px-4 py-6 md:p-6 xl:p-8 flex-col">
                <h3 class="text-lg  font-semibold leading-5 text-gray-800">Customer</h3>
                <div
                    class="flex flex-col md:flex-row xl:flex-col justify-start items-stretch h-full w-full md:space-x-6 lg:space-x-8 xl:space-x-0">
                    <div class="flex flex-col justify-start items-start flex-shrink-0">
                        <div
                            class="flex justify-center w-full md:justify-start items-center space-x-4 py-8 border-b border-gray-200">
                            <img alt="avatar" src="https://i.ibb.co/5TSg7f6/Rectangle-18.png"/>
                            <div class="flex justify-start items-start flex-col space-y-2">
                                <p class="text-base  font-semibold leading-4 text-left text-gray-800">
                                    {{ user.name }}</p>
                                <p class="text-sm -300 leading-5 text-gray-600">10 Previous Orders</p>
                            </div>
                        </div>

                        <div
                            class="flex justify-center text-gray-800  md:justify-start items-center py-4 border-b border-gray-200 w-full">
                            <img alt="email"
                                 class=""
                                 src="https://tuk-cdn.s3.amazonaws.com/can-uploader/order-summary-3-svg1.svg">
                            <img alt="email"
                                 class="hidden "
                                 src="https://tuk-cdn.s3.amazonaws.com/can-uploader/order-summary-3-svg1dark.svg">
                            <p class="cursor-pointer text-sm leading-5 ml-2">{{ user.email }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between xl:h-full items-stretch w-full flex-col mt-6 md:mt-0">
                        <div
                            class="flex justify-center md:justify-start xl:flex-col flex-col md:space-x-6 lg:space-x-8 xl:space-x-0 space-y-4 xl:space-y-12 md:space-y-0 md:flex-row items-center md:items-start">
                            <div
                                class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4 xl:mt-8">
                                <p class="text-base  font-semibold leading-4 text-center md:text-left text-gray-800">
                                    Delivery Address</p>
                                <p class="lg:w-full -300 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                                    {{ user.address }}</p>
                            </div>
                        </div>
                        <div class="flex w-full justify-center items-center md:justify-start md:items-start">
                            <a :href="edit_profile"
                               class="text-center mt-6 md:mt-0 py-5 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 border border-gray-800 font-medium w-full text-base font-medium leading-4 text-gray-800">
                                Edit Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <slot></slot>
    </div>
</template>
