@extends('layouts.master')

@section('title', 'Aperçu des Postes')

@section('content')


<!-- Modal -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('admin/delete-post') }}" method="POST">
            @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Supprimer l'article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="post_delete_id" id="post_id">
                <h6 class="text-center"> Coucou, êtes-vous sûr de vouloir supprimer cet article ? </h6>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Oui, je suis sûr.</button>
                </div>
        </form>
      </div>
    </div>
  </div>


<div class="container-fluid px-4 mb-3">
    <h1 class="mt-1">Liste des articles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Article / Liste des articles</li>
    </ol>
    <div class="card mt-4">
        <div class="card-header">
            <h4>Aperçu des Articles
                <a href="{{ url('admin/add-post') }}"><i class="fa-solid fa-plus-minus float-end"></i></a></h4>
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
                        <th scope="col"><center>ID</center></th>
                        <th scope="col"><center>Nom</center></th>
                        <th scope="col"><center>Catégorie</center></th>
                        <th scope="col"><center>image</center></th>
                        <th scope="col"><center>Statue</center></th>
                        <th scope="col"><center>Action</center></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Boucle pour afficher les articles dans le tableau --}}
                    {{-- ici "item" c'est le nom que j'ai donné à la variable $posts dans le controller --}}
                    @foreach ($posts as $item)
                    <tr>
                        <td data-label="ID">{{ $item->id }}</td>
                        <td data-label="Nom">{{ $item->name }}</td>
                        <td data-label="Catégorie">{{ $item->category->name }}</td>
                        <td data-label="image"><img src="{{ asset('uploads/post/'.$item->image) }}" width="30px" alt="img"></td>
                        <td data-label="Statue">{{ $item->status == '1' ? 'Privé':'Public' }}</td>
                        <td data-label="Action">
                            <a href="{{ url('admin/edit-post/'.$item->id) }}"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
                            <button type="button" class="deletePostBtn" value="{{ $item->id }}"><i class="fa-solid fa-trash-alt fa-lg" color="#ff0000"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

</div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function(){
            // $('.deleteCategoryBtn').click(function(e){
                $(document).on('click', '.deletePostBtn', function (e) {
                // });
                e.preventDefault();
                
                var post_id = $(this).val();
                $('#post_id').val(post_id);

                $('#deleteModal').modal('show');
            });
        });
    </script>

@endsection