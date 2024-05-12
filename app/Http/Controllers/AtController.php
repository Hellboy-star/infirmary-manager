<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\At;
use App\Models\Audit;
use App\Models\Personnel;
use Illuminate\Support\Facades\DB;

class AtController extends Controller
{
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
        //$at = At::orderBy('id', 'asc')->Paginate(20);
        //$per = Personnel::all();
        return view('rat');
    }

    public function fetchat(Request $request)
    {
        $empa   = At::all();
        $empsa  = DB::select(" select at.id, at.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA, at.IPP, at.DATECONS, at.DATEACID, at.LIEU, at.CAUSEAT, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, concat(at.DATE2CNSSAT,'   ' ,at.AVISCNSSAT)as cnss, at.NBRARRETAT, at.TRAITEMENTAT, at.MESECORRECT, at.OBSERVATIONAT from at, personnels as per where at.MATSA = per.MATSA and DELETED != 'Invalide' order by at.id asc ");
        $output = '';
        if ($empa->count() > 0) {
            $output .= '<table id="data-table-buttons" class="table0 table table-striped table-bordered align-middle">
           <thead>
           <tr>
           <th width="10%">N°</th>
            <th>Date</th>
            <th>Nom et Prénoms</th>
            <th width="50%">N°IT</th>
            <th>Sexe</th>
            <th>Poste</th>
            <th>Date et heure de l\'accident</th>
            <th>Lieu de l\'accident</th>
            <th>Cause de l\'accident</th>
            <th>Nature des lésions</th>
            <th>Localisation des lésions</th>
            <th>Date de la déclaration à la CNSS</th>
            <th>Date et avis de la CNSS</th>
            <th>Nombre de jours d\'arrêt de travail</th>
            <th>Traitement</th>
            <th>Mesures corectrices</th>
            <th>Observations</th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empsa as $index=>$emp) {
                $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
               
                <td>' . $emp->DATECONS . '</td>
                <td>' . $emp->nom . '</td>
                <td>' . $emp->MATSA . '</td>
                <td>' . $emp->SEXSA . '</td>
                <td>' . $emp->LEMSA . '</td>
                <td>' . $emp->DATEACID . '</td>
                <td>' . $emp->LIEU . '</td>
                <td>' . $emp->CAUSEAT . '</td>
                <td>' . $emp->NATURELESI . '</td>
                <td>' . $emp->LOCALISLESI . '</td>
                <td>' . $emp->DATE1CNSSAT . '</td>
                <td>' . $emp->cnss . '</td>
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

    public function fetchatr(Request $request)
    {
        $empa   = At::all();
        $empsa  = DB::select(" select at.id, at.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA, at.IPP, at.DATECONS, at.DATEACID, at.LIEU, at.CAUSEAT, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, concat(at.DATE2CNSSAT,'   ' ,at.AVISCNSSAT)as cnss, at.NBRARRETAT, at.TRAITEMENTAT, at.MESECORRECT, at.OBSERVATIONAT from at, personnels as per where at.MATSA = per.MATSA and DELETED != 'Invalide' order by at.id asc ");
        $output = '';
        if ($empa->count() > 0) {
            $output .= '<table id="data-table-buttons" class="table4 table table-striped table-bordered align-middle">
           <thead>
           <tr>
           <th width="10%">N°</th>
            <th>Date</th>
            <th>Nom et Prénoms</th>
            <th>Poste</th>
            <th>Date et heure de l\'accident</th>
            <th>Cause de l\'accident</th>
            <th>Nature des lésions</th>
            <th>Nombre de jours d\'arrêt de travail</th>
            <th>Observations</th>
            <th>Observations</th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empsa as $index=>$emp) {
                $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
                <td>' . $emp->DATECONS . '</td>
                <td>' . $emp->nom . '</td>
                <td>' . $emp->LEMSA . '</td>
                <td>' . $emp->DATEACID . '</td>
                <td>' . $emp->CAUSEAT . '</td>
                <td>' . $emp->NATURELESI . '</td>
                <td>' . $emp->NBRARRETAT . '</td>
                <td>' . $emp->OBSERVATIONAT . '</td>
                <td>
                    <div class="list-inline hstack gap-2 mb-2">
                        <a href="/e-at/' . $emp->id . '" class="btn btn-info editIcon" >
                        <i class=" fas fa-pencil-alt fa-xs"></i></a>
                        <a href="/d-at/' . $emp->id . '"    class="btn  btn-danger" >
                        <i class="fas fa-trash-alt fa-xs"></i></a>
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


    public function format()
    {
        return view('erat');
    }


    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Client\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage. 
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $id                = new At;
        $id->MATSA         = $request->input('MATSA');
        $id->DATECONS      = $request->input('DATECONS');
        $id->DATEACID      = $request->input('DATEACID');
        $id->LIEU          = $request->input('LIEU');
        $id->CAUSEAT       = $request->input('CAUSEAT');
        $id->IPP           = $request->input('IPP');
        $id->NATURELESI    = $request->input('NATURELESI');
        $id->LOCALISLESI   = $request->input('LOCALISLESI');
        $id->DATE1CNSSAT   = $request->input('DATE1CNSSAT');
        $id->DATE2CNSSAT   = $request->input('DATE2CNSSAT');
        $id->AVISCNSSAT    = $request->input('AVISCNSSAT');
        $id->NBRARRETAT    = $request->input('NBRARRETAT');
        $id->TRAITEMENTAT  = $request->input('TRAITEMENTAT');
        $id->MESECORRECT   = $request->input('MESECORRECT');
        $id->OBSERVATIONAT = $request->input('OBSERVATIONAT');
        $id ->USERS  = $request->input('USERS');
        $id ->DELETED  = $request->input('DELETED');
        $id->save();
        //return view('registres')->with('alert', 'Ajout réussi');
        return back()->withStatus('success', 'Ajout réussi');
    }


    /**
     * Display the specified resource.
     * 
     * @param \App\Models\At $at
     * @return \Illuminate\Http\Response
     */
    public function show(At $at)
    {
        //
        DB::statement("SET lc_time_names = 'fr_FR'");
        $empsaa = DB::selectOne("select * from at where id='$at->id'");
        return view('rat', compact('empsaa'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param \App\Models\At $at
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id  = At::find($id);
        $id1 = DB::selectOne(" select at.id, at.MATSA, per.MATSA, concat(NOMSA, '    ', PRESA)as nom from at, personnels as per where at.MATSA = per.MATSA and DELETED != 'Invalide' and at.id ='$id'  ");

        if (! $id) {
            return response()->json([
                'status' => 200,
                'at' => $id1
            ]);
        }

        // DB::statement("SET lc_time_names = 'fr_FR'");
        // $id = DB::selectOne("select at.id, at.MATSA, at.IPP, at.DATECONS, at.DATEACID, at.LIEU, at.CAUSEAT, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, at.DATE2CNSSAT, at.AVISCNSSAT, at.NBRARRETAT, at.TRAITEMENTAT, at.MESECORRECT, at.OBSERVATIONAT from at where at.id='$request->id'");
        // $id = DB::select(" select * from at where id='$request->id' ");
        $ida = DB::selectOne(" select at.id, at.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA, at.IPP, at.DATECONS, at.DATEACID, at.LIEU, at.CAUSEAT, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, at.DATE2CNSSAT, at.AVISCNSSAT, at.NBRARRETAT, at.TRAITEMENTAT, at.MESECORRECT, at.OBSERVATIONAT from at, personnels as per where at.MATSA = per.MATSA and DELETED != 'Invalide' and at.id ='$id'  ");
        return view('edit/editat', compact('id', 'id1'));

    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id                = At::find($id);
        $id->MATSA         = $request->MATSA;
        $id->DATECONS      = $request->DATECONS;
        $id->DATEACID      = $request->DATEACID;
        $id->LIEU          = $request->LIEU;
        $id->CAUSEAT       = $request->CAUSEAT;
        $id->IPP           = $request->IPP;
        $id->NATURELESI    = $request->NATURELESI;
        $id->LOCALISLESI   = $request->LOCALISLESI;
        $id->DATE1CNSSAT   = $request->DATE1CNSSAT;
        $id->DATE2CNSSAT   = $request->DATE2CNSSAT;
        $id->AVISCNSSAT    = $request->AVISCNSSAT;
        $id->NBRARRETAT    = $request->NBRARRETAT;
        $id->TRAITEMENTAT  = $request->TRAITEMENTAT;
        $id->MESECORRECT   = $request->MESECORRECT;
        $id->OBSERVATIONAT = $request->OBSERVATIONAT;
        $id->USERS = $request->USERS;
        $id->DELETED = $request->DELETED;

        $id->save();

        $a = new Audit;
        $a ->NUSERS  = $request->input('NUSERS');
        $a ->AUSERS  = $request->input('AUSERS');
        $a ->TABLES  = $request->input('TABLES');
        $a ->TID  = $request->input('TID');
        $a ->MATSA  = $request->input('MATSA');
        $a ->ATABLES  = $request->input('ATABLES');

        $a->save();

        $empsa  = DB::select(" select at.id, at.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA, at.IPP, at.DATECONS, at.DATEACID, at.LIEU, at.CAUSEAT, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, at.DATE2CNSSAT, at.AVISCNSSAT, at.NBRARRETAT, at.TRAITEMENTAT, at.MESECORRECT, at.OBSERVATIONAT from at, personnels as per where at.MATSA = per.MATSA and DELETED != 'Invalide' order by at.id desc ");
        $empsa1 = DB::select(" select cs.id, cs.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA,  cs.POIDSCS, cs.TAILLECS, cs.DATECS, cs.TCS, cs.POULSCS, cs.TACS, cs.PLAINTESCS, cs.EXAMCLICS, cs.BILAN, cs.DIAGNOSTIC, cs.TRAITEMENTCS, cs.OBSERVATIONCS from cs, personnels as per where cs.MATSA = per.MATSA and DELETED != 'Invalide' order by cs.id desc ");
        $empsa2 = DB::select(" select mp.id, mp.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  mp.DATEMP, mp.MPNUMTAB, mp.MPDESIGNATION, mp.MALCARAPRO, mp.AGENTPATH, mp.DATE1CNSSMP, mp.DATE2CNSSMP, mp.AVISCNSSMP, mp.TRAITEMENTMP, mp.OBSERVATIONMP from mp, personnels as per where mp.MATSA = per.MATSA and DELETED != 'Invalide' order by mp.id desc ");
        $empsa3 = DB::select(" select vms.id, vms.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA, vms.POIDSVMS, vms.DATEVMS, vms.TYPVISI, vms.POULSVMS, vms.PLAINTESVMS, vms.TAVMS, vms.PA, vms.PTI, vms.PTE, vms.AVOD, vms.AVOG, vms.EXAMCLIVMS, vms.BILANVMS, vms.AVISP, vms.CONCLMED, vms.APTITUDE, vms.OBSERVATIONVMS from vms, personnels as per where vms.MATSA = per.MATSA and DELETED != 'Invalide' order by vms.id desc ");
        $empsa4 = DB::select(" select vac.id, vac.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  vac.DATEDOSE, vac.DATEEXP, vac.VACCIN, vac.LOT, vac.TYPE, vac.DOSE, vac.CENTRE, vac.DATE from vac , personnels as per where vac.MATSA = per.MATSA and DELETED != 'Invalide' order by vac.id desc ");
        $empsa5 = DB::select(" select abs.id, abs.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  abs.TYPEABS, abs.CAUSE, abs.DEBUT, abs.REPRISE, abs.NBRARRET from abs , personnels as per where abs.MATSA = per.MATSA and DELETED != 'Invalide' order by abs.id desc ");
        $empsa6 = DB::select(" select convocation.id, convocation.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  convocation.MOTIF, convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION from convocation , personnels as per where convocation.MATSA = per.MATSA and DELETED != 'Invalide'  order by convocation.id desc ");
        $empsa7 = DB::select(" select om.id, om.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  om.DATE, om.ORDONNANCE, om.FILE from om , personnels as per where om.MATSA = per.MATSA and DELETED != 'Invalide' order by om.id desc ");
        return view('registres', compact('empsa', 'empsa1', 'empsa2', 'empsa3', 'empsa4', 'empsa5', 'empsa6', 'empsa7'))->with('success', 'Mise à jour réussie !');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = At::findOrFail($id);
        $id->DELETED = 'Invalide';
        //$id->delete();
        $id->save();

        return back()->with('success', 'Elémént supprimé !');
    }
}