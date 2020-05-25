import Vue from "vue"
import VueRouter, { RouteConfig } from "vue-router"
import HomePage from "./views/home.vue"
import DisciplinaPage from "./views/disciplina.vue"
import AvaliacaoPage from "./views/eventos_avaliacao.vue"
import CriarAvaliacaoPage from "./views/criar_avaliacao.vue"

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
    path: '/eventosAvaliacao/:disciplina',
    name: 'Eventos de avaliação',
    component: AvaliacaoPage,
    meta: {
      icon: 'mdi-certificate'
    },
    children: [
      {
        path: '/criarAvaliacao',
        name: 'Criar evento de avaliação',
        component: CriarAvaliacaoPage,
        meta: {
          icon: 'mdi-home'
        }
      }
    ]
  }
];

export const router = new VueRouter({
  mode: 'history',
  routes
});
