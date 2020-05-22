import Vue from "vue"
import VueRouter, { RouteConfig } from "vue-router"
import HomePage from "./views/home.vue"
import DisciplinaPage from "./views/disciplina.vue"

Vue.use(VueRouter);

export const routes: RouteConfig[] = [
  {
    path: '/',
    redirect: '/home',
    meta: {
      hidden: true
    }
  },
  {
    path: '/home',
    name: 'Home',
    component: HomePage,
    meta: {
      icon: 'mdi-home'
    }
  },
  {
    path:'/disciplina',
    name: 'Disciplina',
    component: DisciplinaPage,
    meta: {
      icon: 'mdi-home'
    }
  }
];

export const router = new VueRouter({
  mode: 'history',
  routes
});
