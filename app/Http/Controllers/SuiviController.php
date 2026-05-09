<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;

class SuiviController extends Controller
{
    public function index()
    {
        return view('suivi');
    }

    public function search(Request $request)
    {
        $commandes = Commande::where('telephone', $request->telephone)->latest()->get();

        return view('suivi', compact('commandes'));
    }
}