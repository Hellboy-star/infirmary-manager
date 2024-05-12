<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<head>
  <meta charset="utf-8" />
  <title>{{page_titre($titre ?? '')}}</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="{{asset('assets/img/logo/soneb.ico')}}" rel="shortcut icon" />
  <script src="https://kit.fontawesome.com/c11bf85a09.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{asset('assets/css/vendor.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/default/app.min.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/js/aj.min.js')}}"></script>
  <script src="{{asset('assets/plugins/chart.js/dist/Chart.min.js')}}"></script>
  <link href="{{asset('assets/plugins/bootstrap-icons/font/bootstrap-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/plugins/bootstrap-social/bootstrap-social.css')}}" rel="stylesheet" />


  <link href="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/plugins/moment/min/moment.min.js')}}"></script>
  <script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <link href="{{asset('assets/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js')}}"></script>
  <link href="{{asset('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
  <link href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/plugins/select2/dist/js/select2.min.js')}}"></script>

  <link href="{{asset('assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}"
    rel="stylesheet" />
  <link href="{{asset('assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" />


  <?php

use Illuminate\Support\Facades\Auth;

    header("refresh:600");
  ?>

</head>

<body>

  <div id="loader" class="app-loader">
    <span class="spinner"></span>
  </div>

  <divid="app" class="app app-header-fixed app-sidebar-fixed">

    <div id="header" class="app-header">

      <div class="navbar-header">
        <a href=" {{ request()-> is('home') ? 'active': '/' }} " class="navbar-brand"><span> <img style="height: 25px;"
              src="{{asset('assets/img/logo/soneb.jpg')}}" class="media-object" alt="" />
          </span><b>INFIRMERIE SONEB</b></a>
        <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>


      <div class="navbar-nav">
        <div class="navbar-item navbar-form">
          <form action="#" method="POST" name="search">

          </form>
        </div>
        <!-- <div class="navbar-item dropdown">
          <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
            <i class="bi bi-bell"></i>
            <span class="badge">5</span>
          </a>
          <div class="dropdown-menu media-list dropdown-menu-end">
            <div class="dropdown-header">NOTIFICATIONS (5)</div>
            <a href="javascript:;" class="dropdown-item media">
              <div class="media-left">
                <i class="bi bi-bug media-object bg-gray-500"></i>
              </div>
              <div class="media-body">
                <h6 class="media-heading">Server Error Reports <i class="bi bi-exclamation-circle text-danger"></i></h6>
                <div class="text-muted fs-10px">3 minutes ago</div>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item media">
              <div class="media-left">
                <img src="{{asset('assets/img/user/user-1.jpg')}}" class="media-object" alt="" />
                <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
              </div>
              <div class="media-body">
                <h6 class="media-heading">John Smith</h6>
                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                <div class="text-muted fs-10px">25 minutes ago</div>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item media">
              <div class="media-left">
                <img src="{{asset('assets/img/user/user-2.jpg')}}" class="media-object" alt="" />
                <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
              </div>
              <div class="media-body">
                <h6 class="media-heading">Olivia</h6>
                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                <div class="text-muted fs-10px">35 minutes ago</div>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item media">
              <div class="media-left">
                <i class="bi bi-plus media-object bg-gray-500"></i>
              </div>
              <div class="media-body">
                <h6 class="media-heading"> New User Registered</h6>
                <div class="text-muted fs-10px">1 hour ago</div>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item media">
              <div class="media-left">
                <i class="bi bi-envelope media-object bg-gray-500"></i>
                <i class="fab fa-google text-warning media-object-icon fs-14px"></i>
              </div>
              <div class="media-body">
                <h6 class="media-heading"> New Email From John</h6>
                <div class="text-muted fs-10px">2 hour ago</div>
              </div>
            </a>
            <div class="dropdown-footer text-center">
              <a href="javascript:;" class="text-decoration-none">View more</a>
            </div>
          </div>
        </div> -->
        @guest

        @else

        <div class="navbar-item navbar-user dropdown">
          <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
            <img src="{{asset('assets/img/user/user-13.png')}}" alt="" />
            <span>
              <span class="d-none d-md-inline">

              <?php
                $na = Auth::user()->name;
                $i = App\models\personnel::where('MATSA', $na)->first();
                $a = App\models\User::where('name', $na)->first();
                
                // Affichage du prénom s'il existe, sinon chaîne vide
                echo !empty($i->PRESA) ? $i->PRESA : '';
                
                echo ' ';
                
                // Affichage du nom s'il existe, sinon chaîne vide
                echo !empty($i->NOMSA) ? $i->NOMSA : '';
                
                echo ' ';
                
                // Affichage du profil utilisateur s'il existe, sinon chaîne vide
                echo !empty($a->Profil) ? $a->Profil : '';
              ?>


              </span>
              <b class="caret"></b>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end me-1">
          
            <a href="#pass" data-bs-toggle="modal" class="dropdown-item">Changer Mot de passe</a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Se deconnecter') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>

        </div>

        @endguest
      </div>

    </div>

    <div id="sidebar" class="app-sidebar app-sidebar-transparent">

      <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

        <div class="menu">
          <div class="menu-profile">
            <!-- <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile"
              data-target="#appSidebarProfileMenu"> -->
              <div class="menu-profile-cover with-shadow"></div>
              
              <div class="menu-profile-info">
                <div class="d-flex align-items-center">
                  <div class="flex-grow-1">
                    <h3 class="align-items-center">CENTRE HOSPITALIER DE SANTE DE LA SONEB</h3>

                    <!-- <a href=" {{ request()-> is('home') ? 'active': '/' }} "> </a> -->

                    <h6>
                      <?php
                      
                      ?> 
                    </h6>
                  </div>
                  <div class="menu-caret ms-auto"></div>
                </div>
                <small>
                  <?php
                  
                  ?>
                </small>
              </div>
            </a>
          </div>
          <div class="menu-header">Navigation</div>
          @if (auth()->check() && auth()->user()->isDir())
          <div class="menu-item #">
            <a href=" {{('/personnel')}} " class="menu-link">
              <div class="menu-icon">
                <i class="fa fa-table"></i>
              </div>
              <div class="menu-text">Liste du Personnel </div>
            </a>
          </div>

          <div class="menu-item #">
            <a href=" {{('/personfam')}} " class="menu-link">
              <div class="menu-icon">
                <i class="fa fa-table"></i>
              </div>
              <div class="menu-text">Liste des Familles (Personnel) </div>
            </a>
          </div>

          <div class="menu-item #">
            <a href=" {{('/registres')}} " class=" menu-link">
              <div class="menu-icon">
                <i class="fa fa-table"></i>
              </div>
              <div class="menu-text">Régistres </div>
            </a>
          </div>

          <!-- <div class="menu-item #">
              <a href=" {{ request()-> is('rat') ? 'active': '/rat' }} " class="menu-link">
                  <div class="menu-icon">
                      <i class="fa fa-table"></i>
                  </div>
                  <div class="menu-text">Régistre d'Accident de Travail </div>
              </a>
          </div>
          <div class="menu-item #">
              <a href=" {{ request()-> is('rcs') ? 'active': '/rcs' }} " class="menu-link">
                  <div class="menu-icon">
                      <i class="fa fa-table"></i>
                  </div>
                  <div class="menu-text">Régistre de Consultation Spécialisée </div>
              </a>
          </div>
          <div class="menu-item #">
              <a href=" {{ request()-> is('rmp') ? 'active': '/rmp' }} " class="menu-link">
                  <div class="menu-icon">
                      <i class="fa fa-table"></i>
                  </div>
                  <div class="menu-text">Régistre des Maladies Professionnelles </div>
              </a>
          </div>

          <div class="menu-item #">
              <a href=" {{ request()-> is('rvms') ? 'active': '/rvms' }} " class="menu-link">
                  <div class="menu-icon">
                      <i class="fa fa-table"></i>
                  </div>
                  <div class="menu-text">Régistre des Visite Médicale Spéciale </div>
              </a>
          </div>

          <div class="menu-item #">
              <a href=" {{ request()-> is('rom') ? 'active': '/rom' }} " class="menu-link">
                  <div class="menu-icon">
                      <i class="fa fa-table"></i>
                  </div>
                  <div class="menu-text">Ordonnance Médicale </div>
              </a>
          </div>

          <div class="menu-item #">
              <a href=" {{ request()-> is('vac') ? 'active': '/vac' }} " class="menu-link">
                  <div class="menu-icon">
                      <i class="fa fa-table"></i>
                  </div>
                  <div class="menu-text">Régistre de Vaccination </div>
              </a>
          </div> -->

          <!-- <div class="menu-item #">
            <a href=" {{('/chs')}}} " class=" menu-link">
              <div class="menu-icon">
                <i class="fa fa-table"></i>
              </div>
              <div class="menu-text">Rapport Annuel CHS </div>
            </a>
          </div>

          <div class="menu-item #">
            <a href=" {{('/annee')}} " class=" menu-link">
              <div class="menu-icon">
                <i class="fa fa-table"></i>
              </div>
              <div class="menu-text">Tableaux Annexes </div>
            </a>
          </div> -->

          <div class="menu-item has-sub">
            <a href="javascript:;" class="menu-link">
              <div class="menu-icon">
                <i class="fa fa-sitemap"></i>
              </div>
              <div class="menu-text">Formulaires</div>
              <div class="menu-caret"></div>
            </a>
            <div class="menu-submenu">
              <div class="menu-item">
                <a href=" {{('/soinfamf')}} " class="menu-link">
                  <div class="menu-text"> Soins membre de famille </div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrat')}} " class="menu-link">
                  <div class="menu-text"> Accident de Travail </div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrcs')}} " class="menu-link">
                  <div class="menu-text"> Consultation Spontanée </div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrmp')}} " class="menu-link">
                  <div class="menu-text">Maladie Professionnelle</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrvms')}} " class="menu-link">
                  <div class="menu-text">Visite Médicale Spécialisé</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrvac')}} " class="menu-link">
                  <div class="menu-text">Vaccination</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrom')}} " class="menu-link">
                  <div class="menu-text">Ordonnance Médicale</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formabs')}} " class="menu-link">
                  <div class="menu-text">Absentéisme</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formaptit')}} " class="menu-link">
                  <div class="menu-text">Aptitude</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formconvoc')}} " class="menu-link">
                  <div class="menu-text">Convocation</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formante')}} " class="menu-link">
                  <div class="menu-text">Antecedents</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/poste')}} " class="menu-link">
                  <div class="menu-text">Postes</div>
                </a>
              </div>
              <!-- <div class="menu-item">
                <a href=" {{('/etab1')}} " class="menu-link">
                  <div class="menu-text">Tableau 01 et 02</div>
                </a>
              </div> -->
              <!-- <div class="menu-item">
                <a href=" {{('/etab3')}} " class="menu-link">
                  <div class="menu-text">Tableau 03</div>
                </a>
              </div> -->
              <!-- <div class="menu-item">
                <a href=" {{ request()-> is('etab4') ? 'active': '/etab4' }} " class="menu-link">
                  <div class="menu-text">Tableau 04</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{ request()-> is('etab5') ? 'active': '/etab5' }} " class="menu-link">
                  <div class="menu-text">Tableau 05</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{ request()-> is('etab6') ? 'active': '/etab6' }} " class="menu-link">
                  <div class="menu-text">Tableau 06</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{ request()-> is('etab7') ? 'active': '/etab7' }} " class="menu-link">
                  <div class="menu-text">Tableau 07</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{ request()-> is('etab8') ? 'active': '/etab8' }} " class="menu-link">
                  <div class="menu-text">Tableau 08</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{ request()-> is('etab9') ? 'active': '/etab9' }} " class="menu-link">
                  <div class="menu-text">Tableau 09</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{ request()-> is('etab10') ? 'active': '/etab10' }} " class="menu-link">
                  <div class="menu-text">Tableau 10</div>
                </a>
              </div> -->
            </div>
          </div>
          @endif


          @if (auth()->check() && auth()->user()->isAssis())

            <div class="menu-item #">
                <a href=" {{ request()-> is('soinfam') ? 'active': '/soinfam' }} " class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <div class="menu-text">Régistre des Soins de membre de famille </div>
                </a>
            </div>
            <div class="menu-item #">
                <a href=" {{('/rat')}} " class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <div class="menu-text">Régistre d'Accident de Travail </div>
                </a>
            </div>
            <div class="menu-item #">
                <a href=" {{('/rcs')}} " class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <div class="menu-text">Régistre de Consultation Spécialisée </div>
                </a>
            </div>
            <div class="menu-item #">
                <a href=" {{('/rmp')}} " class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <div class="menu-text">Régistre des Maladies Professionnelles </div>
                </a>
            </div>
  
            <div class="menu-item #">
                <a href=" {{('/rvms')}} " class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <div class="menu-text">Régistre des Visite Médicale Spéciale </div>
                </a>
            </div>
  
            <div class="menu-item #">
                <a href=" {{('/vac')}} " class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <div class="menu-text">Régistre de Vaccination </div>
                </a>
            </div>

            <!-- <div class="menu-item #">
                <a href=" {{('/aptitude')}} " class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <div class="menu-text">Régistre d'Aptitude </div>
                </a>
            </div> -->

            <div class="menu-item has-sub">
            <a href="javascript:;" class="menu-link">
              <div class="menu-icon">
                <i class="fa fa-sitemap"></i>
              </div>
              <div class="menu-text">Formulaires</div>
              <div class="menu-caret"></div>
            </a>
            <div class="menu-submenu">
              <div class="menu-item">
                <a href=" {{('/soinfamf')}} " class="menu-link">
                  <div class="menu-text"> Soins membre de famille </div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrat')}} " class="menu-link">
                  <div class="menu-text"> Accident de Travail </div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrcs')}} " class="menu-link">
                  <div class="menu-text"> Consultation Spontanée </div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrmp')}} " class="menu-link">
                  <div class="menu-text">Maladie Professionnelle</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrvms')}} " class="menu-link">
                  <div class="menu-text">Visite Médicale Spécialisé</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrvac')}} " class="menu-link">
                  <div class="menu-text">Vaccination</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrom')}} " class="menu-link">
                  <div class="menu-text">Ordonnance Médicale</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formabs')}} " class="menu-link">
                  <div class="menu-text">Absentéisme</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formaptit')}} " class="menu-link">
                  <div class="menu-text">Aptitude</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formconvoc')}} " class="menu-link">
                  <div class="menu-text">Convocation</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formante')}} " class="menu-link">
                  <div class="menu-text">Antecedents</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/poste')}} " class="menu-link">
                  <div class="menu-text">Postes</div>
                </a>
              </div>
              
            </div>
          </div>
  
          @endif 


          @if (auth()->check() && auth()->user()->isAdmin())
              <div class="menu-item">
                  <a href="{{ route('audit') }}" class="menu-link">
                      <div class="menu-icon">
                        <i class="fa fa-archive"></i>
                      </div>
                      <div class="menu-text">Gestion des données</div>
                  </a>
              </div>
              <div class="menu-item has-sub {{ request()->is('register') ? 'active' : '' }}">
                  <a href="{{ route('register') }}" class="menu-link">
                      <div class="menu-icon">
                          <i class="fa fa-id-card"></i>
                      </div>
                      <div class="menu-text">Gestion des Utilisateurs</div>
                  </a>
              </div>
          @endif


          <div class="menu-item d-flex">
            <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i
                class="fa fa-angle-double-left"></i></a>
          </div>

        </div>

      </div>

    </div>
    </div>

    <div class="app-sidebar-bg"></div>
    <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a>
    </div>
    <div class="app-sidebar-bg"></div>
    <div class="app-sidebar-mobile-backdrop">
      <a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a>
    </div>

    <div class="main">
     
        <br><br>
      @yield('contenta')
            
    </div>


    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i
        class="bi bi-angle-up"></i></a>

    </div>

    <div class=" modal fade" id="pass">
      <div class="modal-dialog modal-md">
        <div style="background-color: #e2e2e2 ;" class="modal-content">
          <form method="POST" action="{{route('user.updatePassword')}}">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Changer son mot de passe</h4>
                </div>
            </div>
            <div style="background-color: #e2e2e2 ;" class="modal-body">
              @csrf
              <div class="row"> 
                <div class="col-xl-5 mb-3">
                  <label class="form-label" for="exampleInputEmail1">Matricule</label>
                  <input type="text" class="form-control form-control-sm" value="
                    <?php
                        
                        $na = Auth::user()->name;
                        // $i = App\models\personnel::Where('MATSA', $na)->first();
                        $i = App\models\User::Where('name', $na)->first();
                        // echo $i->MATSA;
                        echo $i->name;
                    ?>
                  "  readonly>
                </div>
                <div class="col-xl-7 mb-3">
                  <label class="form-label" for="exampleInputPassword1">Email</label>
                  <input readonly type="email" class="mail form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="
                    <?php
                        $na = Auth::user()->name;
                        $i = App\models\User::Where('name', $na)->first();
                        echo $i->email;
                    ?>
                  "  required autocomplete="email" />
                </div>
                <div class="col-xl-6 mb-3">
                  <label class="form-label" for="exampleInputPassword1">Ancien mot de passe</label>
                  <input  type="text" class="old form-control form-control-sm @error('old') is-invalid @enderror" id="old"  name="old" value="" required autocomplete="old" />
                </div>
                <div class="col-xl-6 mb-3">
                  <label class="form-label" for="exampleInputPassword1">Nouveau mot de passe</label>
                  <input  type="password" class="pas form-control form-control-sm @error('pas') is-invalid @enderror" id="pas" name="pas" value="" required autocomplete="pas" placeholder="Minimum 8 caractères" />
                </div>
                <div class="col-xl-12 mb-3">
                  <label class="form-label" for="exampleInputPassword1">Confirmer nouveau mot de passe</label>
                  <input  type="password" class="confirmed form-control form-control-sm @error('confirmed') is-invalid @enderror" id="confirmed" name="confirmed" value="" required autocomplete="confirmed" placeholder="Minimum 8 caractères" />
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                <!-- <a id="up_pas" class="up_pas btn btn-primary" type="submit">Changer mon mot de passe</a> -->
                <button type="submit" id="up_pas" name="up_pas" class="btn btn-primary">Changer mon mot de passe</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    </div>


    <!-- <script type="text/javascript">
        $(document).ready( function () {

    $(document).on('click','#up_pas', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            var $old = $('#old').val();
            var $pas = $('#pas').val();
            //let pas = $(this).attr('id');
        
        console.log(id);
        let csrf = '{{ csrf_token() }}';
           
            var data = {
             
                'password' : $('#pas').val(),
                'old' : $old,
                'pas' : $pas,
                

            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
               
            
            $.ajax({
                type:"PUT",
                url:"/up-pass/"+id,
                data:data,
                dataType:"json",
                success: function(response){
                 console.log(response);

                    if(response.status==200){
                        $.gritter.add({
                            title: 'Notification',
                            text: 'Modification effectuée avec succès',
                            time: 4000,
                            class_name: 'my-sticky-class gritter-light',
                            style_name: 'background-color:red',
                            before_open: function(){ },
                            after_open: function(e){ },
                            before_close: function(manual_close) { },
                            after_close: function(manual_close){ } 
                        });


                        $('#pass').modal('hide');
                        $('#pass').find('input').val("");
                        fetchtv();
                    }else{

                        $.gritter.add({
                            title: 'Notification',
                            text: 'Cette information existe déja !!!',
                            time: 4000,
                            class_name: 'my-sticky-class gritter-light',
                            style_name: 'background-color:red',
                            before_open: function(){ },
                            after_open: function(e){ },
                            before_close: function(manual_close) { },
                            after_close: function(manual_close){ } 
                            

                        });
                    // $('#smtv').modal('hide');
                      //  fetchtv();

                    };
                }

            })
        });
        });
        </script> -->







    <script src="{{asset('assets/js/vendor.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/app.min.js')}}" type="text/javascript"></script>


    <script src="{{asset('assets/plugins/highlightjs/cdn-assets/highlight.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo/render.highlight.js')}}" type="text/javascript"></script>



    <script src="{{asset('assets/plugins/gritter/js/jquery.gritter.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert/dist/sweetalert.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo/ui-modal-notification.demo.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"
      type="text/javascript"></script>

    <script src="{{asset('assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-buttons/js/buttons.flash.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-buttons/js/buttons.html5.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-buttons/js/buttons.print.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jszip/dist/jszip.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/chart.js/dist/Chart.min.js')}}"></script>

    <script src="{{asset('assets/js/rocket-loader.min.js')}}" data-cf-settings="a78dc8ef45d27e685eaf4c36-|49"
      defer=""></script>

    <script src="{{asset('ex/tableExport.js')}}"></script>

</body>

<!-- Mirrored from seantheme.com/color-admin/admin/html/ui_social_buttons.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2022 08:58:49 GMT -->

</html>