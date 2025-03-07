<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate and create an order
    }

    public function show(Order $order)
    {
        // Show single order details
    }
}