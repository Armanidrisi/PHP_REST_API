# PHP REST API

🚀 This repository contains a basic implementation of a RESTful API using Core PHP. The API allows users to perform CRUD (Create, Read, Update, Delete) operations on a simple database table.

![License](https://img.shields.io/github/license/Armanidrisi/PHP_REST_API?style=flat-square) ![Repo Size](https://img.shields.io/github/repo-size/Armanidrisi/PHP_REST_API?style=flat-square) ![Last Commit](https://img.shields.io/github/last-commit/Armanidrisi/PHP_REST_API?style=flat-square)

## 🛠️ Installation

1. Clone the repository: `git clone https://github.com/Armanidrisi/PHP_REST_API.git`
2. Import the `database.sql` file into your MySQL database.
3. Update the database credentials in the `config.php` file.
4. Start the PHP development server: `php -S localhost:8000`

## 🚀 Usage

The API supports the following endpoints:

### GET /api/todos/read.php

Retrieve a list of all todos.

### GET /api/todos/readbyid.php?id={id}

Retrieve a single Todo by ID.

### POST /api/todos/create.php

Create a new todo. Request body should be in JSON format and include the following fields:
- `title`: string
- `description`: string

### PUT /api/todos/update.php?id={id}

Update an existing Todo by ID. Request body should be in JSON format and include the following fields:
- `title`: string
- `description`: string

### DELETE /api/todos/delete.php?id={id}

Delete an existing Todo by ID.

## 📝 License

This project is licensed under the MIT License - see the `LICENSE` file for details.

## ✍️ Author

[![Telegram Badge](https://img.shields.io/badge/-Mohd%20Arman%20Idrisi-blue?style=flat-square&logo=Telegram&logoColor=white&link=https://t.me/Mohd_arman_idrisi01)](https://t.me/Mohd_arman_idrisi01)

This project was created by Mohd Arman Idrisi. Feel free to reach out and connect!
