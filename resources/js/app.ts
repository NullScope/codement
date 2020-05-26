/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import './bootstrap.ts';
import { router } from './router';
import store from './store';
//import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
//import AudioRecorder from 'vue-audio-recorder';
//import VueSpeech from 'vue-speech';

//import 'bootstrap-vue/dist/bootstrap-vue.css';

import ExampleComponent from './components/ExampleComponent.vue';
import CodeHighlighter from './components/CodeHighlighter.vue';
import Navbar from './components/Navbar.vue';
import Sidebar from './components/Sidebar.vue';
import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import ProfileComponent from './components/ProfileComponent.vue';
import LogoutComponent from './components/LogoutComponent.vue';
import CriarDisciplinaComponent from './components/CriarDisciplinaComponent.vue';

// Install BootstrapVue
//Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
//Vue.use(IconsPlugin)

//Vue.use(AudioRecorder);

//Vue.use(VueSpeech);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('criardisciplina-component', CriarDisciplinaComponent);
Vue.component('example-component', ExampleComponent);
Vue.component('profile-component', ProfileComponent);
Vue.component('login-component', LoginComponent);
Vue.component('register-component', RegisterComponent);
Vue.component('logout-component', LogoutComponent);
Vue.component('code-highlighter', CodeHighlighter);
Vue.component('navbar', Navbar);
Vue.component('sidebar', Sidebar);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  router,
  store,
  el: '#app',
  data: {
    logged: false,
  }
});
