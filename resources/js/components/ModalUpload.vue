<template>
  <b-modal id="modal-upload" title="Upload de ficheiro" hide-footer>
    <form ref="fileForm" id="file-form" @submit="onSubmit">
        <b-form-group
        label="Nome do ficheiro"
        label-for="filename-input"
        invalid-feedback="Nome do ficheiro é obrigatório"
        >
        <b-form-input
            id="filename-input"
            v-model="filename"
            placeholder="Nome do Ficheiro"
            required
        ></b-form-input>
        </b-form-group>

        <b-form-group
        label="Descrição do ficheiro"
        label-for="file-description-input"
        invalid-feedback="Descrição do ficheiro é obrigatório"
        >
        <b-form-textarea
            id="file-description-input"
            v-model="fileDescription"
            placeholder="Descrição do Ficheiro"
            rows="3"
            max-rows="3"
            required
        ></b-form-textarea>
        </b-form-group>

        <b-form-group>
        <div class="input-group col-xs-12">
            <input type="file" ref="fileInput" v-on:change="onFileChange" name="file" required class="file-upload-default">
            <label class="form-control" placeholder="" v-on:click="onClickUpload">{{fileLabel ? fileLabel : "Upload Ficheiro"}}</label>
            <span class="input-group-append">
            <button class="file-upload-browse btn btn-gradient-primary" v-on:click="onClickUpload" type="button" >Upload</button>
            </span>
        </div>
        </b-form-group>
        <b-button type="submit" class="mx-auto btn btn-gradient-primary mr-2" id="file-submit-button">Guardar ficheiro</b-button>
    </form>
  </b-modal>
</template>

<script>
    import axios from "axios";

    export default {
        mounted: async function () {

        },
        methods: {

        },
        computed: {

        },
        watch: {

        },
        data() {
            return {

            }
        },
        components: {

        }
    }
</script>

<style>
    
</style>
