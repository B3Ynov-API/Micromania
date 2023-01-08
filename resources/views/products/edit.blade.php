@extends('layouts.backend')

@section('content')
    <form action="{{ Route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <p><input type="text" name="name" placeholder="Nom" value="{{ $product->name }}"></p>
        <p><input type="number" name="price" step="0.01" placeholder="Prix" value="{{ $product->price }}"></p>
        <select name="category_id">
            <option>Choisir une catégorie</option>
            @foreach ($categories as $category)
                @if ($category == $product->category)
                    <option value="{{ $category->id }}" selected>{{ $category->description }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->description }}</option>
                @endif
            @endforeach
        </select>
        <input type="submit" value="Envoyer">

    </form>
@endsection
