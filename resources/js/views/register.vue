<template>
<div class="row flex-grow">
  <div class="col-lg-4 mx-auto">
    <div class="auth-form-light text-left p-5">
      <div class="brand-logo">
        <img src="/images/logo.svg">
      </div>
      <h4>Novo ao codement?</h4>
      <h6 class="font-weight-light">Criar uma conta é fácil. Só necessita de alguns passos</h6>
      <form class="pt-3" v-on:submit.prevent="onSubmit" method="POST">
        <div class="form-group">
          <input type="text" class="form-control form-control-lg" id="name" v-model="name" required placeholder="Nome">
        </div>
        <div class="form-group">
          <input type="email" class="form-control form-control-lg" id="email" v-model="email" required placeholder="Email">
          <p class="text-danger" v-if="emailExists">Email já existe</p>
        </div>
        <div class="form-group">
          <select class="form-control form-control-lg" id="user-type" required v-model="userType">
            <option>Aluno</option>
            <option>Professor</option>
          </select>
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-lg" id="numero" v-model="numero" required :placeholder="userType === 'Aluno' ? 'Número de aluno' : 'Número de professor'">
        </div>
        <div class="form-group">
          <input type="password" class="form-control form-control-lg" id="password" v-model="password" required placeholder="Password">
        </div>
        <div class="form-group">
          <input type="password" class="form-control form-control-lg" id="password-confirmation" v-model="passwordConfirmation" required placeholder="Repetir Password">
        </div>
        <div class="mb-4">
          <div class="form-check">
            <label class="form-check-label text-muted">
              <input type="checkbox" class="form-check-input" required> Li e aceito os Termos & Condições </label>
          </div>
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">REGISTAR CONTA</button>
        </div>
        <p class="text-danger" v-if="genericError">Ocurreu um erro, por favor tente novamente ou contacte os administradores.</p>
        <div class="text-center mt-4 font-weight-light"> Já tem conta? <a href="/login" class="text-primary">Login</a>
        </div>
      </form>
    </div>
  </div>
</div>
</template>

<script lang="ts">
import moment from 'moment';
import axios, {AxiosResponse, AxiosError} from 'axios';
import { Vue, Component, Prop } from 'vue-property-decorator';

@Component
export default class Sidebar extends Vue {
  name = '';
  email = '';
  numero = '';
  userType = 'Aluno';
  curso = 'Engenharia Informática';
  dataDeMatricula = moment().subtract(3, 'years').format('YYYY-MM-DD');
  ano = 3;
  password = '';
  passwordConfirmation = '';
  emailExists = false;
  genericError = false;

  onSubmit() {
    let endpoint = '';

    this.emailExists = false;
    this.genericError = false;

    if (this.userType === 'Aluno') {
      endpoint = '/api/alunos';
    } else if (this.userType === 'Professor') {
      endpoint = '/api/professores';
    }

    axios.post(endpoint, {
      name: this.name,
      email: this.email,
      password: this.password,
      password_confirmation: this.passwordConfirmation,
      curso: this.curso,
      data_de_matricula_inicial: this.dataDeMatricula,
      ano_curricular: this.ano,
      aluno_id: this.numero,
      professor_id: this.numero
    }).then((response: AxiosResponse) => {
      if (response.data.email) {
        this.emailExists = true;
      } else {
        axios.post('/logout').then(() => {
          axios.post('/login', {
            email: this.email,
            password: this.password
          }).then((response: AxiosResponse) => {
            this.$router.push('/home');
          });
        });
      }
    }).catch((error) => {
      if (error.response.data.errors && error.response.data.errors.email) {
        this.emailExists = true;
      } else {
        this.genericError = true;
      }
    })
  }
}
</script>
