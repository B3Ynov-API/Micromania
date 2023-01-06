@extends('layouts.backend')

@section('content')

<div class="text-center">
    <a href="{{route('purchases.create')}}" class="btn btn-primary mx-auto">Ajouter une Commande</a>
</div>
@foreach ($purchases as $purchase)
    @if (!$purchase->products->isEmpty())
        <h3 class="text-center">La commande n°{{$purchase->id}}</h3>
        <table class="table table-striped table-hover container text-center">
            <th>Nom</th>
            <th>coût</th>
            <th>Quantité</th>
            <th>Coût Total</th>
            
            @foreach ($purchase->products as $product)
            <tr>
                <td>{{$product->name}} </td>
                <td>{{$product->price}} €</td>
                <td>{{$product->pivot->quantity}}</td>
                
                <td>{{$product->price*$product->pivot->quantity}} €</td>
            </tr>
            @endforeach 
        </table>        
    @endif
@endforeach
<div class="text-center">
    {{ $purchases->links() }}
</div>

@endsection