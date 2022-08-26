<template>
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        <label for="name">Name:</label>
        <input class="form-control" required="" name="name" type="text" id="name" v-model="input.name">
    </div>
    <!-- Category Field -->
    <div class="form-group col-sm-6">
        <label for="category_id">Category:</label>
        <select v-model="input.category"
            class="form-control" required="" id="category_id" name="category_id">
            <option :value="category.id" v-for="category in categories">{{ category.name }}</option>
        </select>
    </div>
    <div class="form-group col-sm-6" v-for="(service, index) in input.services" :key="service">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" style="min-width: 8rem;">{{ service.name }}</span>
            </div>
            <input type="number" class="form-control" min="0" v-model="service.price"
                   :disabled="!service.enabled" :name="price_namer(service.id)">
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
    name: "LaundryTypeCreate",
    props: ['categories', 'services', 'model'],
    mounted(){
        if(this.model){
            // console.log(this.model.services)
            for(const m of this.model.services){
                this.input.services[m.id].enabled = true;
                this.input.services[m.id].price = m.pivot.price;
                console.log(m)
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
    methods:{
        price_namer(name){
            return `services[${name}][price]`;
        }
    }
}
</script>

<style scoped>

</style>
