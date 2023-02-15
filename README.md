<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o projeto

Este projeto é um exercício proposto com o intuito de desenvolver uma CRUD simples utilizando Laravel 9.x

## Como rodar o projeto

Após baixar o repositório, para rodar o projeto, primeiro precisamos utilizar o XAMPP Control Painel com o Apache e MySQL iniciados.

<img src="./public/images/xamp.png" alt="xampp">

Criar o banco de dados "crud_candidates"(pode ser outro nome mas será preciso alterar o nome do banco de dados no arquivo .env), pode ser feito utilizando o PHPMyAdmin. Em seguida, abrir o terminal para migrar as tabelas no banco de dados utilizando o comando "php artisan migrate":

<img src="./public/images/migrate.png" alt="migrate">

Em seguida, executar o comando: "php artisan serve" para o servidor rodar localmente

<img src="./public/images/terminal.png" alt="terminal">

Acessando então a URL para o localhost, você terá acesso a tela inicial do projeto.

<img src="./public/images/welcome.png" alt="welcome">

## Navegando sobre o projeto

Ao clicar em "Go to CRUD", você terá acesso a CRUD desenvolvida neste projeto.(obs: lembre-se de estar com o apache e o mysql)

<img src="./public/images/index.png" alt="index">

### Adicionando novo candidato

Ao clicar em "Add New Candidate", você será redirecionado para o forms onde preencherá as informações referentes ao candidato.

<img src="./public/images/create.png" alt="create">

Ao selecionar o estado, as cidades do referente estado aparecerão no select de cidade abaixo:

<img src="./public/images/cities.png" alt="cities">

Preenchido e adicionado, o candidato será enviado para o BD, onde será listado no index:

<img src="./public/images/create-filled.png" alt="create-filled">

<img src="./public/images/new-index.png" alt="new-index">

### Ver candidato

Ao clicar em "See", você será redirecionado para a página do candidato onde serão mostrados os dados referentes ao mesmo.

<img src="./public/images/see.png" alt="see">

### Editando candidato

Ao clicar em editar, você será redirecionado para o forms no qual poderá atualizar os dados referentes ao candidato escolhido.

<img src="./public/images/edit.png" alt="edit">

Pós atualizado, o participante terá seus dados modificados e listados novamente no index.

<img src="./public/images/edit-updated.png" alt="edit-updated">

### Excluindo candidato

Na imagem acima, o botão "Delete" está disponível para excluir o candidato, o candidato será excluido do registro do BD e consequentemente, da lista.

Confirmar delete:

<img src="./public/images/confirm-delete.png" alt="confirm-delete">

Nova lista de candidatos pós exclusão.

<img src="./public/images/delete-updated.png" alt="delete-updated">

### Links úteis

- PHP: https://www.php.net/downloads
- Composer: https://getcomposer.org/
- MySQL: https://dev.mysql.com/downloads/mysql/
- Xampp Control Panel: https://www.apachefriends.org/download.html


### Observações

Tanto na lista do index como após clicar em "See", os botões para "Edit" ou "Delete" estão disponíveis, assim como "Back" caso você deseje voltar ou "Cancel", caso queira cancelar a edição.