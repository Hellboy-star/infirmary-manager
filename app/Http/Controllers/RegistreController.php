<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\At;
use App\Models\Mp;
use App\Models\Cs;
use App\Models\Vac;
use App\Models\Vms;
use App\Models\Om;
use App\Models\Personnel;
use Illuminate\Support\Facades\DB;

class RegistreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Client\Response 
     */
    public function index()
    {
        $empsa = DB::select(" select at.id, at.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA, at.IPP, at.DATECONS, at.DATEACID, at.LIEU, at.CAUSEAT, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, at.DATE2CNSSAT, at.AVISCNSSAT, at.NBRARRETAT, at.TRAITEMENTAT, at.MESECORRECT, at.OBSERVATIONAT from at, personnels as per where at.MATSA = per.MATSA and DELETED != 'Invalide' order by at.id desc ");
        $empsa1 = DB::select(" select cs.id, cs.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA,  cs.POIDSCS, cs.TAILLECS, cs.DATECS, cs.TCS, cs.POULSCS, cs.TACS, cs.PLAINTESCS, cs.EXAMCLICS, cs.BILAN, cs.DIAGNOSTIC, cs.TRAITEMENTCS, cs.OBSERVATIONCS from cs, personnels as per where cs.MATSA = per.MATSA and DELETED != 'Invalide' order by cs.id desc ");
        $empsa2 = DB::select(" select mp.id, mp.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  mp.DATEMP, mp.MPNUMTAB, mp.MPDESIGNATION, mp.MALCARAPRO, mp.AGENTPATH, mp.DATE1CNSSMP, mp.DATE2CNSSMP, mp.AVISCNSSMP, mp.TRAITEMENTMP, mp.OBSERVATIONMP from mp, personnels as per where mp.MATSA = per.MATSA and DELETED != 'Invalide' order by mp.id desc ");
        $empsa3 = DB::select(" select vms.id, vms.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA, vms.POIDSVMS, vms.DATEVMS, vms.TYPVISI, vms.POULSVMS, vms.PLAINTESVMS, vms.TAVMS, vms.PA, vms.PTI, vms.PTE, vms.AVOD, vms.AVOG, vms.EXAMCLIVMS, vms.BILANVMS, vms.AVISP, vms.CONCLMED, vms.APTITUDE, vms.OBSERVATIONVMS from vms, personnels as per where vms.MATSA = per.MATSA and DELETED != 'Invalide' order by vms.id desc ");
        $empsa4 = DB::select(" select vac.id, vac.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  vac.DATEDOSE, vac.DATEEXP, vac.VACCIN, vac.LOT, vac.TYPE, vac.DOSE, vac.CENTRE, vac.DATE from vac , personnels as per where vac.MATSA = per.MATSA and DELETED != 'Invalide' order by vac.id desc ");
        $empsa5 = DB::select(" select abs.id, abs.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  abs.TYPEABS, abs.CAUSE, abs.DEBUT, abs.REPRISE, abs.NBRARRET from abs , personnels as per where abs.MATSA = per.MATSA and DELETED != 'Invalide' order by abs.id desc ");
        $empsa6 = DB::select(" select convocation.id, convocation.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  convocation.MOTIF, convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION from convocation , personnels as per where convocation.MATSA = per.MATSA and DELETED != 'Invalide'  order by convocation.id desc ");
        $empsa7 = DB::select(" select om.id, om.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  om.DATE, om.ORDONNANCE, om.FILE from om , personnels as per where om.MATSA = per.MATSA and DELETED != 'Invalide' order by om.id desc ");
        return view('registres', compact('empsa', 'empsa1', 'empsa2', 'empsa3', 'empsa4', 'empsa5', 'empsa6', 'empsa7'));
    }



    public function fetchat(Request $request)
    {
        $empa = At::all();
        $empsa = DB::select("select * from dosmed");
        $output = '';
        if ($empa->count() > 0) {
            $output .= '<table id="data-table-buttons" class="table0 table table-striped table-bordered align-middle">
           <thead>
           <tr>
           <th width="10%">N°</th>
            <th>Date</th>
            <th colspan="2">Nom et Prénoms</th>
            <th width="50%">N°IT</th>
            <th>Sexe</th>
            <th>Age</th>
            <th>Poste</th>
            <th>Date et heure de l\'accident</th>
            <th>Lieu de l\'accident</th>
            <th>Cause de l\'accident</th>
            <th>Nature des lésions</th>
            <th>Localisation des lésions</th>
            <th>Date de la déclaration à la CNSS</th>
            <th colspan="2">Date et avis de la CNSS</th>
            <th>Nombre de jours d\'arrêt de travail</th>
            <th>Traitement</th>
            <th>Mesures corectrices</th>
            <th>Observations</th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empsa as $emp) {
                $output .= '<tr height="127%">
                <td>' . $emp->id . '</td>
               
                <td>' . $emp->DATECONS . '</td>
                <td>' . $emp->NOMSA . '</td>
                <td>' . $emp->PRESA . '</td>
                <td>' . $emp->MATSA . '</td>
                <td>' . $emp->SEXSA . '</td>
                <td>' . $emp->AGE . '</td>
                <td>' . $emp->LEMSA . '</td>
                <td>' . $emp->DATEACID . '</td>
                <td>' . $emp->LIEU . '</td>
                <td>' . $emp->CAUSEAT . '</td>
                <td>' . $emp->NATURELESI . '</td>
                <td>' . $emp->LOCALISLESI . '</td>
                <td>' . $emp->DATE1CNSSAT . '</td>
                <td>' . $emp->DATE2CNSSAT . '</td>
                <td>' . $emp->AVISCNSSAT . '</td>
                <td>' . $emp->NBRARRETAT . '</td>
                <td>' . $emp->TRAITEMENTAT . '</td>
                <td>' . $emp->MESECORRECT . '</td>
                <td>' . $emp->OBSERVATIONAT . '</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
        }
    }



    public function fetchcs()
    {
        $empa = Cs::all();
        //$empsa = DB::select("select id,datecons,nomsa,presa,matsa,poste,sex,age,poids,taille,t,pouls,ta,plaintes,examcli,bilan,diagnostic,traitement,observation from cs");
        $output = '';
        if ($empa->count() > 0) {
            $output .= '<table id="data-table-buttons" class="table1 table table-striped table-bordered align-middle">
           <thead>
           <tr height="127%">
           <th width="10%"> N° </th>
            <th> DATE </th>
            <th colspan="2"> NOM ET PRENOMS </th>
            <th> PLAINTES </th>
            <th> CONSTANTES </th>
            <th> EXAMEN CLINIQUE </th>
            <th> DIAGNOSTIC </th>
            <th> BILAN </th>
            <th> TRAITEMENT </th>
            <th> OBSERVATIONS </th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empa as $emp) {
                $output .= '<tr height="127%">
                <td>' . $emp->id . '</td>
                <td>' . $emp->DATECS . '</td>
                <td>' . $emp->NOMSA . '</td>
                <td>' . $emp->PRESA . '</td>
                <td>' . $emp->PLAINTES . '</td>
                <td>' . $emp->POULS . '</td>
                <td>' . $emp->EXAMCLI . '</td>
                <td>' . $emp->DIAGNOSTIC . '</td>
                <td>' . $emp->BILAN . '</td>
                <td>' . $emp->TRAITEMENT . '</td>
                <td>' . $emp->OBSERVATION . '</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
        }
    }



    public function fetchmp()
    {
        $empa = Mp::all();
        //$empsa = DB::select("select datecons,nom,prenom,it,sex,age,poste,dateacid,lieu,cause,naturelesi,localislesi,date1cnss,date2cnss,aviscnsss,nbrarret,traitement,mesecorrect,observation from at");
        $output = '';
        if ($empa->count() > 0) {
            $output .=
                '<table id="data-table-buttons" class="table2 table table-striped table-bordered align-middle">
           <thead>
            <tr height="127%">
            <th> N° </th>
            <th colspan=2> NOM et PRENOMS </th>
            <th> DATE </th>
            <th> N° TABLEAU </th>
            <th> AGENT CAUSAL </th>
            <th> POSTE </th>
            <th> DECISION </th>
            </tr>
            </thead>
            <tr>';
            foreach ($empa as $emp) {
                $output .= '<tr height="127%">
                <td>' . $emp->id . '</td>
                <td>' . $emp->NOMSA . '</td>
                <td>' . $emp->PRESA . '</td>
                <td>' . $emp->DATEMP . '</td>
                <td>' . $emp->MPNUMTAB . '</td>
                <td>' . $emp->AGENTPATH . '</td>
                <td>' . $emp->POSTE . '</td>
                <td>' . $emp->TRAITEMENT . '</td>
            </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
        }
    }



    public function fetchvms()
    {
        $empa = Vms::all();
        //$empsa = DB::select("select datecons,nom,prenom,it,sex,age,poste,dateacid,lieu,cause,naturelesi,localislesi,date1cnss,date2cnss,aviscnsss,nbrarret,traitement,mesecorrect,observation from at");
        $output = '';
        if ($empa->count() > 0) {
            $output .=
                '<table id="data-table-buttons" class="table3 table table-striped table-bordered align-middle">
           <thead>
           <tr height="127%">
            <th width="10%" >N° </th>
            <th colspan="2"> NOM et PRENOMS </th>
            <th> DATE </th>
            <th> TYPE DE VISITE </th>
            <th> PLAINTES </th>
            <th> POULS </th>
            <th> EXAMEN CLINIQUE </th>
            <th> CONCLUSION MEDICALE </th>
            <th> APTITUDE </th>
            <th> OBSERVATONS </th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empa as $emp) {
                $output .= '<tr height="127%">
                <td>' . $emp->id . '</td>
                <td>' . $emp->NOMSA . '</td>
                <td>' . $emp->PRESA . '</td>
                <td>' . $emp->DATEVMS . '</td>
                <td>' . $emp->TYPVISI . '</td>
                <td>' . $emp->PLAINTES . '</td>
                <td>' . $emp->POULS . '</td>
                <td>' . $emp->EXAMCLI . '</td>
                <td>' . $emp->CONCLMED . '</td>
                <td>' . $emp->APTITUDE . '</td>
                <td>' . $emp->OBSERVATION . '</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
        }
    }



    public function fetchvac()
    {
        $empa = Vac::all();
        //$empsa = DB::select("select datecons,nom,prenom,it,sex,age,poste,dateacid,lieu,cause,naturelesi,localislesi,date1cnss,date2cnss,aviscnsss,nbrarret,traitement,mesecorrect,observation from at");
        $output = '';
        if ($empa->count() > 0) {
            $output .=
                '<table id="data-table-buttons" class="table4 table table-striped table-bordered align-middle">
           <thead>
           <tr height="127%">
            <th width="10%" >N° </th>
            <th colspan="2"> NOM et PRENOMS </th>
            <th> DATE </th>
            <th> VACCIN </th>
            <th> LOT </th>
            <th> TYPE </th>
            <th> DOSE </th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empa as $emp) {
                $output .= '<tr height="127%">
                <td>' . $emp->id . '</td>
                <td>' . $emp->NOMSA . '</td>
                <td>' . $emp->PRESA . '</td>
                <td>' . $emp->DATEDOSE . '</td>
                <td>' . $emp->VACCIN . '</td>
                <td>' . $emp->LOT . '</td>
                <td>' . $emp->TYPE . '</td>
                <td>' . $emp->DOSE . '</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
        }
    }



    public function fetchom()
    {
        $empa = Om::all();
        //$empsa = DB::select("select datecons,nom,prenom,it,sex,age,poste,dateacid,lieu,cause,naturelesi,localislesi,date1cnss,date2cnss,aviscnsss,nbrarret,traitement,mesecorrect,observation from at");
        $output = '';
        if ($empa->count() > 0) {
            $output .=
                '<table id="data-table-buttons" class="table4 table table-striped table-bordered align-middle">
           <thead>
           <tr height="127%">
            <th width="10%" >N° </th>
            <th> MATRICULE </th>
            <th colspan="2"> NOM et PRENOMS </th>
            <th> DATE </th>
            <th> MEDICAMENTS </th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empa as $emp) {
                $output .= '<tr height="127%">
                <td>' . $emp->id . '</td>
                <td>' . $emp->MATSA . '</td>
                <td>' . $emp->NOMSA . '</td>
                <td>' . $emp->PRESA . '</td>
                <td>' . $emp->DATE . '</td>
                <td>' . $emp->ORDONNANCE . '</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
        }
    }



}
