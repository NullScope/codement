<template>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">{{disciplina}}</h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Criar evento de avaliação</h4>
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
                        <div class="form-group">
                            <label>Enunciado</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload do enunciado">
                                <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <button class="btn btn-gradient-primary mr-2">Criar</button>
                        <button class="btn btn-light">Cancelar</button>
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
        /*async criarEventoAvaliacao() {
            let dataI = this.data_inicio + ' ' + this.hora_inicio;
            let dataF = this.data_fim + ' ' + this.hora_fim;

            let url = '/api/disciplinas/' + this.$route.params.disciplina + '/eventos-de-avaliacao';
            await axios.post(url, {
                data_inicio: dataI,
                data_fim: dataF
            });
        }*/
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
        disciplina: ''
      }
    },
    components: {

    }
  }
</script>

<style>

</style>
