# Projeto Integrado Segundo Semestre - Grupo 5 (Moto Lazer)

_**Sistema de Gerenciamento Moto Lazer**_

_**Para mais informações sobre a empresa responsável pelo projeto, consulte o arquivo [`empresa/README.md`](empresa/README.md).**_

## Visão Geral
O objetivo principal é criar uma solução que simplifique e otimize os processos operacionais, como agendamento de serviços, controle de estoque de peças e acompanhamento do histórico de veículos dos clientes.

## Autores
- Miran Romeiro
- Caio Beteghelli
- Julio Marsola
- Diogo Aureliano

## Funcionalidades
- Permitir a visualização dos produtos e serviços oferecidos pela empresa
- Permitir a realização de um login exclusivo para funcionários
- Permitir o gerenciamento de estoque (Visualização de produto, adição, remoção e alteração)
- Permitir agendamento de serviços
- Consultar histórico de serviços
- Controle de vendas

## Tecnologias
- PHP
- MySQL

## Melhorias Futuras

As seguintes funcionalidades estão sendo planejadas para implementação nas próximas fases do projeto:
- Implementar sugestor de produtos no estoque, baseado nos dados
- Criar uma funcionalidade de gerenciamento de serviço (controlar status do serviço, associar produtos, funcionários e atualizar banco de dados com os produtos utilizados)
- Criar uma funcionalidade de vendas (para casos de venda no varejo, sem ligação com serviço)
- Implementar acessibilidade

---

## Como Rodar o Projeto

Siga os passos abaixo para rodar o projeto localmente:

1. **Preparar o Ambiente**  
   Certifique-se de que você possui o [XAMPP](https://www.apachefriends.org/index.html) instalado. Ele será utilizado para rodar o servidor local e o banco de dados MySQL.

2. **Mover o Projeto para a Pasta `htdocs`**  
   - Copie a pasta do projeto e cole-a no diretório `htdocs` do XAMPP. Por padrão, esse diretório está localizado em:  
     - Windows: `C:\xampp\htdocs`
     - Linux: `/opt/lampp/htdocs`

3. **Iniciar os Serviços do XAMPP**  
   - Abra o painel de controle do XAMPP.
   - Inicie os módulos `Apache` e `MySQL`.

4. **Criar o Banco de Dados**  
   - Acesse o [phpMyAdmin](http://localhost/phpmyadmin/) no navegador.  
   - Crie um banco de dados com o nome desejado (ex.: `moto_lazer`).  
   - Execute o script SQL para criar as tabelas: **[`script_moto_lazer.sql`](script_moto_lazer.sql)**.
   - - Crie um usuário no banco de dados e garanta os acessos necessários. Para isso:  
     - Selecione o banco de dados criado no phpMyAdmin.  
     - Acesse a aba "SQL" e execute os seguintes comandos:  
       ```sql
       CREATE USER 'user'@'localhost' IDENTIFIED BY 'senha';
       GRANT ALL PRIVILEGES ON nome_do_banco.* TO 'user'@'localhost';
       FLUSH PRIVILEGES;
       ```
     - Substitua `'user'` e `'senha'` pelo nome de usuário e senha que desejar. 

5. **Configurar o Projeto**  
   - Caso necessário, edite o arquivo de configuração do banco de dados para refletir o nome do banco, usuário e senha do MySQL.  
     ```php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'moto_lazer');
     define('DB_USER', 'root');
     define('DB_PASSWORD', '');
     ```

6. **Acessar a Página Inicial**  
   - No navegador, acesse o seguinte endereço:  
     ```
     http://localhost/pi-grupo-5/src/views/home
     ```

7. **Realizar o Login**  
   - Utilize as credenciais cadastradas para fazer login. Se não houver um usuário padrão, certifique-se de adicionar um diretamente no banco de dados (exemplo: `nome: admin`, `senha: 123`).

---

