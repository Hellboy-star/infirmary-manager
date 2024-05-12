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

    header("refresh:300");
  ?>

</head>

<body>

  <div id="loader" class="app-loader">
    <span class="spinner"></span>
  </div>

  <divid="app" class="app app-header-fixed">

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
        
        @guest

        @else

        <div class="navbar-item navbar-user dropdown">
          <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
            <img src="{{asset('assets/img/user/user-13.png')}}" alt="" />
            <span>
              <span class="d-none d-md-inline">

                <?php
                  $na = Auth::user()->name;
                  $i = App\models\personnel::Where('MATSA', $na)->first();
                  echo $i->PRESA;
                  echo ' ';
                  echo $i->NOMSA;
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

    </div>

    

    <div class="main">
      
        <br><br>
      
        
            <div id="content" class="app-content">
            <div>
                <div class="invoice-content">


                <div class="invoice-company">
                    <span class="float-end hidden-print">
                    <a href=" {{ route('personnel.generatePDF', ['id' => $empsaa0->id]) }} " target="_blank" class="btn btn-sm btn-white mb-10px"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
                    <a href="javascript:;" onclick="if (!window.__cfRLUnblockHandlers) return false; window.print()" class="btn btn-sm btn-white mb-10px" data-cf-modified-7e50cd0cbefb22ffc16a0859-=""><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                    </span>
                </div>


                    <div class="card-body container-fluid" id="container">
                    <div class="row">


                        <div class="card-body container-fluid"  style="font-size: large;">
                            <h2 style="text-align: center;">I- FICHE D'IDENTIFICATION</h2>
                            <div class="row">
                                    NOM :  {{$empsaa0->NOMSA}} <br><br>
                                    PRENOMS :  {{$empsaa0->PRESA}} <br><br>
                                    DATE DE NAISSANCE LIEU :  {{$empsaa0->ANCSA}} <br><br>
                                    SEXE : {{$empsaa0->SEXSA}}  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; NATIONALITE : {{$empsaa0->NATSA}}  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; TAILLE : <br><br>
                                    GROUPE SANGUIN-RHESUS : <br><br>
                                    ELECTROPHORESE DE L'HEMOGLOBINE : <br><br>
                                    SITUATION MATRIMONIALE :{{$empsaa0->SITSA}} <br><br>
                                    NOMBRE D'ENFANTS A CHARGE : {{$empsaa0->CHASA}}  <br><br>
                                    ADRESSE PERSONNELLE :   <br><br>
                                    N° D'AFFILIATION A LA CNSS : {{$empsaa0->SECSA}}  <br><br>
                                    PERSONNES A PREVENIR EN CAS D'ACCIDENT (NOMS, LIEN ET TELEPHONES) : <br><br>
                                    DATE D'EMBAUCHE : {{$empsaa0->DNASA}}  <br><br>
                                    DATE DE DEPART DE L'ENTREPRISE : <br><br>
                                    MOTIF DU DEPART : <br><br>
                                    QUALIFICATION : {{$empsaa0->LEMSA}}  <br><br>
                                </div>
                        </div>
                        <div style="page-break-after: always;" ></div>


                        <div class="card-body container-fluid" id="index_at">
                            <h2 style="text-align: center;"> II- FICHE ANTECEDENTS</h2>
                        <table class="table caption-top table-bordered ">
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th> </th>
                                    <th scope="col">MEDICAUX</th>
                                    <th scope="col">CHIRURGICAUX</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empsaa00 as $empsaa00)
                                <tr>
                                
                                    <td> PERSONNELS </td>
                                    <td>
                                        Hypertension artérielle :  {{$empsaa00->HYPER}}<br>
                                        Hypotension  artérielle : {{$empsaa00->HYPO}}<br>
                                        Diabète : {{$empsaa00->DIABETE}}<br>
                                        Ulcère : {{$empsaa00->ULCERE}}<br>
                                        Asthme : {{$empsaa00->ASTHME}}<br>
                                        Sinusite : {{$empsaa00->SINUSITE}}<br>
                                        Maladie hémorroïdaire : {{$empsaa00->HEMOROIDE}}<br>
                                        Epilepsie : {{$empsaa00->EPILEPSIE}}<br>
                                        Drépanocytose : {{$empsaa00->DREPANO}}<br>
                                        Hépatite : {{$empsaa00->HEPATIE}}<br>
                                        Autres : {{$empsaa00->AUTRES}}<br>
                                    </td>
                                    <td> {{$empsaa00->PEC}}</td>
                            
                                </tr>
                                @endforeach
                                @foreach ($empsaa000 as $empsaa000)
                                <tr>
                                
                                    <td> PROFESSIONNELS</td>
                                    <td> {{$empsaa000->PRM}}</td>
                                    <td> {{$empsaa000->PRC}}</td>
                                
                                </tr>
            @endforeach
            @foreach ($empsaa0000 as $empsaa0000)
                                <tr>
                                
                                    <td> FAMILIAUX </td>
                                    <td>
                                        Père: HTA:{{$empsaa0000->PHTA}}<br>
                                            Diabète:{{$empsaa0000->PDIABETE}}<br>
                                            Autres:{{$empsaa0000->PAUTRE}}<br>
                                        Mère: HTA: {{$empsaa0000->MHTA}}<br>
                                            Diabète: {{$empsaa0000->MDIABETE}}<br>
                                            Autres: {{$empsaa0000->MAUTRE}}<br>
                                    </td>
                                    <td> {{$empsaa0000->FAC}}</td>
                                
                                </tr>
            @endforeach
            @foreach ($empsaa00000 as $empsaa00000)
                                <tr>
                                
                                    <td> SOCIAUX </td>
                                    <td>
                                        PERSONNELS<br>
                                        Tabac: {{$empsaa00000->TABAC}}<br>
                                        Alcool: {{$empsaa00000->ALCOOL}}
                                    </td>
                                    <td> {{$empsaa00000->SOF}}</td>
                                
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="page-break-after: always;" ></div>



                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;"> III- FICHE POSTE</h2>
                    <h4 style="text-align: center;">1.POSTES DE TRAVAIL OCCUPES ANTERIEUREMENT</h4>
                                <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>DENOMINATION</th>
                                                <th>ENTREPRISE</th>
                                                <th>PERIODE</th>
                                                <th>FACTEURS DE NUISANCE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($empsaa1 as $index=>$empsaa1)
                                            <tr>
                                                <td>{{($index+1)}}</td>
                                                <td> {{$empsaa1->DENOMINATION}}</td>
                                                <td>{{$empsaa1->ENTREPRISE}}</td>
                                                <td>
                                                    {{$empsaa1->PERIODEDU}}
                                                    {{$empsaa1->PERIODEAU}}
                                                </td>
                                                <td>{{$empsaa1->FACTEURNUI}}</td>
                                            
                                </tr>
                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div style="page-break-after: always;" ></div>
                                <br><br>
                                <h4 style="text-align: center;">2. POSTES OCCUPES ACTUELLEMENT</h4>
                                <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>PERIODE</th>
                                                <th>POSTE</th>
                                                <th>TACHES</th>
                                                <th>RYTHME DE TRAVAIL</th>
                                                <th>FACTEURS DE NUISANCE</th>
                                                <th>METROLOGIE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa1 as $empsaa1)
                                            <tr>
                                
                                                <td>
                                                    DU {{$empsaa1->PERIODEDU}}<br>
                                                    AU {{$empsaa1->PERIODEAU}}
                                                </td>
                                                <td> {{$empsaa1->LEMSA}} </td>
                                                <td> {{$empsaa1->TACHES}}</td>
                                                <td>{{$empsaa1->RYTMTAF}}</td>
                                                <td>{{$empsaa1->FACTEURNUI}}</td>
                                                <td>
                                                    DATE: {{$empsaa1->METRODATE}}<br>
                                                    TYPE: {{$empsaa1->METROTYPE}}<br>
                                                    R: {{$empsaa1->METROR}}
                                                </td>
                                            
                                </tr>
                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <div style="page-break-after: always;" ></div>


                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;">IV- FICHE VACCINATION</h2>
                    <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>DATE</th>
                                                <th>VACCIN</th>
                                                <th>LOT</th>
                                                <th>TYPE</th>
                                                <th>DOSE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa2 as $empsaa2)
                                            <tr>
                                                <td> {{$empsaa2->DATE}} </td>
                                                <td> {{$empsaa2->VACCIN}}</td>
                                                <td>{{$empsaa2->LOT}}</td>
                                                <td>{{$empsaa2->TYPE}}</td>
                                                <td>{{$empsaa2->DOSE}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <div style="page-break-after: always;" ></div>



                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;"> V- FICHE ABSENTEISME</h2>
                    <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>TYPE</th>
                                                <th style="width: 25%;">CAUSE</th>
                                                <th>DEBUT</th>
                                                <th>REPRISE</th>
                                                <th style="width: 15%;">NBRE DE JOURS D'ARRET</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa3 as $empsaa3)
                                            <tr>
                                                <td>{{$empsaa3->TYPEABS}} </td>
                                                <td>{{$empsaa3->CAUSE}}</td>
                                                <td>{{$empsaa3->DEBUT}}</td>
                                                <td>{{$empsaa3->REPRISE}}</td>
                                                <td>{{$empsaa3->NBRARRET}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                    <div style="page-break-after: always;" ></div>

                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;">VI- FICHE ACCIDENT DU TRAVAIL</h2>
                    <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>DATE</th>
                                                <th>ELEMENT MATERIEL CAUSAL</th>
                                                <th>NATURE DES LESIONS</th>
                                                <th>POSTE</th>
                                                <th>NBRE DE JOURS D'ARRET</th>
                                                <th>INCAPACITE PERMANENTE PARTIELLE (IPP)</th>
                                                <th>OBSERVATION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa4 as $empsaa4)
                                            <tr>
                                                <td>{{$empsaa4->DATECONS}}</td>
                                                <td>{{$empsaa4->CAUSEAT}}</td>
                                                <td>{{$empsaa4->NATURELESI}}</td>
                                                <td>{{$empsaa4->LEMSA}}</td>
                                                <td>{{$empsaa4->NBRARRETAT}}</td>
                                                <td>{{$empsaa4->SEXSA}}</td>
                                                <td>{{$empsaa4->OBSERVATIONAT}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                    <div style="page-break-after: always;" ></div>




                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;"> VII- FICHE MALADIE PROFESSIONNELLE</h2>
                    <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>DATE</th>
                                                <th>MALADIE</th>
                                                <th>N°TABLEAU</th>
                                                <th>AGENT CAUSAL</th>
                                                <th>POSTE</th>
                                                <th>DECISION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa5 as $empsaa5)
                                            <tr>
                                                <td> {{$empsaa5->DATEMP}} </td>
                                                <td> {{$empsaa5->MPDESIGNATION}}</td>
                                                <td>{{$empsaa5->MPNUMTAB}}</td>
                                                <td>{{$empsaa5->AGENTPATH}}</td>
                                                <td>{{$empsaa5->LEMSA}}</td>
                                                <td>{{$empsaa5->OBSERVATIONMP}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                    <div style="page-break-after: always;" ></div>


                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;"> VIII- FICHE CONVOCATION</h2>
                    <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Motif</th>
                                                <th>Date d'émission</th>
                                                <th>Date de convocation</th>
                                                <th>Date de présentation</th>
                                                <th>Observation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa6 as $index=>$empsaa6)
                                            <tr>
                                                <td> {{($index+1)}} </td>
                                                <td> {{$empsaa6->MOTIF}}</td>
                                                <td>{{$empsaa6->DATEEMIS}}</td>
                                                <td>{{$empsaa6->DATECONVOC}}</td>
                                                <td>{{$empsaa6->DATEPRES}}</td>
                                                <td>{{$empsaa6->OBSERVATION}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                    <div style="page-break-after: always;" ></div>


                    
                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;"> IX- FICHE CONSULTATION</h2>
                    <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>DATE</th>
                                                <th>PLAINTES</th>
                                                <th>CONSTANTES</th>
                                                <th>EXAMEN CLINIQUE</th>
                                                <th>DIAGNOSTIC</th>
                                                <th>BILAN</th>
                                                <th>TRAITEMENTS</th>
                                                <th>OBSERVATIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa7 as $index=>$empsaa7)
                                            <tr>
                                                <td> {{($index+1)}} </td>
                                                <td> {{$empsaa7->DATECS}}</td>
                                                <td>{{$empsaa7->PLAINTESCS}}</td>
                                                <td>{{$empsaa7->POULSCS}}</td>
                                                <td>{{$empsaa7->EXAMCLICS}}</td>
                                                <td>{{$empsaa7->DIAGNOSTIC}}</td>
                                                <td>{{$empsaa7->BILAN}}</td>
                                                <td>{{$empsaa7->TRAITEMENTCS}}</td>
                                                <td>{{$empsaa7->OBSERVATIONCS}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                    <div style="page-break-after: always;" ></div>

                <!-- VMS -->

                <div class="card-body container-fluid" style="font-size: large;">
                                    <div >N° FICHE ..........
                                        <div  style="text-align: right;">IT N°  <br><br>
                                            .............., le ......................................
                                        </div>
                                    </div>
                                    <h4 style="text-align: center;">VISITE MEDICALE  </h4>
                                    <div>Noms:</div>
                                    <div>Prénoms:</div>
                                    <div>Sexe:</div>
                                    <div>Postre de travail:</div>
                                    <br><br>

                                    <h4 style="font-weight: bold; text-decoration:solid;">I- Clinique</h4>
                                    <div>Plaintes:</div>
                                    <div>Mensurations:
                                        <div class="">
                                            Poids:  kg &nbsp;&nbsp;&nbsp;&nbsp; Taille:  m  &nbsp;&nbsp;&nbsp;&nbsp; TA:  / mmHg<br>
                                            PTI:  cm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PTE:  cm &nbsp;&nbsp;&nbsp;&nbsp; PA :  cm <br>
                                            Pouls:  pls/mm &nbsp;&nbsp;&nbsp;&nbsp; AV:OD:  /10 &nbsp;&nbsp;&nbsp;&nbsp; OG:  /10
                                        </div>
                                    </div>
                                    <div>Examen clinique:</div><br><br>

                                    <h4 style="font-weight: bold; text-decoration:solid;">II- Examens complémentaires</h4>
                                    <div>
                                        Biologie: 
                                            -Urines:  Glucosurie:  Albuminurie:<br>
                                            -Sang:
                                    </div>
                                    <div>Electocardiogramme:</div>
                                    <div>Audiométrie:</div>
                                    <div>Spirométrie:</div>
                                    <div>Rx pulmonaire:</div><br><br>

                                    <h4 style="font-weight: bold; text-decoration:solid;">III- Conduite à tenir</h4>
                                    <div>-</div>
                                    <div>-</div>
                                    <div>-Ordonnance médicale: </div><br><br>

                                    <h4 style="font-weight: bold; text-decoration:solid";>IV- Aptitude:</h4>
                                </div>


                    </div>
                    <div style="page-break-after: always;" ></div>
                    </div>
                </div>
            </div>


    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i
        class="bi bi-angle-up"></i></a>

    </div>

    <div class=" modal fade" id="pass">
            <div class="modal-dialog modal-md">
                <div style="background-color: #e2e2e2 ;" class="modal-content">

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
                            <input type="text" class="form-control-sm" value="" readonly>
                        </div>
                        <div class="col-xl-7 mb-3">
                            <label class="form-label" for="exampleInputPassword1">Email</label>
                            <input readonly type="email" class="mail form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" />

                        </div>

                       
                        <div class="col-xl-6 mb-3">
                            <label class="form-label" for="exampleInputPassword1">Ancien mot de passe</label>
                            <input  type="text" class="old form-control form-control-sm @error('old') is-invalid @enderror" id="old"  name="old" value="" required autocomplete="old" />

                        </div>

                        <div class="col-xl-6 mb-3">
                            <label class="form-label" for="exampleInputPassword1">Nouveau mot de passe</label>
                            <input  type="password" class="mail form-control form-control-sm @error('pas') is-invalid @enderror" id="pas" name="pas" value="" required autocomplete="pas" />

                        </div>

                        </div>


                    </div>

                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                        <a id="" class="up_pas btn btn-primary" type="submit">Changer mon mot de passe</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script type="text/javascript">
        $(document).ready( function () {

    $(document).on('click','.up_pas', function(e) {
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
        </script>







    <script src="{{asset('assets/js/vendor.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/app.min.js')}}" type="text/javascript"></script>


    <script src="{{asset('assets/plugins/highlightjs/cdn-assets/highlight.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo/render.highlight.js')}}" type="text/javascript"></script>



    <script src="../assets/plugins/gritter/js/jquery.gritter.js"></script>
    <script src="../assets/plugins/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
    <script src="../assets/js/demo/ui-modal-notification.demo.js" type="text/javascript"></script>
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