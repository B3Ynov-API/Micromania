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

    <form action="{{ Route('users.update', $user) }}" method="POST">
        @method('PUT')
        @csrf
        <p><input type="text" name="name" placeholder="Nom" value="{{ $user->name }}"></p>
        <p><input type="email" name="email" placeholder="Email" value="{{ $user->email }}"></p>
        <select name="role_id">
            <option>Choisir un rôle</option>
            @foreach ($roles as $role)
                @if ($role == $user->role)
                    <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                @else
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endif
            @endforeach
        </select>
        <input type="submit" value="Envoyer">
    </form>
@endsection
