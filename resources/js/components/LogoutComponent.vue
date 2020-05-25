<template>
    <div>
    </div>
</template>

<script lang="ts">
import axios from "axios";
  export default {
    mounted()
    {
      axios.post('http://localhost:8000/logout',{})
      .then((response) => {
          try {document.getElementById("SO").remove();}  catch(err){}
          document.getElementById('logTab').innerHTML = '<a id="SI" class="dropdown-item" href="/login"><i  class="mdi mdi-logout mr-2 text-primary"></i> SignIn </a>';
          var x = document.getElementById("login");
          x.style.display = "block";
      }, (error) => {
        alert("nao saiu macarrao (erro)");
      });
      window.location.href = "/login";
    },
}
</script>
