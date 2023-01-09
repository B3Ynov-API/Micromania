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

    <form action="{{ Route('users.store') }}" method="POST">
        @csrf
        <p><input type="text" name="name" placeholder="Nom"></p>
        <p><input type="email" name="email" placeholder="Email"></p>
        <p><input type="password" name="password" placeholder="Mot de passe"></p>
        <p><input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe"></p>
        <select name="role_id">
            <option>Choisir un rôle</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Envoyer">
    </form>
@endsection
