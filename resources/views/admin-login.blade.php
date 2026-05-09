<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body{
            font-family:Arial;
            background:#f8f5f0;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .login-box{
            background:white;
            padding:40px;
            border-radius:15px;
            box-shadow:0 4px 15px rgba(0,0,0,0.1);
            width:350px;
        }

        h1{
            text-align:center;
            color:#c9a227;
            margin-bottom:25px;
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
            padding:12px;
            border-radius:8px;
            cursor:pointer;
            font-size:16px;
        }

        .error{
            color:red;
            text-align:center;
            margin-bottom:10px;
        }
    </style>
</head>
<body>

<div class="login-box">

    <h1>👑 Admin Login</h1>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>

        <button type="submit">Connexion</button>
    </form>

</div>

</body>
</html>