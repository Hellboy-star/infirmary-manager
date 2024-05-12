<?php

namespace App\Http\Controllers;

use App\Models\Mp;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MpController extends Controller
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
        $mp = Mp::orderBy('id', 'asc')->Paginate(20);
        return view('rmp', compact('mp'));
    }

    public function detail()
    {
        $mp = Mp::orderBy('id', 'asc')->Paginate(20);
        return view('rmp', compact('mp'));
    }

    

    //public function rap()
    //{
    //  return view('rappel');
    //}

    public function fetchmp()
    {
        $empa = Mp::all();
        $empsa = DB::select(" select mp.id, mp.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, NBRSA, SEXSA,  mp.DATEMP, mp.MPNUMTAB, mp.MPDESIGNATION, mp.MALCARAPRO, mp.AGENTPATH, mp.DATE1CNSSMP, concat(mp.DATE2CNSSMP, ',   ', mp.AVISCNSSMP) as avis, mp.TRAITEMENTMP, mp.OBSERVATIONMP from mp, personnels as per where mp.MATSA = per.MATSA and DELETED != 'Invalide'  ");
        $output = '';
        if ($empa->count() > 0) {
            $output .= '<table id="data-table-buttons" class="table0 table table-striped table-bordered align-middle">
           <thead>
           <tr>
            <th rowspan="2">N°</th>
            <th rowspan="2">DATE</th>
            <th rowspan="2">NOM ET PRENOMS</th>
            <th rowspan="2">MATRICULE</th>
            <th rowspan="2">POSTE</th>
            <th rowspan="2">ANCIENNETE AU POSTE</th>
            <th rowspan="2">SEXE</th>
            <th rowspan="2" colspan="2">MALADIE PROFESSIONNELLE</th>
            <th rowspan="2">MALADIE A CARACTERE PROFESSIONNELLE</th>
            <th rowspan="2">AGENT PATHOGENE SUSPECTE</th>
            <th rowspan="2">DATE DE LA DECLARATION A LA CNSS</th>
            <th rowspan="2">DATE ET AVIS DE LA CNSS</th>
            <th rowspan="2">TRAITEMENT</th>
            <th rowspan="2">OBSERVATIONS</th>
            </tr>
            </thead>
            <tbody>';
            '<tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th colspan="2">N° tableau</th>
                <th colspan="2">Désignation</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>';
            foreach ($empsa as $index=>$emp) {
                $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
                <td>' . $emp->DATEMP . '</td>
                <td>' . $emp->nom . '</td>
                <td>' . $emp->MATSA . '</td>
                <td>' . $emp->LEMSA . '</td>
                <td>' . $emp->NBRSA . '</td>
                <td>' . $emp->SEXSA . '</td>
                <td>' . $emp->MPNUMTAB . '</td>
                <td>' . $emp->MPDESIGNATION . '</td>
                <td>' . $emp->MALCARAPRO . '</td>
                <td>' . $emp->AGENTPATH . '</td>
                <td>' . $emp->DATE1CNSSMP . '</td>
                <td>' . $emp->avis . '</td>
                <td>' . $emp->TRAITEMENTMP . '</td>
                <td>' . $emp->OBSERVATIONMP . '</td>
                
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
        }
    }

    public function fetchmpr()
    {
        $empa = Mp::all();
        $empsa = DB::select(" select mp.id, mp.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, NBRSA, SEXSA,  mp.DATEMP, mp.MPNUMTAB, mp.MPDESIGNATION, mp.MALCARAPRO, mp.AGENTPATH, mp.DATE1CNSSMP, concat(mp.DATE2CNSSMP, ',   ', mp.AVISCNSSMP) as avis, mp.TRAITEMENTMP, mp.OBSERVATIONMP from mp, personnels as per where mp.MATSA = per.MATSA and DELETED != 'Invalide'  ");
        $output = '';
        if ($empa->count() > 0) {
            $output .= '<table class="table7 table table-striped table-bordered align-middle">
           <thead>
           <tr>
            <th>N°</th>
            <th>DATE</th>
            <th>NOM ET PRENOMS</th>
            <th>MATRICULE</th>
            <th>MALADIE PROFESSIONNELLE</th>
            <th>AGENT PATHOGENE SUSPECTE</th>
            <th>OBSERVATIONS</th>
            <th></th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empsa as $index=>$emp) {
                $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
                <td>' . $emp->DATEMP . '</td>
                <td>' . $emp->nom . '</td>
                <td>' . $emp->MATSA . '</td>
                <td>' . $emp->MPDESIGNATION . '</td>
                <td>' . $emp->AGENTPATH . '</td>
                <td>' . $emp->OBSERVATIONMP . '</td>
                <td>
                    <div class="list-inline hstack gap-2 mb-2">
                        <a href="/e-mp/' . $emp->id . '" class="btn btn-info editIcon" >
                        <i class=" fas fa-pencil-alt fa-xs"></i></a>
                        <a href="/d-mp/' . $emp->id . '"    class="btn  btn-danger" >
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


    public function formmp() {
        return view('ermp');
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
        $id = new Mp;
        $id->MATSA = $request->input('MATSA');
        $id->DATEMP = $request->input('DATEMP');
        $id->MPNUMTAB = $request->input('MPNUMTAB');
        $id->MPDESIGNATION = $request->input('MPDESIGNATION');
        $id->MALCARAPRO = $request->input('MALCARAPRO');
        $id->AGENTPATH = $request->input('AGENTPATH');
        $id->DATE1CNSSMP = $request->input('DATE1CNSSMP');
        $id->DATE2CNSSMP = $request->input('DATE2CNSSMP');
        $id->AVISCNSSMP = $request->input('AVISCNSSMP');
        $id->TRAITEMENTMP = $request->input('TRAITEMENTMP');
        $id->OBSERVATIONMP = $request->input('OBSERVATIONMP');
        $id ->USERS  = $request->input('USERS');
        $id ->DELETED  = $request->input('DELETED');
        $id->save();
        //return view('registres')->with('alert', 'Ajout réussi');
        return back()->with('success', 'Ajout réussi');
    }


    /**
     * Display the specified resource.
     * 
     * @param \App\Models\Mp $mp
     * @return \Illuminate\Http\Response
     */
    public function show(Mp $mp)
    {
        //
        DB::statement("SET lc_time_names = 'fr_FR'");
        $empsaa = DB::selectOne("select * from mp where id='$mp->id'");
        return view('d_mp', compact('empsaa'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param \App\Models\Mp $mp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id  = Mp::find($id);

        if (! $id) {
            return response()->json([
                'status' => 200,
                'mp' => $id
            ]);
        }

        
        return view('edit/editmp', compact('id'));

    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Mp $mp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id                = Mp::find($id);
        $id->MATSA         = $request->MATSA;
        $id->DATEMP   = $request->DATEMP;
        $id->MPNUMTAB   = $request->MPNUMTAB;
        $id->MPDESIGNATION   = $request->MPDESIGNATION;
        $id->MALCARAPRO   = $request->MALCARAPRO;
        $id->AGENTPATH   = $request->AGENTPATH;
        $id->DATE1CNSSMP   = $request->DATE1CNSSMP;
        $id->DATE2CNSSMP   = $request->DATE2CNSSMP;
        $id->AVISCNSSMP   = $request->AVISCNSSMP;
        $id->TRAITEMENTMP   = $request->TRAITEMENTMP;
        $id->OBSERVATIONMP   = $request->OBSERVATIONMP;
        $id->USERS = $request->USERS;
        $id->DELETED = $request->DELETED;

        $id->save();

        $a = new Audit;
        $a ->USERS  = $request->input('USERS');
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
        $id = Mp::findOrFail($id);
        $id->DELETED = 'Invalide';
        //$id->delete();
        $id->save();

        return back()->with('success', 'Elémént supprimé !');
    }
}