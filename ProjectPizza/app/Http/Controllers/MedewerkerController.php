<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;



class MedewerkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->Rol === 'klant') {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }

        // Fetch all orders
        $orders = Order::all();

        foreach ($orders as $order) {
            $order->formattedDatum = Carbon::parse($order->datum)->format('H:i');
        }
        // Fetch associated order items, including the related models
        $orderItems = OrderItem::with('product', 'grootte', 'ingredients')->get();

        return view('werknemers.index', compact('user', 'orders', 'orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();
        if ($user->Rol === 'klant') {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }
    
        // Fetch the specific order by ID
        $order = Order::findOrFail($id);
    
        // Format the 'datum' for the specific order
        $formattedDate = Carbon::parse($order->datum)->format('H:i');
    
        // Fetch associated order items for this specific order, including related models
        $orderItems = $order->orderItems()->with('product', 'grootte', 'ingredients')->get();
    
        return view('werknemers.show', compact('user', 'order', 'formattedDate', 'orderItems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        if ($user->Rol === 'klant') {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }
    
        // Find the order by ID
        $order = Order::findOrFail($id);
    
        // Update the status
        $order->status = $request->input('status');
        $order->save();

        
        session()->flash('message', 'Status bijgewerkt!');
        return redirect()->route('medewerker.index', ['order' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
    
        if ($user->Rol === 'klant') {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }
    
        // Find the order by ID and delete it
        $order = Order::findOrFail($id);
        $order->delete();
    
        session()->flash('message', 'Bestelling verwijderd!');
        return redirect()->route('medewerker.index');
    }
}
