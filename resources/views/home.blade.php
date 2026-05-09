<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lia Parfums</title>
    <style>
        body{
            margin:0;
            font-family:Arial, sans-serif;
            background:linear-gradient(to right,#f8f5f0,#f3e7c9);
            text-align:center;
        }

        .hero{
            padding:120px 20px;
        }

        h1{
            font-size:64px;
            color:#c9a227;
            margin-bottom:10px;
        }

        p{
            font-size:24px;
            color:#444;
            margin-bottom:40px;
        }

        .buttons{
            display:flex;
            justify-content:center;
            gap:20px;
            flex-wrap:wrap;
        }

        button{
            background:#c9a227;
            color:white;
            border:none;
            padding:15px 30px;
            font-size:18px;
            border-radius:12px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            transform:scale(1.05);
        }

        .footer{
            margin-top:80px;
            padding:20px;
            color:#666;
        }
    </style>
</head>
<body>

    <div class="hero">
        <h1>LIA PARFUMS</h1>
        <p>L’élégance. Le luxe. Votre signature.</p>

        <div class="buttons">

            <a href="{{ url('/shop') }}">
                <button>🛍️ Découvrir Nos Parfums</button>
            </a>

            <a href="{{ route('suivi') }}">
                <button>🔍 Suivi Commande</button>
            </a>

            <a href="{{ route('admin') }}">
                <button>👑 Admin</button>
            </a>

        </div>
    </div>

    <div class="footer">
        © 2026 Lia Parfums — Luxury Collection
    </div>

</body>
</html>