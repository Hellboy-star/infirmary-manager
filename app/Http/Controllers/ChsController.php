<?php

namespace App\Http\Controllers;

use PDF;
use Dompdf\Dompdf;
use App\Models\At;
use App\Models\Chrono;
use App\Models\Chs;
use App\Models\Annee;
use App\Models\Pachsta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChsController extends Controller
{
  //

  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   * 
   * @return \Illuminate\Http\Client\Response 
   */
  public function index()
  {
    //
    // $chs = Chs::all();
    return view('chs');
  }

  public function annee()
  {
    return view('anee');
  }


  /**
   * Store a newly created resource in storage. 
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */

  public function store(Request $request)
  {
    $id           = new Annee;
    $id->ANNEE    = $request->input('ANNEE');
    $id->OBJECGEN = $request->input('OBJECGEN');

    $id->save();
    return back()->withStatus('success', 'Ajout réussi');
  }

  public function fetchan(Request $request)
  {
    $empsa = Annee::all();
    $emp1  = DB::select("select id, ANNEE, OBJECGEN from annee ");

    $output = '';
    if ($empsa->count() > 0) {
      $output .= '<table class="table0 table table-striped table-bordered align-middle">
             <thead>
               <tr>
                 <th> ANNEE </th>
                 <th> OBJECTIF GENERAL  </th>
                 <th> DETAILS </th>
               </tr>
             </thead>
             <tbody>';
      foreach ($emp1 as $emp) {
        $output .=
          '<tr> 
                         <td>' . $emp->ANNEE . '</td>
                         <td>' . $emp->OBJECGEN . '</td>
                         <td>
                             <div class="list-inline hstack gap-2 mb-0">
                                 <a href="/annee/' . $emp->id . '" style="border:none; background-color:transparent"  class="text-success mx-1 editIcon" ><i class="bi-eye h5"></i></a>
                             </div>
                         </td>
                         </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
    } else {
      echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\annee  $annee
   * @return \Illuminate\Http\Response
   */
  public function show(annee $annee)
  {
    DB::statement("SET lc_time_names = 'fr_FR'");


    $empsaa1 = DB::selectone("select * from annee  where ANNEE='$annee->ANNEE-1'");
    $empsaa  = DB::selectone("select * from annee  where ANNEE='$annee->ANNEE'");


    //$empsaa = DB::selectone("select * from tableau where ANNEE='$annee->ANNEE'");

    return view('annee', compact('empsaa1', 'empsaa'));
  }


  public function generatePDF($id)
    {
        if ($id) {
            $empsaa = DB::selectOne(" select * from personnels  where id='$id' "); // personnel

            $empsaa0 = DB::selectOne(" SELECT * FROM dosmed WHERE id=$id "); // personnel & antecedents

            $empsaa00 = DB::select(" SELECT * FROM dosmed WHERE id=$id "); // personnel & antecedents

            $empsaa000 = DB::select(" SELECT * FROM dosmed WHERE id=$id "); // personnel & antecedents

            $empsaa0000 = DB::select(" SELECT * FROM dosmed WHERE id=$id "); // personnel & antecedents

            $empsaa00000 = DB::select(" SELECT * FROM dosmed WHERE id=$id "); // personnel & antecedents

            $empsaa1 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  poste.POSTE, poste.DENOMINATION, 
        poste.ENTREPRISE, poste.PERIODEDU, poste.PERIODEAU, poste.TACHES, poste.RYTMTAF, poste.FACTEURNUI, poste.METRODATE, poste.METROTYPE, poste.METROR 
        from personnels as per, poste  WHERE per.id='$id' AND poste.MATSA = per.MATSA "); // postes

            $empsaa2 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  vac.DATEDOSE, vac.DATEEXP, 
        vac.VACCIN, vac.LOT, vac.TYPE, vac.DOSE, vac.CENTRE, vac.DATE from personnels as per LEFT JOIN vac ON vac.MATSA = per.MATSA where per.id='$id' "); // vaccination

            $empsaa3 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  abs.TYPEABS, abs.CAUSE, abs.DEBUT, 
        abs.REPRISE, abs.NBRARRET from personnels as per left JOIN abs ON abs.MATSA = per.MATSA where per.id='$id' "); // absenteisme

            $empsaa4 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA, at.IPP, at.DATECONS, at.DATEACID, 
        at.LIEU, at.CAUSEAT, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, at.DATE2CNSSAT, at.AVISCNSSAT, at.NBRARRETAT, at.TRAITEMENTAT, 
        at.MESECORRECT, at.OBSERVATIONAT from personnels as per LEFT JOIN at ON at.MATSA = per.MATSA  where per.id='$id' "); // accident de travail

            $empsaa5 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  mp.DATEMP, mp.MPNUMTAB, 
        mp.MPDESIGNATION, mp.MALCARAPRO, mp.AGENTPATH, mp.DATE1CNSSMP, mp.DATE2CNSSMP, mp.AVISCNSSMP, mp.TRAITEMENTMP, mp.OBSERVATIONMP 
        from personnels as per LEFT JOIN mp ON mp.MATSA = per.MATSA where per.id='$id' "); // maladie professionnelle

            $empsaa6 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  convocation.MOTIF, 
        convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION from  
        personnels as per left JOIN convocation ON convocation.MATSA = per.MATSA where per.id='$id' "); // convocation

            $empsaa7 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA,  cs.POIDSCS, cs.TAILLECS, cs.DATECS, 
        cs.TCS, cs.POULSCS, cs.TACS, cs.PLAINTESCS, cs.EXAMCLICS, cs.BILAN, cs.DIAGNOSTIC, cs.TRAITEMENTCS, cs.OBSERVATIONCS 
        from personnels as per LEFT JOIN cs ON cs.MATSA = per.MATSA where per.id='$id' "); // consultation

            $empsaa8 = DB::selectOne(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, per.LEMSA, per.SEXSA, per.SECSA, vms.POIDSVMS, vms.DATEVMS, 
        vms.TYPVISI, vms.POULSVMS, vms.PLAINTESVMS, vms.TAVMS, vms.PA, vms.PTI, vms.PTE, vms.AVOD, vms.AVOG, vms.EXAMCLIVMS, vms.BILANVMS, 
        vms.AVISP, vms.CONCLMED, vms.APTITUDE, vms.OBSERVATIONVMS from personnels as per left JOIN vms ON vms.MATSA = per.MATSA where per.id='$id' "); // visite medicale specialise



            $pdf         = new Dompdf();
            $htmlContent = view('personnel', compact('empsaa', 'empsaa00000', 'empsaa0000', 'empsaa000', 'empsaa00', 'empsaa0', 'empsaa1', 'empsaa2', 'empsaa3', 'empsaa4', 'empsaa5', 'empsaa6', 'empsaa7', 'empsaa8'));
            $pdf->loadHtml($htmlContent);
            $pdf->setPaper('a4', 'landscape');
            $pdf->render();
            return $pdf->stream('dossier_medical.pdf');
        } else {
            return response()->json(['error' => 'ID de personnel invalide'], 400);
        }
    }


  // public function generatePDF()
  // {
  //   $data = []; // Vous pouvez passer des données à la vue si nécessaire
  //   $pdf  = PDF::loadView('pdf', $data);

  //   return $pdf->stream('document.pdf'); // Vous pouvez également utiliser "download" pour télécharger le PDF directement
  // }

  // public function pdf()
  // {
  //   $pdf = \App::make('dompdf.wrapper');
  //   $pdf->loadHTML($this->convert_annee_data_to_html());
  //   $pdf->getDomPDF()->set_option("enable_php", true);
  //   $pdf->setPaper('a4', 'landscape');
  //   return $pdf->stream();
  // }

  // public function convert_annee_data_to_html()
  // {
  //   $annee_data = $this->get_annee_data();
  //   $output     = '
  //       <h3>
  //     ';
  //   return $output;
  // }


  
  public function tab1(Annee $annee)
{
    $empa = Annee::all();
    $empsa1 = DB::select(" select * from pachsta where ANNEE = '$annee->'ANNEE-1'' and AXE = '$annee->'HYGIENE'' ");
    $empsa2 = DB::select(" select * from pachsta where ANNEE = '$annee->'ANNEE-1'' and AXE = '$annee->'SECURITE'' ");
    $empsa3 = DB::select(" select * from pachsta where ANNEE = '$annee->'ANNEE-1'' and AXE = '$annee->'ORGANISATION DU TRAVAIL'' ");
    $empsa4 = DB::select(" select * from pachsta where ANNEE = '$annee->'ANNEE-1'' and AXE = '$annee-> 'SURVEILLANCE MEDICALE DES TRAVAILLEURS' ' ");
    $output = '';
    
    if ($empa->count() > 0) {
        $output .= '<table class="table1 table table-striped table-bordered align-middle">
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
          
        foreach ($empsa1 as $index => $emp) {
            $output .= '<tr height="127%">
                <td>HYGIENE</td>
                <td>' . ($index + 1) . '</td>
                <td>' . $emp->OBJECTIF . '</td>
                <td>' . $emp->ACTIVITE . '</td>
                <td>' . $emp->PERIODE . '</td>
                <td>' . $emp->INDICATEUR . '</td>
                <td>' . $emp->SOURCE . '</td>
                <td>' . $emp->COUT . '</td>
                <td>' . $emp->RESPONSABLE . '</td>
              </tr>';
        }
        
        foreach ($empsa2 as $index => $emp) {
            $output .= '<tr height="127%">
                <td>SECURITE</td>
                <td>' . ($index + 1) . '</td>
                <td>' . $emp->OBJECTIF . '</td>
                <td>' . $emp->ACTIVITE . '</td>
                <td>' . $emp->PERIODE . '</td>
                <td>' . $emp->INDICATEUR . '</td>
                <td>' . $emp->SOURCE . '</td>
                <td>' . $emp->COUT . '</td>
                <td>' . $emp->RESPONSABLE . '</td>
              </tr>';
        }
        
        foreach ($empsa3 as $index => $emp) {
            $output .= '<tr height="127%">
                <td>ORGANISATION DU TRAVAIL</td>
                <td>' . ($index + 1) . '</td>
                <td>' . $emp->OBJECTIF . '</td>
                <td>' . $emp->ACTIVITE . '</td>
                <td>' . $emp->PERIODE . '</td>
                <td>' . $emp->INDICATEUR . '</td>
                <td>' . $emp->SOURCE . '</td>
                <td>' . $emp->COUT . '</td>
                <td>' . $emp->RESPONSABLE . '</td>
              </tr>';
        }
        
        foreach ($empsa4 as $index => $emp) {
            $output .= '<tr height="127%">
                <td>SURVEILLANCE MEDICALE DES TRAVAILLEURS</td>
                <td>' . ($index + 1) . '</td>
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
      foreach ($empsa1 as $emp) {
        $output .= '<tr height="127%">
                <td>HYGIENE</td>
               
                <td>' . $emp->id . '</td>
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
      foreach ($empsa2 as $emp) {
        $output .= '<tr height="127%">
                <td>SECURITE</td>
               
                <td>' . $emp->id . '</td>
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
      foreach ($empsa3 as $emp) {
        $output .= '<tr height="127%">
                <td> ORGANISATION DU TRAVAIL</td>
               
                <td>' . $emp->id . '</td>
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
      foreach ($empsa4 as $emp) {
        $output .= '<tr height="127%">
                <td> SURVEILLANCE MEDICALE DES TRAVAILLEURS</td>
               
                <td>' . $emp->id . '</td>
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
      foreach ($empsa as $emp) {
        $output .= '<tr height="127%">
                <td>' . $emp->id . '</td>
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
      foreach ($empsa1 as $emp) {
        $output .= '<tr height="127%">
                <td> LUNDI </td>
                <td>' . $emp . '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $emp) {
        $output .= '<tr height="127%">
                <td> MARDI </td>
                <td>' . $emp . '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $emp) {
        $output .= '<tr height="127%">
                <td> MERCREDI </td>
                <td>' . $emp . '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $emp) {
        $output .= '<tr height="127%">
                <td> JEUDI </td>
                <td>' . $emp . '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $emp) {
        $output .= '<tr height="127%">
                <td> VENDREDI </td>
                <td>' . $emp . '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $emp) {
        $output .= '<tr height="127%">
                <td> SAMEDI </td>
                <td>' . $emp . '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $emp) {
        $output .= '<tr height="127%">
                <td> DIMANCHE </td>
                <td>' . $emp . '</td>
                <td>' . $emp->JA . '</td>
                <td>' . $emp->F . '</td>
                <td>' . $emp->M . '</td>
                <td>' . $emp->AV . '</td>
              </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
      foreach ($empsa1 as $emp) {
        $output .= '<tr height="127%">
                <td> TOTAL </td>
                <td>' . $emp . '</td>
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
    $empsa  = DB::select("select NATURELESI from at ");
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
                <td>' . $emp->NATURELESI . '</td>
                <td>' . $emp->SA . '</td>
                <td>' . $emp->AVA . '</td>
                <td>' . $emp->NBRARRETAT . '</td>
                <td>' . $emp->PJPNL . '</td>
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

      foreach ($empsa as $emp) {
        $output .= '<tr height="127%">
                <td>' . $emp->id . '</td>
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

      foreach ($empsa1 as $emp) {
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

      foreach ($empsa2 as $emp) {
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

      foreach ($empsa3 as $emp) {
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

      foreach ($empsa4 as $emp) {
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

      foreach ($empsa5 as $emp) {
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

      foreach ($empsa6 as $emp) {
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

      foreach ($empsa7 as $emp) {
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

      foreach ($empsa8 as $emp) {
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

      foreach ($empsa9 as $emp) {
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

      foreach ($empsa10 as $emp) {
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

      foreach ($empsa11 as $emp) {
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

      foreach ($empsa12 as $emp) {
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


  public function taux0()
  {
  }


  public function etab1()
  {
    return view('etab1');
  }


  public function tab(Request $request)
  {
    //
    $id              = new Pachsta;
    $id->AXE         = $request->input('AXE');
    $id->OBJECTIF    = $request->input('OBJECTIF');
    $id->ACTIVITE    = $request->input('ACTIVITE');
    $id->PERIODE     = $request->input('PERIODE');
    $id->INDICATEUR  = $request->input('INDICATEUR');
    $id->SOURCE      = $request->input('SOURCE');
    $id->COUT        = $request->input('COUT');
    $id->RESPONSABLE = $request->input('RESPONSABLE');
    $id->ANNEE       = $request->input('ANNEE');
    $id->NUM         = $request->input('NUM');
    $id->save();
    return back()->withStatus('success', 'Ajout réussi');
  }


  public function etab2()
  {
    return view('etab2');
  }

  public function etab3()
  {
    return view('etab3');
  }

  public function etab4()
  {
    return view('etab4');
  }

  public function etab5()
  {
    return view('etab5');
  }

  public function etab6()
  {
    return view('etab6');
  }

  public function etab7()
  {
    return view('etab7');
  }

  public function etab8()
  {
    return view('etab8');
  }

  public function etab9()
  {
    return view('etab9');
  }

  public function etab10()
  {
    return view('etab10');
  }

}