# Memória VT - Arquivo do Fórum UOL Jogos

Este projeto é uma aplicação web desenvolvida em Laravel para preservar e visualizar dados históricos do antigo Fórum UOL Jogos. O sistema permite navegar pelos usuários e tópicos do fórum de forma organizada e acessível.

## 📋 Sobre o Projeto

O **Memória VT** é um sistema de arquivo digital que preserva a memória do extinto Fórum UOL Jogos. A aplicação permite:

- Visualizar lista de usuários do fórum com informações como avatar, número de posts e data de cadastro
- Pesquisar usuários por nome
- Navegar pelos tópicos criados por cada usuário
- Acessar links para páginas arquivadas no Wayback Machine

## 🚀 Funcionalidades

### Lista de Usuários
- Exibição de todos os usuários do fórum ordenados por número de posts
- Sistema de busca em tempo real por nome de usuário
- Paginação com 100 usuários por página
- Interface responsiva com cards mostrando avatar, nome, posts e data de cadastro

### Perfil do Usuário
- Visualização detalhada do perfil do usuário
- Lista de todos os tópicos criados pelo usuário
- Links diretos para as páginas arquivadas no Wayback Machine
- Paginação dos tópicos (20 por página)

### Busca e Navegação
- Busca AJAX com debounce para melhor performance
- Navegação por paginação sem recarregar a página
- Interface intuitiva e responsiva

## 🛠️ Tecnologias Utilizadas

- **Laravel 10.x** - Framework PHP
- **PHP 8.1+** - Linguagem de programação
- **MySQL** - Banco de dados
- **Bootstrap** - Framework CSS
- **jQuery** - Biblioteca JavaScript
- **Vite** - Build tool para assets
- **Blade** - Template engine do Laravel

## 📦 Dependências

### Backend (PHP)
- Laravel Framework ^10.10
- Laravel Sanctum ^3.2
- Guzzle HTTP ^7.2
- Carbon ^2.72

### Frontend
- Vite ^4.0.0
- Laravel Vite Plugin ^0.8.0
- Axios ^1.1.2

## 🔧 Instalação

### Pré-requisitos
- PHP 8.1 ou superior
- Composer
- Node.js e npm
- MySQL

### Passos de Instalação

1. **Clone o repositório**
```bash
git clone https://github.com/RafaelAlvesDS/Memoria-VT.git
cd Memoria-VT
```

2. **Instale as dependências PHP**
```bash
composer install
```

3. **Instale as dependências Node.js**
```bash
npm install
```

4. **Configure o ambiente**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure o banco de dados**
Edite o arquivo `.env` com suas configurações de banco de dados:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

6. **Execute as migrações**
```bash
php artisan migrate
```

7. **Compile os assets**
```bash
npm run build
```

8. **Inicie o servidor**
```bash
php artisan serve
```

## 🗄️ Estrutura do Banco de Dados

O projeto utiliza duas tabelas principais:

### `uol_users`
- `Id` - ID único do usuário
- `Nome` - Nome do usuário
- `Avatar` - URL do avatar
- `PostsUOL` - Número total de posts
- `Cadastro` - Data de cadastro (timestamp)

### `uol_threads`
- `Id` - ID único do tópico
- `Titulo` - Título do tópico
- `AutorId` - ID do autor (referência para uol_users)
- `Posts` - Número de posts no tópico

## 🎯 Rotas da Aplicação

| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/` | Página inicial com lista de usuários |
| GET | `/users` | Lista de usuários |
| GET | `/users/threads/{id}` | Tópicos de um usuário específico |
| GET | `/search` | Busca de usuários (AJAX) |

## 🎨 Interface

A aplicação utiliza Bootstrap 4 para uma interface responsiva e moderna:
- Layout em grid para exibição dos usuários
- Cards com avatares e informações
- Sistema de busca com feedback visual
- Paginação estilizada
- Design responsivo para dispositivos móveis

## 🔍 Como Usar

1. Acesse a página inicial para ver a lista de usuários
2. Use a barra de pesquisa para encontrar usuários específicos
3. Clique no avatar ou nome de um usuário para ver seus tópicos
4. Na página de tópicos, clique nos títulos para acessar as páginas arquivadas

## 🤝 Contribuindo

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/MinhaFeature`)
3. Commit suas mudanças (`git commit -m 'Adicionando nova feature'`)
4. Push para a branch (`git push origin feature/MinhaFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👥 Autor

**Rafael Alves** - [RafaelAlvesDS](https://github.com/RafaelAlvesDS)

## 🙏 Agradecimentos

- Comunidade do antigo Fórum UOL Jogos
- Archive.org pelo Wayback Machine
- Todos que contribuíram para preservar essa memória digital

## 📞 Suporte

Se você encontrar algum problema ou tiver sugestões:
- Abra uma [issue](https://github.com/RafaelAlvesDS/Memoria-VT/issues)
- Entre em contato através do GitHub

---

⭐ Se este projeto foi útil para você, considere dar uma estrela no repositório!
