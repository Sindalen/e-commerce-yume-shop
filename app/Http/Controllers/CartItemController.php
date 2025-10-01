<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Discount;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ShoppingSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    public function index()
    {
        $customerId = Auth::guard('customer')->id();

        $cartitems = CartItem::where('customer_id', $customerId)
            ->with('Product.Discount')
            ->get();

        $products = Product::where('in_stock', true)->get();
        
        $session = ShoppingSession::all();

        return view('order.cart', compact('cartitems', 'session', 'products'));
    }

    public function add(Request $request)
    {
        $product = Product::with('Discount')->findOrFail($request->product_id);

        // Get unit price (with discount if available)
        $unitPrice = $product->discount
            ? $product->price - ($product->price * $product->Discount->discount_percent / 100)
            : $product->price;

        $quantity = (int) $request->quantity;
        $totalPrice = $unitPrice * $quantity;

        CartItem::create([
            'customer_id' => auth('customer')->id(),
            'product_id' => $product->id,
            'size' => $request->size,
            'color' => $request->color,
            'quantity' => $quantity,
            'price' => $totalPrice, // Save total price here
        ]);

        return redirect('/cart')->with('success', 'Product added to cart.');
    }


    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return response()->json(['success' => true]);
    }   
    
    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // Get the product with discount info
        $product = Product::with('Discount')->findOrFail($cartItem->product_id);
        
        // Calculate the unit price
        $unitPrice = $product->discount
            ? $product->price - ($product->price * $product->Discount->discount_percent / 100)
            : $product->price;

        $quantity = (int) $request->quantity;
        $totalPrice = $unitPrice * $quantity;

        $cartItem->update([
            'quantity' => $quantity,
            'price' => $totalPrice
        ]);

        return response()->json([
            'success' => true,
            'unitPrice' => $unitPrice,
            'totalPrice' => $totalPrice
        ]);
    }
    public function show($id)
    {
        $cartitems = CartItem::where('product_id', $id)->get();
        $cartitems = CartItem::with('Product', 'ShoppingSession')->findOrFail($id);
        $product = Product::with('ProductCategory', 'Discount')->findOrFail($id);

        return view('order.cart', compact('cartitems', 'product'));
    }
}
