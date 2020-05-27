import Vue from "vue";
import axios, { AxiosResponse, AxiosError } from "axios";
import VueRouter, { RouteConfig, Route } from "vue-router";

import HomePage from "./views/home.vue";
import DisciplinaPage from "./views/disciplina.vue";
import LoginPage from "./views/login.vue";
import RegisterPage from "./views/register.vue";

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
  }
];

export const router = new VueRouter({
  mode: 'history',
  routes
});

router.beforeEach((to, from, next) => {
  console.log(to, from, next);
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
