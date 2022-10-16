@extends('layouts.backend')

@section('content')
<h3>Les caractéristiques de ce produit sont :</h3>
<p>Nom : {{$product->name}}</p>
<p>Prix : {{$product->price}}€</p>

<a href="{{Route('products.edit', $product)}}">Modifier ce produit</a>
<form action="{{Route('products.destroy', $product)}}" method="POST">
    @method('DELETE')
    @csrf
    <input type="submit" value="Supprimer ce produit">
</form>


@endsection