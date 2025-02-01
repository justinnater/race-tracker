# Race Tracker
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=Laravel&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=Vite&logoColor=white)
![Vue.js](https://img.shields.io/badge/Vue.js-4FC08D?style=for-the-badge&logo=Vue.js&logoColor=white)
![TypeScript](https://img.shields.io/badge/TypeScript-007ACC?style=for-the-badge&logo=TypeScript&logoColor=white)



This project is a demo for managing track records, displaying race car lap times in a table & interactive grid (pun intended).


## 🚗 About the Project

This project is a demo for managing track records, displaying race car lap times in a table & interactive grid (pun intended).

Users can:

- View and add lap times of different race cars.
- Switch to track mode to see an interactive visualization of the cars moving along a race circuit layout for comparison. 


This project is built with Laravel (backend) and Vue.js + TypeScript (frontend), using Vite for fast development.

Unit and Feature tests are included.

The API is built following the [JSON API](https://jsonapi.org/) specification.

[Zod](https://zod.dev/) is used on the frontend for validating responses from the API at runtime.


## ⚡ Installation & Setup
Ensure you have PHP 8.3+ and Composer installed.

`composer install` \
`cp .env.example .env` \
`php artisan key:generate` 

Run tests (Feature & Unit)

`php artisan test`

The default database is SQLite, but you can change it in the `.env` file.

`php artisan migrate:fresh --seed`

Frontend (Vue.js & Vite)

Make sure you have Node.js (v18+) and npm installed.

`npm install`

Start both the Laravel server and the Vite server:

`composer run dev`

Access the app Locally at `http://localhost:5173/`

