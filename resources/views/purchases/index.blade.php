@extends('layouts.backend')

@section('content')
    <div class="text-center">
        <a href="{{ route('purchases.create') }}" class="btn btn-primary mx-auto">Ajouter une Commande</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mx-5">
        <form method="GET" action="{{ route('purchases.index') }}" class="form-inline my-2 my-lg-0">
            <select name="searchProduct">
                <option value=''>Choisissez une catégorie</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ request()->searchProduct == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
    </div>


    @foreach ($purchases as $purchase)
        @if (!$purchase->products->isEmpty())
            <h3 class="text-center">La commande n°{{ $purchase->id }}</h3>
            <table class="table table-striped table-hover container text-center">
                <th>Nom</th>
                <th>coût</th>
                <th>Quantité</th>
                <th>Coût Total</th>

                @foreach ($purchase->products as $product)
                    <tr>
                        <td>{{ $product->name }} </td>
                        <td>{{ $product->price }} €</td>
                        <td>{{ $product->pivot->quantity }}</td>

                        <td>{{ $product->price * $product->pivot->quantity }} €</td>
                    </tr>
                @endforeach
            </table>
        @endif
    @endforeach
    <div class="text-center">
        {{ $purchases->appends(request()->input())->links() }}
    </div>
@endsection
