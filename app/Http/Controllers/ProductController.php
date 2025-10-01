<?php

namespace App\Http\Controllers;

// use App\Models\CartItem;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductVariation;
use App\Models\Discount;
use App\Models\ShoppingSession;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('in_stock', true)->with('ProductCategory')->get();
        $categories = ProductCategory::all();
        $discounts = Discount::all();

        return view('home', compact('products', 'categories', 'discounts'));
    }

    public function shop()
    {
        $products = Product::where('in_stock', true)->with('ProductCategory')->get();
        $categories = ProductCategory::all();

        return view('shop', compact('products', 'categories'));
    }

    public function promotion()
    {
        $products = Product::where('discount_id', '>', '0')->whereNotIn('discount_id', [4])->with('Discount')->get();
        $categories = ProductCategory::all();
        $discounts = Discount::all();

        return view('promotion', compact('products', 'categories', 'discounts'));
    }

    // public function cart()
    // {
    //     $products = Product::where('in_stock', true)->get();
    //     $cartitems = CartItem::all();
    //     $session = ShoppingSession::all();

    //     return view('cart', compact('cartitems', 'session', 'products'));
    // }

    public function show($id)
    {
        $product = Product::with('ProductCategory', 'Discount')->findOrFail($id);
        $variations = ProductVariation::where('product_id', $id)->get();
        // $cartitems = CartItem::with('Product')->findOrFail($id);
        return view('product_detail', compact('product', 'variations'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|min:2',
        ]);

        $query = $request->input('query');
        
        $products = Product::where('description', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->orWhereHas('ProductCategory', function($q) use ($query) {
                $q->where('description', 'like', "%$query%");
            })
            ->where('in_stock', true)
            ->paginate(12)
            ->withQueryString();

        return view('.components.search', compact('products', 'query'));
    }
}
