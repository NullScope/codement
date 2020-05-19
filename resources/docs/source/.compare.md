---
title: API Reference

language_tabs:
- javascript
- php

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost:8000/docs/collection.json)

<!-- END_INFO -->

#Aluno management


APIs for managing Alunos
<!-- START_bbb147860a4d517aae7d81c6c82b9e1f -->
## Display all Alunos.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/alunos"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/alunos',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "aluno_id": "a2082214",
            "profile": {
                "id": 1,
                "name": "Bruno Ribeiro",
                "email": "2082214@student.uma.pt",
                "email_verified_at": null,
                "created_at": "2020-05-19T12:26:23.000000Z",
                "updated_at": "2020-05-19T12:26:23.000000Z"
            },
            "curso": "Engenharia Informática",
            "data_de_matricula_inicial": "2020-05-18 00:00:00",
            "ano_curricular": 3,
            "disciplinas": [
                {
                    "id": 1,
                    "nome": "Engenharia de Requisitos",
                    "created_at": "2020-05-18T22:57:25.000000Z",
                    "updated_at": "2020-05-18T22:57:25.000000Z",
                    "semestre_curricular": "2020-05-18 00:00:00",
                    "professor_id": 1
                }
            ],
            "comentarios": [],
            "ficheiros": [],
            "duvidas": [
                {
                    "id": 1,
                    "aluno_id": 1,
                    "disciplina_id": 1,
                    "created_at": "2020-05-19T13:46:02.000000Z",
                    "updated_at": "2020-05-19T13:46:02.000000Z"
                }
            ],
            "created_at": "2020-05-19T12:26:22.000000Z",
            "updated_at": "2020-05-19T12:26:22.000000Z"
        },
        {
            "id": 2,
            "aluno_id": "a235567",
            "profile": {
                "id": 1,
                "name": "John Doe",
                "email": "235567@student.uma.pt",
                "email_verified_at": null,
                "created_at": "2020-05-19T12:26:23.000000Z",
                "updated_at": "2020-05-19T12:26:23.000000Z"
            },
            "curso": "Engenharia Informática",
            "data_de_matricula_inicial": "2020-05-18 00:00:00",
            "ano_curricular": 3,
            "disciplinas": [
                {
                    "id": 1,
                    "nome": "Engenharia de Requisitos",
                    "created_at": "2020-05-18T22:57:25.000000Z",
                    "updated_at": "2020-05-18T22:57:25.000000Z",
                    "semestre_curricular": "2020-05-18 00:00:00",
                    "professor_id": 1
                }
            ],
            "comentarios": [],
            "ficheiros": [],
            "duvidas": [
                {
                    "id": 1,
                    "aluno_id": 1,
                    "disciplina_id": 1,
                    "created_at": "2020-05-19T13:46:02.000000Z",
                    "updated_at": "2020-05-19T13:46:02.000000Z"
                }
            ],
            "created_at": "2020-05-19T12:26:22.000000Z",
            "updated_at": "2020-05-19T12:26:22.000000Z"
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

```javascript
const url = new URL(
    "http://localhost:8000/api/alunos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "aluno_id": "et",
    "curso": "excepturi",
    "data_de_matricula_inicial": "quo",
    "name": "commodi",
    "email": "voluptate",
    "password": "fuga",
    "password_confirmation": "dolor"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/alunos',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'aluno_id' => 'et',
            'curso' => 'excepturi',
            'data_de_matricula_inicial' => 'quo',
            'name' => 'commodi',
            'email' => 'voluptate',
            'password' => 'fuga',
            'password_confirmation' => 'dolor',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "aluno_id": "a2082214",
        "profile": {
            "id": 2,
            "name": "Bruno Ribeiro",
            "email": "2082214@student.uma.pt",
            "email_verified_at": null,
            "created_at": "2020-05-19T12:26:23.000000Z",
            "updated_at": "2020-05-19T12:26:23.000000Z"
        },
        "curso": "Engenharia Informática",
        "data_de_matricula_inicial": "2020-05-18 00:00:00",
        "ano_curricular": 3,
        "disciplinas": [
            {
                "id": 1,
                "nome": "Engenharia de Requisitos",
                "created_at": "2020-05-18T22:57:25.000000Z",
                "updated_at": "2020-05-18T22:57:25.000000Z",
                "semestre_curricular": "2020-05-18 00:00:00",
                "professor_id": 1
            }
        ],
        "comentarios": [],
        "ficheiros": [],
        "duvidas": [
            {
                "id": 1,
                "aluno_id": 1,
                "disciplina_id": 1,
                "created_at": "2020-05-19T13:46:02.000000Z",
                "updated_at": "2020-05-19T13:46:02.000000Z"
            }
        ],
        "created_at": "2020-05-19T12:26:22.000000Z",
        "updated_at": "2020-05-19T12:26:22.000000Z"
    }
}
```

### HTTP Request
`POST api/alunos`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `aluno_id` | string |  required  | 
        `curso` | string |  required  | 
        `data_de_matricula_inicial` | date |  required  | 
        `name` | string |  required  | 
        `email` | string |  required  | 
        `password` | string |  required  | 
        `password_confirmation` | string |  required  | 
    
<!-- END_058b247e7a6b821628976096d3980e04 -->

<!-- START_901a7d5db643d0d7653d0ab5c37570b0 -->
## Display a Aluno.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/alunos/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/alunos/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "aluno_id": "a2082214",
        "profile": {
            "id": 2,
            "name": "Bruno Ribeiro",
            "email": "2082214@student.uma.pt",
            "email_verified_at": null,
            "created_at": "2020-05-19T12:26:23.000000Z",
            "updated_at": "2020-05-19T12:26:23.000000Z"
        },
        "curso": "Engenharia Informática",
        "data_de_matricula_inicial": "2020-05-18 00:00:00",
        "ano_curricular": 3,
        "disciplinas": [
            {
                "id": 1,
                "nome": "Engenharia de Requisitos",
                "created_at": "2020-05-18T22:57:25.000000Z",
                "updated_at": "2020-05-18T22:57:25.000000Z",
                "semestre_curricular": "2020-05-18 00:00:00",
                "professor_id": 1
            }
        ],
        "comentarios": [],
        "ficheiros": [],
        "duvidas": [
            {
                "id": 1,
                "aluno_id": 1,
                "disciplina_id": 1,
                "created_at": "2020-05-19T13:46:02.000000Z",
                "updated_at": "2020-05-19T13:46:02.000000Z"
            }
        ],
        "created_at": "2020-05-19T12:26:22.000000Z",
        "updated_at": "2020-05-19T12:26:22.000000Z"
    }
}
```

### HTTP Request
`GET api/alunos/{aluno}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `aluno` |  required  | 

<!-- END_901a7d5db643d0d7653d0ab5c37570b0 -->

<!-- START_9efd5f2a39737d3885ee72033380d0ab -->
## Update a Aluno.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/alunos/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/alunos/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "aluno_id": "a2082214",
        "profile": {
            "id": 2,
            "name": "Bruno Ribeiro",
            "email": "2082214@student.uma.pt",
            "email_verified_at": null,
            "created_at": "2020-05-19T12:26:23.000000Z",
            "updated_at": "2020-05-19T12:26:23.000000Z"
        },
        "curso": "Engenharia Informática",
        "data_de_matricula_inicial": "2020-05-18 00:00:00",
        "ano_curricular": 3,
        "disciplinas": [
            {
                "id": 1,
                "nome": "Engenharia de Requisitos",
                "created_at": "2020-05-18T22:57:25.000000Z",
                "updated_at": "2020-05-18T22:57:25.000000Z",
                "semestre_curricular": "2020-05-18 00:00:00",
                "professor_id": 1
            }
        ],
        "comentarios": [],
        "ficheiros": [],
        "duvidas": [
            {
                "id": 1,
                "aluno_id": 1,
                "disciplina_id": 1,
                "created_at": "2020-05-19T13:46:02.000000Z",
                "updated_at": "2020-05-19T13:46:02.000000Z"
            }
        ],
        "created_at": "2020-05-19T12:26:22.000000Z",
        "updated_at": "2020-05-19T12:26:22.000000Z"
    }
}
```

### HTTP Request
`PUT api/alunos/{aluno}`

`PATCH api/alunos/{aluno}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `aluno` |  required  | 

<!-- END_9efd5f2a39737d3885ee72033380d0ab -->

<!-- START_cbe0d24458b7c74b38658551e581c9ac -->
## Remove a Aluno.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/alunos/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/alunos/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "error": false,
    "status_code": 200,
    "response": "aluno_destroyed"
}
```

### HTTP Request
`DELETE api/alunos/{aluno}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `aluno` |  required  | 

<!-- END_cbe0d24458b7c74b38658551e581c9ac -->

<!-- START_5472362baecef700ca5eeb34487fcba4 -->
## Display all Disciplinas of Aluno.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/alunos/1/disciplinas"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/alunos/1/disciplinas',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "data": {
                "id": 1,
                "nome": "Engenharia de Requisitos",
                "alunos": [
                    {
                        "id": 1,
                        "aluno_id": "a2082214",
                        "created_at": "2020-05-19T12:26:22.000000Z",
                        "updated_at": "2020-05-19T12:26:22.000000Z",
                        "curso": "Engenharia Informática",
                        "data_de_matricula_inicial": "2020-10-10 00:00:00",
                        "ano_curricular": 3
                    }
                ],
                "regente": {
                    "id": 1,
                    "professor_id": "p2827464",
                    "created_at": "2020-05-19T12:40:25.000000Z",
                    "updated_at": "2020-05-19T12:40:25.000000Z"
                },
                "assistentes": [
                    {
                        "id": 2,
                        "professor_id": "p4365476",
                        "created_at": "2020-05-19T12:40:25.000000Z",
                        "updated_at": "2020-05-19T12:40:25.000000Z"
                    }
                ],
                "semestre_curricular": "2020-05-18 00:00:00",
                "created_at": "2020-05-19T12:49:12.000000Z",
                "updated_at": "2020-05-19T12:49:12.000000Z"
            }
        },
        {
            "data": {
                "id": 2,
                "nome": "Processos e Métricas de Software",
                "alunos": [
                    {
                        "id": 1,
                        "aluno_id": "a2082214",
                        "created_at": "2020-05-19T12:26:22.000000Z",
                        "updated_at": "2020-05-19T12:26:22.000000Z",
                        "curso": "Engenharia Informática",
                        "data_de_matricula_inicial": "2020-10-10 00:00:00",
                        "ano_curricular": 3
                    }
                ],
                "regente": {
                    "id": 2,
                    "professor_id": "pr43523",
                    "created_at": "2020-05-19T12:40:25.000000Z",
                    "updated_at": "2020-05-19T12:40:25.000000Z"
                },
                "assistentes": [
                    {
                        "id": 2,
                        "professor_id": "p4365476",
                        "created_at": "2020-05-19T12:40:25.000000Z",
                        "updated_at": "2020-05-19T12:40:25.000000Z"
                    }
                ],
                "semestre_curricular": "2020-05-18 00:00:00",
                "created_at": "2020-05-19T12:49:12.000000Z",
                "updated_at": "2020-05-19T12:49:12.000000Z"
            }
        }
    ]
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/alunos/{aluno}/disciplinas`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `aluno` |  required  | 

<!-- END_5472362baecef700ca5eeb34487fcba4 -->

<!-- START_7918a6bff45b3afac0970c69a375ea19 -->
## Add a Disciplina to Aluno.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/alunos/1/disciplinas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "disciplina_id": "repudiandae"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/alunos/1/disciplinas',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'disciplina_id' => 'repudiandae',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": null,
        "nome": null,
        "alunos": [],
        "regente": null,
        "assistentes": [],
        "semestre_curricular": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`POST api/alunos/{aluno}/disciplinas`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `aluno` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `disciplina_id` | string |  required  | 
    
<!-- END_7918a6bff45b3afac0970c69a375ea19 -->

<!-- START_55e0ba5fb16e543a0db984a32d840728 -->
## Display a Disciplina of Aluno.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/alunos/1/disciplinas/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/alunos/1/disciplinas/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": null,
        "nome": null,
        "alunos": [],
        "regente": null,
        "assistentes": [],
        "semestre_curricular": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`GET api/alunos/{aluno}/disciplinas/{disciplina}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `aluno` |  required  | 
    `disciplina` |  required  | 

<!-- END_55e0ba5fb16e543a0db984a32d840728 -->

<!-- START_896724ba6fd3f5f94e935bcdbf77900f -->
## Remove a Disciplina from Aluno.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/alunos/1/disciplinas/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/alunos/1/disciplinas/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "error": false,
    "status_code": 200,
    "response": "disciplina_removed"
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "nome": null,
        "alunos": [],
        "regente": null,
        "assistentes": [],
        "semestre_curricular": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`DELETE api/alunos/{aluno}/disciplinas/{disciplina}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `aluno` |  required  | 
    `disciplina` |  required  | 

<!-- END_896724ba6fd3f5f94e935bcdbf77900f -->

#Aula management


APIs for managing Aulas
<!-- START_5652a16509c3614d3d81b303ffa3415d -->
## Display all Aulas of Disciplina.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/aulas"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/aulas',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "data": [
                {
                    "id": 1,
                    "descricao": "Introdução",
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
                },
                {
                    "id": 2,
                    "descricao": "Use Cases",
                    "disciplina": {
                        "id": 1,
                        "nome": "Processos e Métricas de Software",
                        "created_at": "2020-05-18T22:57:25.000000Z",
                        "updated_at": "2020-05-18T22:57:25.000000Z",
                        "semestre_curricular": "2020-05-18 00:00:00",
                        "professor_id": 1
                    },
                    "created_at": "2020-05-19T12:59:29.000000Z",
                    "updated_at": "2020-05-19T12:59:29.000000Z"
                }
            ]
        }
    ]
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "descricao": null,
            "disciplina": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "descricao": null,
            "disciplina": null,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/aulas`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 

<!-- END_5652a16509c3614d3d81b303ffa3415d -->

<!-- START_6528ef4d32874d33281b3edb7ae1950e -->
## Create a Aula of Disciplina.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/aulas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "descricao": "culpa"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/disciplinas/1/aulas',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'descricao' => 'culpa',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": null,
        "descricao": null,
        "disciplina": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`POST api/disciplinas/{disciplina}/aulas`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `descricao` | string |  required  | 
    
<!-- END_6528ef4d32874d33281b3edb7ae1950e -->

<!-- START_30a55aacfdab246b185e1b77572b63f5 -->
## Display a Aula of Disciplina.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/aulas/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/aulas/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": null,
        "descricao": null,
        "disciplina": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/aulas/{aula}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `aula` |  required  | 

<!-- END_30a55aacfdab246b185e1b77572b63f5 -->

<!-- START_e862bf9f1f64fa5a34df24202d9017f4 -->
## Update a Aula of Disciplina

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/aulas/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/disciplinas/1/aulas/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": null,
        "descricao": null,
        "disciplina": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`PUT api/disciplinas/{disciplina}/aulas/{aula}`

`PATCH api/disciplinas/{disciplina}/aulas/{aula}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `aula` |  required  | 

<!-- END_e862bf9f1f64fa5a34df24202d9017f4 -->

<!-- START_41b70913f4acdf7d7ec2f377ef8e9b2a -->
## Remove a Aula of Disciplina

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/aulas/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/disciplinas/1/aulas/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "error": false,
    "status_code": 200,
    "response": "aula_destroyed"
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "descricao": null,
        "disciplina": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`DELETE api/disciplinas/{disciplina}/aulas/{aula}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `aula` |  required  | 

<!-- END_41b70913f4acdf7d7ec2f377ef8e9b2a -->

<!-- START_f6c8e734cb4162537925e75f221df301 -->
## Display all Ficheiros of Aula.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/aulas/1/ficheiros"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/aulas/1/ficheiros',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET api/disciplinas/{disciplina}/aulas/{aula}/ficheiros`


<!-- END_f6c8e734cb4162537925e75f221df301 -->

<!-- START_d059d3dfbf4b24db6f97a6437a2cc696 -->
## Create a Ficheiro of Aula.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/aulas/1/ficheiros"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/disciplinas/1/aulas/1/ficheiros',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/disciplinas/{disciplina}/aulas/{aula}/ficheiros`


<!-- END_d059d3dfbf4b24db6f97a6437a2cc696 -->

<!-- START_b9546b4b1a816019f9cf9fd751e969ac -->
## Display a Ficheiro of Aula.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/aulas/1/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/aulas/1/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET api/disciplinas/{disciplina}/aulas/{aula}/ficheiros/{ficheiro}`


<!-- END_b9546b4b1a816019f9cf9fd751e969ac -->

<!-- START_46edc8fd1f527fe89a1d1269899317de -->
## Update a Ficheiro of Aula.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/aulas/1/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/disciplinas/1/aulas/1/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT api/disciplinas/{disciplina}/aulas/{aula}/ficheiros/{ficheiro}`

`PATCH api/disciplinas/{disciplina}/aulas/{aula}/ficheiros/{ficheiro}`


<!-- END_46edc8fd1f527fe89a1d1269899317de -->

<!-- START_206d345b485200b12ff354747a6eb933 -->
## Remove a Ficheiro of Aula.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/aulas/1/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/disciplinas/1/aulas/1/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE api/disciplinas/{disciplina}/aulas/{aula}/ficheiros/{ficheiro}`


<!-- END_206d345b485200b12ff354747a6eb933 -->

#Comentario management


APIs for managing Comentarios
<!-- START_a3b990496821f1a00f2fd46d4aaad11e -->
## Display all Comentarios of Ficheiro.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/ficheiros/1/comentarios"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/ficheiros/1/comentarios',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET api/ficheiros/{ficheiro}/comentarios`


<!-- END_a3b990496821f1a00f2fd46d4aaad11e -->

<!-- START_cce995b33c3c7af1a6bbc8e691637358 -->
## Create Comentario.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/ficheiros/1/comentarios"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/ficheiros/1/comentarios',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/ficheiros/{ficheiro}/comentarios`


<!-- END_cce995b33c3c7af1a6bbc8e691637358 -->

<!-- START_02ff6f0482d8470700657bc85fe2bafe -->
## Display a Comentario of Ficheiro.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/ficheiros/1/comentarios/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/ficheiros/1/comentarios/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET api/ficheiros/{ficheiro}/comentarios/{comentario}`


<!-- END_02ff6f0482d8470700657bc85fe2bafe -->

<!-- START_7e4c93eba63a4fe58d4e3e3fa4e84a0a -->
## Update a Comentario of Ficheiro.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/ficheiros/1/comentarios/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/ficheiros/1/comentarios/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT api/ficheiros/{ficheiro}/comentarios/{comentario}`

`PATCH api/ficheiros/{ficheiro}/comentarios/{comentario}`


<!-- END_7e4c93eba63a4fe58d4e3e3fa4e84a0a -->

<!-- START_2b3111d9fcedf033808e719e9d4c9063 -->
## Remove a Comentario of Ficheiro.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/ficheiros/1/comentarios/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/ficheiros/1/comentarios/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE api/ficheiros/{ficheiro}/comentarios/{comentario}`


<!-- END_2b3111d9fcedf033808e719e9d4c9063 -->

#Disciplina management


APIs for managing Disciplinas
<!-- START_0a97f91361e32cc82ba375335f2e0a82 -->
## Display all Disciplinas.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "data": {
                "id": 1,
                "nome": "Engenharia de Requisitos",
                "alunos": [
                    {
                        "id": 1,
                        "aluno_id": "a2082214",
                        "created_at": "2020-05-19T12:26:22.000000Z",
                        "updated_at": "2020-05-19T12:26:22.000000Z",
                        "curso": "Engenharia Informática",
                        "data_de_matricula_inicial": "2020-10-10 00:00:00",
                        "ano_curricular": 3
                    }
                ],
                "regente": {
                    "id": 1,
                    "professor_id": "p2827464",
                    "created_at": "2020-05-19T12:40:25.000000Z",
                    "updated_at": "2020-05-19T12:40:25.000000Z"
                },
                "assistentes": [
                    {
                        "id": 2,
                        "professor_id": "p4365476",
                        "created_at": "2020-05-19T12:40:25.000000Z",
                        "updated_at": "2020-05-19T12:40:25.000000Z"
                    }
                ],
                "semestre_curricular": "2020-05-18 00:00:00",
                "created_at": "2020-05-19T12:49:12.000000Z",
                "updated_at": "2020-05-19T12:49:12.000000Z"
            }
        },
        {
            "data": {
                "id": 2,
                "nome": "Processos e Métricas de Software",
                "alunos": [
                    {
                        "id": 1,
                        "aluno_id": "a2082214",
                        "created_at": "2020-05-19T12:26:22.000000Z",
                        "updated_at": "2020-05-19T12:26:22.000000Z",
                        "curso": "Engenharia Informática",
                        "data_de_matricula_inicial": "2020-10-10 00:00:00",
                        "ano_curricular": 3
                    }
                ],
                "regente": {
                    "id": 2,
                    "professor_id": "pr43523",
                    "created_at": "2020-05-19T12:40:25.000000Z",
                    "updated_at": "2020-05-19T12:40:25.000000Z"
                },
                "assistentes": [
                    {
                        "id": 2,
                        "professor_id": "p4365476",
                        "created_at": "2020-05-19T12:40:25.000000Z",
                        "updated_at": "2020-05-19T12:40:25.000000Z"
                    }
                ],
                "semestre_curricular": "2020-05-18 00:00:00",
                "created_at": "2020-05-19T12:49:12.000000Z",
                "updated_at": "2020-05-19T12:49:12.000000Z"
            }
        }
    ]
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
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

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "dolore",
    "semestre_curricular": "eius"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/disciplinas',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'nome' => 'dolore',
            'semestre_curricular' => 'eius',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "nome": "Engenharia de Requisitos",
        "alunos": [
            {
                "id": 1,
                "aluno_id": "a2082214",
                "created_at": "2020-05-19T12:26:22.000000Z",
                "updated_at": "2020-05-19T12:26:22.000000Z",
                "curso": "Engenharia Informática",
                "data_de_matricula_inicial": "2020-10-10 00:00:00",
                "ano_curricular": 3
            }
        ],
        "regente": {
            "id": 1,
            "professor_id": "p2827464",
            "created_at": "2020-05-19T12:40:25.000000Z",
            "updated_at": "2020-05-19T12:40:25.000000Z"
        },
        "assistentes": [
            {
                "id": 2,
                "professor_id": "p4365476",
                "created_at": "2020-05-19T12:40:25.000000Z",
                "updated_at": "2020-05-19T12:40:25.000000Z"
            }
        ],
        "semestre_curricular": "2020-05-18 00:00:00",
        "created_at": "2020-05-19T12:49:12.000000Z",
        "updated_at": "2020-05-19T12:49:12.000000Z"
    }
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`POST api/disciplinas`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nome` | string |  required  | 
        `semestre_curricular` | date |  required  | 
    
<!-- END_9ce178a21d5ea603d3ef75a78b52b2ff -->

<!-- START_183613df4db9e5e68f91e56b7e29be83 -->
## Display a Disciplina.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "nome": "Engenharia de Requisitos",
        "alunos": [
            {
                "id": 1,
                "aluno_id": "a2082214",
                "created_at": "2020-05-19T12:26:22.000000Z",
                "updated_at": "2020-05-19T12:26:22.000000Z",
                "curso": "Engenharia Informática",
                "data_de_matricula_inicial": "2020-10-10 00:00:00",
                "ano_curricular": 3
            }
        ],
        "regente": {
            "id": 1,
            "professor_id": "p2827464",
            "created_at": "2020-05-19T12:40:25.000000Z",
            "updated_at": "2020-05-19T12:40:25.000000Z"
        },
        "assistentes": [
            {
                "id": 2,
                "professor_id": "p4365476",
                "created_at": "2020-05-19T12:40:25.000000Z",
                "updated_at": "2020-05-19T12:40:25.000000Z"
            }
        ],
        "semestre_curricular": "2020-05-18 00:00:00",
        "created_at": "2020-05-19T12:49:12.000000Z",
        "updated_at": "2020-05-19T12:49:12.000000Z"
    }
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 

<!-- END_183613df4db9e5e68f91e56b7e29be83 -->

<!-- START_81bcfcb72133956becdf4432594372b4 -->
## Update a Disciplina.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/disciplinas/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "nome": "Engenharia de Requisitos",
        "alunos": [
            {
                "id": 1,
                "aluno_id": "a2082214",
                "created_at": "2020-05-19T12:26:22.000000Z",
                "updated_at": "2020-05-19T12:26:22.000000Z",
                "curso": "Engenharia Informática",
                "data_de_matricula_inicial": "2020-10-10 00:00:00",
                "ano_curricular": 3
            }
        ],
        "regente": {
            "id": 1,
            "professor_id": "p2827464",
            "created_at": "2020-05-19T12:40:25.000000Z",
            "updated_at": "2020-05-19T12:40:25.000000Z"
        },
        "assistentes": [
            {
                "id": 2,
                "professor_id": "p4365476",
                "created_at": "2020-05-19T12:40:25.000000Z",
                "updated_at": "2020-05-19T12:40:25.000000Z"
            }
        ],
        "semestre_curricular": "2020-05-18 00:00:00",
        "created_at": "2020-05-19T12:49:12.000000Z",
        "updated_at": "2020-05-19T12:49:12.000000Z"
    }
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`PUT api/disciplinas/{disciplina}`

`PATCH api/disciplinas/{disciplina}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 

<!-- END_81bcfcb72133956becdf4432594372b4 -->

<!-- START_08d0dbe102eb5fb5efa7c9df4cd35265 -->
## Remove a Disciplina.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/disciplinas/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "error": false,
    "status_code": 200,
    "response": "disciplina_destroyed"
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`DELETE api/disciplinas/{disciplina}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 

<!-- END_08d0dbe102eb5fb5efa7c9df4cd35265 -->

#Duvida management


APIs for managing Disciplinas
<!-- START_41e6c67bacd5993b456c7f3382dfef84 -->
## Display all Duvidas of Disciplina.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/duvidas"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/duvidas',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "data": {
                "id": 1,
                "aluno": {
                    "id": 1,
                    "aluno_id": "a2082214",
                    "created_at": "2020-05-19T12:26:22.000000Z",
                    "updated_at": "2020-05-19T12:26:22.000000Z",
                    "curso": "Engenharia Informática",
                    "data_de_matricula_inicial": "2020-10-10 00:00:00",
                    "ano_curricular": 3
                },
                "disciplina": {
                    "id": 1,
                    "nome": "Engenharia de Requisitos",
                    "created_at": "2020-05-19T12:40:25.000000Z",
                    "updated_at": "2020-05-19T12:40:25.000000Z",
                    "semestre_curricular": "2020-05-18 00:00:00",
                    "professor_id": 1
                },
                "ficheiros": [],
                "created_at": "2020-05-19T13:46:02.000000Z",
                "updated_at": "2020-05-19T13:46:02.000000Z"
            }
        },
        {
            "data": {
                "id": 2,
                "aluno": {
                    "id": 1,
                    "aluno_id": "a2082214",
                    "created_at": "2020-05-19T12:26:22.000000Z",
                    "updated_at": "2020-05-19T12:26:22.000000Z",
                    "curso": "Engenharia Informática",
                    "data_de_matricula_inicial": "2020-10-10 00:00:00",
                    "ano_curricular": 3
                },
                "disciplina": {
                    "id": 2,
                    "nome": "Processos e Métricas de Software",
                    "created_at": "2020-05-18T22:57:25.000000Z",
                    "updated_at": "2020-05-18T22:57:25.000000Z",
                    "semestre_curricular": "2020-05-18 00:00:00",
                    "professor_id": 1
                },
                "ficheiros": [],
                "created_at": "2020-05-19T13:46:02.000000Z",
                "updated_at": "2020-05-19T13:46:02.000000Z"
            }
        }
    ]
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "aluno": null,
            "disciplina": null,
            "ficheiros": [],
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "aluno": null,
            "disciplina": null,
            "ficheiros": [],
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/duvidas`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 

<!-- END_41e6c67bacd5993b456c7f3382dfef84 -->

<!-- START_f06a7b83c84cc379f18b41553d79bcf9 -->
## Create a Duvida of Disciplina.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/duvidas"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/disciplinas/1/duvidas',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "aluno": {
            "id": 1,
            "aluno_id": "a2082214",
            "created_at": "2020-05-19T12:26:22.000000Z",
            "updated_at": "2020-05-19T12:26:22.000000Z",
            "curso": "Engenharia Informática",
            "data_de_matricula_inicial": "2020-10-10 00:00:00",
            "ano_curricular": 3
        },
        "disciplina": {
            "id": 1,
            "nome": "Engenharia de Requisitos",
            "created_at": "2020-05-19T12:40:25.000000Z",
            "updated_at": "2020-05-19T12:40:25.000000Z",
            "semestre_curricular": "2020-05-18 00:00:00",
            "professor_id": 1
        },
        "ficheiros": [],
        "created_at": "2020-05-19T13:46:02.000000Z",
        "updated_at": "2020-05-19T13:46:02.000000Z"
    }
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "aluno": null,
        "disciplina": null,
        "ficheiros": [],
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`POST api/disciplinas/{disciplina}/duvidas`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 

<!-- END_f06a7b83c84cc379f18b41553d79bcf9 -->

<!-- START_33d46b7d7dce0758edd9e60b96fb06fe -->
## Display a Duvida of Disciplina.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/duvidas/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/duvidas/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "aluno": {
            "id": 1,
            "aluno_id": "a2082214",
            "created_at": "2020-05-19T12:26:22.000000Z",
            "updated_at": "2020-05-19T12:26:22.000000Z",
            "curso": "Engenharia Informática",
            "data_de_matricula_inicial": "2020-10-10 00:00:00",
            "ano_curricular": 3
        },
        "disciplina": {
            "id": 1,
            "nome": "Engenharia de Requisitos",
            "created_at": "2020-05-19T12:40:25.000000Z",
            "updated_at": "2020-05-19T12:40:25.000000Z",
            "semestre_curricular": "2020-05-18 00:00:00",
            "professor_id": 1
        },
        "ficheiros": [],
        "created_at": "2020-05-19T13:46:02.000000Z",
        "updated_at": "2020-05-19T13:46:02.000000Z"
    }
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "aluno": null,
        "disciplina": null,
        "ficheiros": [],
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/duvidas/{duvida}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `duvida` |  required  | 

<!-- END_33d46b7d7dce0758edd9e60b96fb06fe -->

<!-- START_cb8bee5e9c88b11f6daf015221c9925e -->
## Update a Duvida of Disciplina.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/duvidas/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/disciplinas/1/duvidas/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "aluno": {
            "id": 1,
            "aluno_id": "a2082214",
            "created_at": "2020-05-19T12:26:22.000000Z",
            "updated_at": "2020-05-19T12:26:22.000000Z",
            "curso": "Engenharia Informática",
            "data_de_matricula_inicial": "2020-10-10 00:00:00",
            "ano_curricular": 3
        },
        "disciplina": {
            "id": 1,
            "nome": "Engenharia de Requisitos",
            "created_at": "2020-05-19T12:40:25.000000Z",
            "updated_at": "2020-05-19T12:40:25.000000Z",
            "semestre_curricular": "2020-05-18 00:00:00",
            "professor_id": 1
        },
        "ficheiros": [],
        "created_at": "2020-05-19T13:46:02.000000Z",
        "updated_at": "2020-05-19T13:46:02.000000Z"
    }
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "aluno": null,
        "disciplina": null,
        "ficheiros": [],
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`PUT api/disciplinas/{disciplina}/duvidas/{duvida}`

`PATCH api/disciplinas/{disciplina}/duvidas/{duvida}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `duvida` |  required  | 

<!-- END_cb8bee5e9c88b11f6daf015221c9925e -->

<!-- START_c64229b342a652bcdd36792860c7b612 -->
## Remove a Duvida of Disciplina.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/duvidas/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/disciplinas/1/duvidas/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "error": false,
    "status_code": 200,
    "response": "duvida_destroyed"
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "aluno": null,
        "disciplina": null,
        "ficheiros": [],
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`DELETE api/disciplinas/{disciplina}/duvidas/{duvida}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `duvida` |  required  | 

<!-- END_c64229b342a652bcdd36792860c7b612 -->

<!-- START_35f3e4adb4dbb90604df550c19f0b110 -->
## Display all Ficheiros of Duvida.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/duvidas/1/ficheiros"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/duvidas/1/ficheiros',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET api/disciplinas/{disciplina}/duvidas/{duvida}/ficheiros`


<!-- END_35f3e4adb4dbb90604df550c19f0b110 -->

<!-- START_34f811b383b2b4d00f63a7451871d8a6 -->
## Create a Ficheiro of Duvida.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/duvidas/1/ficheiros"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/disciplinas/1/duvidas/1/ficheiros',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/disciplinas/{disciplina}/duvidas/{duvida}/ficheiros`


<!-- END_34f811b383b2b4d00f63a7451871d8a6 -->

<!-- START_554660e48859582da781e177d745995f -->
## Display a Ficheiro of Duvida.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/duvidas/1/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/duvidas/1/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET api/disciplinas/{disciplina}/duvidas/{duvida}/ficheiros/{ficheiro}`


<!-- END_554660e48859582da781e177d745995f -->

<!-- START_a30cfc9029ac3e861ee5c1cc0c351b7f -->
## Update a Ficheiro of Duvida.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/duvidas/1/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/disciplinas/1/duvidas/1/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT api/disciplinas/{disciplina}/duvidas/{duvida}/ficheiros/{ficheiro}`

`PATCH api/disciplinas/{disciplina}/duvidas/{duvida}/ficheiros/{ficheiro}`


<!-- END_a30cfc9029ac3e861ee5c1cc0c351b7f -->

<!-- START_076d84034dbb7ea4588d425c74fe5736 -->
## Remove a Ficheiro of Duvida.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/duvidas/1/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/disciplinas/1/duvidas/1/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE api/disciplinas/{disciplina}/duvidas/{duvida}/ficheiros/{ficheiro}`


<!-- END_076d84034dbb7ea4588d425c74fe5736 -->

#Eventos de Avaliação management


APIs for managing Eventos de Avaliação
<!-- START_a5a71ee70e07ad727284087575070965 -->
## Display all Eventos de Avaliação.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "data": {
                "id": 1,
                "disciplina": {
                    "id": 1,
                    "nome": "Engenharia de Requisitos",
                    "created_at": "2020-05-18T22:57:25.000000Z",
                    "updated_at": "2020-05-18T22:57:25.000000Z",
                    "semestre_curricular": "2020-05-18 00:00:00",
                    "professor_id": 1
                },
                "resolucoes": [
                    {
                        "id": 1,
                        "evento_de_avaliacao_id": 1,
                        "aluno_id": 1,
                        "nota": null,
                        "created_at": "2020-05-19T14:32:10.000000Z",
                        "updated_at": "2020-05-19T14:32:10.000000Z"
                    }
                ],
                "ficheiros": [],
                "data_inicio": "2020-01-01",
                "data_fim": "2020-01-01",
                "created_at": "2020-05-19T14:17:27.000000Z",
                "updated_at": "2020-05-19T14:17:27.000000Z"
            }
        },
        {
            "data": {
                "id": 2,
                "disciplina": {
                    "id": 1,
                    "nome": "Engenharia de Requisitos",
                    "created_at": "2020-05-18T22:57:25.000000Z",
                    "updated_at": "2020-05-18T22:57:25.000000Z",
                    "semestre_curricular": "2020-05-18 00:00:00",
                    "professor_id": 1
                },
                "resolucoes": [
                    {
                        "id": 1,
                        "evento_de_avaliacao_id": 1,
                        "aluno_id": 1,
                        "nota": null,
                        "created_at": "2020-05-19T14:32:10.000000Z",
                        "updated_at": "2020-05-19T14:32:10.000000Z"
                    }
                ],
                "ficheiros": [],
                "data_inicio": "2020-03-01",
                "data_fim": "2020-03-01",
                "created_at": "2020-05-19T14:17:27.000000Z",
                "updated_at": "2020-05-19T14:17:27.000000Z"
            }
        }
    ]
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "disciplina": null,
            "resolucoes": [],
            "ficheiros": [],
            "data_inicio": null,
            "data_fim": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "disciplina": null,
            "resolucoes": [],
            "ficheiros": [],
            "data_inicio": null,
            "data_fim": null,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 

<!-- END_a5a71ee70e07ad727284087575070965 -->

<!-- START_aead4d5c94d433772349744d92c21de3 -->
## Create an Evento de Avaliação.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data_inicio": "facilis",
    "data_fim": "beatae"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'data_inicio' => 'facilis',
            'data_fim' => 'beatae',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "disciplina": {
            "id": 1,
            "nome": "Engenharia de Requisitos",
            "created_at": "2020-05-18T22:57:25.000000Z",
            "updated_at": "2020-05-18T22:57:25.000000Z",
            "semestre_curricular": "2020-05-18 00:00:00",
            "professor_id": 1
        },
        "resolucoes": [
            {
                "id": 1,
                "evento_de_avaliacao_id": 1,
                "aluno_id": 1,
                "nota": null,
                "created_at": "2020-05-19T14:32:10.000000Z",
                "updated_at": "2020-05-19T14:32:10.000000Z"
            }
        ],
        "ficheiros": [],
        "data_inicio": "2020-01-01",
        "data_fim": "2020-01-01",
        "created_at": "2020-05-19T14:17:27.000000Z",
        "updated_at": "2020-05-19T14:17:27.000000Z"
    }
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "disciplina": null,
        "resolucoes": [],
        "ficheiros": [],
        "data_inicio": null,
        "data_fim": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`POST api/disciplinas/{disciplina}/eventos-de-avaliacao`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `data_inicio` | date |  required  | 
        `data_fim` | date |  required  | 
    
<!-- END_aead4d5c94d433772349744d92c21de3 -->

<!-- START_5aa7187dc5109f7986c18139243afd07 -->
## Display an Evento de Avaliação.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "disciplina": {
            "id": 1,
            "nome": "Engenharia de Requisitos",
            "created_at": "2020-05-18T22:57:25.000000Z",
            "updated_at": "2020-05-18T22:57:25.000000Z",
            "semestre_curricular": "2020-05-18 00:00:00",
            "professor_id": 1
        },
        "resolucoes": [
            {
                "id": 1,
                "evento_de_avaliacao_id": 1,
                "aluno_id": 1,
                "nota": null,
                "created_at": "2020-05-19T14:32:10.000000Z",
                "updated_at": "2020-05-19T14:32:10.000000Z"
            }
        ],
        "ficheiros": [],
        "data_inicio": "2020-01-01",
        "data_fim": "2020-01-01",
        "created_at": "2020-05-19T14:17:27.000000Z",
        "updated_at": "2020-05-19T14:17:27.000000Z"
    }
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "disciplina": null,
        "resolucoes": [],
        "ficheiros": [],
        "data_inicio": null,
        "data_fim": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `eventos_de_avaliacao` |  required  | 

<!-- END_5aa7187dc5109f7986c18139243afd07 -->

<!-- START_1c16eb10634a2778ff6ac112fc0dab53 -->
## Update an Evento de Avaliação.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "disciplina": {
            "id": 1,
            "nome": "Engenharia de Requisitos",
            "created_at": "2020-05-18T22:57:25.000000Z",
            "updated_at": "2020-05-18T22:57:25.000000Z",
            "semestre_curricular": "2020-05-18 00:00:00",
            "professor_id": 1
        },
        "resolucoes": [
            {
                "id": 1,
                "evento_de_avaliacao_id": 1,
                "aluno_id": 1,
                "nota": null,
                "created_at": "2020-05-19T14:32:10.000000Z",
                "updated_at": "2020-05-19T14:32:10.000000Z"
            }
        ],
        "ficheiros": [],
        "data_inicio": "2020-01-01",
        "data_fim": "2020-01-01",
        "created_at": "2020-05-19T14:17:27.000000Z",
        "updated_at": "2020-05-19T14:17:27.000000Z"
    }
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "disciplina": null,
        "resolucoes": [],
        "ficheiros": [],
        "data_inicio": null,
        "data_fim": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`PUT api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}`

`PATCH api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `eventos_de_avaliacao` |  required  | 

<!-- END_1c16eb10634a2778ff6ac112fc0dab53 -->

<!-- START_aa75a90513f73061fb246d9c34328878 -->
## Remove an Evento de Avaliação.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "error": false,
    "status_code": 200,
    "response": "duvida_destroyed"
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "disciplina": null,
        "resolucoes": [],
        "ficheiros": [],
        "data_inicio": null,
        "data_fim": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`DELETE api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `eventos_de_avaliacao` |  required  | 

<!-- END_aa75a90513f73061fb246d9c34328878 -->

<!-- START_aa9ef7109c36accfac70987604bb7e04 -->
## Display all Ficheiros of Evento de Avaliação.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/ficheiros`


<!-- END_aa9ef7109c36accfac70987604bb7e04 -->

<!-- START_e6a918cd136f194f4b6f0a9a3d34e9da -->
## Create a Ficheiro of Evento de Avaliação.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/ficheiros`


<!-- END_e6a918cd136f194f4b6f0a9a3d34e9da -->

<!-- START_8aeb7203d4e31933ba7e81763ab0e870 -->
## Display a Ficheiro of Evento de Avaliação.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/ficheiros/{ficheiro}`


<!-- END_8aeb7203d4e31933ba7e81763ab0e870 -->

<!-- START_fa7b3546b3e409a7c9b66977d3d6eb50 -->
## Update a Ficheiro of Evento de Avaliação.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/ficheiros/{ficheiro}`

`PATCH api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/ficheiros/{ficheiro}`


<!-- END_fa7b3546b3e409a7c9b66977d3d6eb50 -->

<!-- START_5610f50214fb70f6292932c26271c442 -->
## Remove the specified resource from storage.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/ficheiros/{ficheiro}`


<!-- END_5610f50214fb70f6292932c26271c442 -->

#Ficheiro management


APIs for managing Ficheiros
<!-- START_0492f500ad6414d89ce86b6f3fb41c81 -->
## Display all Ficheiros.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/ficheiros"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/ficheiros',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET api/ficheiros`


<!-- END_0492f500ad6414d89ce86b6f3fb41c81 -->

<!-- START_30f6a70f1a3e30e5cb0306a07a885458 -->
## Display a Ficheiro.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET api/ficheiros/{ficheiro}`


<!-- END_30f6a70f1a3e30e5cb0306a07a885458 -->

<!-- START_038fc5a7cfef9b868d006758d386b4e0 -->
## Update a Ficheiro.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT api/ficheiros/{ficheiro}`

`PATCH api/ficheiros/{ficheiro}`


<!-- END_038fc5a7cfef9b868d006758d386b4e0 -->

<!-- START_53683cfe4f7d0076ddb112e734d5c33b -->
## Remove a Ficheiro.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE api/ficheiros/{ficheiro}`


<!-- END_53683cfe4f7d0076ddb112e734d5c33b -->

#Professor management


APIs for managing Professores
<!-- START_60b0e474b83d46a32bfa64054bf9950f -->
## Display all Professores.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/professores"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/professores',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "data": {
                "id": 1,
                "professor_id": "p2827464",
                "user": {
                    "id": 3,
                    "name": "Filipe Quintal",
                    "email": "filipe.quintal@staff.uma.pt",
                    "email_verified_at": null,
                    "created_at": "2020-05-19T12:40:25.000000Z",
                    "updated_at": "2020-05-19T12:40:25.000000Z"
                },
                "disciplinas": [],
                "regente": [
                    {
                        "id": 1,
                        "nome": "Engenharia de Requisitos",
                        "created_at": "2020-05-19T12:49:12.000000Z",
                        "updated_at": "2020-05-19T12:49:12.000000Z",
                        "semestre_curricular": "2020-10-10 00:00:00",
                        "professor_id": 1
                    }
                ],
                "created_at": "2020-05-19T12:40:25.000000Z",
                "updated_at": "2020-05-19T12:40:25.000000Z"
            }
        },
        {
            "data": {
                "id": 2,
                "professor_id": "pr43523",
                "user": {
                    "id": 4,
                    "name": "Duarte Paulo",
                    "email": "duarte.paulo@staff.uma.pt",
                    "email_verified_at": null,
                    "created_at": "2020-05-19T12:40:25.000000Z",
                    "updated_at": "2020-05-19T12:40:25.000000Z"
                },
                "disciplinas": [],
                "regente": [
                    {
                        "id": 2,
                        "nome": "Processos e Métricas de Software",
                        "created_at": "2020-05-19T12:49:12.000000Z",
                        "updated_at": "2020-05-19T12:49:12.000000Z",
                        "semestre_curricular": "2020-10-10 00:00:00",
                        "professor_id": 1
                    }
                ],
                "created_at": "2020-05-19T12:40:25.000000Z",
                "updated_at": "2020-05-19T12:40:25.000000Z"
            }
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

```javascript
const url = new URL(
    "http://localhost:8000/api/professores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "professor_id": "id",
    "name": "maxime",
    "email": "earum",
    "password": "officiis",
    "password_confirmation": "et"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/professores',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'professor_id' => 'id',
            'name' => 'maxime',
            'email' => 'earum',
            'password' => 'officiis',
            'password_confirmation' => 'et',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "professor_id": null,
        "user": {
            "id": 3,
            "name": "Filipe Quintal",
            "email": "filipe.quintal@staff.uma.pt",
            "email_verified_at": null,
            "created_at": "2020-05-19T12:40:25.000000Z",
            "updated_at": "2020-05-19T12:40:25.000000Z"
        },
        "disciplinas": [],
        "regente": [
            {
                "id": 1,
                "nome": "Engenharia de Requisitos",
                "created_at": "2020-05-19T12:49:12.000000Z",
                "updated_at": "2020-05-19T12:49:12.000000Z",
                "semestre_curricular": "2020-10-10 00:00:00",
                "professor_id": 1
            }
        ],
        "created_at": "2020-05-19T12:40:25.000000Z",
        "updated_at": "2020-05-19T12:40:25.000000Z"
    }
}
```

### HTTP Request
`POST api/professores`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `professor_id` | string |  required  | 
        `name` | string |  required  | 
        `email` | string |  required  | 
        `password` | string |  required  | 
        `password_confirmation` | string |  required  | 
    
<!-- END_c6d20fd6b325da656eb4908e11265a66 -->

<!-- START_3895aee112e10c7602d8bfa75d5ec986 -->
## Display a Professor.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/professores/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/professores/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "professor_id": null,
        "user": {
            "id": 3,
            "name": "Filipe Quintal",
            "email": "filipe.quintal@staff.uma.pt",
            "email_verified_at": null,
            "created_at": "2020-05-19T12:40:25.000000Z",
            "updated_at": "2020-05-19T12:40:25.000000Z"
        },
        "disciplinas": [],
        "regente": [
            {
                "id": 1,
                "nome": "Engenharia de Requisitos",
                "created_at": "2020-05-19T12:49:12.000000Z",
                "updated_at": "2020-05-19T12:49:12.000000Z",
                "semestre_curricular": "2020-10-10 00:00:00",
                "professor_id": 1
            }
        ],
        "created_at": "2020-05-19T12:40:25.000000Z",
        "updated_at": "2020-05-19T12:40:25.000000Z"
    }
}
```

### HTTP Request
`GET api/professores/{professore}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `professor` |  required  | 

<!-- END_3895aee112e10c7602d8bfa75d5ec986 -->

<!-- START_f7d61f70828a7a0a2dbf675840df372a -->
## Update a Professor.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/professores/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/professores/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "professor_id": null,
        "user": {
            "id": 3,
            "name": "Filipe Quintal",
            "email": "filipe.quintal@staff.uma.pt",
            "email_verified_at": null,
            "created_at": "2020-05-19T12:40:25.000000Z",
            "updated_at": "2020-05-19T12:40:25.000000Z"
        },
        "disciplinas": [],
        "regente": [
            {
                "id": 1,
                "nome": "Engenharia de Requisitos",
                "created_at": "2020-05-19T12:49:12.000000Z",
                "updated_at": "2020-05-19T12:49:12.000000Z",
                "semestre_curricular": "2020-10-10 00:00:00",
                "professor_id": 1
            }
        ],
        "created_at": "2020-05-19T12:40:25.000000Z",
        "updated_at": "2020-05-19T12:40:25.000000Z"
    }
}
```

### HTTP Request
`PUT api/professores/{professore}`

`PATCH api/professores/{professore}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `professor` |  required  | 

<!-- END_f7d61f70828a7a0a2dbf675840df372a -->

<!-- START_70a4d4d101d30e501870eb05b5913874 -->
## Remove a Professor.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/professores/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/professores/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "error": false,
    "status_code": 200,
    "response": "professor_destroyed"
}
```

### HTTP Request
`DELETE api/professores/{professore}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `professor` |  required  | 

<!-- END_70a4d4d101d30e501870eb05b5913874 -->

<!-- START_7f40b02597f164cacec59295ce193e4b -->
## Display all Disciplinas of Professor.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/professores/1/disciplinas"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/professores/1/disciplinas',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "data": {
                "id": 1,
                "nome": "Engenharia de Requisitos",
                "alunos": [
                    {
                        "id": 1,
                        "aluno_id": "a2082214",
                        "created_at": "2020-05-19T12:26:22.000000Z",
                        "updated_at": "2020-05-19T12:26:22.000000Z",
                        "curso": "Engenharia Informática",
                        "data_de_matricula_inicial": "2020-10-10 00:00:00",
                        "ano_curricular": 3
                    }
                ],
                "regente": {
                    "id": 1,
                    "professor_id": "p2827464",
                    "created_at": "2020-05-19T12:40:25.000000Z",
                    "updated_at": "2020-05-19T12:40:25.000000Z"
                },
                "assistentes": [
                    {
                        "id": 2,
                        "professor_id": "p4365476",
                        "created_at": "2020-05-19T12:40:25.000000Z",
                        "updated_at": "2020-05-19T12:40:25.000000Z"
                    }
                ],
                "semestre_curricular": "2020-05-18 00:00:00",
                "created_at": "2020-05-19T12:49:12.000000Z",
                "updated_at": "2020-05-19T12:49:12.000000Z"
            }
        },
        {
            "data": {
                "id": 2,
                "nome": "Processos e Métricas de Software",
                "alunos": [
                    {
                        "id": 1,
                        "aluno_id": "a2082214",
                        "created_at": "2020-05-19T12:26:22.000000Z",
                        "updated_at": "2020-05-19T12:26:22.000000Z",
                        "curso": "Engenharia Informática",
                        "data_de_matricula_inicial": "2020-10-10 00:00:00",
                        "ano_curricular": 3
                    }
                ],
                "regente": {
                    "id": 2,
                    "professor_id": "pr43523",
                    "created_at": "2020-05-19T12:40:25.000000Z",
                    "updated_at": "2020-05-19T12:40:25.000000Z"
                },
                "assistentes": [
                    {
                        "id": 2,
                        "professor_id": "p4365476",
                        "created_at": "2020-05-19T12:40:25.000000Z",
                        "updated_at": "2020-05-19T12:40:25.000000Z"
                    }
                ],
                "semestre_curricular": "2020-05-18 00:00:00",
                "created_at": "2020-05-19T12:49:12.000000Z",
                "updated_at": "2020-05-19T12:49:12.000000Z"
            }
        }
    ]
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "nome": null,
            "alunos": [],
            "regente": null,
            "assistentes": [],
            "semestre_curricular": null,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/professores/{professore}/disciplinas`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `professor` |  required  | 

<!-- END_7f40b02597f164cacec59295ce193e4b -->

<!-- START_8baeae1532cd4733936243b4150d7330 -->
## Add a Disciplina to Professor

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/professores/1/disciplinas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "disciplina_id": "quo"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/professores/1/disciplinas',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'disciplina_id' => 'quo',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "data": {
                "id": 1,
                "nome": "Engenharia de Requisitos",
                "alunos": [
                    {
                        "id": 1,
                        "aluno_id": "a2082214",
                        "created_at": "2020-05-19T12:26:22.000000Z",
                        "updated_at": "2020-05-19T12:26:22.000000Z",
                        "curso": "Engenharia Informática",
                        "data_de_matricula_inicial": "2020-10-10 00:00:00",
                        "ano_curricular": 3
                    }
                ],
                "regente": {
                    "id": 1,
                    "professor_id": "p2827464",
                    "created_at": "2020-05-19T12:40:25.000000Z",
                    "updated_at": "2020-05-19T12:40:25.000000Z"
                },
                "assistentes": [
                    {
                        "id": 2,
                        "professor_id": "p4365476",
                        "created_at": "2020-05-19T12:40:25.000000Z",
                        "updated_at": "2020-05-19T12:40:25.000000Z"
                    }
                ],
                "semestre_curricular": "2020-05-18 00:00:00",
                "created_at": "2020-05-19T12:49:12.000000Z",
                "updated_at": "2020-05-19T12:49:12.000000Z"
            }
        },
        {
            "data": {
                "id": 2,
                "nome": "Processos e Métricas de Software",
                "alunos": [
                    {
                        "id": 1,
                        "aluno_id": "a2082214",
                        "created_at": "2020-05-19T12:26:22.000000Z",
                        "updated_at": "2020-05-19T12:26:22.000000Z",
                        "curso": "Engenharia Informática",
                        "data_de_matricula_inicial": "2020-10-10 00:00:00",
                        "ano_curricular": 3
                    }
                ],
                "regente": {
                    "id": 2,
                    "professor_id": "pr43523",
                    "created_at": "2020-05-19T12:40:25.000000Z",
                    "updated_at": "2020-05-19T12:40:25.000000Z"
                },
                "assistentes": [
                    {
                        "id": 2,
                        "professor_id": "p4365476",
                        "created_at": "2020-05-19T12:40:25.000000Z",
                        "updated_at": "2020-05-19T12:40:25.000000Z"
                    }
                ],
                "semestre_curricular": "2020-05-18 00:00:00",
                "created_at": "2020-05-19T12:49:12.000000Z",
                "updated_at": "2020-05-19T12:49:12.000000Z"
            }
        }
    ]
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "nome": null,
        "alunos": [],
        "regente": null,
        "assistentes": [],
        "semestre_curricular": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`POST api/professores/{professore}/disciplinas`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `professor` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `disciplina_id` | string |  required  | 
    
<!-- END_8baeae1532cd4733936243b4150d7330 -->

<!-- START_4c516fde04d4eb478959b722510d2f72 -->
## Display a Disciplina of Professor.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/professores/1/disciplinas/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/professores/1/disciplinas/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": null,
        "nome": null,
        "alunos": [],
        "regente": null,
        "assistentes": [],
        "semestre_curricular": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`GET api/professores/{professore}/disciplinas/{disciplina}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `professor` |  required  | 
    `disciplina` |  required  | 

<!-- END_4c516fde04d4eb478959b722510d2f72 -->

<!-- START_64209165961a34416881ce3e46732927 -->
## Remove a Disciplina from Professor.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/professores/1/disciplinas/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/professores/1/disciplinas/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "error": false,
    "status_code": 200,
    "response": "disciplina_removed"
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "nome": null,
        "alunos": [],
        "regente": null,
        "assistentes": [],
        "semestre_curricular": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`DELETE api/professores/{professore}/disciplinas/{disciplina}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `professor` |  required  | 
    `disciplina` |  required  | 

<!-- END_64209165961a34416881ce3e46732927 -->

#Profile management


APIs for getting the logged in user
<!-- START_b19e2ecbb41b5fa6802edaf581aab5f6 -->
## Display information about the logged in user.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/me"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/me',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET api/me`


<!-- END_b19e2ecbb41b5fa6802edaf581aab5f6 -->

#Resolução management


APIs for managing Resolucões
<!-- START_8f273ed5d18bdcb66b2e2b3126b41c57 -->
## Display all Resolucões of Evento de Resolução.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "data": {
                "id": 1,
                "aluno": {
                    "id": 1,
                    "aluno_id": "a2082214",
                    "created_at": "2020-05-19T12:26:22.000000Z",
                    "updated_at": "2020-05-19T12:26:22.000000Z",
                    "curso": "Engenharia Informática",
                    "data_de_matricula_inicial": "2020-10-10 00:00:00",
                    "ano_curricular": 3
                },
                "evento_de_avaliacao": {
                    "id": 1,
                    "disciplina_id": 1,
                    "data_inicio": "2020-01-01 00:00:00",
                    "data_fim": "2020-01-01 00:00:00",
                    "created_at": "2020-05-19T14:04:40.000000Z",
                    "updated_at": "2020-05-19T14:04:40.000000Z"
                },
                "nota": null,
                "created_at": "2020-05-19T14:32:10.000000Z",
                "updated_at": "2020-05-19T14:32:10.000000Z"
            }
        },
        {
            "data": {
                "id": 2,
                "aluno": {
                    "id": 2,
                    "aluno_id": "a208557",
                    "created_at": "2020-05-19T12:26:22.000000Z",
                    "updated_at": "2020-05-19T12:26:22.000000Z",
                    "curso": "Engenharia Informática",
                    "data_de_matricula_inicial": "2020-10-10 00:00:00",
                    "ano_curricular": 3
                },
                "evento_de_avaliacao": {
                    "id": 1,
                    "disciplina_id": 1,
                    "data_inicio": "2020-01-01 00:00:00",
                    "data_fim": "2020-01-01 00:00:00",
                    "created_at": "2020-05-19T14:04:40.000000Z",
                    "updated_at": "2020-05-19T14:04:40.000000Z"
                },
                "nota": null,
                "created_at": "2020-05-19T14:32:10.000000Z",
                "updated_at": "2020-05-19T14:32:10.000000Z"
            }
        }
    ]
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "aluno": null,
            "evento_de_avaliacao": null,
            "nota": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "aluno": null,
            "evento_de_avaliacao": null,
            "nota": null,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `evento_de_avaliacao` |  required  | 

<!-- END_8f273ed5d18bdcb66b2e2b3126b41c57 -->

<!-- START_70b2e0befeb60703c6bf8a2d91b73797 -->
## Create a Resolução of Evento de Resolução.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "aluno": {
            "id": 1,
            "aluno_id": "a2082214",
            "created_at": "2020-05-19T12:26:22.000000Z",
            "updated_at": "2020-05-19T12:26:22.000000Z",
            "curso": "Engenharia Informática",
            "data_de_matricula_inicial": "2020-10-10 00:00:00",
            "ano_curricular": 3
        },
        "evento_de_avaliacao": {
            "id": 1,
            "disciplina_id": 1,
            "data_inicio": "2020-01-01 00:00:00",
            "data_fim": "2020-01-01 00:00:00",
            "created_at": "2020-05-19T14:04:40.000000Z",
            "updated_at": "2020-05-19T14:04:40.000000Z"
        },
        "nota": null,
        "created_at": "2020-05-19T14:32:10.000000Z",
        "updated_at": "2020-05-19T14:32:10.000000Z"
    }
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "aluno": null,
            "evento_de_avaliacao": null,
            "nota": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "aluno": null,
            "evento_de_avaliacao": null,
            "nota": null,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`POST api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `evento_de_avaliacao` |  required  | 

<!-- END_70b2e0befeb60703c6bf8a2d91b73797 -->

<!-- START_5db1893e5b1afcf9687b2259f206098a -->
## Display a Resolução of Evento de Resolução.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "aluno": {
            "id": 1,
            "aluno_id": "a2082214",
            "created_at": "2020-05-19T12:26:22.000000Z",
            "updated_at": "2020-05-19T12:26:22.000000Z",
            "curso": "Engenharia Informática",
            "data_de_matricula_inicial": "2020-10-10 00:00:00",
            "ano_curricular": 3
        },
        "evento_de_avaliacao": {
            "id": 1,
            "disciplina_id": 1,
            "data_inicio": "2020-01-01 00:00:00",
            "data_fim": "2020-01-01 00:00:00",
            "created_at": "2020-05-19T14:04:40.000000Z",
            "updated_at": "2020-05-19T14:04:40.000000Z"
        },
        "nota": null,
        "created_at": "2020-05-19T14:32:10.000000Z",
        "updated_at": "2020-05-19T14:32:10.000000Z"
    }
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "aluno": null,
            "evento_de_avaliacao": null,
            "nota": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "aluno": null,
            "evento_de_avaliacao": null,
            "nota": null,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `evento_de_avaliacao` |  required  | 
    `resolucao_id` |  required  | 

<!-- END_5db1893e5b1afcf9687b2259f206098a -->

<!-- START_8fb87ec0d67758056cab91acc218cdd1 -->
## Update a Resolução of Evento de Resolução.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "aluno": {
            "id": 1,
            "aluno_id": "a2082214",
            "created_at": "2020-05-19T12:26:22.000000Z",
            "updated_at": "2020-05-19T12:26:22.000000Z",
            "curso": "Engenharia Informática",
            "data_de_matricula_inicial": "2020-10-10 00:00:00",
            "ano_curricular": 3
        },
        "evento_de_avaliacao": {
            "id": 1,
            "disciplina_id": 1,
            "data_inicio": "2020-01-01 00:00:00",
            "data_fim": "2020-01-01 00:00:00",
            "created_at": "2020-05-19T14:04:40.000000Z",
            "updated_at": "2020-05-19T14:04:40.000000Z"
        },
        "nota": null,
        "created_at": "2020-05-19T14:32:10.000000Z",
        "updated_at": "2020-05-19T14:32:10.000000Z"
    }
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "aluno": null,
            "evento_de_avaliacao": null,
            "nota": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "aluno": null,
            "evento_de_avaliacao": null,
            "nota": null,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`PUT api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}`

`PATCH api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `evento_de_avaliacao` |  required  | 
    `resolucao_id` |  required  | 

<!-- END_8fb87ec0d67758056cab91acc218cdd1 -->

<!-- START_1a6640681a9d5bb23a630d9223d0ea8d -->
## Remove a Resolução of Evento de Resolução.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "error": false,
    "status_code": 200,
    "response": "resolucao_destroyed"
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "aluno": null,
            "evento_de_avaliacao": null,
            "nota": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": null,
            "aluno": null,
            "evento_de_avaliacao": null,
            "nota": null,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`DELETE api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `disciplina` |  required  | 
    `evento_de_avaliacao` |  required  | 
    `resolucao_id` |  required  | 

<!-- END_1a6640681a9d5bb23a630d9223d0ea8d -->

<!-- START_d459258e6b894bf811f195aadcb2a060 -->
## Display all Ficheiros of Resolucões.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}/ficheiros`


<!-- END_d459258e6b894bf811f195aadcb2a060 -->

<!-- START_60598f759432cf3f03c396dde7f91165 -->
## Create a Ficheiro of Resolução.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}/ficheiros`


<!-- END_60598f759432cf3f03c396dde7f91165 -->

<!-- START_e4606509f15659a252a43c7c78118618 -->
## Display a Ficheiro of Resolução.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}/ficheiros/{ficheiro}`


<!-- END_e4606509f15659a252a43c7c78118618 -->

<!-- START_f3afba28d20c0eb0ed4b39e7f3e4993d -->
## Update a Ficheiro of Resolução.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}/ficheiros/{ficheiro}`

`PATCH api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}/ficheiros/{ficheiro}`


<!-- END_f3afba28d20c0eb0ed4b39e7f3e4993d -->

<!-- START_8399ae8a5231808ce35cda8acfc825fe -->
## Remove a Ficheiro of Resolução.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/disciplinas/1/eventos-de-avaliacao/1/resolucoes/1/ficheiros/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE api/disciplinas/{disciplina}/eventos-de-avaliacao/{eventos_de_avaliacao}/resolucoes/{resoluco}/ficheiros/{ficheiro}`


<!-- END_8399ae8a5231808ce35cda8acfc825fe -->

#general


<!-- START_4dfafe7f87ec132be3c8990dd1fa9078 -->
## Return an empty response simply to trigger the storage of the CSRF cookie in the browser.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/sanctum/csrf-cookie"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/sanctum/csrf-cookie',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET sanctum/csrf-cookie`


<!-- END_4dfafe7f87ec132be3c8990dd1fa9078 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/login"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/login"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/logout"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/logout',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/register"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/register"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/password/reset"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/password/reset',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/password/email"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/password/email',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/password/reset/1"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/password/reset/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/password/reset"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/password/reset',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_b77aedc454e9471a35dcb175278ec997 -->
## Display the password confirmation view.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/password/confirm"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/password/confirm',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`GET password/confirm`


<!-- END_b77aedc454e9471a35dcb175278ec997 -->

<!-- START_54462d3613f2262e741142161c0e6fea -->
## Confirm the given user&#039;s password.

> Example request:

```javascript
const url = new URL(
    "http://localhost:8000/password/confirm"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/password/confirm',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST password/confirm`


<!-- END_54462d3613f2262e741142161c0e6fea -->


