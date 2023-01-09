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

    <form action="{{ Route('categories.store') }}" method="POST">
        @csrf
        <p><input type="text" name="description" placeholder="Nom de la catégorie"></p>
        <input type="submit" value="Envoyer">
    </form>
@endsection
