<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class CartController extends Controller
{
    public function add($id)
    {
        $produit = Produit::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nom" => $produit->nom,
                "prix" => $produit->prix,
                "image" => $produit->image,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function index()
    {
        return view('cart');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }
}
