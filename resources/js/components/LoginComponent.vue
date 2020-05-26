
<template>
  <div>
    <div id="login" class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="..\..\..\public\docs\images\logo.png">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form @submit.prevent="login" class="pt-3">
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" v-model="Conta.email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" v-model="Conta.password">
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="#register" @click="showReg" class="text-primary">Criar conta</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
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
      }
    };
  },
  methods: {
    login()
    {
      axios.post('http://localhost:8000/login',{ "email": this.Conta.email,"password": this.Conta.password,})
      .then((response) =>
      {
        var x = document.getElementById("login");
        x.style.display = "none";
        this.$router.go();
      }, (error) => {alert("erro");});

    },
    showReg()
     {
      var x = document.getElementById("login");
      x.style.display = "none";
      var y = document.getElementById("register");
      y.style.display = "block";
    },
    me(){
      axios.get('api/me', {})
      .then((response) =>
      {
        alert(JSON.stringify(response));
      }, (error) => {alert("erro");});
    }
  }
}
</script>
