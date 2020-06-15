<template>
    <div>
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
              <i class="mdi mdi-projector-screen"></i>
            </span> Aulas </h3>
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <span></span>Lista de aulas <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
              </li>
            </ul>
          </nav>
        </div>
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <b-form-select v-model="idDisciplina" class="mb-3">
                <b-form-select-option :value="0">Por favor escolha uma disciplina</b-form-select-option>
                <b-form-select-option v-for="(disciplina, index) in disciplinas" :key="index" :value="disciplina.id">{{disciplina.nome}}</b-form-select-option>
            </b-form-select>
          </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card" :class="aulas.length==0 ? 'text-center' : ''">
                    <div class="card-body">
                        <router-link
                            id="criar"
                            class="btn btn-gradient-primary btn-fw"
                            v-if="idDisciplina != 0 && user && user.professor_id && disciplina && disciplina.regente.id == user.id"
                            :to="{ name: 'Criar Aula', params: {disciplina: idDisciplina}}"
                        >
                            Nova Aula
                        </router-link>
                        <div class="table-responsive" v-if="aulas.length > 0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Título</th>
                                        <th>Descrição</th>
                                        <th>Ficheiro(s)</th>
                                        <th>Data de Criação</th>
                                        <th>Data de Atualização</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(aula,index) in aulas" :key="index">
                                        <td>{{index + 1}}</td>
                                        <td>{{aula.nome}}</td>
                                        <td>{{aula.descricao}}</td>
                                        <td>
                                            <ul v-if="aula.ficheiros.length > 0">
                                                <li v-for="(ficheiro, fileIndex) in aula.ficheiros" :key="fileIndex">
                                                    <a :href="ficheiro.url" download><i class="mdi mdi-file"></i>{{ficheiro.nome}}</a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>{{aula.created_at | moment("DD/MM/YY hh:mm")}}</td>
                                        <td>{{aula.updated_at | moment("DD/MM/YY hh:mm")}}</td>
                                        <td>
                                            <router-link
                                                class="btn btn-gradient-primary btn-fw"
                                                :to="{ name: 'Ver Aula', params: {disciplina: idDisciplina, aula: aula.id}}"
                                                v-if="aula.ficheiros.length > 0"
                                            >
                                            Visualizar
                                            </router-link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-else>
                            <h3>{{idDisciplina == 0 ? "Selecione uma disciplina." : "Não existe aulas nesta disciplina."}}</h3>
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
    export default class Aulas extends Vue {
        private user = null;
        private idDisciplina = 0;
        private disciplina = null;
        private disciplinas = new Array();
        private aulas = new Array();

        mounted() {
            axios.get('/api/me').then((response: AxiosResponse) => {
                let disciplinas = response.data.data.disciplinas;

                this.user = response.data.data

                if(response.data.data.regente){
                    disciplinas = disciplinas.concat(response.data.data.regente);
                }

                disciplinas.forEach((disciplina: any) => {
                    this.disciplinas.push(disciplina);
                });
            });
        }

        @Watch('idDisciplina')
        onIdDisciplinaChanged(newVal: Number, oldVal: Number) {
            if(newVal != 0){
                axios.get(`/api/disciplinas/${newVal}`).then((response: AxiosResponse) => {
                    this.disciplina = response.data.data;
                });

                axios.get(`/api/disciplinas/${newVal}/aulas`).then((response: AxiosResponse) => {
                    this.aulas = response.data.data
                });
            } else {
                this.aulas = [];
            }
        }
    }
</script>
