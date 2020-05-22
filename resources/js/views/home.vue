<template>
  <div>
    <!-- <a href="" @click.prevent="login">Login</a> -->
    <div>
      <code-highlighter></code-highlighter>
    </div>
  </div>
</template>

<script>
  import axios from "axios";

  export default {
    mounted: function () {

    },
    methods: {
      async login() {
        // await axios.get('http://localhost:8000/sanctum/csrf-cookie');

        // await axios.post('http://localhost:8000/login', {
        //   email: "brunoribeiro095@gmail.com",
        //   password: "12345678"
        // });

        // let response = await axios.post('http://localhost:8000/api/disciplinas/1/duvidas', {

        // });

        // console.log(response);
      }
    },
    computed: {

    },
    watch: {

    },
    data() {
      return {

      }
    },
    components: {

    }
  }
</script>

<style>

</style>
