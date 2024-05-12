<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\At;
use App\Models\Chrono;
use App\Models\Pachsta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }





  public function tab1(annee $annee)
  {
    $empa   = Annee::all();
    $empsa1 = DB::select(" select * from pachsta where ANNEE = '$annee->'ANNEE-1'' and AXE = '$annee->'HYGIENE'' ");
    $empsa2 = DB::select(" select * from pachsta where ANNEE = '$annee->'ANNEE-1'' and AXE = '$annee->'SECURITE'' ");
    $empsa3 = DB::select(" select * from pachsta where ANNEE = '$annee->'ANNEE-1'' and AXE = '$annee->'ORGANISATION DU TRAVAIL'' ");
    $empsa4 = DB::select(" select * from pachsta where ANNEE = '$annee->'ANNEE-1'' and AXE = '$annee-> 'SURVEILLANCE MEDICALE DES TRAVAILLEURS' ' ");
    $output = '';
    if ($empa->count() > 0) {
      $output .=
        '<table class="table1 table table-striped table-bordered align-middle">
           <thead>
          <tr>
            <th>AXES D\'INTERVENTION</th>
            <th>N°</th>
            <th>OBJECTIFS SPECIFIQUES</th>
            <th>ACTIVITES</th>
            <th>PERIODE D\'EXECUTION</th>
            <th>INDICATEURS DE SUIVI</th>
            <th>SOURCE DE VERIFICATION</th>
            <th>COUT</th>
            <th>RESPONSABLES</th>
            
            </tr>
            </thead>
            <tbody>';
      foreach ($empsa1 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td>HYGIENE</td>
               
                <td>' . ($index+1) . '</td>
                <td>' . $emp->OBJECTIF . '</td>
                <td>' . $emp->ACTIVITE . '</td>
                <td>' . $emp->PERIODE . '</td>
                <td>' . $emp->INDICATEUR . '</td>
                <td>' . $emp->SOURCE . '</td>
                <td>' . $emp->COUT . '</td>
                <td>' . $emp->RESPONSABLE . '</td>
                
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa2 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td>SECURITE</td>
               
                <td>' . ($index+1) . '</td>
                <td>' . $emp->OBJECTIF . '</td>
                <td>' . $emp->ACTIVITE . '</td>
                <td>' . $emp->PERIODE . '</td>
                <td>' . $emp->INDICATEUR . '</td>
                <td>' . $emp->SOURCE . '</td>
                <td>' . $emp->COUT . '</td>
                <td>' . $emp->RESPONSABLE . '</td>
                
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa3 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> ORGANISATION DU TRAVAIL</td>
               
                <td>' . ($index+1) . '</td>
                <td>' . $emp->OBJECTIF . '</td>
                <td>' . $emp->ACTIVITE . '</td>
                <td>' . $emp->PERIODE . '</td>
                <td>' . $emp->INDICATEUR . '</td>
                <td>' . $emp->SOURCE . '</td>
                <td>' . $emp->COUT . '</td>
                <td>' . $emp->RESPONSABLE . '</td>
                
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa4 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> SURVEILLANCE MEDICALE DES TRAVAILLEURS</td>
               
                <td>' . ($index+1) . '</td>
                <td>' . $emp->OBJECTIF . '</td>
                <td>' . $emp->ACTIVITE . '</td>
                <td>' . $emp->PERIODE . '</td>
                <td>' . $emp->INDICATEUR . '</td>
                <td>' . $emp->SOURCE . '</td>
                <td>' . $emp->COUT . '</td>
                <td>' . $emp->RESPONSABLE . '</td>
                
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
    } else {
      echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
    }
  }


    
  public function tab2(annee $annee)
  {
    $empa   = Annee::all();
    $empsa1 = DB::select(" select * from pachsta where ANNEE = '$annee->'ANNEE'' and AXE = '$annee->'HYGIENE'' ");
    $empsa2 = DB::select(" select * from pachsta where ANNEE = '$annee->'ANNEE'' and AXE = '$annee->'SECURITE'' ");
    $empsa3 = DB::select(" select * from pachsta where ANNEE = '$annee->'ANNEE'' and AXE = '$annee->'ORGANISATION DU TRAVAIL'' ");
    $empsa4 = DB::select(" select * from pachsta where ANNEE = '$annee->'ANNEE'' and AXE = '$annee-> 'SURVEILLANCE MEDICALE DES TRAVAILLEURS' ' ");
    $output = '';
    if ($empa->count() > 0) {
      $output .=
        '<table class="table2 table table-striped table-bordered align-middle">
           <thead>
          <tr>
            <th>AXES D\'INTERVENTION</th>
            <th>N°</th>
            <th>OBJECTIFS SPECIFIQUES</th>
            <th>ACTIVITES</th>
            <th>PERIODE D\'EXECUTION</th>
            <th>INDICATEURS DE SUIVI</th>
            <th>SOURCE DE VERIFICATION</th>
            <th>COUT</th>
            <th>RESPONSABLES</th>
            
            </tr>
            </thead>
            <tbody>';
      foreach ($empsa1 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td>HYGIENE</td>
               
                <td>' . ($index+1) . '</td>
                <td>' . $emp->OBJECTIF . '</td>
                <td>' . $emp->ACTIVITE . '</td>
                <td>' . $emp->PERIODE . '</td>
                <td>' . $emp->INDICATEUR . '</td>
                <td>' . $emp->SOURCE . '</td>
                <td>' . $emp->COUT . '</td>
                <td>' . $emp->RESPONSABLE . '</td>
                
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa2 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td>SECURITE</td>
               
                <td>' . ($index+1) . '</td>
                <td>' . $emp->OBJECTIF . '</td>
                <td>' . $emp->ACTIVITE . '</td>
                <td>' . $emp->PERIODE . '</td>
                <td>' . $emp->INDICATEUR . '</td>
                <td>' . $emp->SOURCE . '</td>
                <td>' . $emp->COUT . '</td>
                <td>' . $emp->RESPONSABLE . '</td>
                
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa3 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> ORGANISATION DU TRAVAIL</td>
               
                <td>' . ($index+1) . '</td>
                <td>' . $emp->OBJECTIF . '</td>
                <td>' . $emp->ACTIVITE . '</td>
                <td>' . $emp->PERIODE . '</td>
                <td>' . $emp->INDICATEUR . '</td>
                <td>' . $emp->SOURCE . '</td>
                <td>' . $emp->COUT . '</td>
                <td>' . $emp->RESPONSABLE . '</td>
                
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa4 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> SURVEILLANCE MEDICALE DES TRAVAILLEURS</td>
               
                <td>' . ($index+1) . '</td>
                <td>' . $emp->OBJECTIF . '</td>
                <td>' . $emp->ACTIVITE . '</td>
                <td>' . $emp->PERIODE . '</td>
                <td>' . $emp->INDICATEUR . '</td>
                <td>' . $emp->SOURCE . '</td>
                <td>' . $emp->COUT . '</td>
                <td>' . $emp->RESPONSABLE . '</td>
                
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
    } else {
      echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
    }
  }

  public function chrono(annee $annee)
  {
    $empa   = Chrono::all();
    $empsa  = DB::select("select id, ACTIV, JA, F, M, AV, MA, JU, JUI, AO, S, O, N, D, RESP from chrono where $annee->ANNEE");
    $output = '';
    if ($empa->count() >= 0) {
      $output .= '<table class="table3 table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th rowspan ="2"> N° </th>
                    <th rowspan ="2"> ACTIVITES </th>
                    <th colspan="12"> PERIODE D\'EXECUTION </th>
                    <th rowspan ="2"> RESPONSABLE </th>
                </tr>
            </thead>
            <tbody>';
      '<tr>
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
            </tr>';
      foreach ($empsa as $index=>$emp) {
        $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
                <td>' . $emp->ACTIV . '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
                <td>' . $emp->MA . '</td>
                <td>' . $emp->JU . '</td>
                <td>' . $emp->JUI . '</td>
                <td>' . $emp->AO . '</td>
                <td>' . $emp->S . '</td>
                <td>' . $emp->O . '</td>
                <td>' . $emp->N . '</td>
                <td>' . $emp->D . '</td>
                <td>' . $emp->RESP . '</td>

              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
    }
  }

  public function recap4(Annee $annee)
  {
    $empa   = Chrono::all();
    $empsa1 = DB::select("select count() from at where NBRSA='' AND DATECONS= '' AND DATECONS LIKE '$annee->'ANNEE'' ");
    $empsa2 = DB::select("select count() from at where NBRSA='' AND DATECONS= '' AND DATECONS LIKE '$annee->'ANNEE'' ");
    $empsa3 = DB::select("select count() from at where NBRSA='' AND DATECONS= '' AND DATECONS LIKE '$annee->'ANNEE'' ");
    $empsa4 = DB::select("select count() from at where NBRSA='' AND DATECONS= '' AND DATECONS LIKE '$annee->'ANNEE'' ");
    $empsa5 = DB::select("select count() from at where NBRSA='' AND DATECONS= '' AND DATECONS LIKE '$annee->'ANNEE'' ");
    $empsa6 = DB::select("select count() from at where NBRSA='' AND DATECONS= '' AND DATECONS LIKE '$annee->'ANNEE'' ");
    $empsa7 = DB::select("select count() from at where NBRSA='' AND DATECONS= '' AND DATECONS LIKE '$annee->'ANNEE'' ");
    $output = '';
    if ($empa->count() >= 0) {
      $output .= '<table class="table4 table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th rowspan ="2"> JOURS </th>
                    <th colsapn ="2"> ACCIDENT DE TRAVAIL </th>
                    <th colspan="2"> ACCIDENT DE TRAJET </th>
                    <th rowspan ="2"> TOTAL </th>
                </tr>
            </thead>
            <tbody>';
      '<tr>
                <th></th>
                <th>SANS ARRET</th>
                <th>AVEC ARRET</th>
                <th>SANS ARRET</th>
                <th>AVEC ARRET</th>
                <th></th>
            </tr>';
      foreach ($empsa1 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> LUNDI </td>
                <td>' . ($index+1). '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> MARDI </td>
                <td>' . ($index+1). '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> MERCREDI </td>
                <td>' . ($index+1). '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> JEUDI </td>
                <td>' . ($index+1). '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> VENDREDI </td>
                <td>' . ($index+1). '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> SAMEDI </td>
                <td>' . ($index+1). '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> DIMANCHE </td>
                <td>' . ($index+1). '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> TOTAL </td>
                <td>' . ($index+1). '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
    }
  }

  public function recap5()
  {
  }


  public function recap6()
  {
  }

  public function recap7(Annee $annee)
  {
    $empa   = Chrono::all();
    $empsa  = DB::select("select id, ACTIV, JA, F, M, AV, MA, JU, JUI, AO, S, O, N, D, RESP from chrono");
    $output = '';
    if ($empa->count() >= 0) {
      $output .= '<table class="table7 table table-striped table-bordered align-middle">
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
            <tbody>';
      foreach ($empsa as $index=>$emp) {
        $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
                <td>' . $emp->CAUSE . '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
    }
  }

  public function recap8()
  {
    $empa   = At::all();
    $empsa  = DB::select("select id, DATE, SEXSA, AGE, CAUSE, OBSERVATION from at ");
    $output = '';
    if ($empa->count() >= 0) {
      $output .= '<table class="table8 table table-striped table-bordered align-middle">
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
            <tbody>';

      foreach ($empsa as $index=>$emp) {
        $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
                <td>' . $emp->DATE . '</td>
                <td>' . $emp->SEXSA . '</td>
                <td>' . $emp->AGE . '</td>
                <td>' . $emp->CAUSE . '</td>
                <td>' . $emp->OBSERVATION . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
    }
  }

  public function taux9()
  {
    $empa = At::all();
    //$empsa = DB::select("select id, DATE, SEXSA, AGE, CAUSE, OBSERVATION from at where  ");
    $empsa1  = DB::select("select count(OBSERVATION) from at where DATEACID = 'yyyy-01-01' AND DATEACID = 'yyyy-01-31' ");
    $empsa2  = DB::select("select count(OBSERVATION) from at where DATEACID = 'yyyy-02-01' AND DATEACID = 'yyyy-02-29' ");
    $empsa3  = DB::select("select count(OBSERVATION) from at where DATEACID = 'yyyy-03-01' AND DATEACID = 'yyyy-03-31' ");
    $empsa4  = DB::select("select count(OBSERVATION) from at where DATEACID = 'yyyy-04-01' AND DATEACID = 'yyyy-04-30' ");
    $empsa5  = DB::select("select count(OBSERVATION) from at where DATEACID = 'yyyy-05-01' AND DATEACID = 'yyyy-05-31' ");
    $empsa6  = DB::select("select count(OBSERVATION) from at where DATEACID = 'yyyy-06-01' AND DATEACID = 'yyyy-06-30' ");
    $empsa7  = DB::select("select count(OBSERVATION) from at where DATEACID = 'yyyy-07-01' AND DATEACID = 'yyyy-07-31' ");
    $empsa8  = DB::select("select count(OBSERVATION) from at where DATEACID = 'yyyy-08-01' AND DATEACID = 'yyyy-08-3031' ");
    $empsa9  = DB::select("select count(OBSERVATION) from at where DATEACID = 'yyyy-09-01' AND DATEACID = 'yyyy-09-30' ");
    $empsa10 = DB::select("select count(OBSERVATION) from at where DATEACID = 'yyyy-10-01' AND DATEACID = 'yyyy-10-31' ");
    $empsa11 = DB::select("select count(OBSERVATION) from at where DATEACID = 'yyyy-11-01' AND DATEACID = 'yyyy-11-30' ");
    $empsa12 = DB::select("select count(OBSERVATION) from at where DATEACID = 'yyyy-12-01' AND DATEACID = 'yyyy-12-31' ");

    $output = '';
    if ($empa->count() > 0) {
      $output .= '<table class="table9 table table-striped table-bordered align-middle">
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
            <tbody>';

      foreach ($empsa1 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> Janvier </td>
                <td>' . $emp->count() . '</td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
              </tr>';
      }

      foreach ($empsa2 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> Février </td>
                <td>' . $emp->count() . '</td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
              </tr>';
      }

      foreach ($empsa3 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> Mars </td>
                <td>' . $emp->count() . '</td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
              </tr>';
      }

      foreach ($empsa4 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> Avril </td>
                <td>' . $emp->count() . '</td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
              </tr>';
      }

      foreach ($empsa5 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> Mai </td>
                <td>' . $emp->count() . '</td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
              </tr>';
      }

      foreach ($empsa6 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> Juin </td>
                <td>' . $emp->count() . '</td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
              </tr>';
      }

      foreach ($empsa7 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> Juillet </td>
                <td>' . $emp->count() . '</td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
              </tr>';
      }

      foreach ($empsa8 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> Août </td>
                <td>' . $emp->count() . '</td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
              </tr>';
      }

      foreach ($empsa9 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> Septembre </td>
                <td>' . $emp->count() . '</td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
              </tr>';
      }

      foreach ($empsa10 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> Octobre </td>
                <td>' . $emp->count() . '</td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
              </tr>';
      }

      foreach ($empsa11 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> Novembre </td>
                <td>' . $emp->count() . '</td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
              </tr>';
      }

      foreach ($empsa12 as $index=>$emp) {
        $output .= '<tr height="127%">
                <td> Décembre </td>
                <td>' . $emp->count() . '</td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
              </tr>';
      }

      $output .= '</tbody></table>';
      echo $output;
    }
  }


  public function taux10()
  {
  }



}
