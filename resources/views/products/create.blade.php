@extends('layouts.backend')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ Route('products.store') }}" method="POST">
        @csrf
        <p><input type="text" name="name" placeholder="Nom"></p>
        <p><input type="number" name="price" step="0.01" placeholder="Prix"></p>
        <select name="category_id">
            <option>Choisir une catégorie</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->description }}</option>
            @endforeach
        </select>
        <input type="submit" value="Envoyer">
    </form>
@endsection
