<template>
  <div class="container mx-auto">
      <div class="col-md-4">
            <h2>Order List </h2>
            {{orders}}
      </div>
  </div>
</template>

<script>
export default {

    data() {
        return {
            orders: []
        }
    },

    methods: {

        async getOrders() {

            axios.get('/api/order/get', 'OrderController@get').then(response => {

                this.orders = response.data;

            })
        }
    },

    mounted() {

        this.getOrders();
    }

}
</script>

<style>

</style>