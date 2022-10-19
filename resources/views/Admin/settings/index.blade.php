@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')

<div class="container-fluid px-4 mb-3">
    <h1 class="mt-4">Paramètres du site</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Paramètres du site</li>
    </ol>
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('error'))
                <center><div class="alert alert-danger">
                    {{ session('error') }}
                </div></center>
            @endif


            <div class="card">
                <div class="card-header">
                    <h5>Paramètre</h5>
                </div>

                <div class="card-body">
                    <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Nom du site</label>
                        <input type="text" name="nom_site" required @if($setting) value="{{ $setting->nom_site }}" @endif class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Logo du site</label>
                        <input type="file" name="logo_site" class="form-control"><br>
                        @if ($setting)
                            <img src="{{ asset('uploads/settings/'.$setting->logo_site) }}" class="img-fluid" alt="Logo" style="max-width: 200px;">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label>L'entête du site</label>
                        <input type="file" name="favicon_site" class="form-control"><br>
                        @if ($setting)
                            <img src="{{ asset('uploads/settings/'.$setting->favicon_site) }}" class="img-fluid" alt="Logo" style="max-width: 200px;">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea type="text" name="description" class="form-control">@if($setting){{ $setting->nom_site }} @endif</textarea>
                    </div>

                    <h4>SEO - Tags</h4>
                    <div class="mb-3">
                        <label>Meta Titre</label>
                        <input type="text" name="meta_title" @if($setting) value="{{ $setting->meta_title }}" @endif class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Meta description</label>
                        <textarea type="text" name="meta_description" class="form-control">@if($setting) {{ $setting->nom_site }} @endif</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Meta Mots-clés</label>
                        <input type="text" name="meta_keyword" @if($setting) value="{{ $setting->meta_keyword }}" @endif class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection