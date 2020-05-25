/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import './bootstrap.ts';
import { router } from './router';
import store from './store';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import AudioRecorder from 'vue-audio-recorder';
import VueSpeech from 'vue-speech';
import Moment from 'vue-moment';

import 'bootstrap-vue/dist/bootstrap-vue.css';

import AppView from './views/app.vue';

import ExampleComponent from './components/ExampleComponent.vue';
import CodeHighlighter from './components/CodeHighlighter.vue';
import Navbar from './components/Navbar.vue';
import Sidebar from './components/Sidebar.vue';

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

Vue.use(AudioRecorder);

Vue.use(VueSpeech);

Vue.use(Moment);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Necessário registar isto para o routing desejado
Vue.component('app', AppView);
Vue.component('example-component', ExampleComponent);
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
});
