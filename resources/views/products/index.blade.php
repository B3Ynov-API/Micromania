@extends('layouts.backend')

@section('content')
<div class="text-center">
    <a href="{{route('products.create')}}" class="btn btn-primary mx-auto">Ajouter un produit</a>
</div>
<ul class="list-group mx-5">
    @foreach ($products as $product)
        <li class="list-group-item">
            <h3 class="text-center">Produit :<a href="{{route('products.show', $product)}}">{{$product->name}}</a></h3>
                @if (!$product->purchases->isEmpty())
                    <h3 class="text-center">Commandes associées</a></h3>
                    <p class="text-center">
                        @foreach ($product->purchases as $purchase)
                            |{{$purchase->id}}|
                        @endforeach
                    </p>
                @else
                    <p class="text-center">Il n'y a pas de commande associées</p>
                @endif
        </li>
    @endforeach
    <div class="text-center">
        {{ $products->links() }}
    </div>
</ul>


@endsection