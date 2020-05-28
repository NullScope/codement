<template>
  <div>
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-primary card-img-holder text-white">
          <div class="card-body">
            <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
            <h4 class="font-weight-normal mb-3">
              Disciplinas <i class="mdi mdi-projector-screen mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{disciplinas.length}}</h2>
          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card grid-margin" v-if="duvidas.length > 0">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
            <h4 class="font-weight-normal mb-3">
              Dúvidas Totais <i class="mdi mdi-comment-question-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{duvidas.length}}</h2>
          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card grid-margin" v-if="aulas.length > 0">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
            <h4 class="font-weight-normal mb-3">
              Aulas <i class="mdi mdi-comment-question-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{aulas.length}}</h2>
          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-warning card-img-holder text-white">
          <div class="card-body">
            <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
            <h4 class="font-weight-normal mb-3">
              Eventos de Avaliação <i class="mdi mdi-certificate mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{eventos.length}}</h2>
          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
            <h4 class="font-weight-normal mb-3">
              Ficheiros <i class="mdi mdi-file-document mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{ficheiros.length}}</h2>
          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
            <h4 class="font-weight-normal mb-3">
              Comentários <i class="mdi mdi-comment mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{comentarios.length}}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import axios, {AxiosResponse, AxiosError} from 'axios';
import { Vue, Component, Prop } from 'vue-property-decorator';

@Component
export default class Home extends Vue {
  private disciplinas = new Array();
  private aulas = new Array();
  private duvidas = new Array();
  private comentarios = new Array();
  private eventos = new Array();
  private ficheiros = new Array();

  mounted() {
    axios.get(`/api/me`).then((response: AxiosResponse) => {
      this.disciplinas = response.data.data.disciplinas;

      if (response.data.data.professor_id) {
        this.disciplinas = this.disciplinas.concat(response.data.data.regente);
        this.aulas = response.data.data.aulas;
      } else {
        this.duvidas = response.data.data.duvidas;
      }

      this.comentarios = response.data.data.comentarios;
      this.ficheiros = response.data.data.ficheiros;
      this.eventos = response.data.data.eventos_de_avaliacao;
    });
  }
}
</script>

<style>

</style>
