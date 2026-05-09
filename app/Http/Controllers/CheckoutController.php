<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\CommandeDetail;
use App\Models\Produit;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function store(Request $request)
    {
        $commande = Commande::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'statut' => 'En attente'
        ]);

        $cart = session()->get('cart', []);

        foreach($cart as $id => $details){

            CommandeDetail::create([
                'commande_id' => $commande->id,
                'produit_id' => $id,
                'quantite' => $details['quantity']
            ]);

            $produit = Produit::find($id);

            if($produit){
                $produit->stock -= $details['quantity'];
                $produit->save();
            }
        }

        session()->forget('cart');

        return redirect('/')->with('success', 'Commande confirmée avec succès');
    }
}
