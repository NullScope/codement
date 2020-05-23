<template>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Dúvidas </h3>
            <nav aria-label="breadcrumb">
            </nav>
        </div>

        <!-- VERIFICAR SE É ALUNO OU PROFESSOR  -->

        <!-- ALUNO -->
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample">
                            <div class="form-group">
                            <label for="exampleInputName1">Assunto</label>
                            <input type="text" class="form-control" id="assunto" placeholder="Assunto">
                            </div>
                            <div class="form-group">
                            <label>Código</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                </span>
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="exampleTextarea1">Informação adicional</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        <!-- PROFESSOR -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th> Nº Aluno </th>
                            <th> Nome </th>
                            <th> Assunto </th>
                            <th> Dúvida </th>
                            <th> Estado </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 2087317 </td>
                                <td> Diogo Gaspar </td>
                                <td>Dúvida na aula prática 3</td>
                                <td> >ficheiro> </td>
                                <td> Ativo </td>
                            </tr>
                            <tr>
                                <td> 2011312 </td>
                                <td> Joãozinho Carlinhos </td>
                                <td>Questão na parte b do código da aula 7</td>
                                <td> >ficheiro> </td>
                                <td> Ativo </td>
                            </tr>
                            <tr>
                                <td> 2087417 </td>
                                <td> José Agrela </td>
                                <td>Dúvida na aula prática 8 exercício 3</td>
                                <td> >ficheiro> </td>
                                <td> Respondido </td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import axios from "axios";

    export default {
        
    }


</script>