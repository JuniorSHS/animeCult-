@extends('layouts.master')

@section('title', 'Liste des utilisateurs')

@section('content')

<div class="container-fluid px-4 mb-3">
    <h1 class="mt-1">Liste des utilisateurs</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Utilisateurs</li>
    </ol>
    <div class="card mt-4">
        <div class="card-header">
            <h4>Liste des utilisateurs</h4>
        </div>
        <div class="card-body">
            
            <div id="bloc-10"><script> setInterval(function(){ var obj = document.getElementById("bloc-10"); obj.innerHTML = "";},3000);</script>
                @if (session('message'))
            <div class="alert alert-success">
               <center> {{ session('message') }} </center>
            </div>
            @endif
              </div>
            
            <table id="myDataTable" class="table table-striped" aria-describedby="myDataTable_info">
                <thead>
                    <tr>
                        {{-- Affichage du tableau avec les valeurs de la base de donneés --}}
                        <th scope="col"><center>#</center></th>
                        <th scope="col"><center>Identifiant</center></th>
                        <th scope="col"><center>Émail</center></th>
                        <th scope="col"><center>Avatar</center></th>
                        <th scope="col"><center>Rôle</center></th>
                        <th scope="col"><center>Action</center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td data-label="#">{{ $item->id }}</td>
                        <td data-label="Identifiant">{{ $item->name }}</td>
                        <td data-label="Émail">{{ $item->email }}</td>
                        <td data-label="image"><img src="{{ asset('uploads/membres/'.$item->avatar) }}" width="30px" alt="img"></td>
                        <td data-label="Rôle">{{ $item->role == '1' ? 'Admin':'Membre' }}</td>
                        <td data-label="Action">
                            <a href="{{ url('admin/edit-user/'.$item->id) }}"><i class="fa-solid fa-user-pen fa-lg"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

</div>

@endsection