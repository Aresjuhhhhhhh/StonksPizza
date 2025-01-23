<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function showSuccessPage()
    {
        // Get the authenticated user
        $user = Auth::user();
        $userInfo = User::where('id', $user->id)->first();
        // Retrieve the latest order for the user
        $order = Order::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();
        $formattedDate = Carbon::parse($order->datum)->format('H:i');

        $orderSummary = OrderItem::with('product', 'grootte', 'ingredients') // Eager load the ingredients
            ->where('order_id', $order->id)
            ->get();

            $user->pizzaPunten += 100;
        $user->save();

        // Pass the order data to the view
        return view('klant.successPagina', compact('order', 'orderSummary', 'userInfo', 'formattedDate'));
    }

    public function cancel(string $id)
    {
        $user = auth()->user();
    
        // Ensure only the owner of the order can cancel it
        $order = Order::where('id', $id)->where('user_id', $user->id)->firstOrFail();
    
        $user->pizzaPunten -= 100;
        $user->save();
        // Delete the order
        $order->delete();
    
        // Flash a success message
        session()->flash('deletemessage', 'Bestelling verwijderd!');
    
        // Redirect back to the previous page
        return view('klant.index');
    }
}
