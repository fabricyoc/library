<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Requisitos do projeto

- [Composer v2.5.1](https://getcomposer.org/download/).
- [PHP v8.1.2](https://www.php.net/).
- [MySQL v8.0.31](https://www.mysql.com/).
- [Node.js v8.19.3](https://nodejs.org/).

## Tecnologias utilizadas

- [Laravel v9.x](https://laravel.com/docs/9.x).
- [Laravel Mix v6.0](https://laravel-mix.com/).
- [Tailwind CSS v3.2.4](https://tailwindcss.com/).

## Para rodar o projeto

```bash
# Clone este repositório
$ git clone https://github.com/fabricyoc/library

# Acesse a pasta do projeto no terminal
$ cd library

# Dentro da pasta library, faça uma cópia do .env.example e nomeie de .env
$ cp .env.example .env

# No arquivo .env, vamos realizar as seguintes alterações
APP_URL=http://localhost:8000 
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha

# Criação do banco de dados
$ mysql -u usuario -p senha
mysql> create database nome_do_banco;

# Instalar as dependências do projeto
$ composer install

# Criando a chave
$ php artisan key:generate

# Populando o banco de dados
$ php artisan migrate --seed

# Instalando o npx para rodar o laravel-mix
sudo npm install npx

# Execução dos servidores
$ php artisan serve
$ npx mix watch

# No navegador, acesse <http://localhost:8000>
```
