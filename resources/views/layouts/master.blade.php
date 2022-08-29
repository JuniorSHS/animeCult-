<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    {{-- CSS summernote--}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    {{-- Css DataTable --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    <style>
        
.dataTables_wrapper .dataTables_filter {
  margin-top:.5em;
  margin-bottom: .8em;
 }

table {
  border: 1px solid #ccc !important;
  border-collapse: collapse !important;
  margin: 0 !important;
  padding: 0 !important;
  width: 100% !important;
  table-layout: fixed !important;
}

table tr {
  background-color: #f8f8f8 !important;
  border: 1px solid #ddd !important;
  padding: .35em !important;
}

table th,
table td {
  padding: .625em !important;
  text-align: center !important;
}

table th {
  font-size: .85em !important;
  letter-spacing: .1em !important;
  text-transform: uppercase !important;
}

@media screen and (max-width: 820px) {
  table {
    border: 0 !important;
  }
  
  table thead {
    border: none !important;
    clip: rect(0 0 0 0) !important;
    height: 1px !important;
    margin: -1px !important;
    overflow: hidden !important;
    padding: 0 !important;
    position: absolute !important;
    width: 1px !important;
  }
  
  table tr {
    border-bottom: 3px solid #ddd !important;
    display: block !important;
    margin-bottom: .625em !important;
  }
  
  table td {
    border-bottom: 1px solid #ddd !important;
    display: block !important;
    font-size: .8em !important;
    text-align: right !important;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left !important;
    font-weight: bold !important;
    text-transform: uppercase !important;
  }
  
  table td:last-child {
    border-bottom: 0 !important;
  }
}
.post-code-bg {
  width: fit-content;
  min-width: 100%;
  background-color: #212121 !important; 
  width: 100% !important; 
  overflow-x: scroll !important;
  position: relative;
  padding: 1rem 1rem;
  margin-bottom: 1rem;
  border: 1px solid transparent;
  border-radius: 0.25rem;  
}
    </style>


</head>
<body>

    @include('layouts.inc.admin-navbar')

    <div id="layoutSidenav">

        @include('layouts.inc.admin-sidebar')

        <div id="layoutSidenav_content">
            <main>

                @yield('content')

            </main>

            @include('layouts.inc.admin-footer')

        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    {{-- JS summernote--}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    

    <script>
        $(document).ready(function() {
            $("#mySummernote").summernote({
                height: 150,
            });
            $('#mySummernote').summernote('lineHeight', 1.2);
            $('.dropdown-toggle').dropdown();
        });

    </script>

    <script src="https://cdn.discordapp.com/attachments/825755604303609857/1012239822229876796/js_DataTables.js"></script>
    <script>
        $(document).ready( function () {
        $('#myDataTable').DataTable();
        });
    </script>
    
@yield('scripts')

</body>
</html>