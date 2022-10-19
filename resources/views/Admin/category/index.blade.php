@extends('layouts.master')


@section('title', 'Catégories')

@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('admin/delete-category') }}" method="POST">
            @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Supprimer la catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="category_delete_id" id="category_id">
                <h6 class="text-center">Êtes-vous sûr de vouloir supprimer cette catégorie ? </h6>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Oui, je suis sûr.</button>
                </div>
        </form>
      </div>
    </div>
  </div>

<div class="container-fluid px-4 mb-3"><br>
    <h1 class="mt-1">Liste des catégories</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Catégories / Liste des catégories</li>
    </ol>
    <div class="card">
        <div class="card-header">
            <h4>Aperçu des catégories
                <a href="{{ url('admin/add-category') }}"><i class="fa-solid fa-plus-minus float-end"></i></a>
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
              <div id="bloc-10"><script> setInterval(function(){ var obj = document.getElementById("bloc-10"); obj.innerHTML = "";},3000);</script>
                @if (session('error'))
            <div class="alert alert-danger">
               <center> {{ session('error') }} </center>
            </div>
            @endif
              </div>

        <table id="myDataTable" class="table table-striped" aria-describedby="myDataTable_info">
                <thead>
                    <tr>
                        <th scope="col"><center>ID</center></th>
                        <th scope="col"><center>Nom</center></th>
                        <th scope="col"><center>Image</center></th>
                        <th scope="col"><center>Status</center></th>
                        <th scope="col"><center>Action</center></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Boucle pour afficher les categories dans le tableau --}}
                    {{-- ici "category" c'est le nom que j'ai donné à la variable $categories dans le controller --}}
                    @foreach ($categories as $category)
                    <tr>
                        <td data-label="#">{{ $category->id }}</td>
                        <td data-label="Nom">{{ $category->name }}</td>
                        <td data-label="Image">
                            <img src="{{ asset('uploads/category/'.$category->image) }}" width="50px" alt="img">
                        </td>
                        <td data-label="État">{{ $category->status == '1' ? 'Masqué':'Public' }}</td>

                        <td data-label="Action">
                            <a href="{{ url('admin/edit-category/'.$category->id) }}"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
                            <button type="button" class="deleteCategoryBtn" value="{{ $category->id }}"><i class="fa-solid fa-trash-alt fa-lg" color="#ff0000"></i></button>
                            {{-- <a href="{{ $category->id) }}" class="deleteCategoryBtn"><i class="fa-solid fa-trash-alt fa-lg" color="#ff0000"></i></a> --}}
                            {{-- <a href="{{ url('admin/delete-category/'.$category->id) }}"><i class="fa-solid fa-trash-can" color="#ff0000" width="auto"></i></a> --}}
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
                $(document).on('click', '.deleteCategoryBtn', function (e) {
                // });
                e.preventDefault();
                
                var category_id = $(this).val();
                $('#category_id').val(category_id);

                $('#deleteModal').modal('show');
            });
        });
    </script>

@endsection
