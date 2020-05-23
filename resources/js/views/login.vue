<template>
  <div>
    <!-- <a href="" @click.prevent="login">Login</a> -->
    <div>
      <profile-component></profile-component>
      <h3 style="text-align:center">--------------------------------------------------------------------------------------------------------</h3>
      <logout-component></logout-component>
      <h3 style="text-align:center">--------------------------------------------------------------------------------------------------------</h3>
      <login-component></login-component>
      <h3 style="text-align:center">--------------------------------------------------------------------------------------------------------</h3>
      <register-component></register-component>  


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

    /*await axios.post('api/professores', {
      "professor_id": "megajorge",
      "name": "megajorge",
      "email": "megajorge@gmail.com",
      "password": "megajorge123",
      "password_confirmation": "megajorge123"
    });*/

        /*await axios.post('http://localhost:8000/login', {
      "email": "felizberto@gmail.com",
      "password": "felizberto",
    });*/
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
