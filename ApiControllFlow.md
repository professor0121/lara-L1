# 📘 Laravel API Control Flow with Authentication

This document outlines the control flow of a Laravel API project with authentication, including routing, controller logic, models, middleware, and database interaction.

---

## 🧠 High-Level Architecture (MVC)

```mermaid
graph TD
  Client -->|HTTP Request| Route
  Route --> Controller
  Controller -->|Calls| Model
  Model -->|Query| Database[(DB)]
  Controller -->|Response| Client
```

## 🔐 Authenticated API Flow
```mermaid
sequenceDiagram
    participant Client
    participant API
    participant Middleware
    participant Controller
    participant Model
    participant DB

    Client->>API: Request /api/products (GET)
    API->>Middleware: Check Auth Token
    Middleware-->>API: Pass if valid
    API->>Controller: Call ProductController@index
    Controller->>Model: Product::all()
    Model->>DB: Query products table
    DB-->>Model: Data
    Model-->>Controller: Products list
    Controller-->>Client: JSON Response
```

## 🔐 Authentication System (Laravel Sanctum)
```mermaid
flowchart TD
    A[Login API /login] --> B[Auth Controller]
    B --> C[Validate Credentials]
    C --> D[Generate Token]
    D --> E[Return Token to Client]

    F[Client includes Token in Headers] --> G[Middleware Auth Check]
    G --> H[Allow or Reject API Access]
```

## 🔄 API Request Lifecycle
```mermaid
sequenceDiagram
    participant Client
    participant Route
    participant Middleware
    participant Controller
    participant Model
    participant DB

    Client->>Route: Request (POST/GET)
    Route->>Middleware: Runs auth/api middleware
    Middleware->>Controller: Passes request
    Controller->>Model: Call Eloquent logic
    Model->>DB: Run SQL query
    DB-->>Model: Data result
    Model-->>Controller: Return records
    Controller-->>Client: JSON response
```

## 📦 File & Class Structure
```mermaid
graph TD
  A[Route]
  B[AuthController]
  C[ProductController]
  D[Product Model]
  E[Migration: create_products_table]
  F[Factory: ProductFactory]

  A --> B
  A --> C
  C --> D
  D --> E
  D --> F
```

## Login Flow
```mermaid 
sequenceDiagram
    Client->>AuthController: POST /login
    AuthController->>User Model: attemptLogin()
    User Model->>DB: Check email/password
    DB-->>User Model: Match found
    User Model->>AuthController: Success
    AuthController->>Sanctum: createToken()
    AuthController-->>Client: Auth Token
```