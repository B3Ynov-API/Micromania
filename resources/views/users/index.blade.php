@extends('layouts.backend')

@section('content')
    <div class="text-center">
        <a href="{{ route('users.create') }}" class="btn btn-primary mx-auto">Ajouter un utilisateur</a>
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
        <form method="GET" action="{{ route('users.index') }}" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search" name="searchName"
                value="{{ request()->searchName }}">
            <select name="searchRole">
                <option value=''>Choisissez un rôle</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ request()->searchRole == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
    </div>

    <ul class="list-group mx-5">
        @foreach ($users as $user)
            <li class="list-group-item">
                <h3 class="text-center"><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a> -
                    {{ $user->role->name }}</h3>
            </li>
        @endforeach
        <div class="text-center">
            {{ $users->appends(request()->input())->links() }}
        </div>
    </ul>
@endsection
