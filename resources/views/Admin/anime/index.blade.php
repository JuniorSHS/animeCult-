@extends('layouts.master')


@section('title', 'Anime')

@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('admin/delete-anime') }}" method="POST">
            @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Supprimer l'article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="anime_id" id="anime_id">
                <h6 class="text-center"> Coucou, êtes-vous sûr de vouloir supprimer cet anime ? </h6>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Oui, je suis sûr.</button>
                </div>
        </form>
      </div>
    </div>
  </div>



<div class="container-fluid px-4 mb-3"><br>
    <h1 class="mt-1">Liste des animes à venir</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Animes / Liste des animes à venir</li>
    </ol>
    <div class="card">
        <div class="card-header">
            <h4>Aperçu des animes
                <a href="{{ url('admin/add-anime') }}"><i class="fa-solid fa-plus-minus float-end"></i></a>
            </h4>
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
                        <th scope="col"><center>Nom</center></th>
                        <th scope="col"><center>Catégorie</center></th>
                        <th scope="col"><center>Image</center></th>
                        <th scope="col"><center>Date de sortie</center></th>
                        <th scope="col"><center>Action</center></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Boucle pour afficher les categories dans le tableau --}}
                    {{-- ici "category" c'est le nom que j'ai donné à la variable $categories dans le controller --}}
                     @foreach ($animes as $anime)
                    <tr>
                        <td data-label="Nom">{{ $anime->name }}</td>
                        <td data-label="Catégorie">{{ $anime->category->name }}</td>
                        <td data-label="Image"><img src="{{ asset('uploads/anime/'.$anime->image) }}" width="70px" alt="img"></td></td>
                        <td data-label="Date de sortie"><?php $date = new DateTime($anime->date_release);
                                echo $date->format('d/m/Y'); ?>
                        </td>
                        <td data-label="Action">
                            <a href="{{ url('admin/edit-anime/'.$anime->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-edit"></i></a>
                            <button type="button" class="deleteAnimeBtn" value="{{ $anime->id }}"><i class="fa-solid fa-trash-alt fa-lg" color="#ff0000"></i></button>
                        </td>
                    </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function(){
            // $('.deleteCategoryBtn').click(function(e){
                $(document).on('click', '.deleteAnimeBtn', function (e) {
                // });
                e.preventDefault();
                
                var anime_id = $(this).val();
                $('#anime_id').val(anime_id);

                $('#deleteModal').modal('show');
            });
        });
    </script>

@endsection