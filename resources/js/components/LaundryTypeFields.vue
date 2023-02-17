<template>
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        <label for="name">Name:</label>
        <input id="name" v-model="input.name" class="form-control" name="name" placeholder="Enter a name..." required
               type="text"
        >
    </div>
    <!-- Category Field -->
    <div class="form-group col-sm-6">
        <label for="category_id">Category:</label>
        <select v-model="input.category"
                id="category_id" class="form-control" name="category_id" required>
            <option value="">Select a Category</option>
            <option :value="category.id" v-for="category in categories">{{ category.name }}</option>
        </select>
    </div>
    <div class="form-group col-sm-6" v-for="(service, index) in input.services" :key="service">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" style="min-width: 8rem;">{{ service.name }}</span>
            </div>
            <input v-model="service.price" :class="{'disabled':!service.enabled}" :disabled="!service.enabled"
                   :name="price_namer(service.id)"
                   :placeholder="service.enabled?'Enter a value...':'Disabled'"
                   :required="service.enabled"
                   class="form-control"
                   min="0"
                   type="number">
            <div class="input-group-append">
                <div class="input-group-text">
                    <input type="checkbox" id="" v-model="service.enabled">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "LaundryTypeFields",
    props: ['categories', 'services', 'model'],
    mounted() {
        if (this.model.services) {
            for (const service of this.model.services) {
                const serviceId = this.input.services.findIndex(($item) => $item.id === service.id);
                this.input.services[serviceId].enabled = true;
                this.input.services[serviceId].price = service.pivot.price;
                console.log(service)
            }

        }
    },
    data() {
        return {
            input: {
                name: this.model.name,
                category: this.model.category_id,
                services: this.services
            }
        }
    },
    methods: {
        price_namer(name) {
            return `services[${name}][price]`;
        }
    }
}
</script>
