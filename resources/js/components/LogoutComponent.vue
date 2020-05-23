<template>
    <div>
      <form @submit.prevent="logout" class="mb-3">
      <button type="submit" class="btn btn-light btn-block">Logout</button>
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
      logout() {
        axios.post('http://localhost:8000/logout',{})
        .then((response) => {
            alert("Saiu macarrao");
            var x = document.getElementById("login");
            x.style.display = "block";
        }, (error) => {
          alert("nao saiu macarrao");
        });
      /*  alert(JSON.stringify(this.Conta));
        axios.post('api/alunos', {
          "aluno_id": this.Conta.aluno_id,
          "curso": this.Conta.curso,
          "data_de_matricula_inicial": this.Conta.data_de_matricula_inicial,
          "ano_curricular": this.Conta.ano_curricular,
          "name": this.Conta.name,
          "email": this.Conta.email,
          "password": this.Conta.password,
          "password_confirmation": this.Conta.password_confirmation
        });*/
      /*  axios.post('http://localhost:8000/register', {
          "aluno_id": "jorge",
          "curso": "sint",
          "data_de_matricula_inicial": "2020-04-04 23:45:58",
          "ano_curricular": 5,
          "name": "jorge",
          "email": "jorge@gmail.com",
          "password": "1234312312",
          "password_confirmation": "1234312312"
      });*/
        // Add
      //  alert(JSON.stringify(this.Conta));
        /*axios.post('http://localhost:8000/login', {
          "email": "ddsas@gmail.com",
          "password": "accusamus",
      });*/
    /*  axios.post('api/professores', {
        "professor_id": "excepturi",
        "name": "veniam",
        "email": "d2s@gmail.com",
        "password": "accusamus",
        "password_confirmation": "accusamus"
    });*/
        /*axios.post('api/alunos', {
          "aluno_id": "excepturi",
          "curso": "sint",
          "data_de_matricula_inicial": "2020-05-05 23:45:58",
          "ano_curricular": 5,
          "name": "veniam",
          "email": "doloribus@gmail.com",
          "password": "accusamus",
          "password_confirmation": "accusamus"
      });*/
    },
  }
}
</script>
