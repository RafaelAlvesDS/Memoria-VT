# Memória VT

Arquivo navegável do antigo Fórum UOL Jogos. Lista os usuários e os tópicos que cada um criou, com busca, e cada tópico leva para a cópia guardada no Wayback Machine.

Feito em Laravel 10.

## O que tem

- Lista de usuários por número de posts, com avatar, posts e data de cadastro. 100 por página.
- Busca de usuário por nome, feita por AJAX enquanto você digita.
- Perfil do usuário com os tópicos que ele abriu, 20 por página, cada um apontando para a página arquivada.
- Lista geral de tópicos (`/threads`) e busca global (`/global-search`) que procura em usuários e em títulos de tópicos.

## Dados

O projeto lê duas tabelas, `uol_users` e `uol_threads`. **O dump não está no repositório** e não tem migration para essas tabelas, então elas precisam ser importadas no MySQL. As colunas usadas pelo código são:

- `uol_users`: `Id`, `Nome`, `Avatar`, `PostsUOL` e `Cadastro` (timestamp em milissegundos)
- `uol_threads`: `Id`, `Titulo`, `Posts` e `AutorId`, além da coluna que as telas usam para montar o link do Wayback

## Rodar

Precisa de PHP 8.1+, Composer, Node e MySQL.

```
composer install
cp .env.example .env
php artisan key:generate
```

Ajuste `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD` no `.env`, importe as tabelas e então:

```
npm install
npm run build     # ou npm run dev, durante o desenvolvimento
php artisan serve
```

## Rotas

| rota | o que mostra |
|---|---|
| `/`, `/users` | usuários |
| `/users/threads/{id}` | tópicos de um usuário |
| `/threads` | todos os tópicos |
| `/search` | busca de usuários (usada pelo AJAX) |
| `/global-search` | busca em usuários e tópicos |
