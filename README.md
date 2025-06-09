# 🛍️ BookTime E-Commerce API

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg?logo=laravel)](https://laravel.com/)  
[![PHP](https://img.shields.io/badge/PHP-8.x-blue.svg?logo=php)](https://www.php.net/)  

A simple and modular RESTful API for managing an e-commerce platform, built with **Laravel**, running inside **Docker** with **Laravel Sail**.

---

## 🚀 Project Description

This project provides the backend API for an e-commerce system, featuring:
- User management
- Product catalog
- Shopping cart
- Order processing
- Category management
- Order items

All resources follow RESTful conventions and are protected via token-based authentication (Laravel Sanctum).

---

## ✨ Features

✅ RESTful API architecture  
✅ Authentication via Sanctum  
✅ CRUD operations for all main entities: Users, Products, Cart, Orders, Categories, Order Items  
✅ Modular and clean structure  
✅ Runs inside Docker containers  
✅ Developed on **WSL (Ubuntu)**  
✅ Includes phpMyAdmin for DB management  
✅ Easy start with custom command `startbooktime`  

---

## 🗂️ Technologies Used

- PHP 8.x
- Laravel 10.x
- Laravel Sail (Docker-based Laravel environment)
- Docker & Docker Compose
- Laravel Sanctum (for API authentication)
- MySQL
- phpMyAdmin
- Composer
- WSL (Ubuntu) for development environment

---

## 🏗️ Project Structure

```txt
app/Http/Controllers/          --> API Controllers
app/Models/                    --> Eloquent Models
routes/api.php                 --> Main API routes
routes/UserRoute.php           --> User routes
routes/ProductRoute.php        --> Product routes
routes/OrderRoute.php          --> Order routes
routes/CartRoute.php           --> Cart routes
routes/CategoryRoute.php       --> Category routes
routes/OrderItemRoute.php      --> Order Item routes
resources/views/               --> (not used for API-only app)
public/                        --> Public assets
config/                        --> Global configurations
storage/                       --> Logs, uploads, etc.
bootstrap/                     --> Framework bootstrap files
````

---

## ⚙️ How to Run Locally

### Prerequisites

* Docker & Docker Compose installed
* WSL (Ubuntu) configured
* Laravel Sail installed (already included in the project)

### Start the Project

Use the custom command `startbooktime`:

```bash
startbooktime
```

You will see:

```
Avvio dei container Docker con Sail...
[+] Running 3/3
 ✔ Container booktime-app-mysql-1         Running
 ✔ Container booktime-app-laravel.test-1  Running
 ✔ Container booktime-app-phpmyadmin-1    Running
Entrando nel container Laravel (sail shell)...
sail@xxxxxx:/var/www/html$
```

You are now inside the running Laravel container!

### Run migrations

```bash
php artisan migrate
```

### (Optional) Seed the database

```bash
php artisan db:seed
```

### Access the API

* API base URL: [http://localhost](http://localhost)
* phpMyAdmin: [http://localhost:8080](http://localhost:8080)

---

## 🛡️ Authentication

* This API uses **Laravel Sanctum** for token-based authentication.
* To access protected endpoints, include the following header:

```http
Authorization: Bearer YOUR_API_TOKEN
```

---

## 📚 API Documentation

Full API details can be found in [API\_DOCUMENTATION.md](./API_DOCUMENTATION.md).

---

## 🌟 Future Improvements

Here are some possible enhancements planned for future versions:

* ✅ Implement advanced filtering and search for Products and Orders
* ✅ Add API Rate Limiting for better security and performance
* ✅ Implement Role-based Authorization (Admin, User)
* ✅ Add support for discount codes and promotions
* ✅ Unit & Feature testing with PHPUnit and Laravel test suite
* ✅ Add Swagger/OpenAPI documentation (auto-generated)
* ✅ CI/CD pipeline (GitHub Actions / GitLab CI)
* ✅ Deployment to cloud (AWS / DigitalOcean / other)
* ✅ Implement Event/Listener architecture for order processing
* ✅ Create API versioning system (v1, v2, etc.)

---

## 🤝 Contributing

Feel free to fork this project and submit pull requests. Contributions are welcome!

---

## 📝 License

This project is open-source and available under the [MIT License](LICENSE).

---

