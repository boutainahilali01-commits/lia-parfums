<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body{
            font-family:Arial;
            background:#f8f5f0;
            padding:30px;
        }

        form{
            width:50%;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 4px 15px rgba(0,0,0,0.1);
        }

        h1{
            text-align:center;
            color:#c9a227;
        }

        input{
            width:100%;
            padding:12px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:8px;
        }

        button{
            width:100%;
            background:#c9a227;
            color:white;
            border:none;
            padding:14px;
            border-radius:10px;
            cursor:pointer;
            font-size:18px;
        }
    </style>
</head>
<body>

<h1>Finaliser votre commande</h1>

<form action="{{ route('checkout.store') }}" method="POST">
    @csrf

    <input type="text" name="nom" placeholder="Votre nom" required>
    <input type="text" name="adresse" placeholder="Votre adresse" required>
    <input type="text" name="telephone" placeholder="Votre téléphone" required>

    <button type="submit">Confirmer la commande</button>
</form>

</body>
</html>