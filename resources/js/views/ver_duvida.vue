<template>
  <div>
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-comment-question-outline"></i>
        </span>{{ disciplina ? disciplina.nome : '' }}</h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Ver Dúvida <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card" :class="ficheiros.length == 0 ? 'text-center' : ''">
          <div class="card-body">
            <div class="table-responsive" v-if="ficheiros.length > 0">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Data de Criação</th>
                    <th>Data de Atualização</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(ficheiro, index) in ficheiros" :key="index">
                    <td>{{index + 1}}</td>
                    <td>{{ficheiro.nome}}</td>
                    <td>{{ficheiro.descricao}}</td>
                    <td>{{ficheiro.created_at | moment("DD/MM/YY hh:mm")}}</td>
                    <td>{{ficheiro.updated_at | moment("DD/MM/YY hh:mm")}}</td>
                    <td>
                      <button @click="onViewFile(ficheiro.id)" class="btn btn-gradient-primary mr-2">Visualizar</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div v-else>
              <h3>Não existe ficheiros nesta dúvida.</h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <code-highlighter :file-id="fileId" v-if="fileId != 0"></code-highlighter>
  </div>
</template>

<script lang="ts">
import axios, { AxiosResponse, AxiosError } from 'axios';
import { Vue, Component, Prop, Watch } from 'vue-property-decorator';

@Component
export default class VerDuvida extends Vue {
  private duvida = null;
  private fileId = 0;
  private ficheiros = new Array();
  private disciplina = null;

  mounted() {
    const disciplinaId = this.$route.params.disciplina;
    const duvidaId = this.$route.params.duvida;

    axios.get(`/api/disciplinas/${this.$route.params.disciplina}`)
      .then((response: AxiosResponse) => {
          if(!response.data.data.error){
              this.disciplina = response.data.data;
          } else {
              this.$router.push('/404');
          }
      });

    axios.get(`/api/disciplinas/${disciplinaId}/duvidas/${duvidaId}/ficheiros`)
      .then((response: AxiosResponse) => {
        this.ficheiros = response.data.data;
      });
  }

  onViewFile(fileId: number) {
    this.fileId = fileId;
  }
}
</script>
