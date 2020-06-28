# Company API

## Introduction

This project is a simple API where you can manage company, department and employee items which uses Laravel framework

## Prerequisite

1. MySQL
2. Composer
3. PHP

## Install

Create .env file in root of the project and copy the variables base on .env.example

Fill out the database information in the .env

Open a terminal in the project root and run the following code to migrate the tables and user credentials in the provided database:

```
php artisan migrate
php artisan db:seed
```