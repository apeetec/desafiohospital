# 🏥 Sistema de Cadastro Hospitalar

Este projeto é um sistema simples de cadastro de usuários com perfis, desenvolvido em PHP e MySQL. Ele simula parte de um sistema hospitalar, com funcionalidades básicas de autenticação e gerenciamento de dados.

## 📁 Estrutura do Projeto

- `index.php`: Página inicial do sistema (possivelmente login).
- `cadastros.php`: Tela ou script responsável pelo cadastro de usuários ou perfis.
- `hospital.sql`: Dump completo da base de dados já com dados de exemplo.
- `queryHospital.sql`: Script para criação e consulta inicial das tabelas `tab_perfil` e `tab_usuario`.

## 🧱 Funcionalidades

- Cadastro de usuários com login e senha.
- Associação de usuários a perfis (relacionamento via chave estrangeira).
- Estrutura de banco de dados com integridade referencial.

## 🗄️ Estrutura do Banco de Dados

### Tabelas

#### `tab_perfil`
- `per_codigo` (PK)
- `per_descricao`

#### `tab_usuario`
- `usu_codigo` (PK)
- `per_codigo` (FK para `tab_perfil`)
- `usu_nome`
- `usu_senha` (criptografada)
- `usu_login_acesso`

## ▶️ Como Executar

1. Clone este repositório:
   ```bash
   git clone https://github.com/seu-usuario/desafioHospital.git

