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
                                        <td></td>
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
            this.login()
            this.getDisciplinas()
        },
        methods: {
            async login() {
                await axios.get('http://localhost:8000/sanctum/csrf-cookie');

                await axios.post('http://localhost:8000/login', {
                    email: "filipe.quintal@staff.uma.pt",
                    password: "12345678"
                });
            },
            async getDisciplinas() {
                let url = '/api/disciplinas';
                axios.get(url)
                    .then((response) => {
                        this.opcoes = response.data.data;
                    });
            },
            async getEventosAvaliacaoDisciplina() {
                let url = '/api/disciplinas/' + this.idDisciplina + '/eventos-de-avaliacao';
                axios.get(url)
                    .then((response) => {
                        console.log(response.data.data)
                        this.eventosAvaliacao = response.data.data;
                    });
                this.show = true;
            },
            criarEventoAvaliacao() {
                this.$router.push({ path: `/criarAvaliacao/${this.idDisciplina}` })
            }
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
</style>
