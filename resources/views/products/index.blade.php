@extends('layouts.backend')

@section('content')

@foreach ($products as $product)
    <h1>Le produit {{$product->name}} apparaît dans les commandes suivantes :</h1>  
    @foreach ($product->purchases as $purchase)
        <p>Commande N°{{$purchase->id}}</p>
        
    @endforeach  
@endforeach
@endsection