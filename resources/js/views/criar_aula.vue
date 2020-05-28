<template>
    <div v-if="professor" class="content-wrapper">
        <div class="page-header">
            <h3 class="page-tittle" v-if="disiplina">{{ disciplina.nome }}</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-tittle">Criar aula</h4>
                        <hr>
                        <div>
                            <b-form-group
                                label="Nome da aula"
                                label-for="nome-input"
                                invalid-feedback="Nome da aula é obrigatório"
                            >
                            <b-form-input
                                id="nome-input"
                                v-model="nome"
                                required
                                placeholder="Nome da aula"
                            ></b-form-input>
                            </b-form-group>
                        </div>
                        <div>
                            <b-form-group
                                label="Descrição"
                                label-for="descricao-input"
                                invalid-feedback="Descrição da aula é obrigatório"
                            >
                            <b-form-textarea
                                id="descricao-input"
                                v-model="descricao"
                                required
                                placeholder="Descrição"
                                rows="3"
                                max-rows="3"
                            ></b-form-textarea>
                            </b-form-group>
                        </div>
                        <div>
                            <p v-if="files.length">
                                <b>Ficheiros da aula:</b>
                                <ul>
                                    <li v-for="(file, fileIndex) in files" v-bind:key=fileIndex>{{ file.filename }}</li>
                                </ul>
                            </p>
                        </div>
                        <p class="text-danger" v-if="filesError">É obrigatório inserir pelo menos um ficheiro.</p>
                        <button @click="onAddFileToggle" class="btn mr-2" :class="fileUploadShow ? 'btn-gradient-info' : 'btn-outline-info'">Adicionar Ficheiro</button>
                        <button @click="onSubmit" class="btn btn-gradient-primary mr-2">Criar aula</button>
                    </div>
                </div>
            </div>
        </div>
        <code-highlighter :on-save="onFileSave" v-if="fileUploadShow"></code-highlighter>
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

<script lang="ts">
import axios, { AxiosResponse, AxiosError } from 'axios';
import { Vue, Component, Prop, Watch } from 'vue-property-decorator';

@Component
export default class CriarAula extends Vue {
    private disciplina = null;
    private nome = null;
    private descricao= null;
    private fileUploadShow = false;
    private files = new Array();
    private filesError = false;

    mounted() {
        axios.get('/api/me').then((response: AxiosResponse) => {
            if ('aluno_id' in response.data.data){
                this.$router.push('404');
            } else {
                axios.get(`/api/disciplina/${this.$route.params.disciplina}`)
                .then((response: AxiosResponse) => {
                    if(!response.data.data.error){
                        this.disciplina = response.data.data;
                    } else {
                        this.$router.push('404');
                    }
                });
            }
        });
    }

    onAddFileToggle() {
        this.fileUploadShow = !this.fileUploadShow;
    }

    onFileSave(file: any) {
        this.files.push(file);
        this.fileUploadShow = false;
        this.filesError = false;
    }

    onSubmit() {
        if (this.files.length === 0){
            this.filesError = true;
            return;
        } else {
            this.filesError = false;
        }

        axios.post(`/api/disciplinas/${this.$route.params.disciplina}/aulas`, {
            nome: this.nome,
            descricao: this.descricao
        }).then((response: AxiosResponse) => {
            let id = response.data.data.id;

            this.files.forEach((file: any) => {
                let fileFormData = new FormData();
                fileFormData.append('nome', file.filename);
                fileFormData.append('descricao', file.fileDescription);
                fileFormData.append('ficheiro', file.file);

                axios.post(`/api/disciplinas/${this.$route.params.disciplina}/dúvidas/${id}/ficheiros`, fileFormData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then((response) => {
                    console.log(response);
                });
            });
        });
    }
}
</script>

<style>

</style>