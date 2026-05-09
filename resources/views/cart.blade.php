<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
    <style>
        body{
            font-family:Arial;
            background:#f8f5f0;
            padding:30px;
        }

        h1{
            text-align:center;
            color:#c9a227;
        }

        .cart-item{
            background:white;
            margin:15px auto;
            padding:15px;
            width:80%;
            border-radius:12px;
            box-shadow:0 4px 10px rgba(0,0,0,0.1);
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .total{
            text-align:center;
            font-size:24px;
            margin-top:30px;
            color:#c9a227;
        }

        button{
            background:red;
            color:white;
            border:none;
            padding:8px 14px;
            border-radius:8px;
            cursor:pointer;
        }

        .checkout{
            display:block;
            width:200px;
            margin:30px auto;
            text-align:center;
            background:#c9a227;
            color:white;
            padding:12px;
            border-radius:10px;
            text-decoration:none;
        }
    </style>
</head>
<body>

<h1>Mon Panier</h1>

<?php $total = 0; ?>

@if(session('cart'))
    @foreach(session('cart') as $id => $details)

        <?php $total += $details['prix'] * $details['quantity']; ?>

        <div class="cart-item">
            <div>
                <h3>{{ $details['nom'] }}</h3>
                <p>{{ $details['prix'] }} DH x {{ $details['quantity'] }}</p>
            </div>

            <a href="{{ route('remove.from.cart', $id) }}">
                <button>Supprimer</button>
            </a>
        </div>

    @endforeach
@endif

<div class="total">
    Total: {{ $total }} DH
</div>

<a href="/shop" class="checkout">Continuer achats</a>
<a href="{{ route('checkout') }}" class="checkout">Passer au Checkout</a>

</body>
</html>