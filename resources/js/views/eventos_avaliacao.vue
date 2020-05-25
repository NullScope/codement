<template>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">{{disciplina}}</h3>
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Novo evento de avaliação </h4>
                        <button type="button" class="btn btn-gradient-dark btn-rounded btn-icon float-right" @click="criarEventoDeAvaliacao()"><i class="mdi mdi-arrow-right-bold-circle-outline mdi-24px"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
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
            this.getNomeDisciplina()
            this.getEventosAvaliacaoDisciplina()
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
            async getEventosAvaliacaoDisciplina() {
                let url = '/api/disciplinas/' + this.$route.params.disciplina + '/eventos-de-avaliacao';
                axios.get(url)
                    .then((response) => {
                        this.eventosAvaliacao = response.data.data;
                    });
            },
            criarEventoDeAvaliacao(){
                this.$router.push({ name: '/criarAvaliacao'})
            }
        },
        computed: {

        },
        watch: {

        },
        data() {
            return {
            disciplina: '',
            eventosAvaliacao: []
            }
        },
        components: {

        }
    }
</script>

<style>
    .btn-gradient-dark{
        display:inline-block;
        position:relative;
    }
</style>
