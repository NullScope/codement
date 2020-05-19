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
    "data": []
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
    "data": [
        {
            "id": 2,
            "descricao": "blabla",
            "disciplina": {
                "id": 1,
                "nome": "Processos e Métricas de Software",
                "created_at": "2020-05-18T22:57:25.000000Z",
                "updated_at": "2020-05-18T22:57:25.000000Z",
                "semestre_curricular": "2020-05-18 00:00:00",
                "professor_id": 1
            },
            "created_at": "2020-05-19T00:13:18.000000Z",
            "updated_at": "2020-05-19T00:13:18.000000Z"
        }
    ]
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/aulas`


<!-- END_5652a16509c3614d3d81b303ffa3415d -->

<!-- START_6528ef4d32874d33281b3edb7ae1950e -->
## Create a Aula of Disciplina.

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
## Create a Ficheiro of Aula.

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

#Comentario management


APIs for managing Comentarios
<!-- START_a3b990496821f1a00f2fd46d4aaad11e -->
## Display all Comentarios of Ficheiro.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/ficheiros/1/comentarios" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/ficheiros/1/comentarios"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Ficheiro] 1"
}
```

### HTTP Request
`GET api/ficheiros/{ficheiro}/comentarios`


<!-- END_a3b990496821f1a00f2fd46d4aaad11e -->

<!-- START_cce995b33c3c7af1a6bbc8e691637358 -->
## Create Comentario.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/ficheiros/1/comentarios" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/ficheiros/1/comentarios"
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
`POST api/ficheiros/{ficheiro}/comentarios`


<!-- END_cce995b33c3c7af1a6bbc8e691637358 -->

<!-- START_02ff6f0482d8470700657bc85fe2bafe -->
## Display a Comentario of Ficheiro.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/ficheiros/1/comentarios/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/ficheiros/1/comentarios/1"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Ficheiro] 1"
}
```

### HTTP Request
`GET api/ficheiros/{ficheiro}/comentarios/{comentario}`


<!-- END_02ff6f0482d8470700657bc85fe2bafe -->

<!-- START_7e4c93eba63a4fe58d4e3e3fa4e84a0a -->
## Update a Comentario of Ficheiro.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/ficheiros/1/comentarios/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/ficheiros/1/comentarios/1"
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
`PUT api/ficheiros/{ficheiro}/comentarios/{comentario}`

`PATCH api/ficheiros/{ficheiro}/comentarios/{comentario}`


<!-- END_7e4c93eba63a4fe58d4e3e3fa4e84a0a -->

<!-- START_2b3111d9fcedf033808e719e9d4c9063 -->
## Remove a Comentario of Ficheiro.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/ficheiros/1/comentarios/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/ficheiros/1/comentarios/1"
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
`DELETE api/ficheiros/{ficheiro}/comentarios/{comentario}`


<!-- END_2b3111d9fcedf033808e719e9d4c9063 -->

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
            "nome": "Processos e Métricas de Software",
            "alunos": [],
            "regente": {
                "id": 1,
                "professor_id": "a2082214",
                "created_at": "2020-05-18T22:53:16.000000Z",
                "updated_at": "2020-05-18T22:53:16.000000Z"
            },
            "assistentes": [
                {
                    "id": 1,
                    "professor_id": null,
                    "user": {
                        "id": 1,
                        "name": "Bruno Ribeiro",
                        "email": "brunoribeiro095@gmail.com",
                        "email_verified_at": null,
                        "created_at": "2020-05-18T22:53:16.000000Z",
                        "updated_at": "2020-05-18T22:53:16.000000Z"
                    },
                    "disciplinas": [
                        {
                            "id": 1,
                            "nome": "Processos e Métricas de Software",
                            "created_at": "2020-05-18T22:57:25.000000Z",
                            "updated_at": "2020-05-18T22:57:25.000000Z",
                            "semestre_curricular": "2020-05-18 00:00:00",
                            "professor_id": 1
                        }
                    ],
                    "created_at": "2020-05-18T22:53:16.000000Z",
                    "updated_at": "2020-05-18T22:53:16.000000Z"
                }
            ],
            "created_at": "2020-05-18T22:57:25.000000Z",
            "updated_at": "2020-05-18T22:57:25.000000Z"
        },
        {
            "id": 2,
            "nome": "Processos e Métricas de Software",
            "alunos": [],
            "regente": {
                "id": 1,
                "professor_id": "a2082214",
                "created_at": "2020-05-18T22:53:16.000000Z",
                "updated_at": "2020-05-18T22:53:16.000000Z"
            },
            "assistentes": [],
            "created_at": "2020-05-18T23:02:59.000000Z",
            "updated_at": "2020-05-18T23:02:59.000000Z"
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
        "nome": "Processos e Métricas de Software",
        "alunos": [],
        "regente": {
            "id": 1,
            "professor_id": "a2082214",
            "created_at": "2020-05-18T22:53:16.000000Z",
            "updated_at": "2020-05-18T22:53:16.000000Z"
        },
        "assistentes": [
            {
                "id": 1,
                "professor_id": null,
                "user": {
                    "id": 1,
                    "name": "Bruno Ribeiro",
                    "email": "brunoribeiro095@gmail.com",
                    "email_verified_at": null,
                    "created_at": "2020-05-18T22:53:16.000000Z",
                    "updated_at": "2020-05-18T22:53:16.000000Z"
                },
                "disciplinas": [
                    {
                        "id": 1,
                        "nome": "Processos e Métricas de Software",
                        "created_at": "2020-05-18T22:57:25.000000Z",
                        "updated_at": "2020-05-18T22:57:25.000000Z",
                        "semestre_curricular": "2020-05-18 00:00:00",
                        "professor_id": 1
                    }
                ],
                "created_at": "2020-05-18T22:53:16.000000Z",
                "updated_at": "2020-05-18T22:53:16.000000Z"
            }
        ],
        "created_at": "2020-05-18T22:57:25.000000Z",
        "updated_at": "2020-05-18T22:57:25.000000Z"
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

#Duvida management


APIs for managing Disciplinas
<!-- START_41e6c67bacd5993b456c7f3382dfef84 -->
## Display all Duvidas of Disciplina.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/duvidas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/duvidas"
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
`GET api/disciplinas/{disciplina}/duvidas`


<!-- END_41e6c67bacd5993b456c7f3382dfef84 -->

<!-- START_f06a7b83c84cc379f18b41553d79bcf9 -->
## Create a Duvida of Disciplina.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/disciplinas/1/duvidas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/duvidas"
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
`POST api/disciplinas/{disciplina}/duvidas`


<!-- END_f06a7b83c84cc379f18b41553d79bcf9 -->

<!-- START_33d46b7d7dce0758edd9e60b96fb06fe -->
## Display a Duvida of Disciplina.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/duvidas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/duvidas/1"
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
`GET api/disciplinas/{disciplina}/duvidas/{duvida}`


<!-- END_33d46b7d7dce0758edd9e60b96fb06fe -->

<!-- START_cb8bee5e9c88b11f6daf015221c9925e -->
## Update a Duvida of Disciplina.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/disciplinas/1/duvidas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/duvidas/1"
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
`PUT api/disciplinas/{disciplina}/duvidas/{duvida}`

`PATCH api/disciplinas/{disciplina}/duvidas/{duvida}`


<!-- END_cb8bee5e9c88b11f6daf015221c9925e -->

<!-- START_c64229b342a652bcdd36792860c7b612 -->
## Remove a Duvida of Disciplina.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/disciplinas/1/duvidas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/duvidas/1"
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
`DELETE api/disciplinas/{disciplina}/duvidas/{duvida}`


<!-- END_c64229b342a652bcdd36792860c7b612 -->

<!-- START_35f3e4adb4dbb90604df550c19f0b110 -->
## Display all Ficheiros of Duvida.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/duvidas/1/ficheiros" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/duvidas/1/ficheiros"
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
`GET api/disciplinas/{disciplina}/duvidas/{duvida}/ficheiros`


<!-- END_35f3e4adb4dbb90604df550c19f0b110 -->

<!-- START_34f811b383b2b4d00f63a7451871d8a6 -->
## Create a Ficheiro of Duvida.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/disciplinas/1/duvidas/1/ficheiros" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/duvidas/1/ficheiros"
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
`POST api/disciplinas/{disciplina}/duvidas/{duvida}/ficheiros`


<!-- END_34f811b383b2b4d00f63a7451871d8a6 -->

<!-- START_554660e48859582da781e177d745995f -->
## Display a Ficheiro of Duvida.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/duvidas/1/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/duvidas/1/ficheiros/1"
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
`GET api/disciplinas/{disciplina}/duvidas/{duvida}/ficheiros/{ficheiro}`


<!-- END_554660e48859582da781e177d745995f -->

<!-- START_a30cfc9029ac3e861ee5c1cc0c351b7f -->
## Update a Ficheiro of Duvida.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/disciplinas/1/duvidas/1/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/duvidas/1/ficheiros/1"
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
`PUT api/disciplinas/{disciplina}/duvidas/{duvida}/ficheiros/{ficheiro}`

`PATCH api/disciplinas/{disciplina}/duvidas/{duvida}/ficheiros/{ficheiro}`


<!-- END_a30cfc9029ac3e861ee5c1cc0c351b7f -->

<!-- START_076d84034dbb7ea4588d425c74fe5736 -->
## Remove a Ficheiro of Duvida.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/disciplinas/1/duvidas/1/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/duvidas/1/ficheiros/1"
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
`DELETE api/disciplinas/{disciplina}/duvidas/{duvida}/ficheiros/{ficheiro}`


<!-- END_076d84034dbb7ea4588d425c74fe5736 -->

#Eventos de Avaliação management


APIs for managing Eventos de Avaliação
<!-- START_a5a71ee70e07ad727284087575070965 -->
## Display all Eventos de Avaliação.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/eventos-de-avaliacao" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao"
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
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao`


<!-- END_a5a71ee70e07ad727284087575070965 -->

<!-- START_aead4d5c94d433772349744d92c21de3 -->
## Create an Evento de Avaliação.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao"
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
`POST api/disciplinas/{disciplina}/eventos-de-avaliacao`


<!-- END_aead4d5c94d433772349744d92c21de3 -->

<!-- START_5aa7187dc5109f7986c18139243afd07 -->
## Display an Evento de Avaliação.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1"
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
    "response": "evento_de_avaliacao_id_not_found"
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}`


<!-- END_5aa7187dc5109f7986c18139243afd07 -->

<!-- START_1c16eb10634a2778ff6ac112fc0dab53 -->
## Update an Evento de Avaliação.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1"
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
`PUT api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}`

`PATCH api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}`


<!-- END_1c16eb10634a2778ff6ac112fc0dab53 -->

<!-- START_aa75a90513f73061fb246d9c34328878 -->
## Remove an Evento de Avaliação.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1"
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
`DELETE api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}`


<!-- END_aa75a90513f73061fb246d9c34328878 -->

<!-- START_aa9ef7109c36accfac70987604bb7e04 -->
## Display all Ficheiros of Evento de Avaliação.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\EventoDeAvaliacao] 1"
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/ficheiros`


<!-- END_aa9ef7109c36accfac70987604bb7e04 -->

<!-- START_e6a918cd136f194f4b6f0a9a3d34e9da -->
## Create a Ficheiro of Evento de Avaliação.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros"
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
`POST api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/ficheiros`


<!-- END_e6a918cd136f194f4b6f0a9a3d34e9da -->

<!-- START_8aeb7203d4e31933ba7e81763ab0e870 -->
## Display a Ficheiro of Evento de Avaliação.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros/1"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\EventoDeAvaliacao] 1"
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/ficheiros/{ficheiro}`


<!-- END_8aeb7203d4e31933ba7e81763ab0e870 -->

<!-- START_fa7b3546b3e409a7c9b66977d3d6eb50 -->
## Update a Ficheiro of Evento de Avaliação.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros/1"
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
`PUT api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/ficheiros/{ficheiro}`

`PATCH api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/ficheiros/{ficheiro}`


<!-- END_fa7b3546b3e409a7c9b66977d3d6eb50 -->

<!-- START_5610f50214fb70f6292932c26271c442 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros/1"
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
`DELETE api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/ficheiros/{ficheiro}`


<!-- END_5610f50214fb70f6292932c26271c442 -->

#Ficheiro management


APIs for managing Ficheiros
<!-- START_0492f500ad6414d89ce86b6f3fb41c81 -->
## Display all Ficheiros.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/ficheiros" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/ficheiros"
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
`GET api/ficheiros`


<!-- END_0492f500ad6414d89ce86b6f3fb41c81 -->

<!-- START_30f6a70f1a3e30e5cb0306a07a885458 -->
## Display a Ficheiro.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/ficheiros/1"
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
    "response": "ficheiro_id_not_found"
}
```

### HTTP Request
`GET api/ficheiros/{ficheiro}`


<!-- END_30f6a70f1a3e30e5cb0306a07a885458 -->

<!-- START_038fc5a7cfef9b868d006758d386b4e0 -->
## Update a Ficheiro.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/ficheiros/1"
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
`PUT api/ficheiros/{ficheiro}`

`PATCH api/ficheiros/{ficheiro}`


<!-- END_038fc5a7cfef9b868d006758d386b4e0 -->

<!-- START_53683cfe4f7d0076ddb112e734d5c33b -->
## Remove a Ficheiro.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/ficheiros/1"
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
`DELETE api/ficheiros/{ficheiro}`


<!-- END_53683cfe4f7d0076ddb112e734d5c33b -->

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
    "data": [
        {
            "id": 1,
            "professor_id": null,
            "user": {
                "id": 1,
                "name": "Bruno Ribeiro",
                "email": "brunoribeiro095@gmail.com",
                "email_verified_at": null,
                "created_at": "2020-05-18T22:53:16.000000Z",
                "updated_at": "2020-05-18T22:53:16.000000Z"
            },
            "disciplinas": [
                {
                    "id": 1,
                    "nome": "Processos e Métricas de Software",
                    "created_at": "2020-05-18T22:57:25.000000Z",
                    "updated_at": "2020-05-18T22:57:25.000000Z",
                    "semestre_curricular": "2020-05-18 00:00:00",
                    "professor_id": 1
                }
            ],
            "created_at": "2020-05-18T22:53:16.000000Z",
            "updated_at": "2020-05-18T22:53:16.000000Z"
        }
    ]
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
    "data": {
        "id": 1,
        "professor_id": null,
        "user": {
            "id": 1,
            "name": "Bruno Ribeiro",
            "email": "brunoribeiro095@gmail.com",
            "email_verified_at": null,
            "created_at": "2020-05-18T22:53:16.000000Z",
            "updated_at": "2020-05-18T22:53:16.000000Z"
        },
        "disciplinas": [
            {
                "id": 1,
                "nome": "Processos e Métricas de Software",
                "created_at": "2020-05-18T22:57:25.000000Z",
                "updated_at": "2020-05-18T22:57:25.000000Z",
                "semestre_curricular": "2020-05-18 00:00:00",
                "professor_id": 1
            }
        ],
        "created_at": "2020-05-18T22:53:16.000000Z",
        "updated_at": "2020-05-18T22:53:16.000000Z"
    }
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
    "data": [
        {
            "id": 1,
            "nome": "Processos e Métricas de Software",
            "alunos": [],
            "regente": {
                "id": 1,
                "professor_id": "a2082214",
                "created_at": "2020-05-18T22:53:16.000000Z",
                "updated_at": "2020-05-18T22:53:16.000000Z"
            },
            "assistentes": [
                {
                    "id": 1,
                    "professor_id": null,
                    "user": {
                        "id": 1,
                        "name": "Bruno Ribeiro",
                        "email": "brunoribeiro095@gmail.com",
                        "email_verified_at": null,
                        "created_at": "2020-05-18T22:53:16.000000Z",
                        "updated_at": "2020-05-18T22:53:16.000000Z"
                    },
                    "disciplinas": [
                        {
                            "id": 1,
                            "nome": "Processos e Métricas de Software",
                            "created_at": "2020-05-18T22:57:25.000000Z",
                            "updated_at": "2020-05-18T22:57:25.000000Z",
                            "semestre_curricular": "2020-05-18 00:00:00",
                            "professor_id": 1
                        }
                    ],
                    "created_at": "2020-05-18T22:53:16.000000Z",
                    "updated_at": "2020-05-18T22:53:16.000000Z"
                }
            ],
            "created_at": "2020-05-18T22:57:25.000000Z",
            "updated_at": "2020-05-18T22:57:25.000000Z"
        }
    ]
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
    "data": {
        "id": 1,
        "nome": "Processos e Métricas de Software",
        "alunos": [],
        "regente": {
            "id": 1,
            "professor_id": "a2082214",
            "created_at": "2020-05-18T22:53:16.000000Z",
            "updated_at": "2020-05-18T22:53:16.000000Z"
        },
        "assistentes": [
            {
                "id": 1,
                "professor_id": null,
                "user": {
                    "id": 1,
                    "name": "Bruno Ribeiro",
                    "email": "brunoribeiro095@gmail.com",
                    "email_verified_at": null,
                    "created_at": "2020-05-18T22:53:16.000000Z",
                    "updated_at": "2020-05-18T22:53:16.000000Z"
                },
                "disciplinas": [
                    {
                        "id": 1,
                        "nome": "Processos e Métricas de Software",
                        "created_at": "2020-05-18T22:57:25.000000Z",
                        "updated_at": "2020-05-18T22:57:25.000000Z",
                        "semestre_curricular": "2020-05-18 00:00:00",
                        "professor_id": 1
                    }
                ],
                "created_at": "2020-05-18T22:53:16.000000Z",
                "updated_at": "2020-05-18T22:53:16.000000Z"
            }
        ],
        "created_at": "2020-05-18T22:57:25.000000Z",
        "updated_at": "2020-05-18T22:57:25.000000Z"
    }
}
```

### HTTP Request
`GET api/professores/{professore}/disciplinas/{disciplina}`


<!-- END_4c516fde04d4eb478959b722510d2f72 -->

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

#Resolução management


APIs for managing Resolucões
<!-- START_8f273ed5d18bdcb66b2e2b3126b41c57 -->
## Display all Resolucões of Evento de Resolução.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes"
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
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes`


<!-- END_8f273ed5d18bdcb66b2e2b3126b41c57 -->

<!-- START_70b2e0befeb60703c6bf8a2d91b73797 -->
## Create a Resolução of Evento de Resolução.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes"
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
`POST api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes`


<!-- END_70b2e0befeb60703c6bf8a2d91b73797 -->

<!-- START_5db1893e5b1afcf9687b2259f206098a -->
## Display a Resolução of Evento de Resolução.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1"
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
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}`


<!-- END_5db1893e5b1afcf9687b2259f206098a -->

<!-- START_8fb87ec0d67758056cab91acc218cdd1 -->
## Update a Resolução of Evento de Resolução.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1"
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
`PUT api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}`

`PATCH api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}`


<!-- END_8fb87ec0d67758056cab91acc218cdd1 -->

<!-- START_1a6640681a9d5bb23a630d9223d0ea8d -->
## Remove a Resolução of Evento de Resolução.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1"
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
`DELETE api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}`


<!-- END_1a6640681a9d5bb23a630d9223d0ea8d -->

<!-- START_d459258e6b894bf811f195aadcb2a060 -->
## Display all Ficheiros of Resolucões.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros"
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
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}/ficheiros`


<!-- END_d459258e6b894bf811f195aadcb2a060 -->

<!-- START_60598f759432cf3f03c396dde7f91165 -->
## Create a Ficheiro of Resolução.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros"
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
`POST api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}/ficheiros`


<!-- END_60598f759432cf3f03c396dde7f91165 -->

<!-- START_e4606509f15659a252a43c7c78118618 -->
## Display a Ficheiro of Resolução.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros/1"
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
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}/ficheiros/{ficheiro}`


<!-- END_e4606509f15659a252a43c7c78118618 -->

<!-- START_f3afba28d20c0eb0ed4b39e7f3e4993d -->
## Update a Ficheiro of Resolução.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros/1"
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
`PUT api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}/ficheiros/{ficheiro}`

`PATCH api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}/ficheiros/{ficheiro}`


<!-- END_f3afba28d20c0eb0ed4b39e7f3e4993d -->

<!-- START_8399ae8a5231808ce35cda8acfc825fe -->
## Remove a Ficheiro of Resolução.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros/1"
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
`DELETE api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}/ficheiros/{ficheiro}`


<!-- END_8399ae8a5231808ce35cda8acfc825fe -->

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

<!-- START_b19e2ecbb41b5fa6802edaf581aab5f6 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me"
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
    "status_code": 401,
    "response": "not_authorized"
}
```

### HTTP Request
`GET api/me`


<!-- END_b19e2ecbb41b5fa6802edaf581aab5f6 -->

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


