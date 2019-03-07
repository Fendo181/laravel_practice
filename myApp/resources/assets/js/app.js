// Vueルータ
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import App from './views/App'
import Hello from './views/Hello'
import Home from './views/Home'

// ルーティング
const router = new VueRouter({
    mode:'history',
    routes:[
        {
            path:'/',
            name:'home',
            component:Home
        },
        {
            path:'/hello',
            name:'hello',
            component:Hello,
        },
    ],
});

//読み込み
const app = new Vue({
    // id=app
    el: '#app',
    components: { App },
    // ルーティング
    router,
});