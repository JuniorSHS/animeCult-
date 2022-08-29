@extends('layouts.master')

@section('title', 'Ajouter un anime')

@section('content')

<div class="container-fluid py-4 px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class=""><center>Ajouter un Anime<a href="{{ url('admin/animes') }}"><i class="fa-solid fa-rotate-left float-end"></i></a></center></h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                    </div>
                @endif

            <form action="{{ url('admin/add-anime') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Nom de l'anime</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Catégories</label>
                    <select name="category_id" class="form-control">
                        <option value="">-- Choisir la catégorie --</option>
                        @foreach ($category as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                    </select>
                </div>
                    <div class="mb-3">
                        <label for="">Nombre d'episode</label>
                        <input type="text" name="nb_episode" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="mySummernote" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Date de sortie</label>
                        <input type="date" name="date_release" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Studio</label>
                        <input type="text" name="studio" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Tags</label>
                        <input type="text" name="tags" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Lien Youtube</label>
                        <input type="text" name="yt_iframe" class="form-control">
                    </div>

                    <h4>SEO Tags</h4>
                    <div class="mb-3">
                        <label for="">Meta Titre</label>
                        <input type="text" name="meta_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" rows="3"></textarea>
                    </div>
                        <div class="row justify-content-center align-self-center">
                            <div class="mb-3">
                            <center><button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus-minus"></i> Ajouter</button></center>
                            </div>
                        </div>
            </form>
        </div>
    </div>
</div>

@endsection