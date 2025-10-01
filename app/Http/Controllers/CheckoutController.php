<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\DeliveryMethod;
use App\Models\OrderDetail;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $customerId = Auth::guard('customer')->id();
        $payments = PaymentDetail::all();
        $deliverys = DeliveryMethod::all();

        $cartitems = CartItem::where('customer_id', $customerId)
            ->with('Product.Discount')
            ->get();

        return view('order.checkout', compact('cartitems', 'deliverys', 'payments'));
    }

    public function add(Request $request)
    {
        $customerId = Auth::guard('customer')->id();

        $validated = $request->validate([
            'delivery_id' => 'required|exists:delivery_methods,id',
            'payment_method_id' => 'required|exists:payment_details,id',
            // 'delivery_date' => 'required|date',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $cartItems = CartItem::where('customer_id', $customerId)->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'No items in cart.');
        }

        // Calculate subtotal (consider quantity)
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Get selected delivery method and determine shipping cost
        $selectedDelivery = DeliveryMethod::find($validated['delivery_id']);
        $shippingCost = ($selectedDelivery && $selectedDelivery->delivery_name === 'Delivery') ? 2.00 : 0.00;

        DB::transaction(function () use ($customerId, $validated, $subtotal, $cartItems, $shippingCost) {
            $order = OrderDetail::create([
                'customer_id' => $customerId,
                'total_amount' => $subtotal + $shippingCost,
                'delivery_id' => $validated['delivery_id'],
                'payment_method_id' => $validated['payment_method_id'],
                // 'delivery_date' => $validated['delivery_date'],
                'phone_number' => $validated['phone_number'],
                'address' => $validated['address'],
            ]);

            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'size' => $cartItem->size,
                    'color' => $cartItem->color,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->price,
                ]);
            }

            // Clear cart after placing the order
            CartItem::where('customer_id', $customerId)->delete();
        });

        return redirect('/checkout')->with('success', 'Order placed successfully!');
    }
}
