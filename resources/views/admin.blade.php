<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<h1>👑 Admin Dashboard</h1>

@if(session('success'))
    <div style="background:green; color:white; padding:15px; border-radius:10px; margin-bottom:20px; text-align:center;">
        {{ session('success') }}
    </div>
@endif

<!-- 📊 Dashboard Cards -->
<div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:20px; margin-bottom:30px;">

    <!-- 📦 Produits -->
    <a href="#liste-produits" style="text-decoration:none;">
        <div style="background:#c9a227; color:white; padding:20px; border-radius:15px; text-align:center; cursor:pointer;">
            <h2>{{ $totalProduits }}</h2>
            <p>📦 Produits</p>
        </div>
    </a>

    <!-- 🛒 Commandes -->
    <a href="#liste-commandes" style="text-decoration:none;">
        <div style="background:blue; color:white; padding:20px; border-radius:15px; text-align:center; cursor:pointer;">
            <h2>{{ $totalCommandes }}</h2>
            <p>🛒 Commandes</p>
        </div>
    </a>

    <!-- 🚚 Livrées -->
    <a href="#liste-livrees" style="text-decoration:none;">
        <div style="background:green; color:white; padding:20px; border-radius:15px; text-align:center; cursor:pointer;">
            <h2>{{ $totalLivrees }}</h2>
            <p>🚚 Livrées</p>
        </div>
    </a>

</div>

<!-- 🔓 Logout -->
<div style="text-align:center; margin-bottom:20px;">
    <a href="{{ route('admin.logout') }}">
        <button style="background:red; color:white; padding:10px 20px; border:none; border-radius:8px;">
            Logout
        </button>
    </a>
</div>

<!-- ➕ Ajouter Produit -->
<div style="background:white; padding:20px; border-radius:15px; margin-bottom:30px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

    <h2>➕ Ajouter Produit</h2>

    <form action="{{ route('admin.add.product') }}" method="POST">
        @csrf

        <input type="text" name="nom" placeholder="Nom du parfum" required style="width:100%; padding:10px; margin:8px 0;">

        <input type="number" name="prix" placeholder="Prix" required style="width:100%; padding:10px; margin:8px 0;">

        <input type="text" name="image" placeholder="Nom image (ex: prada.jpg)" required style="width:100%; padding:10px; margin:8px 0;">

        <input type="number" name="stock" placeholder="Stock" required style="width:100%; padding:10px; margin:8px 0;">

        <button type="submit" style="background:#c9a227; color:white; border:none; padding:12px 20px; border-radius:8px;">
            Ajouter
        </button>
    </form>

</div>

<!-- 📦 Liste Produits -->
<div style="background:white; padding:20px; border-radius:15px; margin-bottom:30px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

    <h2 id="liste-produits">📦 Liste Produits</h2>

    <form method="GET" action="{{ route('admin') }}" style="margin-bottom:20px;">

        <input 
            type="text" 
            name="search" 
            placeholder="🔍 Rechercher un produit..." 
            value="{{ $search ?? '' }}"
            style="width:70%; padding:12px; border:1px solid #ccc; border-radius:8px;"
        >

        <button 
            type="submit"
            style="background:#c9a227; color:white; border:none; padding:12px 20px; border-radius:8px;"
        >
            Rechercher
        </button>

    </form>

    @foreach($produits as $produit)

        <div style="border-bottom:1px solid #ddd; padding:15px 0;">

            <p><b>{{ $produit->nom }}</b></p>

            <p>💰 Prix: {{ $produit->prix }} DH</p>

            <p>🖼️ Image: {{ $produit->image }}</p>

            <form action="{{ route('admin.update.stock', $produit->id) }}" method="POST" style="margin:10px 0;">
                @csrf

                <input type="number" name="stock" value="{{ $produit->stock }}" required style="padding:8px; width:120px;">

                <button type="submit" style="background:orange; color:white; border:none; padding:8px 15px; border-radius:8px;">
                    Modifier Stock
                </button>
            </form>

            <a href="{{ route('admin.delete.product', $produit->id) }}">
                <button style="background:red; color:white; border:none; padding:8px 15px; border-radius:8px;">
                    Supprimer
                </button>
            </a>

        </div>

    @endforeach

</div>

<!-- 🛒 Liste Commandes -->
<div style="background:white; padding:20px; border-radius:15px; margin-bottom:30px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

    <h2 id="liste-commandes">🛒 Commandes</h2>

    @foreach($commandes as $commande)

        <div style="border-bottom:1px solid #ddd; padding:20px 0;">

            <p><b>Client:</b> {{ $commande->nom }}</p>

            <p><b>Téléphone:</b> {{ $commande->telephone }}</p>

            <p><b>Adresse:</b> {{ $commande->adresse }}</p>

            <p><b>Statut:</b> {{ $commande->statut }}</p>

            <p><b>Produits commandés:</b></p>

            <ul>
                @foreach($commande->details as $detail)
                    <li>
                        {{ $detail->produit->nom ?? 'Produit supprimé' }}
                        (x{{ $detail->quantite }})
                    </li>
                @endforeach
            </ul>

            <div style="margin-top:10px;">
                <a href="{{ route('admin.status', [$commande->id, 'Acceptée']) }}">
                    <button style="background:green; color:white; border:none; padding:8px 12px; border-radius:8px;">Acceptée</button>
                </a>

                <a href="{{ route('admin.status', [$commande->id, 'En livraison']) }}">
                    <button style="background:orange; color:white; border:none; padding:8px 12px; border-radius:8px;">En livraison</button>
                </a>

                <a href="{{ route('admin.status', [$commande->id, 'Livrée']) }}">
                    <button style="background:blue; color:white; border:none; padding:8px 12px; border-radius:8px;">Livrée</button>
                </a>

                <a href="{{ route('admin.status', [$commande->id, 'Refusée']) }}">
                    <button style="background:red; color:white; border:none; padding:8px 12px; border-radius:8px;">Refusée</button>
                </a>
            </div>

        </div>

    @endforeach

</div>

<!-- 🚚 Liste Livrées -->
<div style="background:white; padding:20px; border-radius:15px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

    <h2 id="liste-livrees">🚚 Commandes Livrées</h2>

    @foreach($commandes->where('statut', 'Livrée') as $commande)

        <div style="border-bottom:1px solid #ddd; padding:15px 0;">

            <p><b>{{ $commande->nom }}</b> — {{ $commande->telephone }}</p>

            <ul>
                @foreach($commande->details as $detail)
                    <li>
                        {{ $detail->produit->nom ?? 'Produit supprimé' }}
                        (x{{ $detail->quantite }})
                    </li>
                @endforeach
            </ul>

        </div>

    @endforeach

</div>