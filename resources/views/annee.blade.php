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
        <div class="invoice-content">


          <div class="invoice-company">
            <span class="float-end hidden-print">
              <a href="javascript:;" class="btn btn-sm btn-white mb-10px"><i
                  class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
              <a href="javascript:;" onclick="if (!window.__cfRLUnblockHandlers) return false; window.print()"
                class="btn btn-sm btn-white mb-10px" data-cf-modified-7e50cd0cbefb22ffc16a0859-=""><i
                  class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
          </div>


          <h1 style="text-align: center;" class="page-header mt-10px"> <strong> TABLEAUX ET DOCUMENTS A ANNEXER AU COURS DE
              L'ANNEE : {{$empsaa->ANNEE}} </strong> </h1>
          <div class="card-body container-fluid" id="container">
            <div class="row">

              <div class="card-body container-fluid">
                <h2>Tableau 01: PROGRAMME D'ACTIVITE DU CHS AU TITRE DE L'ANNEE {{$empsaa->ANNEE-1}} </h2>
                <div class="col-md-12 card-body  table-responsive" id="index_tab1">
                  <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                </div>
              </div>

              <div class="card-body container-fluid">
                <h2>Tableau 02: PROGRAMME D'ACTIVITE DU CHS AU TITRE DE L'ANNEE {{$empsaa->ANNEE}} </h2>
                <div class="col-md-12 card-body  table-responsive" id="index_tab2">
                  <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                </div>
              </div>

              <div class="card-body container-fluid">
                <h2>Tableau 03: CHRONOGRAMME D'EXECUTION DU PROGRAMME D'ACTIVITES DU CHS AU TITRE DE L'ANNEE
                  {{$empsaa->ANNEE}} </h2>
                <div class="col-md-12 card-body  table-responsive" id="index_tab3">
                  <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                </div>
              </div>

              <div class="card-body container-fluid">
                <h2>Tableau 04: RECAPITULATION DES ACCIDENTS SELON LE JOUR DE LA SEMAINE </h2>
                <div class="col-md-12 card-body  table-responsive" id="index_tab4">
                  <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                </div>
              </div>

              <div class="card-body container-fluid">
                <h2>Tableau 05: RECAPITULATION DES ACCIDENTS SELON L'AGE ET LE SEXE </h2>
                <div class="col-md-12 card-body  table-responsive" id="index_tab5">
                  <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                </div>
              </div>

              <div class="card-body container-fluid">
                <h2>Tableau 06: RECAPITULATION DES ACCIDENTS SELON LA LOCALISATION </h2>
                <div class="col-md-12 card-body  table-responsive" id="index_tab6">
                  <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                </div>
              </div>

              <div class="card-body container-fluid">
                <h2>Tableau 07: RECAPITULAION DES ACCIDENTS SELON LA NATURE DES LSIONS </h2>
                <div class="col-md-12 card-body  table-responsive" id="index_tab7">
                  <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                </div>
              </div>

              <div class="card-body container-fluid">
                <h2>Tableau 08: RECAPITULATION DES POLYACCIDENTES </h2>
                <div class="col-md-12 card-body  table-responsive" id="index_tab8">
                  <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                </div>
              </div>

              <div class="card-body container-fluid">
                <h2>Tableau 09: TAUX DE FREQUENCE MENSUEL DES ACCIDENTS AVEC ET SANS ARRET </h2>
                <div class="col-md-12 card-body  table-responsive" id="index_tab9">
                  <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                </div>
              </div>

              <div class="card-body container-fluid">
                <h2>Tableau 10: TAUX DE FREQUENCE MENSUEL DES ACCIDENTS AVEC ARRET </h2>
                <div class="col-md-12 card-body  table-responsive" id="index_tab0">
                  <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                </div>
              </div>

            </div>
          </div>
        </div>



   
<script type="text/javascript">
  $(document).ready(function () {

    tab1();

    function tab1() {
      $.ajax({
        url: "{{ url('/table1') }}",
        method: 'get',
        success: function (response) {

          $("#index_tab1").html(response);
          $(".table1").DataTable({
            order: [0, 'desc'],
            dom: 'Bfrtip',
            buttons: ['copy', 'excelHtml5', 'print'],
            language: {
              url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
            }
          });
        }
      });
    };
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {

    fetchat();

    function fetchat() {
      $.ajax({
        url: "{{ url('/fetch-at') }}",
        method: 'get',
        success: function (response) {

          $("#index_tab2").html(response);
          $(".table2").DataTable({
            order: [0, 'desc'],
            dom: 'Bfrtip',
            buttons: ['copy', 'excelHtml5', 'print'],
            language: {
              url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
            }
          });
        }
      });
    };
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {

    fetchat();

    function fetchat() {
      $.ajax({
        url: "{{ url('/fetch-at') }}",
        method: 'get',
        success: function (response) {

          $("#index_tab3").html(response);
          $(".table3").DataTable({
            order: [0, 'desc'],
            dom: 'Bfrtip',
            buttons: ['copy', 'excelHtml5', 'print'],
            language: {
              url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
            }
          });
        }
      });
    };
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {

    fetchat();

    function fetchat() {
      $.ajax({
        url: "{{ url('/fetch-at') }}",
        method: 'get',
        success: function (response) {

          $("#index_tab4").html(response);
          $(".table4").DataTable({
            order: [0, 'desc'],
            dom: 'Bfrtip',
            buttons: ['copy', 'excelHtml5', 'print'],
            language: {
              url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
            }
          });
        }
      });
    };
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {

    fetchat();

    function fetchat() {
      $.ajax({
        url: "{{ url('/fetch-at') }}",
        method: 'get',
        success: function (response) {

          $("#index_tab5").html(response);
          $(".table5").DataTable({
            order: [0, 'desc'],
            dom: 'Bfrtip',
            buttons: ['copy', 'excelHtml5', 'print'],
            language: {
              url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
            }
          });
        }
      });
    };
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {

    fetchat();

    function fetchat() {
      $.ajax({
        url: "{{ url('/fetch-at') }}",
        method: 'get',
        success: function (response) {

          $("#index_tab6").html(response);
          $(".table6").DataTable({
            order: [0, 'desc'],
            dom: 'Bfrtip',
            buttons: ['copy', 'excelHtml5', 'print'],
            language: {
              url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
            }
          });
        }
      });
    };
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {

    fetchat();

    function fetchat() {
      $.ajax({
        url: "{{ url('/fetch-at') }}",
        method: 'get',
        success: function (response) {

          $("#index_tab7").html(response);
          $(".table7").DataTable({
            order: [0, 'desc'],
            dom: 'Bfrtip',
            buttons: ['copy', 'excelHtml5', 'print'],
            language: {
              url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
            }
          });
        }
      });
    };
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {

    fetchat();

    function fetchat() {
      $.ajax({
        url: "{{ url('/fetch-at') }}",
        method: 'get',
        success: function (response) {

          $("#index_tab8").html(response);
          $(".table8").DataTable({
            order: [0, 'desc'],
            dom: 'Bfrtip',
            buttons: ['copy', 'excelHtml5', 'print'],
            language: {
              url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
            }
          });
        }
      });
    };
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {

    fetchat();

    function fetchat() {
      $.ajax({
        url: "{{ url('/fetch-at') }}",
        method: 'get',
        success: function (response) {

          $("#index_tab9").html(response);
          $(".table9").DataTable({
            order: [0, 'desc'],
            dom: 'Bfrtip',
            buttons: ['copy', 'excelHtml5', 'print'],
            language: {
              url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
            }
          });
        }
      });
    };
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {

    fetchat();

    function fetchat() {
      $.ajax({
        url: "{{ url('/fetch-at') }}",
        method: 'get',
        success: function (response) {

          $("#index_tab0").html(response);
          $(".table0").DataTable({
            order: [0, 'desc'],
            dom: 'Bfrtip',
            buttons: ['copy', 'excelHtml5', 'print'],
            language: {
              url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
            }
          });
        }
      });
    };
  });
</script>


        
        
        
        <script>
          document.getElementById('container').getContext('2d');
        </script>


      </div>
      <div style="page-break-after: always;" ></div>


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