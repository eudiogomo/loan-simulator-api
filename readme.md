Loan Simulator API
=======================

Introdução
------------
Esse projeto tem como objetivo realizar a apresentação e o conhecimento relacionada ao desenvolvimento PHP. 
Nesse caso foi utilizado o Laravel 5 para essa finalidade.

O Projeto consiste uma API REST para ser integrada nas aplicações web e mobiles, possibilitando simulações de empréstimos.

Regras da aplicação
---------------------------
+ Rota para retornar as instituições disponíveis (GET)
+ Rota para retornar os convêncios disponíveis (GET)
+ Rota para realizar a simulação de crédito disponível para o cliente (POST)

### Tecnologias usadas
Para o desenvolvimento da aplicação foram utilizados os seguintes recursos:

+ Laravel 5

### Ambiente de Desenvolvimento

+ Visual Studio Code

### Requisitos da Aplicação

+ Git
+ PHP>=7
+ Composer
+ Postman

### Execução da Aplicação
Para realizar o uso da aplicação, basta seguir os seguintes passos:

1. Através do 'prompt command' ou 'git bash', realizar o clone do projeto pelo comando:

        git clone git@github.com:diogomarcos/loan-simulator-api.git loan-simulador-api

2. Com o 'prompt command' ou 'git bash', navegue até a pasta do projeto `loan-simulador-api` e execute os comandos abaixo para 
fazer o download dos requisitos necessários para o funcionamento da aplicação:

        composer install
        composer update

3. Finalizando o passo 2, pelo 'prompt command' ou 'git bash', estando na pasta do projeto `loan-simulador-api` execute 
o comando abaixo para executar a aplicação:

        php artisan serve

5. Abra o Postman e importa a coleção disponível no projeto em `\storage\postman\Loan Simulator API.postman_collection.json`. Feito a importação, você irá conseguir testar a API.
