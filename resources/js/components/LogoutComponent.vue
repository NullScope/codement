<template>
    <div>
    </div>
</template>

<script lang="ts">
import axios from "axios";
import Router from "next/router";
  export default
  {
    mounted()
    {
      axios.post('http://localhost:8000/logout',{})
      .then((response) =>
      {
          var x = document.getElementById("login");
          x.style.display = "block";
          this.$router.go();
      }, (error) => {alert("nao saiu macarrao (erro)");});
      this.$router.push("/login");
    },
}
</script>
