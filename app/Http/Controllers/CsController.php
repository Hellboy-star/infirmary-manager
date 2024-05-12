<?php

namespace App\Http\Controllers;

use App\Models\Cs;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CsController extends Controller
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
        $cs = Cs::orderBy('id', 'asc')->Paginate(20);
        return view('rcs', compact('cs'));
    }

    public function detail()
    {
        //
        $cs = Cs::orderBy('id', 'asc')->Paginate(20);
        return view('rcs', compact('cs'));
    }




    //public function rap()
    //{
    //  return view('rappel');
    //}

    public function fetchcs()
    {
        $empa = Cs::all();
        $empsa = DB::select(" select cs.id, cs.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA,  cs.POIDSCS, cs.TAILLECS, cs.DATECS, cs.TCS, cs.POULSCS, cs.TACS, cs.PLAINTESCS, cs.EXAMCLICS, cs.BILAN, cs.DIAGNOSTIC, cs.TRAITEMENTCS, cs.OBSERVATIONCS from cs, personnels as per where cs.MATSA = per.MATSA and DELETED != 'Invalide' ");
        $output = '';
        if ($empa->count() > 0) {
            $output .= '<table class="table0 table table-striped table-bordered align-middle">
           <thead>
           <tr>
           <th width="10%">N°</th>
            <th>Date</th>
            <th>Nom et Prénoms</th>
            <th>N°IT</th>
            <th>Poste</th>
            <th>Sexe</th>
            <th>Poids</th>
            <th>Taille</th>
            <th>T°</th>
            <th>Pouls</th>
            <th>TA</th>
            <th>Plaintes</th>
            <th>Examen clinique</th>
            <th>Bilan</th>
            <th>Diagnostic</th>
            <th>Traitement</th>
            <th>Observations</th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empsa as $index=>$emp) {
                $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
               
                <td>' . $emp->DATECS . '</td>
                <td>' . $emp->nom . '</td>
                <td>' . $emp->MATSA . '</td>
                <td>' . $emp->LEMSA . '</td>
                <td>' . $emp->SEXSA . '</td>
                <td>' . $emp->POIDSCS . '</td>
                <td>' . $emp->TAILLECS . '</td>
                <td>' . $emp->TCS . '</td>
                <td>' . $emp->POULSCS . '</td>
                <td>' . $emp->TACS . '</td>
                <td>' . $emp->PLAINTESCS . '</td>
                <td>' . $emp->EXAMCLICS . '</td>
                <td>' . $emp->BILAN . '</td>
                <td>' . $emp->DIAGNOSTIC . '</td>
                <td>' . $emp->TRAITEMENTCS . '</td>
                <td>' . $emp->OBSERVATIONCS . '</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
        }
    }


    public function fetchcsr()
    {
        $empa = Cs::all();
        $empsa = DB::select(" select cs.id, cs.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA,  cs.POIDSCS, cs.TAILLECS, cs.DATECS, cs.TCS, cs.POULSCS, cs.TACS, cs.PLAINTESCS, cs.EXAMCLICS, cs.BILAN, cs.DIAGNOSTIC, cs.TRAITEMENTCS, cs.OBSERVATIONCS from cs, personnels as per where cs.MATSA = per.MATSA and DELETED != 'Invalide' ");
        $output = '';
        if ($empa->count() > 0) {
            $output .= '<table class="table6 table table-striped table-bordered align-middle">
           <thead>
           <tr>
           <th width="10%">N°</th>
            <th>Date</th>
            <th>Nom et Prénoms</th>
            <th>Plaintes</th>
            <th>Examen clinique</th>
            <th>Bilan</th>
            <th>Diagnostic</th>
            <th>Traitement</th>
            <th>Observations</th>
            <th></th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empsa as $index=>$emp) {
                $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
                <td>' . $emp->DATECS . '</td>
                <td>' . $emp->nom . '</td>
                <td>' . $emp->PLAINTESCS . '</td>
                <td>' . $emp->EXAMCLICS . '</td>
                <td>' . $emp->BILAN . '</td>
                <td>' . $emp->DIAGNOSTIC . '</td>
                <td>' . $emp->TRAITEMENTCS . '</td>
                <td>' . $emp->OBSERVATIONCS . '</td>
                <td>
                    <div class="list-inline hstack gap-2 mb-2">
                        <a href="/e-cs/' . $emp->id . '" class="btn btn-info editIcon" >
                        <i class=" fas fa-pencil-alt fa-xs"></i></a>
                        <a href="/d-cs/' . $emp->id . '"    class="btn  btn-danger" >
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


    public function formcs() {
        return view('ercs');
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
        $id = new Cs;
        $id->MATSA = $request->input('MATSA');
        $id->POIDSCS = $request->input('POIDSCS');
        $id->TAILLECS = $request->input('TAILLECS');
        $id->DATECS = $request->input('DATECS');
        $id->TCS = $request->input('TCS');
        $id->POULSCS = $request->input('POULSCS');
        $id->TACS = $request->input('TACS');
        $id->PLAINTESCS = $request->input('PLAINTESCS');
        $id->EXAMCLICS = $request->input('EXAMCLICS');
        $id->BILAN = $request->input('BILAN');
        $id->DIAGNOSTIC = $request->input('DIAGNOSTIC');
        $id->TRAITEMENTCS = $request->input('TRAITEMENTCS');
        $id->OBSERVATIONCS = $request->input('OBSERVATIONCS');
        $id ->USERS  = $request->input('USERS');
        $id ->DELETED  = $request->input('DELETED');
        $id->save();
        //return view('registres')->with('alert', 'Ajout réussi');
        return back()->withStatus('Ajout réussit');
    }


    /**
     * Display the specified resource.
     * 
     * @param \App\Models\Cs $cs
     * @return \Illuminate\Http\Response
     */
    public function show(Cs $cs)
    {
        //
        DB::statement("SET lc_time_names = 'fr_FR'");
        $empsaa = DB::selectOne("select * from cs where id='$cs->id'");
        return view('d_cs', compact('empsaa'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param \App\Models\Cs $cs
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $id  = Cs::find($id);

        if (! $id) {
            return response()->json([
                'status' => 200,
                'cs' => $id
            ]);
        }

        
        return view('edit/editcs', compact('id'));

    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cs $cs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id                = Cs::find($id);
        $id->MATSA         = $request->MATSA;
        $id->POIDSCS = $request->POIDSCS;
        $id->TAILLECS = $request->TAILLECS;
        $id->DATECS = $request->DATECS;
        $id->TCS = $request->TCS;
        $id->POULSCS = $request->POULSCS;
        $id->TACS = $request->TACS;
        $id->PLAINTESCS = $request->PLAINTESCS;
        $id->EXAMCLICS = $request->EXAMCLICS;
        $id->BILAN = $request->BILAN;
        $id->DIAGNOSTIC = $request->DIAGNOSTIC;
        $id->TRAITEMENTCS = $request->TRAITEMENTCS;
        $id->OBSERVATIONCS = $request->OBSERVATIONCS;
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
        $id = Cs::findOrFail($id);
        $id->DELETED = 'Invalide';
        //$id->delete();
        $id->save();

        return back()->with('success', 'Elémént supprimé !');
    }
}