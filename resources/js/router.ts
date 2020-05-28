import Vue from "vue";
import axios, { AxiosResponse, AxiosError } from "axios";
import VueRouter, { RouteConfig } from "vue-router";

import HomePage from "./views/home.vue";
import DisciplinaPage from "./views/disciplina.vue";
import LoginPage from "./views/login.vue";
import RegisterPage from "./views/register.vue";
import AvaliacaoPage from "./views/eventos_avaliacao.vue"
import CriarAvaliacaoPage from "./views/criar_avaliacao.vue"
import DuvidasPage from "./views/duvidas.vue";
import CriarDuvidaPage from "./views/criar_duvida.vue";
import VerDuvidaPage from "./views/ver_duvida.vue";
import AulaPage from "./views/aula.vue";
import CriarAulaPage from "./views/criar_aula.vue";

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
    path: '/eventos-de-avaliacao',
    name: 'Eventos de avaliação',
    component: AvaliacaoPage,
    meta: {
      icon: 'mdi-certificate'
    }
  },
  {
    path: '/eventos-de-avaliacao/:disciplina/criar',
    name: 'Criar evento de avaliação',
    component: CriarAvaliacaoPage,
    meta: {
      icon: 'mdi-certificate',
      hidden: true
    }
  },
  {
    path:'/login',
    name: 'Login',
    component: LoginPage,
    meta: {
      hidden: true,
      hideNavbar: true,
      hideSidebar: true,
    }
  },
  {
    path:'/register',
    name: 'Register',
    component: RegisterPage,
    meta: {
      hidden: true,
      hideNavbar: true,
      hideSidebar: true,
    }
  },
  {
    path:'/duvidas',
    name: 'Duvidas',
    component: DuvidasPage,
    meta: {
      icon: 'mdi-comment-question-outline',
    }
  },
  {
    path:'/duvidas/:disciplina/criar',
    name: 'Criar Duvida',
    component: CriarDuvidaPage,
    meta: {
      hidden: true,
    }
  },
  {
    path:'/duvidas/:disciplina/ver/:duvida',
    name: 'Ver Duvida',
    component: VerDuvidaPage,
    meta: {
      hidden: true,
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
  }
];

export const router = new VueRouter({
  mode: 'history',
  routes
});

router.beforeEach((to, from, next) => {
  if (to.path == '/login' || to.path == '/register') {
    next();
  } else if (to.path == '/logout') {
    axios.post('/logout').then((response: AxiosResponse) => {
      next('/login');
    });
  } else {
    axios.get('/api/me').then((response: AxiosResponse) => {
      if (!response.data.error) {
        next();
      } else {
        next('/login');
      }
    }).catch((error: AxiosError) => {
      next('/login');
    });
  }
})
