<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<head>
  <meta charset="utf-8" />
  <title>{{page_titre($titre ?? '')}}</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="{{asset('assets/img/logo/soneb.ico')}}" rel="shortcut icon" />
  <script src="https://kit.fontawesome.com/c11bf85a09.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{asset('assets/css/vendor.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/default/app.min.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/js/aj.min.js')}}"></script>
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


  <!-- <?php

use Illuminate\Support\Facades\Auth;

    header("refresh:300");
  ?> -->

</head>

<body>

  <h1 style="text-align: center;" class="page-header mt-10px"> <strong> TABLEAUX ET DOCUMENTS A ANNEXER AU COURS DE L'ANNEE : {{$empsaa->ANNEE}} </strong> </h1>
  <div class="card-body container-fluid" id="container">
    <div class="row">
    <div class="card-body container-fluid">
      <h2 style="font-weight: bold; text-decoration:solid;">Tableau 01: PROGRAMME D'ACTIVITE DU CHS AU TITRE DE L'ANNEE {{$empsaa->ANNEE-1}} </h2>
      <div class="card-body container-fluid" id="index_">
        <table class="table table-striped table-bordered align-middle">
          <thead>
            <tr>
              <th>AXES D'INTERVENTION</th>
              <th>N°</th>
              <th>OBJECTIFS SPECIFIQUES</th>
              <th>ACTIVITES</th>
              <th>PERIODE D'EXECUTION</th>
              <th>INDICATEURS DE SUIVI</th>
              <th>SOURCE DE VERIFICATION</th>
              <th>COUT</th>
              <th>RESPONSABLES</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td>HYGIENE</td>
              <td>{{ $index+1}}</td>
              <td>{{$emp->OBJECTIF}}</td>
              <td>{{$emp->ACTIVITE}}</td>
              <td>{{$emp->PERIODE}}</td>
              <td>{{$emp->INDICATEUR}}</td>
              <td>{{$emp->SOURCE}}</td>
              <td>{{$emp->COUT}}</td>
              <td>{{$emp->RESPONSABLE}}</td>
            </tr>
            @endforeach
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td>SECURITE</td>
              <td>{{ $index+1}}</td>
              <td>{{$emp->OBJECTIF}}</td>
              <td>{{$emp->ACTIVITE}}</td>
              <td>{{$emp->PERIODE}}</td>
              <td>{{$emp->INDICATEUR}}</td>
              <td>{{$emp->SOURCE}}</td>
              <td>{{$emp->COUT}}</td>
              <td>{{$emp->RESPONSABLE}}</td>
            </tr>
            @endforeach
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td> ORGANISATION DU TRAVAIL</td>
              <td>{{ $index+1}}</td>
              <td>{{$emp->OBJECTIF}}</td>
              <td>{{$emp->ACTIVITE}}</td>
              <td>{{$emp->PERIODE}}</td>
              <td>{{$emp->INDICATEUR}}</td>
              <td>{{$emp->SOURCE}}</td>
              <td>{{$emp->COUT}}</td>
              <td>{{$emp->RESPONSABLE}}</td>
            </tr>
            @endforeach
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td> SURVEILLANCE MEDICALE DES TRAVAILLEURS</td>
              <td>{{ $index+1}}</td>
              <td>{{$emp->OBJECTIF}}</td>
              <td>{{$emp->ACTIVITE}}</td>
              <td>{{$emp->PERIODE}}</td>
              <td>{{$emp->INDICATEUR}}</td>
              <td>{{$emp->SOURCE}}</td>
              <td>{{$emp->COUT}}</td>
              <td>{{$emp->RESPONSABLE}}</td>
            </tr>
            @endforeach
          <tbody>
        </table>
      </div>
    </div>
    
    <div style="page-break-inside: auto;"></div>
<div style="page-break-after: always;"></div>

    <div class="card-body container-fluid">
      <h2 style="font-weight: bold; text-decoration:solid;">Tableau 02: PROGRAMME D'ACTIVITE DU CHS AU TITRE DE L'ANNEE {{$empsaa->ANNEE}} </h2>
      <div class="card-body container-fluid" id="index_">
        <table class="table table-striped table-bordered align-middle">
          <thead>
            <tr>
              <th>AXES D'INTERVENTION</th>
              <th>N°</th>
              <th>OBJECTIFS SPECIFIQUES</th>
              <th>ACTIVITES</th>
              <th>PERIODE D'EXECUTION</th>
              <th>INDICATEURS DE SUIVI</th>
              <th>SOURCE DE VERIFICATION</th>
              <th>COUT</th>
              <th>RESPONSABLES</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td>HYGIENE</td>
              <td>{{ $index+1}}</td>
              <td>{{$emp->OBJECTIF}}</td>
              <td>{{$emp->ACTIVITE}}</td>
              <td>{{$emp->PERIODE}}</td>
              <td>{{$emp->INDICATEUR}}</td>
              <td>{{$emp->SOURCE}}</td>
              <td>{{$emp->COUT}}</td>
              <td>{{$emp->RESPONSABLE}}</td>
            </tr>
            @endforeach
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td>SECURITE</td>
              <td>{{ $index+1}}</td>
              <td>{{$emp->OBJECTIF}}</td>
              <td>{{$emp->ACTIVITE}}</td>
              <td>{{$emp->PERIODE}}</td>
              <td>{{$emp->INDICATEUR}}</td>
              <td>{{$emp->SOURCE}}</td>
              <td>{{$emp->COUT}}</td>
              <td>{{$emp->RESPONSABLE}}</td>
            </tr>
            @endforeach
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td> ORGANISATION DU TRAVAIL</td>
              <td>{{ $index+1}}</td>
              <td>{{$emp->OBJECTIF}}</td>
              <td>{{$emp->ACTIVITE}}</td>
              <td>{{$emp->PERIODE}}</td>
              <td>{{$emp->INDICATEUR}}</td>
              <td>{{$emp->SOURCE}}</td>
              <td>{{$emp->COUT}}</td>
              <td>{{$emp->RESPONSABLE}}</td>
            </tr>
            @endforeach
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td> SURVEILLANCE MEDICALE DES TRAVAILLEURS</td>
              <td>{{ $index+1}}</td>
              <td>{{$emp->OBJECTIF}}</td>
              <td>{{$emp->ACTIVITE}}</td>
              <td>{{$emp->PERIODE}}</td>
              <td>{{$emp->INDICATEUR}}</td>
              <td>{{$emp->SOURCE}}</td>
              <td>{{$emp->COUT}}</td>
              <td>{{$emp->RESPONSABLE}}</td>
            </tr>
            @endforeach
          <tbody>
        </table>
      </div>
    </div>
    
    <div style="page-break-inside: auto;"></div>
<div style="page-break-after: always;"></div>

    <div class="card-body container-fluid">
      <h2 style="font-weight: bold; text-decoration:solid;">Tableau 03: CHRONOGRAMME D'EXECUTION DU PROGRAMME D'ACTIVITES DU CHS AU TITRE DE L'ANNEE  {{$empsaa->ANNEE}}  </h2>
      <div class="card-body container-fluid" id="index_">
        <table class="table table-striped table-bordered align-middle">
          <thead>
            <tr>
              <th rowspan ="2"> N° </th>
              <th rowspan ="2"> ACTIVITES </th>
              <th colspan="12"> PERIODE D\'EXECUTION </th>
              <th rowspan ="2"> RESPONSABLE </th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <th></th>
              <th></th>
              <th>J</th>
              <th>F</th>
              <th>M</th>
              <th>A</th>
              <th>M</th>
              <th>J</th>
              <th>J</th>
              <th>A</th>
              <th>S</th>
              <th>O</th>
              <th>N</th>
              <th>D</th>
              <th></th>
            </tr>
          @foreach ()
            <tr>
              <td>{{ $index+1}}</td>
              <td>{{$emp->ACTIV}}</td>
              <td>{{$emp->JA}}</td>
              <td>{{$emp->F}}</td>
              <td>{{$emp->M}}</td>
              <td>{{$emp->AV}}</td>
              <td>{{$emp->MA}}</td>
              <td>{{$emp->JU}}</td>
              <td>{{$emp->JUI}}</td>
              <td>{{$emp->AO}}</td>
              <td>{{$emp->S}}</td>
              <td>{{$emp->O}}</td>
              <td>{{$emp->N}}</td>
              <td>{{$emp->D}}</td>
              <td>{{$emp->RESP}}</td>
            </tr>
            endforeach
          <tbody>
        </table>
      </div>
    </div>
    
    <div style="page-break-inside: auto;"></div>
<div style="page-break-after: always;"></div>

    <div class="card-body container-fluid">
      <h2 style="font-weight: bold; text-decoration:solid;">Tableau 04: RECAPITULATION DES ACCIDENTS SELON LE JOUR DE LA SEMAINE  </h2>
      <div class="card-body container-fluid" id="index_">
        <table>
          <thead>
            <tr>
              <th rowspan ="2"> JOURS </th>
              <th colsapn ="2"> ACCIDENT DE TRAVAIL </th>
              <th colspan="2"> ACCIDENT DE TRAJET </th>
              <th rowspan ="2"> TOTAL </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th></th>
              <th>SANS ARRET</th>
              <th>AVEC ARRET</th>
              <th>SANS ARRET</th>
              <th>AVEC ARRET</th>
              <th></th>
            </tr>
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td> LUNDI </td>
              <td>{{$emp}}</td>
              <td>{{$emp->JA}}</td>
              <td>{{$emp->F}}</td>
              <td>{{$emp->M}}</td>
              <td>{{$emp->AV}}</td>
            </tr>
            endforeach
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td> MARDI </td>
              <td>{{$emp}}</td>
              <td>{{$emp->JA}}</td>
              <td>{{$emp->F}}</td>
              <td>{{$emp->M}}</td>
              <td>{{$emp->AV}}</td>
            </tr>
              endforeach
              @foreach ($empsaa as $index => $emp)
            <tr>
              <td> MERCREDI </td>
              <td>{{$emp}}</td>
              <td>{{$emp->JA}}</td>
              <td>{{$emp->F}}</td>
              <td>{{$emp->M}}</td>
              <td>{{$emp->AV}}</td>
            </tr>
            endforeach
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td> JEUDI </td>
              <td>{{$emp}}</td>
              <td>{{$emp->JA}}</td>
              <td>{{$emp->F}}</td>
              <td>{{$emp->M}}</td>
              <td>{{$emp->AV}}</td>
            </tr>
            endforeach
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td> VENDREDI </td>
              <td>{{$emp}}</td>
              <td>{{$emp->JA}}</td>
              <td>{{$emp->F}}</td>
              <td>{{$emp->M}}</td>
              <td>{{$emp->AV}}</td>
            </tr>
            endforeach
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td> SAMEDI </td>
              <td>{{$emp}}</td>
              <td>{{$emp->JA}}</td>
              <td>{{$emp->F}}</td>
              <td>{{$emp->M}}</td>
              <td>{{$emp->AV}}</td>
            </tr>
            endforeach
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td> DIMANCHE </td>
              <td>{{$emp->}}</td>
              <td>{{$emp->JA}}</td>
              <td>{{$emp->F}}</td>
              <td>{{$emp->M}}</td>
              <td>{{$emp->AV}}</td>
            </tr>
            endforeach
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td> TOTAL </td>
              <td>{{$emp}}</td>
              <td>{{$emp->JA}}</td>
              <td>{{$emp->F}}</td>
              <td>{{$emp->M}}</td>
              <td>{{$emp->AV}}</td>
            </tr>
            endforeach
          <tbody>
        </table>
      </div>
    </div>
    
    <div style="page-break-inside: auto;"></div>
<div style="page-break-after: always;"></div>

    <div class="card-body container-fluid">
      <h2 style="font-weight: bold; text-decoration:solid;">Tableau 05: RECAPITULATION DES ACCIDENTS SELON L'AGE ET LE SEXE </h2>
      <div class="card-body container-fluid" id="index_">
        <table>
          <thead>
            <tr>
              <td> 14-18 ans </td>
              <td> 19-23 ans </td>
              <td> 24-28 ans </td>
              <td> 29-33 ans </td>
              <td> 34-38 ans </td>
              <td> 39-43 ans </td>
              <td> 44-48 ans </td>
              <td> 49-53 ans </td>
              <td> 54 et + ans </td>
              <td> Non précisé </td>
              <td> Total </td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> H </td>
              <td> F </td>
              <td> H </td>
              <td> F </td>
              <td> H </td>
              <td> F </td>
              <td> H </td>
              <td> F </td>
              <td> H </td>
              <td> F </td>
              <td> H </td>
              <td> F </td>
              <td> H </td>
              <td> F </td>
              <td> H </td>
              <td> F </td>
              <td> H </td>
              <td> F </td>
              <td> H </td>
              <td> F </td>
              <td> H </td>
              <td> F </td>
            </tr>
            @foreach ($emp as $emp)
            <tr>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
            </tr>
            @foreach ($emp as $emp)
            <tr>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
            </tr>
            @foreach ($emp as $emp)
            <tr>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
              <td> {{ $emp-> }} </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div style="page-break-inside: auto;"></div>
<div style="page-break-after: always;"></div>

    <div class="card-body container-fluid">
      <h2 style="font-weight: bold; text-decoration:solid;">Tableau 06: RECAPITULATION DES ACCIDENTS SELON LA LOCALISATION </h2>
      <div class="card-body container-fluid" id="index_">
        <table>
          <thead>
            <tr>
              <td> LOCALISATION </td>
              <td> ACCIDENT DE TRAVAIL </td>
              <td> ACCIDENT AVEC ARRET </td>
              <td> JOURS PERDUS </td>
              <td> POURCENTAGE JOURS PERDUS SELON LOCALISATION </td>
            </tr>
          </thead>
          <tbody>
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td> {{$emp->}} </td>
              <td> {{$emp->}} </td>
              <td> {{$emp->}} </td>
              <td> {{$emp->}} </td>
              <td> {{$emp->}} </td>
            </tr>
            endforeach
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td> TOTAL </td>
              <td> {{$emp->t1 }} </td>
              <td> {{$emp->t2 }} </td>
              <td> {{$emp->t3 }} </td>
              <td> {{$emp->t4 }} </td>
            </tr>
            endforeach
          <tbody>
        </table>
      </div>
    </div>
    
    <div style="page-break-inside: auto;"></div>
<div style="page-break-after: always;"></div>

    <div class="card-body container-fluid">
      <h2 style="font-weight: bold; text-decoration:solid;">Tableau 07: RECAPITULAION DES ACCIDENTS SELON LA NATURE DES LSIONS </h2>
      <div class="card-body container-fluid" id="index_">
        <table>
          <thead>
            <tr>
              <th> N° </th>
              <th> NATURE DES LESIONS </th>
              <th> ACCIDENT SANS ARRET </th>
              <th> ACCIDENT AVEC ARRET </th>
              <th> JOURS PERDUS </th>
              <th> POURCENTAGE JOURS PERDUS SELON NATURE DES LESIONS </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($empsaa as $index => $emp)
            <tr>
              <td>{{ $index+1}}</td>
              <td>{{$emp->NATURELESI}}</td>
              <td>{{$emp->JA}}</td>
              <td>{{$emp->F}}</td>
              <td>{{$emp->M}}</td>
              <td>{{$emp->AV}}</td>
            </tr>
            endforeach
          <tbody>
        </table>
      </div>
    </div>
    
    <div style="page-break-inside: auto;"></div>
<div style="page-break-after: always;"></div>

    <div class="card-body container-fluid">
      <h2 style="font-weight: bold; text-decoration:solid;">Tableau 08: RECAPITULATION DES POLYACCIDENTES </h2>
      <div class="card-body container-fluid" id="index_">
        <table>
          <thead>
            <tr>
              <th> N° </th>
              <th> DATE </th>
              <th> SEXE </th>
              <th> AGE </th>
              <th> ELEMENT CAUSAL </th>
              <th> OBSERVATION </th>
            </tr>
          </thead>
          <tbody>
          @foreach ($empsaa as $index => $emp)
            <tr>
              <td>{{ $index+1}}</td>
              <td>{{$emp->DATE}}</td>
              <td>{{$emp->SEXSA}}</td>
              <td>{{$emp->AGE}}</td>
              <td>{{$emp->CAUSE}}</td>
              <td>{{$emp->OBSERVATION}}</td>
            </tr>
            endforeach
          <tbody>
        </table>
      </div>
    </div>
    
    <div style="page-break-inside: auto;"></div>
<div style="page-break-after: always;"></div>

    <div class="card-body container-fluid">
      <h2 style="font-weight: bold; text-decoration:solid;">Tableau 09: TAUX DE FREQUENCE MENSUEL DES ACCIDENTS AVEC ET SANS ARRET </h2>
      <div class="card-body container-fluid" id="index_">
        <table>
          <thead>
            <tr>
              <th> Mois </th>
              <th> Accidents par mois avec et sans arrêt </th>
              <th> Heures travaillées par mois </th>
              <th> Taux de fréquence mensuel </th>
              <th> Total cumulé des accidents </th>
              <th> Total cumulé des heures travaillées </th>
              <th> Taux de fréquence cumulé </th>
            </tr>
          </thead>
          <tbody>
          @foreach ($empsaa as $index => $emp)
            <tr>
              <td></td>
              <td></td>
            </tr>
            endforeach
          <tbody>
        </table>
      </div>
    </div>
    
    <div style="page-break-inside: auto;"></div>
<div style="page-break-after: always;"></div>

    <div class="card-body container-fluid">
      <h2 style="font-weight: bold; text-decoration:solid;">Tableau 10: TAUX DE FREQUENCE MENSUEL DES ACCIDENTS AVEC ARRET </h2>
      <div class="card-body container-fluid" id="index_"></div>
    </div>
    
    <div style="page-break-inside: auto;"></div>
<div style="page-break-after: always;"></div>

  </div>
  

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

    <script src="{{asset('assets/js/rocket-loader.min.js')}}" data-cf-settings="a78dc8ef45d27e685eaf4c36-|49"
      defer=""></script>

    <script src="{{asset('ex/tableExport.js')}}"></script>

</body>

<!-- Mirrored from seantheme.com/color-admin/admin/html/ui_social_buttons.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2022 08:58:49 GMT -->

</html>