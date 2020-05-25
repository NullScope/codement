<template>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-tittle">{{ nomeAula }}</h3>
        </div>
        <div class="section">
            <p>{{ descricaoAula }}</p>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
   data(){
       return{
           nomeAula: 'Introdução',
           descricaoAula: 'Esta é uma descrição da aula.'
       }
   },
}
</script>