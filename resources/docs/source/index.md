---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Aluno management


APIs for managing Alunos
<!-- START_bbb147860a4d517aae7d81c6c82b9e1f -->
## Display all Alunos.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/alunos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/alunos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 7,
            "aluno_id": "a2082214",
            "profile": {
                "id": 5,
                "name": "Bruno Ribeiro",
                "email": "testt@gmail.com",
                "email_verified_at": null,
                "created_at": "2020-05-17T18:20:56.000000Z",
                "updated_at": "2020-05-17T19:08:24.000000Z"
            },
            "disciplinas": [
                {
                    "id": 1,
                    "nome": "Engenharia de Requisitos",
                    "created_at": "2020-05-17T20:26:57.000000Z",
                    "updated_at": "2020-05-17T20:26:57.000000Z"
                }
            ],
            "created_at": "2020-05-17T18:20:56.000000Z",
            "updated_at": "2020-05-17T19:08:23.000000Z"
        }
    ]
}
```

### HTTP Request
`GET api/alunos`


<!-- END_bbb147860a4d517aae7d81c6c82b9e1f -->

<!-- START_058b247e7a6b821628976096d3980e04 -->
## Create a Aluno and the associated user.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/alunos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/alunos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/alunos`


<!-- END_058b247e7a6b821628976096d3980e04 -->

<!-- START_901a7d5db643d0d7653d0ab5c37570b0 -->
## Display a Aluno.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/alunos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/alunos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "error": true,
    "status_code": 404,
    "response": "aluno_id_not_found"
}
```

### HTTP Request
`GET api/alunos/{aluno}`


<!-- END_901a7d5db643d0d7653d0ab5c37570b0 -->

<!-- START_9efd5f2a39737d3885ee72033380d0ab -->
## Update a Aluno.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/alunos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/alunos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/alunos/{aluno}`

`PATCH api/alunos/{aluno}`


<!-- END_9efd5f2a39737d3885ee72033380d0ab -->

<!-- START_cbe0d24458b7c74b38658551e581c9ac -->
## Remove a Aluno.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/alunos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/alunos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/alunos/{aluno}`


<!-- END_cbe0d24458b7c74b38658551e581c9ac -->

<!-- START_5472362baecef700ca5eeb34487fcba4 -->
## Display all Disciplinas of Aluno.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/alunos/1/disciplinas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/alunos/1/disciplinas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "error": true,
    "status_code": 404,
    "response": "aluno_id_not_found"
}
```

### HTTP Request
`GET api/alunos/{aluno}/disciplinas`


<!-- END_5472362baecef700ca5eeb34487fcba4 -->

<!-- START_7918a6bff45b3afac0970c69a375ea19 -->
## Add a Disciplina to Aluno.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/alunos/1/disciplinas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/alunos/1/disciplinas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/alunos/{aluno}/disciplinas`


<!-- END_7918a6bff45b3afac0970c69a375ea19 -->

<!-- START_55e0ba5fb16e543a0db984a32d840728 -->
## Display a Disciplina of Aluno.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/alunos/1/disciplinas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/alunos/1/disciplinas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "error": true,
    "status_code": 404,
    "response": "id_not_found"
}
```

### HTTP Request
`GET api/alunos/{aluno}/disciplinas/{disciplina}`


<!-- END_55e0ba5fb16e543a0db984a32d840728 -->

<!-- START_76c14bf2f6816e114ba19b5f1dd68080 -->
## Update the Disciplina of Aluno (NOT IMPLEMENTED).

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/alunos/1/disciplinas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/alunos/1/disciplinas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/alunos/{aluno}/disciplinas/{disciplina}`

`PATCH api/alunos/{aluno}/disciplinas/{disciplina}`


<!-- END_76c14bf2f6816e114ba19b5f1dd68080 -->

<!-- START_896724ba6fd3f5f94e935bcdbf77900f -->
## Remove a Disciplina from Aluno.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/alunos/1/disciplinas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/alunos/1/disciplinas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/alunos/{aluno}/disciplinas/{disciplina}`


<!-- END_896724ba6fd3f5f94e935bcdbf77900f -->

#Aula management


APIs for managing Aulas
<!-- START_5652a16509c3614d3d81b303ffa3415d -->
## Display all Aulas of Disciplina.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/aulas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/aulas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": []
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/aulas`


<!-- END_5652a16509c3614d3d81b303ffa3415d -->

<!-- START_6528ef4d32874d33281b3edb7ae1950e -->
## Create Aula

> Example request:

```bash
curl -X POST \
    "http://localhost/api/disciplinas/1/aulas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/aulas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/disciplinas/{disciplina}/aulas`


<!-- END_6528ef4d32874d33281b3edb7ae1950e -->

<!-- START_30a55aacfdab246b185e1b77572b63f5 -->
## Display a Aula of Disciplina.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/aulas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/aulas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "error": true,
    "status_code": 404,
    "response": "id_not_found"
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/aulas/{aula}`


<!-- END_30a55aacfdab246b185e1b77572b63f5 -->

<!-- START_e862bf9f1f64fa5a34df24202d9017f4 -->
## Update a Aula of Disciplina

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/disciplinas/1/aulas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/aulas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/disciplinas/{disciplina}/aulas/{aula}`

`PATCH api/disciplinas/{disciplina}/aulas/{aula}`


<!-- END_e862bf9f1f64fa5a34df24202d9017f4 -->

<!-- START_41b70913f4acdf7d7ec2f377ef8e9b2a -->
## Remove a Aula of Disciplina

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/disciplinas/1/aulas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/aulas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/disciplinas/{disciplina}/aulas/{aula}`


<!-- END_41b70913f4acdf7d7ec2f377ef8e9b2a -->

<!-- START_f6c8e734cb4162537925e75f221df301 -->
## Display all Ficheiros of Aula.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/aulas/1/ficheiros" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/aulas/1/ficheiros"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "error": true,
    "status_code": 404,
    "response": "id_not_found"
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/aulas/{aula}/ficheiros`


<!-- END_f6c8e734cb4162537925e75f221df301 -->

<!-- START_d059d3dfbf4b24db6f97a6437a2cc696 -->
## Create Ficheiro.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/disciplinas/1/aulas/1/ficheiros" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/aulas/1/ficheiros"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/disciplinas/{disciplina}/aulas/{aula}/ficheiros`


<!-- END_d059d3dfbf4b24db6f97a6437a2cc696 -->

<!-- START_b9546b4b1a816019f9cf9fd751e969ac -->
## Display a Ficheiro of Aula.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/aulas/1/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/aulas/1/ficheiros/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "error": true,
    "status_code": 404,
    "response": "id_not_found"
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/aulas/{aula}/ficheiros/{ficheiro}`


<!-- END_b9546b4b1a816019f9cf9fd751e969ac -->

<!-- START_46edc8fd1f527fe89a1d1269899317de -->
## Update a Ficheiro of Aula.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/disciplinas/1/aulas/1/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/aulas/1/ficheiros/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/disciplinas/{disciplina}/aulas/{aula}/ficheiros/{ficheiro}`

`PATCH api/disciplinas/{disciplina}/aulas/{aula}/ficheiros/{ficheiro}`


<!-- END_46edc8fd1f527fe89a1d1269899317de -->

<!-- START_206d345b485200b12ff354747a6eb933 -->
## Remove a Ficheiro of Aula.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/disciplinas/1/aulas/1/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/aulas/1/ficheiros/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/disciplinas/{disciplina}/aulas/{aula}/ficheiros/{ficheiro}`


<!-- END_206d345b485200b12ff354747a6eb933 -->

#Disciplina management


APIs for managing Disciplinas
<!-- START_0a97f91361e32cc82ba375335f2e0a82 -->
## Display all Disciplinas.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "nome": "Engenharia de Requisitos",
            "alunos": [
                {
                    "id": 7,
                    "aluno_id": "a2082214",
                    "profile": {
                        "id": 5,
                        "name": "Bruno Ribeiro",
                        "email": "testt@gmail.com",
                        "email_verified_at": null,
                        "created_at": "2020-05-17T18:20:56.000000Z",
                        "updated_at": "2020-05-17T19:08:24.000000Z"
                    },
                    "disciplinas": [
                        {
                            "id": 1,
                            "nome": "Engenharia de Requisitos",
                            "created_at": "2020-05-17T20:26:57.000000Z",
                            "updated_at": "2020-05-17T20:26:57.000000Z"
                        }
                    ],
                    "created_at": "2020-05-17T18:20:56.000000Z",
                    "updated_at": "2020-05-17T19:08:23.000000Z"
                }
            ],
            "professores": [],
            "created_at": "2020-05-17T20:26:57.000000Z",
            "updated_at": "2020-05-17T20:26:57.000000Z"
        },
        {
            "id": 2,
            "nome": "Processos e Métricas de Software",
            "alunos": [
                {
                    "id": 7,
                    "aluno_id": "a2082214",
                    "profile": {
                        "id": 5,
                        "name": "Bruno Ribeiro",
                        "email": "testt@gmail.com",
                        "email_verified_at": null,
                        "created_at": "2020-05-17T18:20:56.000000Z",
                        "updated_at": "2020-05-17T19:08:24.000000Z"
                    },
                    "disciplinas": [
                        {
                            "id": 1,
                            "nome": "Engenharia de Requisitos",
                            "created_at": "2020-05-17T20:26:57.000000Z",
                            "updated_at": "2020-05-17T20:26:57.000000Z"
                        }
                    ],
                    "created_at": "2020-05-17T18:20:56.000000Z",
                    "updated_at": "2020-05-17T19:08:23.000000Z"
                }
            ],
            "professores": [],
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/disciplinas`


<!-- END_0a97f91361e32cc82ba375335f2e0a82 -->

<!-- START_9ce178a21d5ea603d3ef75a78b52b2ff -->
## Create a Disciplina.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/disciplinas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/disciplinas`


<!-- END_9ce178a21d5ea603d3ef75a78b52b2ff -->

<!-- START_183613df4db9e5e68f91e56b7e29be83 -->
## Display a Disciplina.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "nome": "Engenharia de Requisitos",
        "alunos": [
            {
                "id": 7,
                "aluno_id": "a2082214",
                "profile": {
                    "id": 5,
                    "name": "Bruno Ribeiro",
                    "email": "testt@gmail.com",
                    "email_verified_at": null,
                    "created_at": "2020-05-17T18:20:56.000000Z",
                    "updated_at": "2020-05-17T19:08:24.000000Z"
                },
                "disciplinas": [
                    {
                        "id": 1,
                        "nome": "Engenharia de Requisitos",
                        "created_at": "2020-05-17T20:26:57.000000Z",
                        "updated_at": "2020-05-17T20:26:57.000000Z"
                    }
                ],
                "created_at": "2020-05-17T18:20:56.000000Z",
                "updated_at": "2020-05-17T19:08:23.000000Z"
            }
        ],
        "professores": [],
        "created_at": "2020-05-17T20:26:57.000000Z",
        "updated_at": "2020-05-17T20:26:57.000000Z"
    }
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}`


<!-- END_183613df4db9e5e68f91e56b7e29be83 -->

<!-- START_81bcfcb72133956becdf4432594372b4 -->
## Update a Disciplina.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/disciplinas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/disciplinas/{disciplina}`

`PATCH api/disciplinas/{disciplina}`


<!-- END_81bcfcb72133956becdf4432594372b4 -->

<!-- START_08d0dbe102eb5fb5efa7c9df4cd35265 -->
## Remove a Disciplina.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/disciplinas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/disciplinas/{disciplina}`


<!-- END_08d0dbe102eb5fb5efa7c9df4cd35265 -->

#Professor management


APIs for managing Professores
<!-- START_60b0e474b83d46a32bfa64054bf9950f -->
## Display all Professores.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/professores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/professores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": []
}
```

### HTTP Request
`GET api/professores`


<!-- END_60b0e474b83d46a32bfa64054bf9950f -->

<!-- START_c6d20fd6b325da656eb4908e11265a66 -->
## Create a Professor and the associated user.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/professores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/professores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/professores`


<!-- END_c6d20fd6b325da656eb4908e11265a66 -->

<!-- START_3895aee112e10c7602d8bfa75d5ec986 -->
## Display a Professor.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/professores/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/professores/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "error": true,
    "status_code": 404,
    "response": "professor_id_not_found"
}
```

### HTTP Request
`GET api/professores/{professore}`


<!-- END_3895aee112e10c7602d8bfa75d5ec986 -->

<!-- START_f7d61f70828a7a0a2dbf675840df372a -->
## Update a Professor.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/professores/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/professores/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/professores/{professore}`

`PATCH api/professores/{professore}`


<!-- END_f7d61f70828a7a0a2dbf675840df372a -->

<!-- START_70a4d4d101d30e501870eb05b5913874 -->
## Remove a Professor.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/professores/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/professores/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/professores/{professore}`


<!-- END_70a4d4d101d30e501870eb05b5913874 -->

<!-- START_7f40b02597f164cacec59295ce193e4b -->
## Display all Disciplinas of Professor.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/professores/1/disciplinas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/professores/1/disciplinas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "error": true,
    "status_code": 404,
    "response": "professor_id_not_found"
}
```

### HTTP Request
`GET api/professores/{professore}/disciplinas`


<!-- END_7f40b02597f164cacec59295ce193e4b -->

<!-- START_8baeae1532cd4733936243b4150d7330 -->
## Add a Disciplina to Professor

> Example request:

```bash
curl -X POST \
    "http://localhost/api/professores/1/disciplinas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/professores/1/disciplinas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/professores/{professore}/disciplinas`


<!-- END_8baeae1532cd4733936243b4150d7330 -->

<!-- START_4c516fde04d4eb478959b722510d2f72 -->
## Display a Disciplina of Professor.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/professores/1/disciplinas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/professores/1/disciplinas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "error": true,
    "status_code": 404,
    "response": "id_not_found"
}
```

### HTTP Request
`GET api/professores/{professore}/disciplinas/{disciplina}`


<!-- END_4c516fde04d4eb478959b722510d2f72 -->

<!-- START_096e93771c844815bb6047c857ab5d18 -->
## Update the Disciplina of Professor (NOT IMPLEMENTED).

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/professores/1/disciplinas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/professores/1/disciplinas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/professores/{professore}/disciplinas/{disciplina}`

`PATCH api/professores/{professore}/disciplinas/{disciplina}`


<!-- END_096e93771c844815bb6047c857ab5d18 -->

<!-- START_64209165961a34416881ce3e46732927 -->
## Remove a Disciplina from Professor.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/professores/1/disciplinas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/professores/1/disciplinas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/professores/{professore}/disciplinas/{disciplina}`


<!-- END_64209165961a34416881ce3e46732927 -->

#general


<!-- START_4dfafe7f87ec132be3c8990dd1fa9078 -->
## Return an empty response simply to trigger the storage of the CSRF cookie in the browser.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/sanctum/csrf-cookie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/sanctum/csrf-cookie"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET sanctum/csrf-cookie`


<!-- END_4dfafe7f87ec132be3c8990dd1fa9078 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_b77aedc454e9471a35dcb175278ec997 -->
## Display the password confirmation view.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/confirm`


<!-- END_b77aedc454e9471a35dcb175278ec997 -->

<!-- START_54462d3613f2262e741142161c0e6fea -->
## Confirm the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/confirm`


<!-- END_54462d3613f2262e741142161c0e6fea -->


