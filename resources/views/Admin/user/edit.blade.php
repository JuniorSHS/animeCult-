@extends('layouts.master')

@section('title', 'Modifier utilisateur')

@section('content')

<div class="container-fluid px-4 mb-3">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Modifier l'utilisateur <a href="{{ url('admin/users') }}"><i class="fa-solid fa-rotate-left float-end"></i></a></h4>
        </div>
        <div class="card-body">

            @if (session('message'))
            <div class="alert alert-success">
                <center> {{ session('message') }} </center>
            </div>
            @endif
            
            <form action="{{ url('admin/update-user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Identifiant</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label>Avatar</label>
                    <input type="file" name="avatar" class="form-control"><br>
                            <img src="{{ asset('uploads/membres/'.$user->avatar) }}" class="img-fluid" alt=" " style="max-width: 150px;">
                </div>
                <div class="form-group">
                    <label for="email">Date de création du compte</label>
                    <input class="form-control" value="{{ $user->created_at->format('d/m/y') }}">
                </div>
                <div class="form-group">
                    <label for="role">Rôle</label>
                    <select class="form-control" id="role" name="role">
                        <option value="1" {{ $user->role == '1' ? 'selected':'' }}>Admin</option>
                        <option value="0" {{ $user->role == '0' ? 'selected':'' }}>Membre</option>
                    </select>
                </div>
                {{-- Pouvoir modifier les mots de passe des utilisateurs --}}
                {{-- <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmation du mot de passe</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div> --}}
                <div class="mb-3"><br>
                <center><button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Enregister les modifications</button></center>
                </div>
            </form>

        </div>
    </div>
</div>
    

@endsection