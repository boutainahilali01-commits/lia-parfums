<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi Commande</title>
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

        form{
            width:50%;
            margin:20px auto;
            background:white;
            padding:20px;
            border-radius:15px;
            box-shadow:0 4px 10px rgba(0,0,0,0.1);
        }

        input{
            width:100%;
            padding:12px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:8px;
        }

        button{
            width:100%;
            background:#c9a227;
            color:white;
            border:none;
            padding:12px;
            border-radius:8px;
            cursor:pointer;
        }

        .commande{
            width:60%;
            margin:20px auto;
            background:white;
            padding:20px;
            border-radius:15px;
            box-shadow:0 4px 10px rgba(0,0,0,0.1);
        }

        .status{
            color:#c9a227;
            font-weight:bold;
        }
    </style>
</head>
<body>

<h1>🔍 Suivi de votre commande</h1>

<form action="{{ route('suivi.search') }}" method="POST">
    @csrf
    <input type="text" name="telephone" placeholder="Entrez votre téléphone" required>
    <button type="submit">Rechercher</button>
</form>

@if(isset($commandes))

    @foreach($commandes as $commande)

        <div class="commande">
            <h3>Commande #{{ $commande->id }}</h3>

            <p><b>Nom:</b> {{ $commande->nom }}</p>
            <p><b>Adresse:</b> {{ $commande->adresse }}</p>
            <p><b>Téléphone:</b> {{ $commande->telephone }}</p>

            <p class="status">Statut: {{ $commande->statut }}</p>
        </div>

    @endforeach

@endif

</body>
</html>

