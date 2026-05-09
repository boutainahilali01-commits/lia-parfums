<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
{
    if(!session('admin_logged_in')){
        return redirect('/admin-login');
    }
    
    $commandes = Commande::with('details.produit')->latest()->get();

    $search = $request->search;

    $produits = \App\Models\Produit::when($search, function($query) use ($search){
        return $query->where('nom', 'like', "%{$search}%");
    })->latest()->get();

    $totalProduits = \App\Models\Produit::count();
     $totalCommandes = \App\Models\Commande::count();
     $totalLivrees = \App\Models\Commande::where('statut', 'Livrée')->count();

  return view('admin', compact(
    'commandes',
    'produits',
    'search',
    'totalProduits',
    'totalCommandes',
    'totalLivrees'
));
}
public function updateStatus($id, $statut)
{
    if(!session('admin_logged_in')){
        return redirect('/admin-login');
    }

    $commande = Commande::with('details')->findOrFail($id);

    // رجوع stock إذا ترفضات ومكانتش مرفوضة قبل
    if($statut === 'Refusée' && $commande->statut !== 'Refusée'){

        foreach($commande->details as $detail){

            $produit = \App\Models\Produit::find($detail->produit_id);

            if($produit){
                $produit->stock += $detail->quantite;
                $produit->save();
            }
        }
    }

    $commande->statut = $statut;
    $commande->save();

    return redirect()->back()->with('success', 'Statut mis à jour');
}



        public function addProduct(Request $request)
{
    if(!session('admin_logged_in')){
        return redirect('/admin-login');
    }

    \App\Models\Produit::create([
        'nom' => $request->nom,
        'prix' => $request->prix,
        'image' => $request->image,
        'stock' => $request->stock
    ]);

    return redirect()->back()->with('success', 'Produit ajouté avec succès');
}
public function deleteProduct($id)
{
    if(!session('admin_logged_in')){
        return redirect('/admin-login');
    }

    $produit = \App\Models\Produit::findOrFail($id);
    $produit->delete();

    return redirect()->back()->with('success', 'Produit supprimé avec succès');
}
public function updateStock(Request $request, $id)
{
    if(!session('admin_logged_in')){
        return redirect('/admin-login');
    }

    $produit = \App\Models\Produit::findOrFail($id);

    $produit->stock = max(0, $request->stock);
    $produit->save();

return redirect()->back()->with('success', 'Stock mis à jour');
}

}
