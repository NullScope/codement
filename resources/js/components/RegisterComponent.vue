
<template>
    <div>

      <form @submit.prevent="addContaAluno" class="mb-3">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Username" v-model="Conta.aluno_id">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Curso" v-model="Conta.curso">
        </div>
        <div class="form-group">
          <input type="date" class="form-control" placeholder="Data da matricula" v-model="Conta.data_de_matricula_inicial">
        </div>
        <div class="form-group">
          <input type="number" class="form-control" placeholder="Ano Curricular" v-model="Conta.ano_curricular">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Nome" v-model="Conta.name">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email" v-model="Conta.email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" v-model="Conta.password">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Confirmar Password" v-model="Conta.password_confirmation">
        </div>
        <button type="submit" class="btn btn-light btn-block">Criar conta de Aluno</button>
      </form>


      <form @submit.prevent="addContaProf" class="mb-3">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Username" v-model="ContaProf.professor_id">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Nome" v-model="ContaProf.name">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email" v-model="ContaProf.email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" v-model="ContaProf.password">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Confirmar Password" v-model="ContaProf.password_confirmation">
        </div>
        <button type="submit" class="btn btn-light btn-block">Criar conta de Professor</button>
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
        },
        ContaProf: {
          "professor_id": "",
          "name": "",
          "email": "",
          "password": "",
          "password_confirmation": ""
        }
      };
    },
    methods: {
      addContaAluno() {
        axios.post('api/alunos', {"aluno_id": this.Conta.aluno_id,"curso": this.Conta.curso,"data_de_matricula_inicial": this.Conta.data_de_matricula_inicial,"ano_curricular": this.Conta.ano_curricular,"name": this.Conta.name,"email": this.Conta.email,"password": this.Conta.password,"password_confirmation": this.Conta.password_confirmation})
        .then((response) => {
            alert(JSON.stringify(response));
        }, (error) => {
          alert("nao criou macarrao");
        });
      },
      addContaProf() {
          axios.post('api/professores', {"professor_id": this.ContaProf.professor_id,"name": this.ContaProf.name,"email": this.ContaProf.email,"password": this.ContaProf.password,"password_confirmation": this.ContaProf.password_confirmation})
          .then((response) => {
              alert(JSON.stringify(response));
          }, (error) => {
            alert("nao criou macarrao");
          });
          ;
      },
    }
  }
</script>
