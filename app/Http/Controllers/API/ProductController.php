<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Get all products
    public function index()
    {
        return response()->json(Product::all(), 200);
    }
    //Post a new Prodect
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
        ]);
        $product = Product::create($validated);
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product,
        ], 201);
    }
}
