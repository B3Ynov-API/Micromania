@extends('layouts.backend')

@section('content')
<div class="text-center">
    <a href="{{route('users.create')}}" class="btn btn-primary mx-auto">Ajouter un utilisateur</a>
</div>
<ul class="list-group mx-5">
    @foreach ($users as $user)
        <li class="list-group-item">
            <h3 class="text-center"><a href="{{route('users.show', $user)}}">{{$user->name}}</a> - {{$user->role->name}}</h3>
        </li>
    @endforeach
    <div class="text-center">
        {{ $users->links() }}
    </div>
</ul>


@endsection