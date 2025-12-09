# 🐘 Meu Pet Sumiu

Projeto desenvolvido na disciplina de Técnicas de Programação 1 da Fatec de Jahu.

## 🚀 Instalação usando Docker

Este projeto funciona inteiramente dentro de containers, sem necessidade de instalar PHP, Composer ou MySQL na máquina. O ambiente completo sobe com um único comando.

---

## 📦 1. Pré-requisitos

Antes de iniciar, certifique-se de ter instalado:

- **Docker**
- **Docker Compose**

Verifique rapidamente:

```bash
docker -v
docker compose version
```

## 🏗️ 2. Subindo o ambiente

Após clonar o repositório, entre na pasta do projeto e execute:

```bash
docker compose up -d --build
```

O Docker irá:

- Criar o container PHP/Apache com Composer embutido.
- Subir o container MySQL.
- Importar automaticamente o arquivo **dba.sql** na primeira inicialização.
- Disponibilizar o projeto no navegador.

Acesse:

```bash
http://localhost:8080
```

---

## 🐬 3. Banco de dados automático

O arquivo **dba.sql** é carregado automaticamente quando o container do MySQL sobe pela primeira vez, criando o banco **meu_pet_sumiu** e suas tabelas.

Para resetar o banco e forçar nova importação:

```bash
docker compose down -v
docker compose up --build
```

---

## ⚙️ 4. Variáveis de ambiente

Crie o arquivo `.env` na raiz do projeto usando o `.env.example` como base.

Exemplo:

```bash
DB_USER=meu_pet_sumiu
DB_PASSWORD=meu_pet_sumiu123
DB_HOST=db
DB_NAME=meu_pet_sumiu
```

---

## 📁 5. Instalação de dependências PHP

O Composer já está disponível dentro do container.

Para instalar dependências:

```bash
docker compose exec app composer install
```

Para atualizar:

```bash
docker compose exec app composer update
```

---

## 🧰 6. Tecnologias utilizadas

- PHP 8.5 + Apache
- Composer
- MySQL 8
- PHPMailer
- phpdotenv
- mpdf

---

## 🧑‍💻 Desenvolvimento

Qualquer alteração nos arquivos do projeto é refletida automaticamente no container, pois a pasta é montada como volume.

---

## 🐘 Meu Pet Sumiu
