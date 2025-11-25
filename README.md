# 🏟️ Arena360 – Sistema de Gestão de Arena Esportiva

Bem-vindo ao repositório do meu projeto acadêmico **Arena360**!

Este é um sistema web completo desenvolvido para o gerenciamento de **clientes**, **quadras**, **vendas** e **reservas** em uma arena esportiva. O foco principal deste projeto foi a aplicação prática da arquitetura **MVC (Model, View, Controller)** em um ambiente PHP.

---

## 💻 Tecnologias Utilizadas

O projeto foi construído utilizando uma stack focada em PHP e MySQL:

* **PHP 8+:** Linguagem principal para toda a lógica de *backend* e controle (Controllers).
* **MySQL / MariaDB:** Banco de dados relacional para gerenciar todas as entidades (Clientes, Quadras, Reservas, Vendas).
* **HTML5, CSS3 e JavaScript:** Utilizados para a estruturação da interface e interações dinâmicas.
* **XAMPP / Apache:** Ambiente de desenvolvimento local (Servidor Web + BD).

---

## ⚙️ Arquitetura e Estrutura

O sistema emprega uma arquitetura **MVC Simples**, separando as responsabilidades de forma clara, o que facilita a manutenção e a expansão.

### 📂 Estrutura de Diretórios

O sistema segue a arquitetura **MVC Simples**, com a seguinte organização:

Arena360/ │ ├── assets/ # Arquivos estáticos (imagens, etc.) ├── css/ # Folhas de estilo ├── js/ # Scripts JavaScript │ ├── Controller/ # Responsável por gerenciar o fluxo da aplicação. │ ├── ClienteController.php │ ├── QuadraController.php │ ├── VendaController.php │ └── ReservaController.php │ ├── Model/ # Lógica de negócio e acesso ao banco (CRUDs, entidades e conexão). │ ├── Cliente.php │ ├── Quadra.php │ ├── Venda.php │ ├── Reserva.php │ └── Conexao.php │ ├── View/ # Interface do usuário (HTML com PHP embarcado). │ ├── cliente/ # Telas de cadastro/listagem de clientes │ ├── quadra/ # Telas de cadastro/listagem de quadras │ ├── venda/ # Telas de vendas │ └── reserva/ # Telas de reservas/agenda │ ├── banco.sql # Script para criação do banco de dados e tabelas └── index.php # Ponto de entrada central da aplicação
---

## ✨ Funcionalidades do Sistema

O sistema cobre as principais operações de gestão necessárias para uma arena esportiva:

### 1. Clientes e Quadras (CRUD Completo)
* **Clientes:** Cadastro, Edição, Listagem e Exclusão.
* **Quadras:** Cadastro de diferentes tipos de quadras (Futebol Society, Vôlei, Basquete, etc.).

### 2. Gestão de Reservas
* **Agendamento de Horários:** Permite ao operador agendar um horário, associando um **Cliente** e uma **Quadra** específica.
* **Controle de Disponibilidade:** Garante que uma quadra não possa ser reservada em um horário já ocupado, mantendo a integridade dos dados de agendamento.
    * *(Status: Em Atualização)*

### 3. Módulo de Vendas
* **Registro de Transações:** Permite registrar vendas avulsas de produtos (bebidas, lanches, etc.).
* **Associação:** Possibilidade de associar uma venda a um **Cliente** e a uma **Quadra** específica, facilitando o controle financeiro.
    * *(Status: Em Desenvolvimento)*

---

## 🚀 Instalação e Execução

### 1. Clone ou Baixe o Projeto

Coloque a pasta `Arena360` no diretório do seu servidor local (Ex: `C:\xampp\htdocs\Arena360`).

### 2. Configuração do Banco de Dados

1.  Acesse o **phpMyAdmin**.
2.  Crie um novo banco de dados chamado: `arena360`.
3.  Importe o script SQL contido no arquivo **`banco.sql`** na raiz do projeto.

### 3. Ajuste de Conexão

Verifique e ajuste as credenciais no arquivo **`Model/Conexao.php`** se for necessário (o padrão é para XAMPP):

```php
// Model/Conexao.php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "arena360";
