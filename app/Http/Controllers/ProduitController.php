<?php

namespace App\Http\Controllers;

use App\Models\Produit;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('shop', compact('produits'));
    }
}
