@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    Total des catégories
                    <h2 class="card-title mt-2">{{ $categories }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="text-decoration: none;" href="{{ url('admin/category') }}">
                        Voir les catégories
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    Total des articles
                    <h2 class="card-title mt-2">{{ $posts }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="text-decoration: none;" href="{{ url('admin/posts') }}">
                        Voir les articles
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    Total des Membres
                    <h2 class="card-title mt-2">{{ $users }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="text-decoration: none;" href="{{ url('admin/users') }}">
                        Voir les Membres
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    Total des Admins
                    <h2 class="card-title mt-2">{{ $admins }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="text-decoration: none;" href="{{ url('admin/users') }}">
                        Voir les Admins
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-5 col-md-6">
      <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-chart-area me-1"></i>
            Graphique des utilisateurs enregistrés
        </div>
        <div class="card-body">

            Affichier un graphique en utilisant la librairie Chart.js
            
        </div>
    </div>
        </div>
    </div>

@endsection