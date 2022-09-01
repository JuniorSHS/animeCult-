@extends('layouts.profil')

@section('title',  $membres->name . ' || Profil')

@section('content')


<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
                    <img src="{{ asset('uploads/membres/'.$membres->avatar) }}" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                        {{ $membres->name }}
					</div>
					<div class="profile-usertitle-job">
                        Rôle
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">
                        <i class="fa-solid fa-user-plus"></i> Ajouter
                    </button>
                    <br><br>
					<button type="button" class="btn btn-danger btn-sm">
                        <i class="fa-solid fa-heart"></i> liker le profil
                    </button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="{{ url("/") }}">
							<i class="glyphicon glyphicon-home"></i>
							Retour sur le site </a>
						</li>
						<li>
							<a href="https://codepen.io/jasondavis/pen/jVRwaG?editors=1000">
							<i class="glyphicon glyphicon-user"></i>
							Modifier le profil </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Signaler l'utilisateur</a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			   
           <div class="portlet light bordered">
        <!-- STAT -->
          <div class="row list-separated profile-stat">
            <div class="col-md-4 col-sm-4 col-xs-6">
              <div class="uppercase profile-stat-title"> 0 </div>
                <div class="uppercase profile-stat-text"> Poste </div>
               </div>
                 <div class="col-md-4 col-sm-4 col-xs-6">
                  <div class="uppercase profile-stat-title"> 0 </div>
                   <div class="uppercase profile-stat-text"> Message </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="uppercase profile-stat-title"> 0 </div>
                    <div class="uppercase profile-stat-text"> Nb j'aime </div>
                     </div>
                    </div>
                    <!-- END STAT -->
             <div>
              <h4 class="profile-desc-title"><center>A propos de {{ $membres->name }}</center></h4>
               <span class="profile-desc-text">
                <center>
                - Age <br>
                - Sexe <br>
                - Date d'inscription <br>
                - Date de dernière connexion 
                <br><br>
              </center>
              </span>

               <h4 class="profile-desc-title"><center>Lien utile</center></h4>
               <div class="margin-top-20 profile-desc-link">
                 <i class="fa fa-globe"></i>
                  <a href="#" style="text-decoration: none; color: #d55555;">VotreSite.com</a>
                    </div>
                     <div class="margin-top-20 profile-desc-link">
                        <i class="fa-brands fa-twitter"></i>
                    <a href="#" style="text-decoration: none; color: #d55555;">@MonTwitter</a>
                </div>
              <div class="margin-top-20 profile-desc-link">
                <i class="fa-brands fa-discord"></i>
           <a href="#" style="text-decoration: none; color: #d55555;">MonDiscord#1234</a>
 </div>
</div>
</div>                   

		</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
                <center><p>
                    <font color="#ff0000">V</font><font color="#ff0f00">o</font><font color="#ff1e00">t</font><font color="#ff2d00">r</font><font color="#ff3c00">e</font>
                    <font color="#ff4b00"> </font>
                    <font color="#ff5a00">S</font><font color="#ff6900">u</font><font color="#ff7800">p</font><font color="#ff8700">e</font><font color="#ff9600">r</font>
                    <font color="#ffa500"> </font>
                    <font color="#ffb400">P</font><font color="#ffc300">r</font><font color="#ffd200">o</font><font color="#ffe100">f</font><font color="#fff000">i</font><font color="#ffff00">l</font>
                </p>
                <p>
                  Pour modifier votre profil, vous devrez avoir un compte premium.
                </p>
              </center>
            </div>
		</div>
	</div>
</div>


@endsection
