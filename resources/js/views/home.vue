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

      <div class="col-md-4 stretch-card grid-margin" v-if="user && user.aluno_id">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
            <h4 class="font-weight-normal mb-3">
              Dúvidas <i class="mdi mdi-comment-question-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{duvidas.length}}</h2>
          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card grid-margin" v-if="user && user.professor_id">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
            <h4 class="font-weight-normal mb-3">
              Aulas <i class="mdi mdi-projector-screen mdi-24px float-right"></i>
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
  private user:any = null;
  private disciplinas = new Array();
  private aulas = new Array();
  private duvidas = new Array();
  private comentarios = new Array();
  private eventos = new Array();
  private ficheiros = new Array();

  mounted() {
    axios.get(`/api/me`).then((response: AxiosResponse) => {
      this.user = response.data.data;

      this.disciplinas = this.user.disciplinas;

      if (this.user.professor_id) {
        this.disciplinas = this.disciplinas.concat(this.user.regente);
        this.aulas = this.user.aulas;
      } else {
        this.duvidas = this.user.duvidas;
      }

      this.comentarios = this.user.comentarios;
      this.ficheiros = this.user.ficheiros;
      this.eventos = this.user.eventos_de_avaliacao;
    });
  }
}
</script>

<style>

</style>
