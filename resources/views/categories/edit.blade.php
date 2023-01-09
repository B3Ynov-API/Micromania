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

    <form action="{{ Route('categories.update', $category) }}" method="POST">
        @method('PUT')
        @csrf
        <p><input type="text" name="description" placeholder="Nom de la catégorie" value="{{ $category->description }}"></p>
        <input type="submit" value="Envoyer">
    </form>
@endsection
