<template>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="/images/faces/face1.jpg" alt="profile">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{user.user ? user.user.name : ''}}</span>
          <span class="text-secondary text-small">{{user.aluno_id ? 'Aluno' : 'Professor'}}</span>
        </div>
        <i v-if="!user.aluno_id" class="mdi mdi-teach text-success nav-profile-badge"></i>
        <i v-else class="mdi mdi-school text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item" v-for="route in filteredRoutes" v-bind:key="route.name">
      <router-link class="nav-link" v-if="!route.children" :to="route.path">
        <span class="menu-title">{{route.name}}</span>
        <i class="mdi menu-icon" :class="route.meta.icon"></i>
      </router-link>
      <a class="nav-link" v-else :href="'#'+getSubmenuId(route)" aria-expanded="false" data-toggle="collapse" :aria-controls="getSubmenuId(route)">
        <span class="menu-title">{{route.name}}</span>
        <i class="menu-arrow"></i>
        <i class="mdi menu-icon" :class="route.meta.icon"></i>
      </a>
      <div class="collapse" :id="getSubmenuId(route)" v-if="route.children">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item" v-for="child in getFilteredNestedRoutes(route)" v-bind:key="child.name">
            <router-link class="nav-link" :to="child.path">{{child.name}}</router-link>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
</template>

<script lang="ts">
import axios, {AxiosResponse} from 'axios';
import { routes } from '../router';
import { Route, RouteConfig } from 'vue-router';
import { Vue, Component, Prop } from 'vue-property-decorator';

@Component
export default class Sidebar extends Vue {
  private routes = routes;
  private user = {};

  mounted() {
    axios.get('/api/me').then((response: AxiosResponse) => {
      this.user = response.data.data;
    });
  }

  get filteredRoutes() {
    return routes.filter((route) => !route.meta || !route.meta.hidden);
  }

  getFilteredNestedRoutes(route: RouteConfig) {
    if (route.children) {
      return route.children.filter((subroute: RouteConfig) => !subroute.meta || !subroute.meta.hidden);
    } else {
      return [];
    }
  }

  getSubmenuId(route: Route): String {
    return 'ui-'+route.path.replace(/[\s:\/]/gi, '-');
  }
}
</script>

<style>
  .router-link-active > .menu-title{
    color: #b66dff !important;
    font-family: "ubuntu-medium", sans-serif;
  }

  .router-link-active > i{
    color: #b66dff !important;
  }
</style>
