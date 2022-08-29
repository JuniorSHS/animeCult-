<div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="col-12 p-2">
                        <center>
                            <img style="border-radius: 0%; width: 200px; height: 120px; object-fit: cover;" src="{{ asset('uploads/membres/'.Auth::user()->avatar) }}" width="100px" height="100px" alt="image avatar">
                        </center>
                        </div>
                      <div class="col-sm-12 p-1">
                        <center>
                            <h6>{{ Auth::user()->name }}</h6>
                            <span class="user-status">
                                <span style="font-size:14px;">Online</span>
                                <span style="font-size:8px; color: #5cb85c;"><i class="fa fa-circle"></i></span>
                        </center>
                      </div>
                    {{-- <div class="row justify-content-md-center">
                        <div class="col col-lg-5">
                          
                        </div>
                        <div class="col-md-auto">
                          texte
                        </div>
                      </div> --}}



                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link {{ Request::is('admin/dashboard') ? 'active':'' }}" href="{{ url('admin/dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>


                    <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/add-category') ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Les Catégories
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ Request::is('admin/category') || Request::is('admin/add-category') ? 'show':'' }}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ Request::is('admin/category') ? 'active':'' }}" href="{{ url('admin/category') }}">Liste des Catégories</a>
                            <a class="nav-link {{ Request::is('admin/add-category') ? 'active':'' }}" href="{{ url('admin/add-category') }}">Ajouter une catégories</a>
                            
                        </nav>
                    </div>

                    <a class="nav-link {{ Request::is('admin/posts') || Request::is('admin/add-post') ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Les Articles
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ Request::is('admin/posts') || Request::is('admin/add-post') ? 'show':'' }}" id="collapsePost" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ Request::is('admin/posts') ? 'active':'' }}" href="{{ url('admin/posts') }}">Liste des Articles</a>
                            <a class="nav-link {{ Request::is('admin/add-post') ? 'active':'' }}" href="{{ url('admin/add-post') }}">Ajouter un Article</a>
                            
                        </nav>
                    </div>

                    <a class="nav-link {{ Request::is('admin/animes') || Request::is('admin/add-anime') ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAnime" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Les Animes à venir
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ Request::is('admin/animes') || Request::is('admin/add-anime') ? 'show':'' }}" id="collapseAnime" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ Request::is('admin/animes') ? 'active':'' }}" href="{{ url('admin/animes') }}">Liste des Animes</a>
                            <a class="nav-link {{ Request::is('admin/add-anime') ? 'active':'' }}" href="{{ url('admin/add-anime') }}">Ajouter un Anime</a>
                            
                        </nav>
                    </div>


                    {{-- <a class="nav-link {{ Request::is('admin/animes') || Request::is('admin/add-anime') ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Anime
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ Request::is('admin/animes') || Request::is('admin/add-anime') ? 'show':'' }}" id="collapsePost" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ Request::is('admin/animes') ? 'active':'' }}" href="{{ url('admin/posts') }}">Liste des animes à venir</a>
                            <a class="nav-link {{ Request::is('admin/add-anime') ? 'active':'' }}" href="{{ url('admin/add-anime') }}">Ajouter un nouvel anime</a>
                            
                        </nav>
                    </div> --}}

                    
                    <a class="nav-link {{ Request::is('admin/users') ? 'active':'' }}" href="{{ url('admin/users') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        Utilisateurs
                    </a>

                    <div class="sb-sidenav-menu-heading">Config</div>
                    <a class="nav-link" href="{{ url("/") }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                        Aperçu du site
                    </a>
                    <a class="nav-link" href="{{ url('admin/settings') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                        Paramètres du site
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Conneté avec</div>
                Firefox !
            </div>
        </nav>
    </div>