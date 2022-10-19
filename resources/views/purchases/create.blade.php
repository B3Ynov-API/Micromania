@extends('layouts.backend')

@section('content')

<p>Sélectionnez les articles concernés par la commande.</p>
<form action="{{Route('purchases.store')}}" method="POST">
    @csrf
    <div>
    @foreach ($products as $product)
        <p><input type="number" name="product_quantities[]" value="0" min="0">{{$product->name}}</p>
        <input type="hidden" name="product_ids[]" value="{{$product->id}}">
    @endforeach
    </div>
    <!--<p>
        <select name="product_id" multiple>
            @foreach ($products as $product)
                <option value={{$product->id}}>
                    {{$product->name}}
                </option>
            @endforeach
        </select>
    </p>-->
    <input type="submit" value="Envoyer">

</form>

@endsection