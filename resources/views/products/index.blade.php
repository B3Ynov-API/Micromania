@extends('layouts.backend')

@section('content')

<ul class="list-group mx-5">
    @foreach ($products as $product)
        <li class="list-group-item">
            <h3>Le produit <a href="{{route('products.show', $product)}}">{{$product->name}}</a> apparaît dans les commandes suivantes :</h3>  
            @foreach ($product->purchases as $purchase)
                <p>Commande N°{{$purchase->id}}</p>
            @endforeach  
        </li>
    @endforeach
</ul>

<a href="{{route('products.create')}}" class="btn btn-primary mx-auto">Ajouter un produit</a>
@endsection