<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class BezorgerController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('bezorger.index', compact('orders'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|in:Onderweg,Afgeleverd',
        ]);

        $order->update([
            'status' => $request->input('status'),
        ]);

        if ($order->status === 'Afgeleverd') {
            $order->delete();
        }


        return redirect()->route('bezorger.index');
    }
}
