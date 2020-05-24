<template>
    <div>
      <div class="col-md-6 grid-margin stretch-card col-centered">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Disciplina</h4>
            <p class="card-description">Adicionar nova disciplina</p>
            <form @submit.prevent="addDisciplina" class="forms-sample">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nome da Disciplina" v-model="Disciplina.nome">
              </div>
              <div class="form-group">
                <input type="date" class="form-control" placeholder="Semestre Curricular" v-model="Disciplina.semestre_curricular">
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</template>

<script lang="ts">
import axios from "axios";
  export default {
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
