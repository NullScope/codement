<template>
    <div v-if="professor" class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">{{disciplina}}</h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Criar evento de avaliação</h4>
                        <hr>
                        <p v-if="errors.length" class="text-danger">
                            <b>Tenha em atenção:</b>
                            <ul>
                                <li v-for="error in errors" :key="error">{{ error }}</li>
                            </ul>
                        </p>
                        <div class="form-group row">
                            <label for="exampleInputName1" class="col-sm-12 col-form-label">Data de Início</label>
                            <div class="col-sm-6">
                                <b-form-datepicker id="datepicker-inicio" v-model="data_inicio" required></b-form-datepicker>
                            </div>
                            <div class="col-sm-6">
                                <b-form-timepicker v-model="hora_inicio" locale="de" required></b-form-timepicker>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputName1" class="col-sm-12 col-form-label">Data Final</label>
                            <div class="col-sm-6">
                                <b-form-datepicker id="datepicker-fim" v-model="data_fim" required></b-form-datepicker>
                            </div>
                            <div class="col-sm-6">
                                <b-form-timepicker v-model="hora_fim" locale="de" required></b-form-timepicker>
                            </div>
                        </div>
                        <button @click="verificaForm()" class="btn btn-gradient-primary mr-2">Criar</button>
                        <button class="btn btn-light">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
          <div class="row flex-grow">
            <div class="col-lg-7 mx-auto text-white">
              <div class="row align-items-center d-flex flex-row">
                <div class="col-lg-6 text-lg-right pr-lg-4">
                  <h1 class="display-1 mb-0">404</h1>
                </div>
                <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                  <h2>DESCULPE!</h2>
                  <h3 class="font-weight-light">A página que procura não foi encontrada.</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</template>

<script>   
  import axios from "axios";

  export default {
    mounted: function () {
        this.login()
        this.getTipoDeUtilizador()
        this.getNomeDisciplina()
    },
    methods: {
        async login() {
            await axios.get('http://localhost:8000/sanctum/csrf-cookie');

            await axios.post('http://localhost:8000/login', {
                email: "filipe.quintal@staff.uma.pt",
                password: "12345678"
            });
        },
        async getNomeDisciplina() {
            let url = '/api/disciplinas/' + this.$route.params.disciplina;
            axios.get(url)
                .then((response) => {
                    this.disciplina = response.data.data.nome;
                });
        },
        async criarEventoAvaliacao() {
            let dataI = this.data_inicio + ' ' + this.hora_inicio;
            let dataF = this.data_fim + ' ' + this.hora_fim;

            let url = '/api/disciplinas/' + this.$route.params.disciplina + '/eventos-de-avaliacao';
            await axios.post(url, {
                data_inicio: dataI,
                data_fim: dataF
            });
            this.$router.push({ path: `/eventosAvaliacao` })
        },
        verificaForm(){
            if (this.data_inicio && this.hora_inicio) {
                if (this.data_fim && this.hora_fim) {
                    let dataI = this.data_inicio + ' ' + this.hora_inicio;
                    let dataF = this.data_fim + ' ' + this.hora_fim;

                    if(dataF > dataI){
                        this.criarEventoAvaliacao();
                        return true;
                    }else{
                         this.errors.push('Data de início tem de ser menor que Data Final');
                    }
                }
            }

            if (!this.data_inicio) {
                this.errors.push('Data de início é necessário');
            }
            if (!this.hora_inicio) {
                this.errors.push('Hora de início é necessário');
            }
            if (!this.data_fim) {
                this.errors.push('Data Final é necessário');
            }
            if (!this.hora_fim) {
                this.errors.push('Hora Final é necessário');
            }
        },
        async getTipoDeUtilizador() {
            await axios.get('/api/me').then((response) => {
                console.log(response.data.data)
                if ("professor_id" in response.data.data){
                    this.professor = true;
                }
                else if ("aluno_id" in response.data.data){
                    this.professor = false;
                }
            });;
        }
    },
    computed: {

    },
    watch: {

    },
    data() {
      return {
        data_inicio: '',
        hora_inicio: '',
        data_fim: '',
        hora_fim: '',
        disciplina: '',
        errors: [],
        professor: false
      }
    },
    components: {

    }
  }
</script>

<style>

</style>
