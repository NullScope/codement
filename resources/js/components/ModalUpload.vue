<template>
  <b-modal id="modal-upload" title="Upload de ficheiro" hide-footer @show="onModalShow" @hide="onModalHide">
    <form ref="fileForm" id="file-form" @submit="onSubmit">
        <b-form-group
        label="Nome do ficheiro"
        label-for="filename-input"
        invalid-feedback="Nome do ficheiro é obrigatório">
            <b-form-input
            id="filename-input"
            v-model="filename"
            placeholder="Nome do Ficheiro"
            required>
            </b-form-input>
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
        props: {
            uploadUrl: {type: String},
            afterUpload: {type: Function}
        },
        mounted: async function () {

        },
        methods: {
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;

                this.file = files[0];

                var reader = new FileReader();
                reader.readAsText(this.file, "UTF-8");

                reader.onload = (evt) => {
                    this.filename = this.filename !== '' ? this.filename : this.file.name;
                    this.fileLabel = this.file.name;
                }

                reader.onerror = (evt) => {
                    console.error(evt);
                    this.filename = '';
                    this.fileLabel = '';
                }
            },

            onClickUpload() {
                this.$refs.fileInput.click();
            },

            onSubmit(evt) {
                evt.preventDefault();

                let fileFormData = new FormData();
                fileFormData.append('nome', this.filename);
                fileFormData.append('descricao', this.fileDescription);
                fileFormData.append('ficheiro', this.file);

                axios.post(this.uploadUrl, fileFormData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then( () => {
                    this.afterUpload();
                    this.$bvModal.hide('modal-upload');
                });
            },

            onModalHide(bvModalEvt) {
                if (bvModalEvt.defaultPrevented) {
                    return;
                }

                this.file = null;
                this.filename = '';
                this.fileLabel = '';
                this.fileDescription = '';
                this.isUploadModalOpened = false;
            },

            onModalShow() {
                this.isUploadModalOpened = true;
            },

        },
        computed: {

        },
        watch: {

        },
        data() {
            return {
                isUploadModalOpened: false,
                file: null,
                filename: '',
                fileLabel: '',
                fileDescription: ''
            }
        },
        components: {

        }
    }
</script>

<style>
    
</style>
