<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lia Parfums</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f8f5f0;
            margin:0;
            padding:0;
            text-align:center;
        }
        h1{
            color:#c9a227;
            margin:30px 0;
        }
        .products{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:20px;
            padding:20px;
        }
        .product{
            background:white;
            padding:15px;
            border-radius:15px;
            box-shadow:0 4px 10px rgba(0,0,0,0.1);
        }
        .product img{
            width:100%;
            height:250px;
            object-fit:cover;
            border-radius:10px;
        }
        .product h3{
            margin:10px 0;
        }
        .price{
            color:#c9a227;
            font-weight:bold;
            font-size:20px;
        }
        .stock{
            color:green;
            margin-bottom:10px;
        }
        button{
            background:#c9a227;
            color:white;
            border:none;
            padding:10px 20px;
            border-radius:8px;
            cursor:pointer;
        }
    </style>
</head>
<body>
<div style="display:flex; justify-content:right; gap:10px; padding:20px;">

    <a href="{{ route('cart') }}">
        <button>🛒 Voir Panier</button>
    </a>

    <a href="{{ route('suivi') }}">
        <button>🔍 Suivi Commande</button>
    </a>

</div>
       <h1>Nos Parfums</h1>

    <div class="products">
        @foreach($produits as $produit)
            <div class="product">
                <img src="{{ asset('images/'.$produit->image) }}" alt="{{ $produit->nom }}">
                <h3>{{ $produit->nom }}</h3>
                <p class="price">{{ $produit->prix }} DH</p>
                <p class="stock">Stock: {{ $produit->stock }}</p>
               @if($produit->stock > 0)

    <a href="{{ route('add.to.cart', $produit->id) }}">
        <button>Acheter</button>
    </a>

@else

    <button style="background:red;" disabled>Rupture de stock</button>

@endif
            </div>
        @endforeach
    </div>

</body>
</html>