<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Ingredient;
use App\Models\Pizza;
use Carbon\Carbon;



class MedewerkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ingredientenIndex(){
        $ingredienten = Ingredient::all();
        return view('werknemers.ingredientShow', compact('ingredienten'));
    }
    public function createIngredienten(){
        $ingredienten = Ingredient::all();
        return view('werknemers.ingredientCreate', compact('ingredienten'));
    }
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
    public function edit($id)
    {
        $pizza = Pizza::findOrFail($id);
    
        $ingredients = Ingredient::all(); // This will fetch all ingredients
    
        return view('werknemers.pizzaEdit', compact('pizza', 'ingredients')); // Pass 'ingredients' to the view
    }

    public function pizzaUpdate(Request $request, $id)
    {
        $pizza = Pizza::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string|max:1000',
            'prijs' => 'required|numeric|min:0',
            'afbeelding' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update pizza details
        $pizza->update($validatedData);

        // If an image is uploaded, save it
        if ($request->hasFile('afbeelding')) {
            $originalFileName = $request->file('afbeelding')->getClientOriginalName();
            $destinationPath = public_path('images');
            $request->file('afbeelding')->move($destinationPath, $originalFileName);
            $pizza->update(['imagePath' => $originalFileName]);
        }

        return redirect()->route('werknemers.index')->with('success', 'Pizza updated successfully!');
    }

    public function pizzaDelete($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        $pizzas = Pizza::all();
        return view('werknemers.pizzaShow', compact('pizzas'));
    }

    public function pizzaEdit($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('werknemers.pizzaEdit', compact('pizza'));
    }
    public function showPizzas()
    {
        $pizzas = Pizza::all();

        return view('werknemers.pizzaShow', compact('pizzas'));
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

    public function pizzaToevoegenIndex()
    {
        $user = auth()->user();
        if ($user->Rol === 'klant') {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }

        $Ingredienten = Ingredient::all();

        return view('werknemers.pizzaCreate', compact('user', 'Ingredienten'));
    }

    public function pizzaToevoegen(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string|max:1000',
            'prijs' => 'required|numeric|min:0',
            'afbeelding' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ingredients' => 'nullable|array',
            'ingredients.*' => 'exists:ingredienten,id',
        ]);

        if ($request->hasFile('afbeelding')) {
            $originalFileName = $request->file('afbeelding')->getClientOriginalName();


            $destinationPath = public_path('images');
            $request->file('afbeelding')->move($destinationPath, $originalFileName);

            $afbeeldingNaam = $originalFileName;
        }


        $pizza = Pizza::create([
            'naam' => $validatedData['naam'],
            'beschrijving' => $validatedData['beschrijving'],
            'totaalPrijs' => $validatedData['prijs'],
            'imagePath' => $afbeeldingNaam,
        ]);


        if (!empty($validatedData['ingredients'])) {

            $pizza->ingredienten()->attach($validatedData['ingredients']);
        }

        $pizzas = Pizza::all();

        return view('werknemers.pizzaShow', compact('pizzas'));
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
