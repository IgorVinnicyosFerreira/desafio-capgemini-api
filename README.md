# desafio-capgemini-front

## Instalação das bibliotecas composer

```
composer install
```

### Variaveis de ambiente

Crie um arquivo .env na raiz do projeto e copie o valor do .env.example para ele

### Sanctum domain

Neste projeto foi utilizado a biblioteca laravel sanctum para autenticação com cookies, caso seu frontend e backend não estejam entre esses valores de configuração base

```
localhost,localhost:3000,localhost:8080,127.0.0.1,127.0.0.1:8080,127.0.0.1:8000,::1,
```

crie a variavel de ambiente SANCTUM_STATEFUL_DOMAINS no .env e adicione ambos os dominios de front e backend com suas respectivas portas

também verifique seu dominio corresponde ao valor setado na variavel de ambiente SESSION_DOMAIN no arquivo .env

Veja a [Documentação](https://laravel.com/docs/7.x/sanctum#spa-configuration).

### Database

O banco utilizado foi o sqlite, rode as migrations e depois os seeders com as contas de teste

```
php artisan migrate
```

```
php artisan db:seed
```

### Testando a api com clientes http (insomnis, postman ...)

para utilizar as rotas da aplicação com esses serviços é necessário passar um atributo a mais na rota de login, o atributo 'device' com um nome de sua preferencia para o token, caso esse atributo não seja informado o login vai considerar a autenticação com cookies csrf e não com bearer token

### Inicie o servidor local

```
php artisan serve
```
