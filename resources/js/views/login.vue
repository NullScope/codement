<template>
  <div class="row flex-grow">
    <div class="col-lg-4 mx-auto">
      <div class="auth-form-light text-left p-5">
        <div class="brand-logo">
          <img src="/images/logo.svg">
        </div>
        <h4>Bem vindo ao CodeMent</h4>
        <h6 class="font-weight-light">Faça login para continuar</h6>
        <form class="pt-3">
          <div class="form-group">
            <input type="email" class="form-control form-control-lg" id="email" v-model="email" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control form-control-lg" id="password" v-model="password" placeholder="Password">
          </div>
          <div class="mt-3">
            <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" v-on:click="login">ENTRAR</a>
          </div>
          <div class="my-2 d-flex justify-content-between align-items-center" v-if="error">
            <p class="text-danger">Credenciais inválidas</p>
          </div>
          <div class="my-2 d-flex justify-content-between align-items-center">
            <div class="form-check">
              <label class="form-check-label text-muted"/>
            </div>
          </div>
          <div class="text-center mt-4 font-weight-light"> Não tem conta? <a href="/register" class="text-primary">Registe-se</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import axios, {AxiosResponse, AxiosError} from 'axios';
import { Vue, Component, Prop } from 'vue-property-decorator';

@Component
export default class Login extends Vue {
  email = '';
  password = ''
  error = false

  login() {
    this.error = false;

    axios.post('/login', {
      email: this.email,
      password: this.password
    }).then((response: AxiosResponse) => {
      this.$router.push('/');
    }).catch((error: AxiosError) => {
      console.log(error);
      this.error = true;
    })
  }
}
</script>
