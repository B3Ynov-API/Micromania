@extends('layouts.backend')

@section('content')

@foreach ($products as $product)
    <h3>Le produit <a href="{{route('products.show', $product)}}">{{$product->name}}</a> apparaît dans les commandes suivantes :</h3>  
    @foreach ($product->purchases as $purchase)
        <p>Commande N°{{$purchase->id}}</p>
        
    @endforeach  
@endforeach

<a href="{{route('products.create')}}">Ajouter un produit</a>
@endsection