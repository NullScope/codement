import Vue from "vue"
import VueRouter, { RouteConfig } from "vue-router"
import HomePage from "./views/home.vue"
import DisciplinaPage from "./views/disciplina.vue"

Vue.use(VueRouter);

export const routes: RouteConfig[] = [
  {
    path: '/',
    name: 'Home',
    component: HomePage,
    meta: {
      icon: 'menu-icon'
    }
  },
  {
    path:'/',
    name: 'Disciplina',
    component: DisciplinaPage,
  }
];

export const router = new VueRouter({
  mode: 'history',
  routes
});
