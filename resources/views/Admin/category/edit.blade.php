@extends('layouts.master')


@section('title', 'Modifier une Catégorie')



@section('content')

<div class="container-fluid px-4 mb-3">

        <div class="card mt-4 mb-3">
            <div class="card-header">
                <h4><center>Modifier une catégorie<a href="{{ url('admin/category') }}"><i class="fa-solid fa-rotate-left float-end"></i></a></center></h4>
            </div>
            <div class="card-body">


                @if ($errors->any())
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                    </div>
                @endif


                <form action="{{ url('admin/update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="">Nom</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Label</label>
                        <input type="text" name="slug" value="{{ $category->slug }}"  class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" id="mySummernote" rows="5" class="form-control">{{ $category->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label>Meta Titre</label>
                        <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Résume</label>
                        <textarea name="meta_description" rows="5" class="form-control">{{ $category->meta_description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Mots Clés</label>
                        <textarea name="meta_keyword" rows="3" class="form-control">{{ $category->meta_keyword }}</textarea>
                    </div>

                    <center><h6>Status</h6>
                    <div class="row justify-content-center align-self-center">
                        <div class="col-md-3 md-3">
                            <center><label>Navbar Status</label>
                            <input type="checkbox" name="navbar_status" {{ $category->navbar_status == '1' ? 'checked':'' }} /></center>
                        </div>
                        <div class="col-md-3 md-3">
                            <center><label>Status</label>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked':'' }}/></center>
                        </div>
                        <div class="mb-3"><br>
                            <center><button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Enregister les modifications</button></center>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        
    </div>

@endsection