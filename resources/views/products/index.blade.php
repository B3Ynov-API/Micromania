@extends('layouts.backend')

@section('content')
    <div class="text-center">
        <a href="{{ route('products.create') }}" class="btn btn-primary mx-auto">Ajouter un produit</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mx-5">
        <form method="GET" action="{{ route('products.index') }}" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search" name="searchName"
                value="{{ request()->searchName }}">
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search"
                name="searchPriceMin" value="{{ request()->searchPriceMin ? request()->searchPriceMin : 0 }}">
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search"
                name="searchPriceMax" value="{{ request()->searchPriceMax ? request()->searchPriceMax : 9999 }}">
            <select name="searchCategory">
                <option value=''>Choisissez une catégorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request()->searchCategory == $category->id ? 'selected' : '' }}>
                        {{ $category->description }}</option>
                @endforeach
            </select>
            <select name="searchPegi">
                <option value="">Choisissez un pegi</option>
                @foreach ($pegis as $pegi)
                    <option value="{{ $pegi->id }}" {{ request()->searchPegi == $pegi->id ? 'selected' : '' }}>
                        {{ $pegi->name }}</option>
                @endforeach
            </select>
            <select name="searchGenre">
                <option value=''>Choisissez un genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ request()->searchGenre == $genre->id ? 'selected' : '' }}>
                        {{ $genre->description }}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
    </div>

    <ul class="list-group mx-5">
        @foreach ($products as $product)
            <li class="list-group-item">
                <h3 class="text-center">Produit :<a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                </h3>
                @if (!$product->purchases->isEmpty())
                    <h3 class="text-center">Commandes associées</a></h3>
                    <p class="text-center">
                        @foreach ($product->purchases as $purchase)
                            |{{ $purchase->id }}|
                        @endforeach
                    </p>
                @else
                    <p class="text-center">Il n'y a pas de commande associées</p>
                @endif
            </li>
        @endforeach
        <div class="text-center">
            {{ $products->appends(request()->input())->links() }}
        </div>
    </ul>
@endsection
