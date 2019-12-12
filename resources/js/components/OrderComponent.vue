<template>
    <div class="container mx-auto ">
        <div class="pt-5 row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Order Now</div>


                    <div class="card-body">



                        <form @submit.prevent="insertOrder()" method="post">

                            <div v-for="(pizza, index) in pizzas" :key="index">



                                <h2>Pizza: #{{++index}}</h2>

                                <div v-if="loading == true" class="row">
                                    <div class="spinner-border text-primary" role="status">
                                    </div>
                                    <p class="pl-2">Fetching Pizza Element List . . .</p>
                                </div>

                                <div class="form-group">
                                    <label for="pizza_crust_id">Select Crust</label>
                                    <select class="form-control" v-model="pizza.pizza_crust_id" id="pizza_crust_id" required>
                                        <option v-for="crust in pizzaElement.pizzaCrust" :key="crust.id"
                                            :value="crust.id">
                                            {{startCase(crust.crust)}}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pizza.size_id">Select Size</label>
                                    <select class="form-control" v-model="pizza.pizza_size_id" id="pizza.size_id" required>

                                        <option v-for="size in pizzaElement.pizzaSize" :key="size.id" :value="size.id" >
                                            {{startCase(size.size)}}
                                        </option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="pizza.flavor_id">Select Pizza Flavor/Type <small
                                            class="text-danger">*Select
                                            Custom to see 3 topping text box</small></label>
                                    <select class="form-control" v-model="pizza.flavor_id" id="pizza.flavor_id" required>
                                        <option v-for="flavor in pizzaElement.pizzaFlavor" :key="flavor.id"
                                            :value="flavor.id">
                                            {{startCase(flavor.flavor)}}</option>
                                    </select>
                                </div>

                                <div v-if="pizza.flavor_id == 3">

                                    <div class="form-group">
                                        <label for="pizza.type_id">Select Topping Area 1</label>
                                        <select class="form-control" v-model="pizza.topping_area_1_id"
                                            id="pizza.type_id">
                                            <option value=''> None </option>
                                            <option v-for="topping in pizzaElement.pizzaTopping" :key="topping.id"
                                                :value="topping.id">
                                                {{startCase(topping.topping)}}</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="pizza.type_id">Select Topping Area 2</label>
                                        <select class="form-control" v-model="pizza.topping_area_2_id"
                                            id="pizza.type_id">
                                            <option value=''> None </option>
                                            <option v-for="topping in pizzaElement.pizzaTopping" :key="topping.id"
                                                :value="topping.id">
                                                {{startCase(topping.topping)}}</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="pizza.type_id">Select Topping Area 3</label>
                                        <select class="form-control" v-model="pizza.topping_area_3_id"
                                            id="pizza.type_id">
                                            <option value=''> None </option>
                                            <option v-for="topping in pizzaElement.pizzaTopping" :key="topping.id"
                                                :value="topping.id">
                                                {{startCase(topping.topping)}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <button type="button" v-on:click="removePizza(index)" class="btn btn-danger">
                                        Remove Pizza
                                    </button>

                                </div>
                            </div>


                            <div class="form-group">
                                <button :disabled="inserting == true" class="btn btn-success" type="submit">Order
                                    Now</button>

                                <span class="pl-1 text-info">{{message}}</span>
                            </div>
                        </form>

                        <div class="form-group">

                            <button type="submit" @click="addNewPizza" class="btn btn-info">
                                Add More Pizza?
                            </button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Full Order Details</div>


                    <div class="card-body">

                        <div v-for="(pizza, index) in pizzas" :key="index">

                            <h2>Pizza: #{{++index}}</h2>

                            <p v-if="pizza.pizza_crust_id != null" > Crust: {{displayCrust(pizzaElement.pizzaCrust, pizza.pizza_crust_id)}} </p>

                            <p v-if="pizza.pizza_size_id != null" > Size:  {{displaySize(pizzaElement.pizzaSize, pizza.pizza_size_id)}} </p>

                            <p v-if="pizza.flavor_id != null" > Flavor: {{displayFlavor(pizzaElement.pizzaFlavor, pizza.flavor_id)}} </p>

                            <p v-if="pizza.topping_area_1_id != null" > Topping Area 1: {{displayTopping(pizzaElement.pizzaTopping, pizza.topping_area_1_id)}} </p>

                            <p v-if="pizza.topping_area_2_id != null" > Topping Area 2: {{displayTopping(pizzaElement.pizzaTopping, pizza.topping_area_2_id)}} </p>

                            <p v-if="pizza.topping_area_3_id != null" > Topping Area 3: {{displayTopping(pizzaElement.pizzaTopping, pizza.topping_area_3_id)}} </p>

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import _ from 'lodash'
    import Vue from 'vue'

    export default {

        name: 'OrderComponent',
        data() {
            return {
                pizza: {
                    pizza_crust_id: null,
                    pizza_size_id: null,
                    flavor_id: null,
                    topping_area_1_id: null,
                    topping_area_2_id: null,
                    topping_area_3_id: null

                },
                pizzas: [],
                pizzaElement: {
                    pizzaCrust: [],
                    pizzaTopping: [],
                    pizzaSize: [],
                    pizzaFlavor: []
                },
                orderDetails: {},
                loading: true,
                inserting: false,
                message: '',
                count: 1,


            }
        },
        methods: {

           



            async getPizzaElements() {

                axios.get('/api/pizza/elements').then(response => {
                    this.pizzaElement = response.data;
                    this.loading = false;



                }).catch(error => {
                    this.message = error;
                })

            },

            async insertOrder() {          

                this.inserting = true

                axios.post('/api/pizza/store', this.pizzas).then(response => {
                    this.inserting = false;
                    this.message = "Success";

                }).catch(error => {
                    this.message = error;
                    this.inserting = false;
                })

            },

            startCase(value) {
                return _.startCase(value);
            },

            addNewPizza: function () {
                this.pizzas.push(Vue.util.extend({}, this.pizza))

            },

            removePizza: function (index) {
                console.log(index);
                Vue.delete(this.pizzas, index);
            },

             displayCrust(model, id, test) {

                let text = _.find(model, {
                    'id': id
                })

                console.log(_.values(text));

                return this.startCase(text.crust);

            },

            displaySize(model, id) {

                let text = _.find(model, {
                    'id': id
                })

                console.log(_.values(text));

                return this.startCase(text.size);

            },

            displayFlavor(model, id) {

                let text = _.find(model, {
                    'id': id
                })

                console.log("flavor", model);

                console.log(_.values(text));

                return this.startCase(text.flavor);

            },

             displayTopping(model, id) {

                let text = _.find(model, {
                    'id': id
                })

                console.log(_.values(text));

                return this.startCase(text.topping);

            },



        },

        mounted() {



            this.getPizzaElements().then(() => {
                this.pizzas.push(Vue.util.extend({}, this.pizza))
            });


        }
    }

</script>
