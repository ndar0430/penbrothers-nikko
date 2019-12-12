import Order from './components/OrderComponent'
import OrderList from './components/OrderListComponent'

export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            component: Order
        },
        {
            path: '/list',
            component: OrderList
        }
    ]
} 