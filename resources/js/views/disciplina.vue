<template>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-tittle">Disciplina</h3>
            <nav aria-label="breadcrumb">
            </nav>
        </div>
    <!-- Área das matérias e aulas da disciplina -->
        <div class="col-lg-12-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Aula</th>
                                <th>Nº de Ficheiros</th>
                                <th>Link</th>
                                <th>Data de criação</th>
                                <th>Última atualização</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Introdução</td>
                                <td>2</td>
                                <td>«Link à aula»</td>
                                <td>2020-04-13</td>
                                <td>2020-05-02</td>
                            </tr>
                            <tr>
                                <td>Use Cases</td>
                                <td>3</td>
                                <td>«Link à aula»</td>
                                <td>2020-05-05</td>
                                <td>2020-05-05</td>
                            </tr>
                        </tbody>
                    </table>
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