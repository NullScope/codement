
<template>
    <div >
      <div id="register" style="display:none" class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="..\..\..\public\docs\images\logo.png">
                </div>
                <h4>Create aluno</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form @submit.prevent="addContaAluno" class="pt-3">
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
                  <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Criar conta de Aluno</button>
                  <a @click="showProfReg" href="#registerProf" class="text-primary">Criar conta de Professor</a>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>




      <div id="registerProf" style="display:none" class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="..\..\..\public\docs\images\logo.png">
                </div>
                <h4>Create Professor</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form @submit.prevent="addContaProf" class="pt-3">
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
                  <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Criar conta de Professor</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
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
      }
      showProfReg() {
       var x = document.getElementById("register");
       x.style.display = "none";
       var y = document.getElementById("registerProf");
       y.style.display = "block";
     }
    }
  }
</script>
