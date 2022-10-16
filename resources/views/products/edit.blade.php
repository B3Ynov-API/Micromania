@extends('layouts.backend')

@section('content')

<form action="{{Route('products.update', $product)}}" method="POST">
    @csrf
    @method('PUT')
    <p><input type="text" name="name" placeholder="Nom" value="{{$product->name}}"></p>
    <p><input type="number" name="price" step="0.01" placeholder="Prix" value="{{$product->price}}"></p>
    <input type="submit" value="Envoyer">

</form>

@endsection