
<template>
    <div>
      <form @submit.prevent="login" class="mb-3">
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email" v-model="Conta.email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" v-model="Conta.password">
        </div>
      <button type="submit" class="btn btn-light btn-block">Login</button>
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
    data()
    {
      return {
        Conta: {
          "aluno_id": "",
          "curso": "",
          "data_de_matricula_inicial": "",
          "ano_curricular": "",
          "name": "",
          "email": "",
          "passwordpassword": "",
          "password_confirmation": "",
        }
      };
    },
    methods: {
      login() {
        axios.post('http://localhost:8000/login',{ "email": this.Conta.email,"password": this.Conta.password,})
        .then((response) => {
            alert("Entrou macarrao");
        }, (error) => {
          alert("nao entrou macarrao");
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
    me(){
      axios.get('api/me', {})

    }

    }


  }
</script>



export default {
  methods: {

  }
};
