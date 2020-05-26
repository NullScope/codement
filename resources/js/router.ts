import Vue from "vue"
import VueRouter, { RouteConfig } from "vue-router"
import HomePage from "./views/home.vue"
import DisciplinaPage from "./views/disciplina.vue"
import AulaPage from "./views/aula.vue"
import CriarAulaPage from "./views/criar_aula.vue"
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
      icon: 'mdi-home',
      // hideNavbar: true,
      // hideSidebar: true,
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
    path:'/aula',
    name: 'Aula',
    component: AulaPage,
    meta: {
      icon: 'mdi-home'
    }
  },
  {
    path: '/criar_aula',
    name: 'Criar aula',
    component: CriarAulaPage,
    meta: {
      icon: 'mdi-home',
      //hidden: true
    }
  },
];

export const router = new VueRouter({
  mode: 'history',
  routes
});
