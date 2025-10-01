<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethod;
use App\Models\OrderDetail;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;

class PaymentDetailController extends Controller
{
    public function index()
    {
        $orderDetail = OrderDetail::all();
        $payments = PaymentDetail::all();
        $deliverys = DeliveryMethod::all();

        return view('order.payment_detail', compact('orderDetail', 'payments', 'deliverys'));
    }
}
