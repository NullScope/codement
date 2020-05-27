<template>
    <div class="content-wrapper">
        <div class="page-header">
            <b-form-select v-model="idDisciplina" @change="getEventosAvaliacaoDisciplina()" class="mb-3">
                <b-form-select-option :value="null">Por favor escolha a disciplina</b-form-select-option>
                <b-form-select-option v-for="(item, index) in opcoes" :key="index" :value="item.id">{{item.nome}}</b-form-select-option>
            </b-form-select>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <button id="criar" v-if="show" @click="criarEventoAvaliacao()" class="btn btn-gradient-primary btn-fw">Novo Evento de Avaliação</button>
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
                                        <td>{{item.data_inicio}}</td>
                                        <td>{{item.data_fim}}</td>
                                        <td>
                                            <ul v-if="item.ficheiros.length > 0">
                                                <li v-for="ficheiro in item.ficheiros">
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
                        this.idUser = response.data.data.professor_id;
                    }
                    else if ("aluno_id" in response.data.data){
                        this.professor = false;
                        this.idUser = response.data.data.aluno_id;
                    }
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
                await axios.get('/api/disciplinas/' + this.idDisciplina)
                    .then((response) => {
                        if(this.idUser === response.data.data.regente.professor_id && this.professor)
                            this.show = true;
                        else
                            this.show = false;
                    });

                let url = '/api/disciplinas/' + this.idDisciplina + '/eventos-de-avaliacao';
                await axios.get(url)
                    .then((response) => {
                        this.eventosAvaliacao = response.data.data;
                    });
            },


            criarEventoAvaliacao() {
                this.$router.push({ path: `/criarAvaliacao/${this.idDisciplina}` })
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
