![](http://dealersites.com.br/assets/images/logo_black.png)

# Dealer Sites - Teste Técnico Developer


A aplicação desenvolvida seguindo requisitos enviados por e-mail em 04/12/2020 possui as seguintes características:


[**Aplicação pode ser acessada clicando aqui.**](http://191.252.182.30:8000 "Acessar a aplicação")


- Ambiente de desenvolvimento provisionado em com Docker;
- Banco de dados MariaDB 10.5.6;
- Projeto desenvolvido em PHP, usando o framework Laravel 8;
- Tabelas criadas usando migrations;
- A estrutura do banco (UML) criada com MySQL Workbench está junto ao projeto;
- O banco de dados foi populado utilizando Seeders e os dados foram criados aleatoriamente usando a biblioteca Faker. Users com 8.000 registros e Users_acess com 18.000 registros;
- O frontend foi desenvolvido usando o framework VueJS e compilado com Vue Cli.
- Foi usado o framework para estilização do front-end Vuetify;
- Toda a aplicação é 100% responsiva;
- Foi implementada uma API Restful com autenticação via token no header. Para obter o token o usuário deve se autenticar informando o login e a senha a seguir:
`teste@dealersites.com.br` e `DealerSites@2020`;
- Os filtros, ordenação, carregamento e paginação desenvolvidos buscam as informações na API usando Axios e passando o token no header;
- Todo código do frontend (HTML, CSS e JavaScript) estão na pasta /resources/frontend/app;
- O código do frontend foi compilado usando o Vue Cli, onde o código HTML está no arquivo /resources/views/app.blade.php e os assets (CSS e JavaScript) na pasta /public;
- Caso queira executar o frontend usando Vue Cli use os seguintes comandos:
`cd resources/frontend/app/`, `npm install` para baixar as dependências e `npm run serve` para subir a aplicação;
- Efetuiei o deploy da aplicação para uma VPS e caso queiram [a aplicação pode ser acessada clicando aqui.](http://191.252.182.30:8000 "Acessar a aplicação")


### Como executar o projeto:

**Baixando arquivos**

- Clone ou faça o download do projeto;

`$ git clone https://github.com/higorrezend/teste-tecnico-developer.git`

- Se optar por fazer o download, extraia seu conteúdo em uma pasta;

Para executar o projeto você pode utilizar o  [Docker](https://www.docker.com/ "Docker") ou instalar o PHP e o MySQL em seu computador.

**Executando com Docker:**

- Dentro da pasta do projeto execute o seguinte comando para iniciar os containers da aplicação:

`docker-compose up -d`

- O Docker irá instalar todos os recursos necessários e iniciar a aplicação através da porta 8000.

- Em seguida execute o seguinte comando para criar as tabelas e popular o banco de dados:

`docker-compose exec app php artisan migrate:fresh --seed`

- Ao término da execução destes comandos o projeto estará em execução. Para acessá-lo [clique aqui](http://localhost:8000).

**Executando manualmente:**

Caso opte pela instalação manual, deverá ter instalados em seu ambiente os seguintes itens:
- PHP 7.3 ou superior;
- MySQL ou MariaDB.

Uma vez que o ambiente atenda aos requisitos acima, siga os seguintes passos:

- Acesse o banco de dados e crie uma nova database com o nome "dealer_sites_project";

- Insira no arquivo .env do projeto os dados de acesso ao banco de dados, como no exemplo abaixo:
    
	DB_CONNECTION=mysql
	DB_HOST=localhost
	DB_PORT=3306
	DB_DATABASE=dealer_sites_project
	DB_USERNAME={Usuário}
	DB_PASSWORD={Senha}
	

- Acesse a pasta do projeto por um terminal de sua preferência (Se estiver usando Windows, pode usar o CMD);

- Execute o seguinte comando para criar as tabelas e popular o banco de dados: 
`php artisan migrate:fresh --seed`

- Finalmente, execute o seguinte comando para subir a aplicação:
`php artisan serve`

- Ao concluir, acesse a aplicação clicando aqui: [clique aqui](http://localhost:8000).

