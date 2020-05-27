<template>
    <div v-if="professor" class="content-wrapper">
        <div class="page-header">
            <h2 class="page-tittle">{{disciplina}}</h2>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card-body">
                    <h4 class="card-tittle">Criar aula</h4>
                    <hr>
                    <p v-if="errors.length" class="text-danger">
                        <b>Tenha em atenção:</b>
                        <ul>
                            <li v-for="error in errors" :key="error">{{error}}</li>
                        </ul>
                    </p>
                    <div class="form-group row">
                        <label for="exampleInputName1" class="col-sm-12 col-form-label">Título da aula</label>
                        <input type="text" id="nomeAula"><br><br>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputName1" class="col-sm-12 col-form-label">Descrição da aula</label>
                        <input type="text" id="descricaoAula"><br><br>
                    </div>
                    <div class="input-group col-xs-12">
                        <input type="file" ref="fileInput" v-on:change="onFlileChange" name="file" required class="file-upload-default">
                        <label class="form-control" placeholder="" v-on:click="onClickUpload"> {{fileLabel ? fileLabel : "Upload Ficheiro"}}</label>
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button" v-on:click="onClickUpload">Upload</button>
                        </span>
                    </div>
                    <button @click="verificaForm()" class="btn btn-gradient-primary mr-2">Criar</button>
                    <button class="btn btn-light">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div v-else class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page">
            <div class="row flex-grow">
                <div class="col-lg-7 mx-auto">
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
    mounted: function() {
        this.login()
    },
    
    methods: {
        async login() {
            await axios.get('http://localhost:8000/sanctum/csrf-cookie');

            await axios.post('http://localhost:8000/login',{
                email: "filipe.quintal@staff.uma.pt",
                password: "12345678"
            });

            this.getIdETipoDeUtilizador()
        },

        async getIdETipoDeUtilizador(){
            await axios.get('/api/me').then((response) => {
                if ("professor_id" in response.data.data){
                    this.idUser = response.data.data.professor_id;
                    this.isRegente();
                }
                else if ("aluno_id" in response.data.data){
                    this.professor = false;
                }
            });
        },

        async isRegente(){
            await axios.get('/api/disciplinas/' + this.$route.params.disciplina)
                .then((response) => {
                    if(this.idUser === response.data.data.regente.professor_id)
                        this.professor = true;
            });
            this.getNomeDisciplina();
        },

        async getNomeDisciplina(){
            let url = '/api/disciplinas/' + this.$route.params.disciplina;
            axios.get(url)
                .then((response) => {
                    this.disciplina = response.data.data.nome;
                });
        },

        async criarAula(){
            let nomeA = this.nomeAula
            let descA = this.descricaoAula

            let url = '/api/disciplinas/' + this.$route.params.disciplina + '/disciplina';
            await axios.post(url, {
                nomeAula: nomeA,
                descricaoAula: descA
            });
            this.$router.push({path: `/disciplina`}) 
        },

        verificaForm (){
            if(!this.nome){
                this.errors.push('Nome da aula é necessário')
            }
        }, 
    },

    computed:{

    },

    watch:{

    },

    data() {
        return {
            nomeAula: '',
            descricaoAula: '',
            disciplina: '',
            errors: [],
            professor: '',
            idUser: null
        }
    },

    components: {
        
    }
}
</script>

<style>

</style>