# Codement

## Pré Requisitos

Para Windows:

[XAMPP](https://www.apachefriends.org/index.html)

[Composer](https://getcomposer.org/)

[NodeJS LTS](https://nodejs.org/en/)

PHP adicionado como variável de ambiente do Windows, tutoriais [aqui](https://stackoverflow.com/questions/10753024/how-to-access-the-command-line-for-xampp-on-windows/46408671#46408671), ou [aqui](https://www.java.com/pt_BR/download/help/path.xml), ou [aqui](https://pt.stackoverflow.com/questions/5024/como-mudar-o-path-nos-windows)

Geralmente o caminho para o executável de PHP é `C:\xampp\php`, mas irá depender se usaram o caminho por defeito de instalação, modificaram ou por algum outro motivo está situado noutra localização.

## Como Instalar

Primeiro é necessário instalar o *Laravel Instaler* pelo Composer, ou seja, pelo terminal de linha de comandos executar `composer global require laravel/installer`.

Depois, no mesmo terminal de linha de comandos, executa `npm install` para instalar todos os *packages* do NodeJS.

Cria uma cópia do `.env.example` que se situa na pasta inicial e muda o nome para `.env`.

Depois, no mesmo terminal executa `php artisan key:generate` para gerar a chave de encriptação do Laravel.

Abre o XAMPP e clica `start` em ambos o Apache e o MySQL para poder gerir as base de dados.

No `http://localhost/phpmyadmin/` cria uma nova base de dados chamada `codement`.

Depois, no mesmo terminal executa `php artisan migrate` para importar todas as tabelas da base de dados.

## Como executar

Abre o XAMPP e clica `start` no MySQL para o *backend* poder conectar-se à base de dados.

É necessário 2 terminais de linha de comandos, um para correr o *backend* que deverá estar sempre correr em produção ou durante desenvolvimento, e outro para automáticamente compilar o *frontend* automáticamente que é só necessário para desenvolvimento do *frontend*.

Num terminal executa `php artisan serve`, o servidor estará disponível no URL que o terminal mencionar.

Se for para desenvolvimento do frontend, executa no outro terminal `npm run watch`.

## Frontend

Os ficheiros de frontend estão situados em `resources\js`, é feito em [VueJS](https://vuejs.org/), para adicionarem uma nova página podem criar um novo ficheiro em `resources\js\views` por exemplo `login.vue` e depois no ficheiro `resources\js\router.ts` importem a página nas primeiras linhas do ficheiro, por exemplo, `import LoginPage from "./views/login.vue"` e mais abaixo no `routes`, adicionem por exemplo o seguinte código:

```js
{
    path: '/login',
    name: 'login',
    component: LoginPage
}
```

Mais informação sobre encaminhamento de páginas pode ser visualizado [aqui](https://router.vuejs.org/guide/)

## Backend

Os modelos estão situados em `app`, os controladores e recursos estão todos situados em `app\Http`, os endpoints estão situados em `routes\api.php` e podem ser consultados por `php artisan route:list`, ou na documentação situada em `public\docs\index.html` arrastando o ficheiro para o browser, ou pela coleção do postman em `public\docs\collection.json`
