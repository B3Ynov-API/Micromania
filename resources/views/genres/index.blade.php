@extends('layouts.backend')

@section('content')
<div class="text-center">
    <a href="{{route('genres.create')}}" class="btn btn-primary mx-auto">Ajouter un genre</a>
</div>
<ul class="list-group mx-5">
    @foreach ($genres as $genre)
        <li class="list-group-item">
            <h3 class="text-center"><a href="{{route('genres.show', $genre)}}">{{$genre->description}}</a></h3>
        </li>
    @endforeach
    <div class="text-center">
        {{ $genres->links() }}
    </div>
</ul>


@endsection