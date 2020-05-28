<template>
    <div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card" :class="ficheiros.length == 0 ? 'text-center' : ''">
                    <div class="card-body">
                        <div class="table-responsive" v-if="ficheiros.length > 0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Data de criação</th>
                                        <th>Data de atualização</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(ficheiro, index) in ficheiros" :key="index">
                                        <td>{{index + 1}}</td>
                                        <td>{{ficheiro.nome}}</td>
                                        <td>{{ficheiro.descricao}}</td>
                                        <td>{{ficheiro.created_at | moment("DD/MM/YY hh:mm")}}</td>
                                        <td>{{dicheiro.update_at | moment("DD/MM/YY hh:mm")}}</td>
                                        <td>
                                            <button @click="onViewFile(ficheiro.id)" class="btn btn-gradient-primary mr-2">Visualizar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-else>
                            <h3>Não existe ficheiros nesta dúvida</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <code-highlighter :file-id="fileId" v-if="fileId !=0"></code-highlighter>
    </div>
</template>

<script lang="ts">
import axios, { AxiosResponse, AxiosError } from 'axios';
import { Vue, Component, Prop, Watch } from 'vue-property-decorator';

@Component
export default class Aula extends Vue {
    private aula = null;
    private fileId = 0;
    private ficheiros = new Array();

    mounted() {
        const disciplinaId = this.$route.params.disciplina;
        const aulaId = this.$route.params.aula;

        axios.get(`/api/disciplinas/${disciplinaId}/aulas/${aulaId}/ficheiros`)
            .then((response: AxiosResponse) => {
                this.ficheiros = response.data.data;
            });
    }

    onViewFile(fileId: number) {
        this.fileId = fileId;
    }
}
</script>