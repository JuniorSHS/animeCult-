@extends('layouts.master')


@section('title', 'Modifier un Anime')

@section('content')

<div class="container-fluid py-4 px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class=""><center>Modifier un Anime<a href="{{ url('admin/animes') }}"><i class="fa-solid fa-rotate-left float-end"></i></a></center></h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                    </div>
                @endif
            <form action="{{ url('admin/update-anime/'.$anime->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Nom de l'anime</label>
                    <input type="text" name="name" value="{{ $anime->name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Catégories</label>
                    <select name="category_id" class="form-control">
                        <option value="">-- Choisir la catégorie --</option>
                        @foreach ($category as $categorie)
                            <option value="{{ $categorie->id }}" @if($anime->category_id == $categorie->id) selected @endif>{{ $categorie->name }}</option>
                            @endforeach
                    </select>
                </div>
                    <div class="mb-3">
                        <label for="">Nombre d'episode</label>
                        <input type="text" name="nb_episode" value="{{ $anime->nb_episode }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="mySummernote" class="form-control" rows="4">{{ $anime->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Date de sortie</label>
                        <input type="date" name="date_release" value="{{ $anime->date_release }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Studio</label>
                        <input type="text" name="studio" value="{{ $anime->studio }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Tags</label>
                        <input type="text" name="tags" value="{{ $anime->tags }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control"><br>
                        <img src="{{ asset('uploads/anime/'.$anime->image) }}" class="img-fluid" alt=" " style="max-width: 150px;">
                    </div>
                    <div class="mb-3">
                        <label for="">Lien Youtube</label>
                        <input type="text" name="yt_iframe" value="{{ $anime->yt_iframe }}" class="form-control">
                    </div>

                    <h4>SEO Tags</h4>
                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $anime->meta_title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" id="" class="form-control" rows="4">{{ $anime->meta_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keywords</label>
                        <input type="text" name="meta_keyword" value="{{ $anime->meta_keyword }}" class="form-control">
                    </div>
                    <div class="row justify-content-center align-self-center">
                        <div class="mb-3">
                        <center><button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus-minus"></i> Modifier </button></center>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>




@endsection