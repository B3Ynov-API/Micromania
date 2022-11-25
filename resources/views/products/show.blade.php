@extends('layouts.backend')

@section('content')
<p class="text-center">Le  Produit:</p>
<p class="text-center">Nom : {{$product->name}}</p>
<p class="text-center">Prix : {{$product->price}}€</p>
@if ($product->genres->isEmpty() == false)
    <p class="text-center">Genre : 
    @foreach ($product->genres as $genre)
        {{$genre->description}}
    @endforeach 
    </p>
@endif

<p class="text-center">Catégorie : {{$product->category->description}}</p>

@if ($product->pegi != null)
    <p class="text-center">Pegi : {{$product->pegi->description}}</p>
@endif

<a href="{{Route('products.edit', $product)}}">Modifier ce produit</a>
<form action="{{Route('products.destroy', $product)}}" method="POST">
    @method('DELETE')
    @csrf
    <input type="submit" value="Supprimer ce produit">
</form>


@endsection