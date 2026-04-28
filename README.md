# Gerenciador de Tarefas em PHP

Projeto acadêmico de um gerenciador de tarefas simples, desenvolvido com PHP, PostgreSQL e Bootstrap 5.

## 🛠️ Tecnologias Utilizadas
- **Linguagem:** PHP (Procedural)
- **Banco de Dados:** PostgreSQL
- **Frontend:** Bootstrap 5 (via CDN)

## ⚙️ Como executar o projeto localmente

1. Clone este repositório.
2. Coloque a pasta do projeto dentro do diretório do seu servidor web (ex: `htdocs` no XAMPP).
3. Certifique-se de que a extensão `pdo_pgsql` está ativada no seu `php.ini`. (Projeto Ultilizou Postgre4)
4. Crie um banco de dados chamado `tarefas` no PostgreSQL (pgAdmin).
5. Execute o script SQL localizado em `database/script.sql` para criar as tabelas.
6. Edite o arquivo `conexao.php` com as credenciais do seu PostgreSQL (usuário e senha).
7. Acesse no navegador: `http://localhost/projeto-tarefas`

### 🔑 Usuário de Teste
- **Usuário:** admin
- **Senha:** 123456