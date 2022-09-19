<div class="global-navbar" style="background-color: #3a3a3a">
    <div class="container">
        <div class="row justify-content-center align-self-center">
            <div class="col-md-9">
              @php
                $setting = App\Models\Paremetres::find(1);
              @endphp
                <a href="{{ url("/") }}"><img src="{{ asset('uploads/settings/'.$setting->logo_site) }}" class="bannier_logo" style="filter : opacity(70%);" width="1000px" alt="logo"/></a>
            </div>
        </div>
    </div>
</div>
<div class="sticky-top">
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

      <a href="" class="text-menu" class="text-decoration-none" class="navbar-brand d-inline d-sm-inline d-md-none">
        Menu
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="{{ url("/") }}">Accueil</a>
          </li>
          @php
          $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->take(4)->get();
      @endphp
        {{-- <li class="nav-item"><a class="nav-link" href="#"> Actualités</a></li> --}}
        <li class="nav-item"><a class="nav-link" href="{{ url("prochainement") }}">Prochainement</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url("membres") }}">Membres</a></li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Catégories
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($categories as $cateitem)
                <li class="dropdown-item">
                    <a class="dropdown-item" href="{{ url('categories/'.$cateitem->slug) }}"><center>{{ $cateitem->name }}</center></a>
                </li>
                @endforeach
              </ul>
          </li>
            {{-- <li class="nav-item"><a class="nav-link" href="#">Qui sommes-nous ?</a></li> --}}

            @if (Auth::check())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  {{-- <li class="dropdown-item">
                      <a class="dropdown-item" href="{{ url('profile') }}"><center>Profile</center></a>
                  </li> --}}
                  <li class="dropdown-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><div style="color: #000; !important"><center>Déconnexion</center></div></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                   </form>
                  </li>
                </ul>
            </li>
            @else
            <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Connexion</a></li>
            {{-- Ne plus affichier le bouton d'inscription quand l'utilisateur est connecté --}}
            <li class="nav-item"><a class="nav-link" href="{{ url('register') }}">Inscription</a></li>
            @endif

            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('/login') ? 'active':'' }}" href="{{ url('/login') }}">Se connecter</a>
          </li> --}}
          {{-- Déconnection de l'utilisateur connecté --}}
          {{-- <li class="nav-item"><a class="nav-link" href="{{ route('logout') }} " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
          </li> --}}


         </ul>
      </div>
    </div>
</nav>
</div>

