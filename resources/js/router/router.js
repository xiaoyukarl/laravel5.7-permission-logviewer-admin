
import Vue from 'vue';
import VueRouter from 'vue-router';

import Home form './conponents/Home.vue';

Vue.use(VueRouter);

const router = [
    {path:'/', component:Home, name:'home'}
];


export default router;