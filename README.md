# Sistema de Gerenciamento de Ordens de Serviço (SGOS)

## Descrição

O Sistema de Gerenciamento de Ordens de Serviço (SGOS) é uma aplicação web desenvolvida com Laravel para gerenciar clientes, serviços e ordens de serviço. Este sistema permite o cadastro e gerenciamento de clientes, criação e acompanhamento de ordens de serviço, e administração de serviços oferecidos.

## Funcionalidades

- Cadastro e gerenciamento de clientes
- Cadastro e gerenciamento de serviços
- Criação e acompanhamento de ordens de serviço
- Dashboard com visão geral das atividades
- Relatórios de serviços realizados

## Requisitos

- PHP 8.1 ou superior
- Composer
- MySQL
- Node.js e NPM

## Instalação

1. Clone o repositório:
   ```
   git clone https://github.com/seu-usuario/sgos.git
   ```

2. Entre no diretório do projeto:
   ```
   cd sgos
   ```

3. Instale as dependências do PHP:
   ```
   composer install
   ```

4. Copie o arquivo de ambiente e configure suas variáveis:
   ```
   cp .env.example .env
   ```

5. Gere a chave da aplicação:
   ```
   php artisan key:generate
   ```

6. Configure o banco de dados no arquivo .env

7. Execute as migrações:
   ```
   php artisan migrate
   ```

8. Instale as dependências do frontend:
   ```
   npm install && npm run dev
   ```

9. Inicie o servidor:
   ```
   php artisan serve
   ```

## Uso

Após a instalação, acesse a aplicação através do navegador em `http://localhost:8000`. Você poderá criar uma conta de usuário ou fazer login se já tiver uma conta.

## Contribuição

Contribuições são bem-vindas! Por favor, sinta-se à vontade para submeter pull requests.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).