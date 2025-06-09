# 📚 API Documentation

**Base URL:** `https://your-domain.com/api` *(or `http://localhost:8000/api` for local development)*  
**Authentication:** All routes are protected with `auth:sanctum` middleware.

---

## Endpoints

### 🧑‍💻 Users

| Method | Endpoint          | Description           | Body Parameters (POST/PUT) |
|--------|-------------------|-----------------------|---------------------------|
| GET    | `/users`          | List all users        | —                         |
| GET    | `/users/{id}`     | Retrieve a user       | —                         |
| POST   | `/users`          | Create a new user     | `name`, `email`, `password`, etc. |
| PUT    | `/users/{id}`     | Update a user         | `name`, `email`, etc.     |
| DELETE | `/users/{id}`     | Delete a user         | —                         |

---

### 🛒 Cart

| Method | Endpoint            | Description                   | Body Parameters (POST/PUT) |
|--------|---------------------|-------------------------------|---------------------------|
| GET    | `/cart`             | List all cart items            | —                         |
| POST   | `/cart`             | Add a product to the cart      | `user_id`, `product_id`, `quantity` |
| PUT    | `/cart/{item_id}`   | Update a cart item             | `user_id`, `product_id`, `quantity` *(optional)* |
| DELETE | `/cart/{item_id}`   | Remove a cart item             | —                         |

---

### 📦 Products

| Method | Endpoint              | Description           | Body Parameters (POST/PUT) |
|--------|-----------------------|-----------------------|---------------------------|
| GET    | `/products`           | List all products     | —                         |
| GET    | `/products/{id}`      | Retrieve a product    | —                         |
| POST   | `/products`           | Create a new product  | `name`, `description`, `price`, `stock_quantity`, etc. |
| PUT    | `/products/{id}`      | Update a product      | `name`, `description`, `price`, `stock_quantity`, etc. |
| DELETE | `/products/{id}`      | Delete a product      | —                         |

---

### 📝 Orders

| Method | Endpoint              | Description           | Body Parameters (POST/PUT) |
|--------|-----------------------|-----------------------|---------------------------|
| GET    | `/orders`             | List all orders       | —                         |
| GET    | `/orders/{id}`        | Retrieve an order     | —                         |
| POST   | `/orders`             | Create a new order    | `user_id`, `total_price`, `status`, etc. |
| PUT    | `/orders/{id}`        | Update an order       | `user_id`, `total_price`, `status`, etc. |
| DELETE | `/orders/{id}`        | Delete an order       | —                         |

---

### 🗂️ Categories

| Method | Endpoint               | Description            | Body Parameters (POST/PUT) |
|--------|------------------------|------------------------|---------------------------|
| GET    | `/categories`          | List all categories    | —                         |
| GET    | `/categories/{id}`     | Retrieve a category    | —                         |
| POST   | `/categories`          | Create a new category  | `name`, `description`     |
| PUT    | `/categories/{id}`     | Update a category      | `name`, `description`     |
| DELETE | `/categories/{id}`     | Delete a category      | —                         |

---

### 📦 Order Items

| Method | Endpoint                | Description               | Body Parameters (POST/PUT) |
|--------|-------------------------|---------------------------|---------------------------|
| GET    | `/order-items`          | List all order items      | —                         |
| GET    | `/order-items/{id}`     | Retrieve an order item    | —                         |
| POST   | `/order-items`          | Create an order item      | `order_id`, `product_id`, `quantity`, `price` |
| PUT    | `/order-items/{id}`     | Update an order item      | `order_id`, `product_id`, `quantity`, `price` |
| DELETE | `/order-items/{id}`     | Delete an order item      | —                         |

---

## Notes

✅ All requests must include header:  
`Authorization: Bearer {token}` (when using Sanctum authentication)

✅ All responses are in JSON format.

✅ Validation errors return HTTP 422 with details.

✅ Required fields are enforced by validation rules in each Controller.

---




