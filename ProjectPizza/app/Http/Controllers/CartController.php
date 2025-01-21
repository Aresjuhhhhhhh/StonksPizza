<?php

namespace App\Http\Controllers;

use App\Models\ExtraIngredientWinkelmandje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Winkelmandje;
use App\Models\Ingredient;
use App\Models\Bestelregel;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pizza;


class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $winkelmandjes = Winkelmandje::with([
            'product',
            'grootte',
            'extraIngredients.ingredient'
        ])->where('user_id', $user->id)->get();

        // Bereken het totaalbedrag
        $totaalPrijs = $winkelmandjes->sum(function ($winkelmandje) {
            return $winkelmandje->totaalPrijs();
        });

        // Bereken het totaalbedrag voor alleen de factor kosten
        $factorKosten = $winkelmandjes->sum(function ($winkelmandje) {
            return $winkelmandje->factorKosten();
        });

        $UserInfo = User::where('id', $user->id)->first();

        return view('klant.bestelling', compact('winkelmandjes', 'totaalPrijs', 'factorKosten', 'UserInfo'));
    }

    public function placeOrder(Request $request)
    {
        // Retrieve the current authenticated user
        $user = auth()->user();

        // Check if the user has an adres and woonplaats
        if (is_null($user->adres) || is_null($user->woonplaats)) {
            return redirect('/profiel')->withErrors([
                'message' => 'U moet uw adres en woonplaats toevoegen voordat u een bestelling kunt plaatsen.',
            ]);
        }

        // Retrieve the total price and delivery option from the form
        $totaalPrijs = $request->input('totaal_prijs');
        $deliveryOption = $request->input('delivery_option');

        // Create a new order record
        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'pending', // Set the initial status to pending
            'bestelmethode' => $deliveryOption,
            'datum' => now(),
            'totaal_prijs' => $totaalPrijs,
        ]);

        // Retrieve the user's winkelmandje
        $winkelmandje = Winkelmandje::where('user_id', $user->id)->get();

        if ($winkelmandje->isEmpty()) {
            return redirect()->route('klant.winkelmandje')->withErrors(['message' => 'Winkelmandje is leeg.']);
        }

        // Loop through each item in the winkelmandje
        foreach ($winkelmandje as $item) {
            // Create the order item
            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'grootte_id' => $item->grootte_id,
                'quantity' => $item->quantity,
                'winkelmandje_id' => $item->id,
            ]);

            // Retrieve extra ingredients for this item
            $extraIngredients = ExtraIngredientWinkelmandje::where('winkelmandje_id', $item->id)->get();

            // Attach each extra ingredient to the order item
            foreach ($extraIngredients as $extra) {
                $orderItem->ingredients()->attach($extra->ingredient_id, [
                    'quantity' => $item->quantity,
                ]);
            }
        }

        // Clear the winkelmandje and associated extra ingredients
        foreach ($winkelmandje as $item) {
            ExtraIngredientWinkelmandje::where('winkelmandje_id', $item->id)->delete();
            $item->delete();
        }

        // Redirect to success page
        return redirect()->route('klant.successPagina')->with('order', $order);
    }











}
