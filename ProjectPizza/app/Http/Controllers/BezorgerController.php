<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class BezorgerController extends Controller
{
    public function index()
    {
        // Your logic to retrieve active orders
        $orders = Order::where('status', 'Klaar voor ophalen')->get();

        return view('bezorger.index', compact('orders'));
    }

    public function update(Request $request, Order $order)
    {
        // Validate the request data
        $request->validate([
            'status' => 'required|string|in:Onderweg,Afgeleverd',
        ]);

        // Update the order status
        $order->update([
            'status' => $request->input('status'),
        ]);

        // Redirect back with a success message
        return redirect()->route('bezorger.index');
    }
}
