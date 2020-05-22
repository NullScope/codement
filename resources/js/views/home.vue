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
    mounted: async function () {
      // await axios.post('/login', {
      //   email: "2082214@student.uma.pt",
      //   password: "12345678"
      // });

      // await axios.post('/api/disciplinas/1/eventos-de-avaliacao', {
      //   data_inicio: "2020-10-10",
      //   data_fim: "2020-10-11"
      // })
    },
    methods: {
      async login() {
        // await axios.get('/sanctum/csrf-cookie');

        // await axios.post('/login', {
        //   email: "2082214@student.uma.pt",
        //   password: "12345678"
        // });

        // let response = await axios.post('/api/disciplinas/1/duvidas', {

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
