<template>
  <div class="container-scroller">
    <navbar v-if="isNavbarVisible"></navbar>

    <div class="container-fluid page-body-wrapper" :class="!isSidebarVisible ? 'full-page-wrapper' : ''">
      <sidebar v-if="isSidebarVisible"></sidebar>

      <div class="main-panel" v-if="isSidebarVisible">
        <div class="content-wrapper">
          <router-view></router-view>
        </div>

        <footer class="footer" v-if="isFooterVisible">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
      </div>

      <div class="content-wrapper d-flex align-items-center auth" v-else>
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
export default {

  computed: {
    isNavbarVisible() {
      return this.$route.meta && !this.$route.meta.hideNavbar;
    },

    isSidebarVisible() {
      return this.$route.meta && !this.$route.meta.hideSidebar;
    },

    isFooterVisible() {
      return this.$route.meta && !this.$route.meta.hideFooter;
    }
  }
}
</script>
