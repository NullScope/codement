import Vue from "vue"
import VueRouter, { RouteConfig } from "vue-router"
import HomePage from "./views/home.vue"

Vue.use(VueRouter);

export const routes: RouteConfig[] = [
  {
    path: '/',
    name: 'Home',
    component: HomePage,
    meta: {
      icon: 'mdi-home'
    }
  }
];

export const router = new VueRouter({
  mode: 'history',
  routes
});
