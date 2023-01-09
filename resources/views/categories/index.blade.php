@extends('layouts.backend')

@section('content')
<div class="text-center">
    <a href="{{route('categories.create')}}" class="btn btn-primary mx-auto">Ajouter une catégorie</a>
</div>
<ul class="list-group mx-5">
    @foreach ($categories as $category)
        <li class="list-group-item">
            <h3 class="text-center"><a href="{{route('categories.show', $category)}}">{{$category->description}}</a></h3>
        </li>
    @endforeach
    <div class="text-center">
        {{ $categories->links() }}
    </div>
</ul>


@endsection