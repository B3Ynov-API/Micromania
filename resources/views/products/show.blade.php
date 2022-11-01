@extends('layouts.backend')

@section('content')
<h3>Les caractéristiques de ce produit sont :</h3>
<p>Nom : {{$product->name}}</p>
<p>Prix : {{$product->price}}€</p>

@if ($product->genres->isEmpty() == false)
    <p>Genre : 
    @foreach ($product->genres as $genre)
        {{$genre->description}}
    @endforeach 
    </p>
@endif

<p>Catégorie : {{$product->category->description}}</p>

@if ($product->pegi != null)
    <p>Pegi : {{$product->pegi->description}}</p>
@endif

<a href="{{Route('products.edit', $product)}}">Modifier ce produit</a>
<form action="{{Route('products.destroy', $product)}}" method="POST">
    @method('DELETE')
    @csrf
    <input type="submit" value="Supprimer ce produit">
</form>


@endsection