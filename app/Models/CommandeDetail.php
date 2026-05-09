<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeDetail extends Model
{
    use HasFactory;

    protected $table = 'commande_details';

    protected $fillable = [
        'commande_id',
        'produit_id',
        'quantite'
    ];

    public function produit()
    {
        return $this->belongsTo(\App\Models\Produit::class, 'produit_id');
    }

    public function commande()
    {
        return $this->belongsTo(\App\Models\Commande::class, 'commande_id');
    }
}
