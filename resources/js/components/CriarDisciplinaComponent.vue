
<template>
    <div>

      <form @submit.prevent="addDisciplina" class="mb-3">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Nome da Disciplina" v-model="Disciplina.nome">
        </div>
        <div class="form-group">
          <input type="date" class="form-control" placeholder="Semestre Curricular" v-model="Disciplina.semestre_curricular">
        </div>
      <button type="submit" class="btn btn-light btn-block">Criar Disciplina</button>
      </form>
    </div>
</template>

<script lang="ts">
import axios from "axios";
  export default {

    mounted()
    {
    },
    data()
    {
      return {
        Disciplina: {
          "nome": "",
          "semestre_curricular": ""
        }
      };
    },
    methods: {
      addDisciplina() {
        axios.post('api/disciplinas', {"nome": this.Disciplina.nome,"semestre_curricular": this.Disciplina.semestre_curricular})
        .then((response) => {
            alert("Novo macarrao");
        }, (error) => {
          alert("nao pos novo macarrao");
        });
      },
    }
  }
</script>
