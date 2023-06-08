<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Backend Laravel - api's para gerenciamento de tarefas (Avaliação técnica DIMENDES)

## O que é este projeto?
O projeto tem como objetivo disponibilizar api's para gerenciamento de tarefas. Exibir uma lista de tarefas, adicionar uma nova tarefa, editar uma tarefa existente e excluir uma tarefa. Contemplando também paginação de tarefas, filtros de pesquisa e ordenação. Tudo a nível de autenticação de usuário. 

## Pré-requisitos
- PHP >= 7.4
- Composer
- Requer o front-end feito em Vue JS que se comunica com esse backend. Link: https://github.com/walfranp/avaliacao-dimendes-frontend 

## Para rodar este projeto
```bash
$ composer install
$ cp .env.example .env
$ php artisan migrate #antes de rodar este comando verifique sua configuracao com banco em .env
$ php artisan key:generate
$ php artisan passport:install
$ php artisan serve
```
Acesssar pela url: http://localhost:8000
