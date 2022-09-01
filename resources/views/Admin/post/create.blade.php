@extends('layouts.master')

@section('title', 'Ajouter un Article')

@section('content')

<div class="container-fluid py-4 px-4">
    <h4 class=""><center>Ajouter un article<a href="{{ url('admin/animes') }}"><i class="fa-solid fa-rotate-left float-end"></i></a></center></h4>
<div class="container">
    <div class="row">
      <div class="col-sm">

            @if ($errors->any())
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                    </div>
                @endif

            <form action="{{ url('admin/add-post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Catégories</label>
                    <select name="category_id" class="form-control">
                        <option value="">-- Choisir la catégorie --</option>
                        @foreach ($category as $cateitem)
                            <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                            @endforeach
                    </select>
                </div>
                    <div class="mb-3">
                        <label for="">Nom du contenu</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Label</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="mySummernote" class="form-control" rows="4"></textarea>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="mb-3">
                        <label for="">Lien Youtube</label>
                        <input type="text" name="yt_iframe" class="form-control">
                    </div>
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
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
      </div>     
        </div>
        <div class="row justify-content-center align-self-center">
            <div class="col-md-4">
                <div class="mb-3">
                    <center><label for="">Status</label>
                    <input type="checkbox" name="status"/></center>
                </div>
            </div>
            <div class="mb-3">
            <center><button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus-minus"></i> Ajouter</button></center>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection