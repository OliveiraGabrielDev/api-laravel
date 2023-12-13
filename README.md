# API de Usuários com Laravel

Esta API foi desenvolvida utilizando o framework Laravel para fornecer serviços relacionados a usuários. Ela oferece operações básicas de CRUD (Create, Read, Update, Delete) para gerenciar informações de usuários em um sistema.

## Requisitos

- PHP >= 8.1
- Composer 
- Laravel >= 10.10
- Banco de dados compatível com o Laravel (por exemplo, MySQL, PostgreSQL, SQLite)
- Indicado o uso do Postman para verificar as requests

## Instalação

1. Clone o repositório para o seu ambiente local:

    ```bash
    git clone https://github.com/OliveiraGabrielDev/api-laravel.git
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd api-laravel
    ```

3. Instale as dependências do Composer:

    ```bash
    composer install
    ```

4. Copie o arquivo de configuração `.env`:

    ```bash
    cp .env.example .env
    ```

5. Configure o arquivo `.env` com as informações do seu ambiente, especialmente as configurações do banco de dados.

6. Execute as migrações para criar as tabelas no banco de dados:

    ```bash
    php artisan migrate
    ```

7. Execute o seeder DatabaseSeeder para inserir usuarios no seu banco de dados:

    ```bash
    php artisan db:seed --class=DatabaseSeeder
    ```

8. Inicie o servidor de desenvolvimento:

    ```bash
    php artisan serve
    ```

Agora, a API estará acessível em `http://localhost:8000`.

## Rotas

- **GET /api/usuarios**: Retorna todos os usuários cadastrados.
- **GET /api/usuarios/{id}**: Retorna os detalhes de um usuário específico.
- **POST /api/usuarios**: Cria um novo usuário.
- **PUT /api/usuarios/{id}**: Atualiza as informações de um usuário existente.
- **DELETE /api/usuarios/{id}**: Exclui um usuário.

## Estrutura do Projeto

- **app/Http/Controllers/UserController.php**: Controlador que gerencia as operações relacionadas aos usuários.
- **app/Models/User.php**: Modelo que representa a entidade de usuário.
- **database/migrations/**: Arquivos de migração para criar as tabelas no banco de dados.
- **database/seeders/DatabaseSeeder.php**: Arquivo para gerar usuarios aleatorios para os testes.
- **routes/api.php**: Definição das rotas da API.
