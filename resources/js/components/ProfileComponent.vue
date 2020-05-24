
<template>
    <div>
      <form @submit.prevent="me" class="mb-3">
        <button type="submit" class="btn btn-light btn-block">Ver perfil</button>
      </form>
    </div>
</template>

<script lang="ts">
import axios from "axios";
  export default
  {
    mounted()
    {
      axios.get('api/me', {})
      .then((response) => {
        console.log(JSON.stringify(response.data));
        try {
          if(JSON.stringify(response.data.error)=="true")
          {
            var x = document.getElementById("login");
            x.style.display = "block";
          }
          else
          {
            var x = document.getElementById("login");
            x.style.display = "none";
          }
        }
        catch(err) {
        }
      }, (error) => {
        alert(error);
      });
    },
    methods:
    {
      me()
      {
        axios.get('api/me', {})
        .then((response) =>
        {
          console.log(JSON.stringify(response.data));
          try
          {
            alert(JSON.stringify(response.data.data.profile.email)+" id: "+JSON.stringify(response.data.data.profile.id));
          }
          catch(err)
          {
            try
            {
              alert(JSON.stringify(response.data.data.user.email)+" id: "+JSON.stringify(response.data.data.user.id));
            }
            catch(err)
            {
              alert("ninguem logado");
            }
          }
          //alert(JSON.stringify(response.data.data.profile.email)+" id: "+JSON.stringify(response.data.data.profile.id));
        }
      },
    }
  }
</script>
