<template>
    <!-- Customer Name Field -->
    <div class="form-group col-sm-4">
        <label for="customer_id">Customer Name:</label>
        <select class="form-control" required="" id="customer_id" name="customer_id">
            <option disabled value="">Select Customer...</option>
            <option :value="customer.id" v-for="customer in customers">{{ customer.name }}</option>
        </select>
    </div>
    <!-- Deadline Field -->
    <div class="form-group col-sm-4">
        <label for="deadline-date">Deadline Date:</label>
        <input class="form-control" id="deadline-date" name="deadline_date" type="date">
    </div>
    <div class="form-group col-sm-4">
        <label for="deadline-time">Deadline Time:</label>
        <input class="form-control" id="deadline-time" name="deadline_time" type="time" value="17:00">
    </div>
    <div class="form-group col-sm-12"></div><!-- Laundry Type Id Field -->
    <div class="form-group col-sm-4"><label for="laundry_type_id">Laundry Type:</label>
        <select class="form-control" id="laundry_type" v-model="input.type">
            <option disabled value="">Select Type...</option>
            <optgroup :label="category.name" v-for="category in categories">
                <option :value="laundry" v-for="laundry in category.laundry_types">{{ laundry.name }}</option>
            </optgroup>

        </select>
    </div><!-- Service Type Field -->
    <div class="form-group col-sm-4">
        <label for="service_type">Service Type (Price):</label>
        <select class="form-control" id="service_type" :disabled="input.type === ''"
                v-model="input.service">
            <option disabled value="">Select Service...</option>
            <option :value="item" v-for="item in input.type.services">{{ item.name }}({{ item.pivot.price }})</option>
        </select>
    </div><!-- Amount Field -->
    <div class="form-group col-sm-3">
        <label for="amount">Amount</label>
        <input class="form-control" id="amount" v-model="input.amount" type="number" min="0">
    </div>
    <div class="form-group col-sm-1">
        <label for="">Action</label>
        <button id="add" class="btn btn-success" type="button" @click="add_to_cart">Add</button>
    </div>
    <table class="table table-striped">
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
                <input type="hidden" :name="`items[${index}][laundry_type_id]`" :value="cart_item.type.id">
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
</template>
t
<script>
export default {
    name: 'AdminOrderCreate',
    props: ['model', 'categories', 'initialCart', 'customers'],
    data() {
        return {
            cart: [],
            input: {
                type: '',
                service: '',
                amount: 1
            },
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
        }
    }
}
</script>
