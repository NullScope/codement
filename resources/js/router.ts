import Vue from "vue"
import VueRouter, { RouteConfig } from "vue-router"
import HomePage from "./views/home.vue"
import DisciplinaPage from "./views/disciplina.vue"
import LoginPage from "./views/login.vue"
import LogoutPage from "./views/logout.vue"

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
  },
  {
    path:'/logout',
    name: 'Logout',
    component: LogoutPage,
    meta: {
      icon: 'mdi-home'
    }
  },
  {
    path:'/login',
    name: 'Login',
    component: LoginPage,
    meta: {
      icon: 'mdi-home'
    }
  }
];

export const router = new VueRouter({
  mode: 'history',
  routes
});
