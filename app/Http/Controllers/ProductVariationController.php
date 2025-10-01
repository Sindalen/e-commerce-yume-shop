<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductVariation;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductVariationController extends Controller
{
    public function index()
    {
        $variations = ProductVariation::with('Product')->get(); // Use 'Product' instead of 'product'
        $products = Product::all();
        $categories = ProductCategory::all();

        return view('product_detail', compact('variations', 'products', 'categories'));
    }
    
}
