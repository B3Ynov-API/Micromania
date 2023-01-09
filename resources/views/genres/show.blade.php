@extends('layouts.backend')

@section('content')
<h1 class="text-center">{{ $genre->description }}</h1>
@if(!$genre->products->isEmpty())
    <h2>Produits possédant ce genre</h2>
    <ul>
        @foreach ($genre->products as $product)
            <li><a href="{{Route('products.show', $product)}}">{{ $product->name }}</a></li>
        @endforeach
    </ul>
@endif

<a href="{{Route('genres.edit', $genre)}}">Modifier ce genre</a>
<form action="{{Route('genres.destroy', $genre)}}" method="POST">
    @method('DELETE')
    @csrf
    <input type="submit" value="Supprimer ce genre">
</form>


@endsection