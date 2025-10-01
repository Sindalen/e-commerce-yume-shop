<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // public function index()
    // {
    //     $customerId = Auth::guard('customer')->id();

    //     // Get orders for the current customer with their items and products
    //     $orders = OrderDetail::where('customer_id', $customerId)
    //         ->with(['items' => function ($query) {
    //             $query->with(['product' => function ($query) {
    //                 $query->with('discount');
    //             }]);
    //         }])
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     return view('.components.profile.history', compact('orders'));
    // }

    public function index()
    {
        $customerId = Auth::guard('customer')->id();
        
        $orders = OrderDetail::where('customer_id', $customerId)
            ->with(['items.product.discount'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('.components.profile.history', compact('orders'));
    }
}
