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

## End points:

##### API de Login: (POST) /api/login 
```bash
{
    "email": "usuario@email.com",
    "password": "123456"
}
```
##### API de Logout: (POST) /api/logout 
```bash
{
}
```
#### API para registrar um novo usuário: (POST) /api/user/register
```bash
{
    "nome": "Usuario da Silva",
    "email": "usuario@email.com",
    "password": "123456"
}
```
##### API para registrar uma nova task: (POST) /api/task/register
```bash
{
    "title": "Task exemplo",
    "description": "Task exemplo para teste..."
}
```
##### API para alterar uma task: (PUT) /api/task/update
```bash
{
    "id": "1",
    "title": "Task exemplo alterada",
    "description": "Task exemplo para teste alterada"
}
```
##### API para listar tasks com paginação: (GET) /api/task/get?per_page=5&page=1&search=&filter=2
```bash
{
}
```
##### API para prazer uma task pelo Id: (GET) /api/task/get/3
```bash
{
}
```
##### API para excluir uma task pelo Id: (DELETE) /api/task/delete/3
```bash
{
}
```

