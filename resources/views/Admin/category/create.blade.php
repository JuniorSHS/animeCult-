@extends('layouts.master')


@section('title', 'Ajouter une catégorie')



@section('content')

<div class="container-fluid px-4">

        <div class="card mt-4 mb-3">
            <div class="card-header">
                <h4 class=""><center>Ajouter une catégorie<a href="{{ url('admin/category') }}"><i class="fa-solid fa-rotate-left float-end"></i></a><center></h4>
            </div>
            <div class="card-body">


                @if ($errors->any())
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                    </div>
                @endif


                <form action="{{ url('admin/add-category') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="mb-3">
                        <label for="">Nom</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Label</label>
                        <input type="text" name="slug"  class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" id="mySummernote" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label>Meta Titre</label>
                        <input type="text" name="meta_title"  class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Résume</label>
                        <textarea name="meta_description" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Mots Clés</label>
                        <textarea name="meta_keyword" rows="3" class="form-control"></textarea>
                    </div>

                    <center><h6>Status</h6></center>
                    <div class="row justify-content-center align-self-center">
                        <div class="col-md-3 md-3">
                            <center><label>Navbar Status</label>
                            <input type="checkbox" name="navbar_status"/></center>
                        </div>
                        <div class="col-md-3 md-3">
                            <center><label>Status</label>
                            <input type="checkbox" name="status"/></center>
                        </div>
                        <div class="mb-3"><br>
                            <center><button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus-minus"></i> Ajouter</button></center>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

@endsection