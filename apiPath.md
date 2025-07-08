
# 🚀 Laravel Product CRUD – Step-by-Step Guide

## ✅ Step 1: Generate Product Model, Migration, Factory
```sh
php artisan make:model Product -mf
```
This command creates:
- `app/Models/Product.php`  
- `database/migrations/xxxx_xx_xx_create_products_table.php`  
- `database/factories/ProductFactory.php`  

---

## ✅ Step 2: Define the Product Table Schema  
Edit the migration file:  
📄 `database/migrations/xxxx_xx_xx_create_products_table.php`

---

## ✅ Step 3: Run Migrations
```sh
php artisan migrate
```

---

## ✅ Step 4: Enable Mass Assignment  
In `app/Models/Product.php`, add:
```php
protected $fillable = ['name', 'price', 'description']; // update with your fields
```

---

## ✅ Step 5: Create Product Controller
```sh
php artisan make:controller API/ProductController
```

---

## ✅ Step 6: Add Controller Logic  
Edit the controller:  
📄 `app/Http/Controllers/API/ProductController.php`

---

## ✅ Step 7: Define API Routes  
Edit:  
📄 `routes/api.php`
```php
use App\Http\Controllers\API\ProductController;

Route::apiResource('products', ProductController::class);
```
