@extends('layouts.backend')

@section('content')

<form action="{{Route('products.store')}}" method="POST">
    @csrf
    <p><input type="text" name="name" placeholder="Nom"></p>
    <p><input type="number" name="price" step="0.01" placeholder="Prix"></p>
    <input type="submit" value="Envoyer">

</form>

@endsection