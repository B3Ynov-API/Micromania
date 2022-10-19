@extends('layouts.backend')

@section('content')

@foreach ($purchases as $purchase)
    <h3>La commande n°{{$purchase->id}} contient les produits suivant :</h3>  
    @foreach ($purchase->products as $product)
        <p>{{$product->name}} x{{$product->pivot->quantity}}</p>
        
    @endforeach  
@endforeach

<a href="{{route('purchases.create')}}">Créer une nouvelle commande</a>
@endsection