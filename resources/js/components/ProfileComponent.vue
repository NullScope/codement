
<template>
    <div>
      <form @submit.prevent="me" class="mb-3">
        <button type="submit" class="btn btn-light btn-block">Ver perfil</button>
      </form>
    </div>
</template>

<script lang="ts">
import axios from "axios";
  export default {

    mounted()
    {
      /*axios.post('http://127.0.0.1:8000/login', {
      email: "email@gmail.com",
      password: "12345678"
      });*/
    },
    methods: {
      me(){
        axios.get('api/me', {})
        .then((response) => {
          console.log(JSON.stringify(response.data));
          try {
            alert(JSON.stringify(response.data.data.profile.email)+" id: "+JSON.stringify(response.data.data.profile.id));
          }
          catch(err) {
            alert(JSON.stringify(response.data.data.user.email)+" id: "+JSON.stringify(response.data.data.user.id));
          }

          //alert(JSON.stringify(response.data.data.profile.email)+" id: "+JSON.stringify(response.data.data.profile.id));
        }, (error) => {
          console.log(error);
        });
      }
    }
  }
</script>
