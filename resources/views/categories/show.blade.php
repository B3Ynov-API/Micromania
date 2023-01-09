@extends('layouts.backend')

@section('content')
<h1 class="text-center">{{ $category->description }}</h1>
@if(!$category->products->isEmpty())
    <h2>Produits possédant cette catégorie</h2>
    <ul>
        @foreach ($category->products as $product)
            <li><a href="{{Route('products.show', $product)}}">{{ $product->name }}</a></li>
        @endforeach
    </ul>
@endif

<a href="{{Route('categories.edit', $category)}}">Modifier ce produit</a>
<form action="{{Route('categories.destroy', $category)}}" method="POST">
    @method('DELETE')
    @csrf
    <input type="submit" value="Supprimer cet utilisateur">
</form>


@endsection