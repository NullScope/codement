<template>
  <div>
    <a href="" @click.prevent="login">Login</a>
    <div class="test">
      <example-component></example-component>
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
  .test {
    width: 70%;
    margin: 0 auto;
  }
  #prism {
    pointer-events: none;
  }
  .line-numbers-rows {
    pointer-events: none;
  }

  .line-numbers-rows > * {
    pointer-events: all !important;
    cursor: pointer;
  }
</style>
