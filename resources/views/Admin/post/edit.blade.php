@extends('layouts.master')

@section('title', 'Modifier un Poste')

@section('content')

<div class="container-fluid px-4 mb-3">
    <div class="card mt-4">
        <div class="card-header">
            <h4><center>Modifier un Poste<a href="{{ url('admin/posts') }}"><i class="fa-solid fa-rotate-left float-end"></i></a></center></h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                    </div>
                @endif

            <form action="{{ url('admin/update-post/'.$post->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="">Catégories</label>
                    <select name="category_id" required class="form-control">
                        <option value="">-- Choisir la catégorie --</option>
                         @foreach ($category as $cateitem)
                            <option value="{{ $cateitem->id }}" {{ $post->category_id == $cateitem->id ? 'selected':'' }}>
                                {{ $cateitem->name }}
                            </option>
                            @endforeach
                    </select>
                </div>
                    <div class="mb-3">
                        <label for="">Nom du contenu</label>
                        <input type="text" name="name" value="{{ $post->name }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Label</label>
                        <input type="text" name="slug" value="{{ $post->slug }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="mySummernote" class="form-control" rows="4">{{ $post->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Lien Youtube</label>
                        <input type="text" name="yt_iframe" value="{{ $post->yt_iframe }}" class="form-control">
                    </div>

                    <h4>SEO Tags</h4>
                    <div class="mb-3">
                        <label for="">Meta Titre</label>
                        <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3">{{ $post->meta_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" rows="3">{{ $post->meta_keyword }}</textarea>
                    </div>

                    <center><h5>État de la publication</h5></center>
                        <div class="row justify-content-center align-self-center">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <center><label for="">Public</label>
                                    <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked':'' }} /></center>
                                </div>
                            </div>
                            <div class="mb-3">
                                <center><button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Enregister les modifications</button></center>
                            </div>
                        </div>
            </form>

                
        </div>
    </div>
</div>

@endsection