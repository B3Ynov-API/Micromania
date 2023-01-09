@extends('layouts.backend')

@section('content')
<p class="text-center">{{ $user->name }}</p>
<p class="text-center">{{ $user->email }}</p>
<p class="text-center">Role {{$user->role->name}}</p>

<a href="{{Route('users.edit', $user)}}">Modifier cet utilisateur</a>
<form action="{{Route('users.destroy', $user)}}" method="POST">
    @method('DELETE')
    @csrf
    <input type="submit" value="Supprimer cet utilisateur">
</form>


@endsection