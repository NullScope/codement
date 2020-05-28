<template>
    <div>
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
              <i class="mdi mdi-certificate"></i>
            </span> Eventos de Avaliação </h3>
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <span></span>Lista de Eventos de Avaliação <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
              </li>
            </ul>
          </nav>
        </div>
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <b-form-select v-model="idDisciplina" @change="getEventosAvaliacaoDisciplina()" class="mb-3">
                <b-form-select-option :value="null">Por favor escolha uma disciplina</b-form-select-option>
                <b-form-select-option v-for="(disciplina, index) in opcoes" :key="index" :value="disciplina.id">{{disciplina.nome}}</b-form-select-option>
            </b-form-select>
          </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <router-link
                            id="criar"
                            class="btn btn-gradient-primary btn-fw"
                            v-if="show"
                            :to="{ name: 'Criar evento de avaliação', params: {disciplina: idDisciplina}}"
                        >
                            Novo Evento de Avaliação
                        </router-link>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Data inicial</th>
                                        <th>Data final</th>
                                        <th>Ficheiro(s)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in eventosAvaliacao" :key="index">
                                        <td>{{index + 1}}</td>
                                        <td>{{item.data_inicio | moment("DD/MM/YY hh:mm")}}</td>
                                        <td>{{item.data_fim | moment("DD/MM/YY hh:mm")}}</td>
                                        <td>
                                            <ul v-if="item.ficheiros.length > 0">
                                                <li v-for="(ficheiro, fileIndex) in item.ficheiros" :key="fileIndex">
                                                    <a :href="ficheiro.url" download><i class="mdi mdi-file"></i>{{ficheiro.nome}}</a>
                                                </li>
                                            </ul>
                                            <span v-else>-</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
            this.getIdETipoDeUtilizador();
        },
        methods: {
            async getIdETipoDeUtilizador() {
                await axios.get('/api/me').then((response) => {
                    if ("professor_id" in response.data.data){
                      this.professor = true;
                    }
                    else if ("aluno_id" in response.data.data){
                      this.professor = false;
                    }

                    this.idUser = response.data.data.id;
                });

                this.getDisciplinas();
            },


            async getDisciplinas() {
                if(this.professor){
                    await axios.get('/api/me').then((response) => {
                        Array.prototype.push.apply(response.data.data.disciplinas, response.data.data.regente);
                        this.opcoes = response.data.data.disciplinas;
                    });
                }else{
                    let url = '/api/alunos/'+ this.idUser + '/disciplinas';
                    await axios.get(url)
                        .then((response) => {
                            this.opcoes = response.data.data;
                        });
                }
            },


            async getEventosAvaliacaoDisciplina() {
              if (this.idDisciplina) {
                await axios.get('/api/disciplinas/' + this.idDisciplina)
                    .then((response) => {
                        if(this.idUser === response.data.data.regente.user.id && this.professor)
                            this.show = true;
                        else
                            this.show = false;
                    });

                let url = '/api/disciplinas/' + this.idDisciplina + '/eventos-de-avaliacao';
                await axios.get(url)
                    .then((response) => {
                        this.eventosAvaliacao = response.data.data;
                    });
              } else {
                this.show = false;
                this.eventosAvaliacao = [];
              }

            },


            criarEventoAvaliacao() {
                this.$router.push({ name: 'Criar evento de avaliação', params: { disciplina: this.idDisciplina }});
            },

        },
        computed: {

        },
        watch: {

        },
        data() {
            return {
                idDisciplina: null,
                opcoes: [],
                eventosAvaliacao: [],
                professor: false,
                idUser: null,
                show: false
            }
        },
        components: {

        }
    }
</script>

<style>
    #criar{
        margin-bottom: 20px;
    }

    ul{
        list-style-type: none;
        padding-left: 0px;
    }
</style>
