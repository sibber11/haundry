<template>
    <div class="row">
        <!-- Customer Name Field -->
        <div class="form-group col-sm-6">
            <label for="customer_id">Customer Name:</label>
            <multiselect id="customer_id"
                         v-model="input.customer"
                         :loading="isLoading"
                         :options="customers"
                         label="name"
                         required="required"
                         track-by="id"
                         @search-change="getCustomers">
            </multiselect>
        </div>
        <div class="form-group col-sm-6">
            <label for="voucher_code">Voucher Code:</label>
            <input id="voucher_code" class="form-control" name="voucher_code" type="text">
        </div>
    </div>
    <div class="row">
        <!-- Deadline Field -->
        <div class="form-group col-sm-3">
            <label for="deadline-date">Delivery Date:</label>
            <input id="deadline-date" class="form-control" name="deadline_date" type="date">
        </div>
        <div class="form-group col-sm-3">
            <label for="deadline-time">Delivery Time:</label>
            <input id="deadline-time" class="form-control" name="deadline_time" type="time" value="17:00">
        </div>
        <!-- Deadline Field -->
        <div class="form-group col-sm-3">
            <label for="pickup-date">Pickup Date:</label>
            <input id="pickup-date" class="form-control" name="pickup_date" type="date">
        </div>
        <div class="form-group col-sm-3">
            <label for="pickup-time">Pickup Time:</label>
            <input id="pickup-time" class="form-control" name="pickup_time" type="time" value="17:00">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-4"><label for="laundry_type_id">Laundry Type:</label>
            <multiselect id="laundry_type_id" v-model="input.laundry_type" :options="categories"
                         :settings="{theme:'bootstrap4'}" group-label="name"
                         group-values="children"
                         label="name"
                         track-by="name"
                         @select="laundry_selected">

            </multiselect>
        </div>
        <!-- Service Type Field -->
        <div class="form-group col-sm-4">
            <label for="service_type">Service Type (Price):</label>
            <select id="service_type" v-model="input.service" :disabled="input.type === ''"
                    class="form-control">
                <option disabled value="">Select Service...</option>
                <option v-for="item in input.type.services" :value="item">
                    {{ item.name }}({{ item.pivot.price }})
                </option>
            </select>
        </div>
        <!-- Amount Field -->
        <div class="form-group col-sm-3">
            <label for="amount">Amount</label>
            <input id="amount" v-model="input.amount" class="form-control" min="0" type="number">
        </div>
        <div class="form-group col-sm-1">
            <label for="add">Action</label><br>
            <button id="add" class="btn btn-success w-100" type="button" @click="add_to_cart">Add</button>
        </div>
    </div>
    <table v-show="total > 0" class="table table-striped">
        <thead class="">
        <tr>
            <th>Laundry Type</th>
            <th>Service Type</th>
            <th>Amount</th>
            <th style="width: 40px">Action</th>
        </tr>
        </thead>
        <tbody id="laundries">
        <tr v-for="(cart_item, index) in cart" :key="index">
            <td>
                <input :name="`items[${index}][id]`" :value="cart_item.type.id" type="hidden">
                {{ cart_item.type.name }}
            </td>
            <td>
                <input type="hidden" :name="`items[${index}][service_id]`" :value="cart_item.service.id">
                {{ cart_item.service.name }} ({{ cart_item.service.pivot.price }})
            </td>
            <td>
                <input type="hidden" :name="`items[${index}][amount]`" :value="cart_item.amount">
                {{ cart_item.amount }}
            </td>
            <td style="width: 40px">
                <button type="button" class="btn btn-danger" @click="remove_item_from_cart(index)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3">Total</td>
            <td>{{ total }}</td>
        </tr>
        </tfoot>
    </table>
    <input v-model="input.customer.id" name="customer_id" type="hidden">
</template>
<script>
import axios from "axios";

export default {
    name: 'AdminOrderCreate',
    props: ['model', 'categories', 'initialCart'],
    data() {
        return {
            cart: [],
            input: {
                type: '',
                laundry_type: '',
                service: '',
                amount: 1,
                customer: {}
            },
            customers: [],
            isLoading: false
        }
    },
    computed: {
        total() {
            let total = 0;
            for (const cartElement of this.cart) {
                total += cartElement.service.pivot.price * cartElement.amount;
                console.log(cartElement);
            }
            return total;
        },
    },
    mounted() {
        document.querySelector('#deadline-date').valueAsDate = new Date();
        document.querySelector('#pickup-date').valueAsDate = new Date();
    },
    methods: {
        getCustomers(q) {
            if (q === "") {
                return
            }
            this.isLoading = true;
            axios.get('', {params: {q: q, type: 'customer'}})
                .then(r => {
                    this.customers = r.data.data;
                    this.isLoading = false;
                })
        },
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
            this.input.laundry_type = '';
            this.input.type = '';
            this.input.service = '';
            this.input.amount = 1;
        },
        remove_item_from_cart(cart) {
            this.cart.splice(cart, 1);
        },
        laundry_selected(event) {
            this.input.type = event;
        }
    }
}
</script>
