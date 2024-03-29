<template>
  <div v-if="disciplina">
    <div class="page-header">
      <h3 class="page-title" v-if="disciplina">{{disciplina.nome}}</h3>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Criar Dúvida</h4>
            <hr>
            <div>
              <b-form-group
                label="Descrição"
                label-for="descricao-input"
                invalid-feedback="Comentário é obrigatório"
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
                <b>Ficheiros da Dúvida:</b>
                <ul>
                  <li v-for="(file, fileIndex) in files" v-bind:key=fileIndex>{{ file.filename }}</li>
                </ul>
              </p>
            </div>
            <p class="text-danger" v-if="filesError">É obrigatório inserir pelo menos um ficheiro.</p>
            <button @click="onAddFileToggle" class="btn mr-2" :class="fileUploadShow ? 'btn-gradient-info' : 'btn-outline-info'">Adicionar Ficheiro</button>
            <button @click="onSubmit" id="criarDuvida" class="btn btn-gradient-primary mr-2 btn-icon-text" :class="loading ? 'disabled' : ''"><i class="mdi btn-icon-prepend" :class="loading ? 'mdi-loading' : 'mdi-upload'"></i>Criar Dúvida</button>
          </div>
        </div>
      </div>
    </div>

    <code-highlighter :on-save="onFileSave" v-if="fileUploadShow"></code-highlighter>
  </div>
</template>

<script lang="ts">
import axios, { AxiosResponse, AxiosError } from 'axios';
import { Vue, Component, Prop, Watch } from 'vue-property-decorator';

@Component
export default class CriarDuvida extends Vue {
  private disciplina = null;
  private descricao = null;
  private fileUploadShow = false;
  private files = new Array();
  private filesError = false;
  private loading = false;

  mounted() {
    axios.get('/api/me').then((response: AxiosResponse) => {
      if ('professor_id' in response.data.data){
        this.$router.push('/404');
      } else {
        axios.get(`/api/disciplinas/${this.$route.params.disciplina}`)
        .then((response: AxiosResponse) => {
          if (!response.data.data.error) {
            this.disciplina = response.data.data;
          } else {
            this.$router.push('/404');
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

  async onSubmit() {
    if (this.loading) {
      return;
    }

    if (this.files.length === 0) {
      this.filesError = true;
      return;
    } else {
      this.filesError = false;
    }

    this.loading = true;

    await axios.post(`/api/disciplinas/${this.$route.params.disciplina}/duvidas`, {
      descricao: this.descricao
    }).then(async (response: AxiosResponse) => {
      let id = response.data.data.id;

      for (const file of this.files) {
        let fileFormData = new FormData();
        fileFormData.append('nome', file.filename);
        fileFormData.append('descricao', file.fileDescription);
        fileFormData.append('ficheiro', file.file);

        await axios.post(`/api/disciplinas/${this.$route.params.disciplina}/duvidas/${id}/ficheiros`,
          fileFormData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          }
        ).then(async (response) => {
          let id = response.data.data.id;

          for (const comment of file.comments) {
            let commentFormData = new FormData();

            commentFormData.append('comentario', comment.comentario);
            commentFormData.append('linha_inicio', comment.lineStart);
            commentFormData.append('linha_fim', comment.lineEnd);

            if (comment.audio && comment.audio.blob) {
              commentFormData.append('audio', comment.audio.blob);
            }

            await axios.post(`/api/ficheiros/${id}/comentarios`, commentFormData, {
              headers: {
                'Content-Type': 'multipart/form-data'
              }
            });
          }
        });
      }
    });

    this.loading = false;
  }
}
</script>

<style>
  #criarDuvida i.mdi-loading {
    animation: spin-animation 0.5s infinite;
    display: inline-block;
  }

  @keyframes spin-animation {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(359deg);
    }
  }
</style>
