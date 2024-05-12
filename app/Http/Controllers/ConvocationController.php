<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Convocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConvocationController extends Controller
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
        $convocation = Convocation::orderBy('id', 'asc')->Paginate(20);
        return view('rconvoc', compact('convocation'));
    }

    public function detail()
    {
        //
        $convocation = Convocation::orderBy('id', 'asc')->Paginate(20);
        return view('rconvoc', compact('convocation'));
    }




    //public function rap()
    //{
    //  return view('rappel');
    //}

    public function fetchconvoc(Request $request)
    {
        $empa   = Convocation::all();
        $empsa  = DB::select("select convocation.id, convocation.MATSA, convocation.MOTIF, convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION,  concat(per.NOMSA, '    ', per.PRESA)as nom from convocation, personnels as per where convocation.MATSA = per.MATSA and DELETED != 'Invalide' order by convocation.id asc");
        $output = '';
        if ($empa->count() > 0) {
            $output .= '<table id="data-table-buttons" class="table0 table table-striped table-bordered align-middle">
           <thead>
           <tr>
            <th width="10%">N°</th>
            <th> MATRICULE </th>
            <th> NOM et PRENOMS </th>
            <th> MOTIF </th>
            <th> DATE D\'EMISSION </th>
            <th> DATE DE CONVOCATION </th>
            <th> DATE DE PRESENTATION </th>
            <th> OBSERVATION </th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empsa as $index=>$emp) {
                $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
                <td>' . $emp->MATSA . '</td>
                <td>' . $emp->nom . '</td>
                <td>' . $emp->MOTIF . '</td>
                <td>' . $emp->DATEEMIS . '</td>
                <td>' . $emp->DATECONVOC . '</td>
                <td>' . $emp->DATEPRES . '</td>
                <td>' . $emp->OBSERVATION . '</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
        }
    }

    public function fetchconvoca(Request $request)
    {
        $empa   = Convocation::all();
        $empsa  = DB::select("select convocation.id, convocation.MOTIF, convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION, convocation.DELETED,  concat(convocation.MATSA, '    ', per.NOMSA, '    ', per.PRESA)as nom from convocation, personnels as per where convocation.MATSA = per.MATSA order by convocation.id asc");
        $output = '';
        if ($empa->count() > 0) {
            $output .= '<table id="data-table-buttons" class="table8 table table-striped table-bordered align-middle">
           <thead>
           <tr>
            <th width="10%">N°</th>
            <th> Matricule, NOM, PRENOMS </th>
            <th> MOTIF </th>
            <th> DATE D\'EMISSION </th>
            <th> DATE DE CONVOCATION </th>
            <th> DATE DE PRESENTATION </th>
            <th> OBSERVATION </th>
            <th> STATUT </th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empsa as $index=>$emp) {
                $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
                <td>' . $emp->nom . '</td>
                <td>' . $emp->MOTIF . '</td>
                <td>' . $emp->DATEEMIS . '</td>
                <td>' . $emp->DATECONVOC . '</td>
                <td>' . $emp->DATEPRES . '</td>
                <td>' . $emp->OBSERVATION . '</td>
                <td>' . $emp->DELETED . '</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
        }
    }

    public function fetchconvr(Request $request)
    {
        $empa   = Convocation::all();
        $empsa  = DB::select("select convocation.id, convocation.MATSA, convocation.MOTIF, convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION,  concat(per.NOMSA, '    ', per.PRESA)as nom from convocation, personnels as per where convocation.MATSA = per.MATSA and DELETED != 'Invalide' order by convocation.id asc");
        $output = '';
        if ($empa->count() > 0) {
            $output .= '<table class="table5 table table-striped table-bordered align-middle">
           <thead>
           <tr>
            <th width="10%">N°</th>
            <th> Matricule, NOM, PRENOMS </th>
            <th> MOTIF </th>
            <th> DATE D\'EMISSION </th>
            <th> DATE DE CONVOCATION </th>
            <th> DATE DE PRESENTATION </th>
            <th> OBSERVATION </th>
            <th>  </th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empsa as $index=>$emp) {
                $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
                <td>' . $emp->nom . '</td>
                <td>' . $emp->MOTIF . '</td>
                <td>' . $emp->DATEEMIS . '</td>
                <td>' . $emp->DATECONVOC . '</td>
                <td>' . $emp->DATEPRES . '</td>
                <td>' . $emp->OBSERVATION . '</td>
                <td>
                    <div class="list-inline hstack gap-2 mb-2">
                        <a href="/e-conv/' . $emp->id . '" class="btn btn-info editIcon" >
                        <i class=" fas fa-pencil-alt fa-xs"></i></a>
                        <a href="/d-conv/' . $emp->id . '"    class="btn  btn-danger" >
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


    public function formconv() {
        return view('econvocation');
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
        $id = new Convocation();
        $id->MATSA = $request->input('MATSA');
        $id->MOTIF = $request->input('MOTIF');
        $id->DATEEMIS = $request->input('DATEEMIS');
        $id->DATECONVOC = $request->input('DATECONVOC');
        $id->DATEPRES = $request->input('DATEPRES');
        $id->OBSERVATION = $request->input('OBSERVATION');
        $id->save();
        //return view('registres')->with('alert', 'Ajout réussi');
        return back()->withStatus('Ajout réussit');
    }


    /**
     * Display the specified resource.
     * 
     * @param \App\Models\Convocation $convocation
     * @return \Illuminate\Http\Response
     */
    public function show(Convocation $convocation)
    {
        //
        DB::statement("SET lc_time_names = 'fr_FR'");
        $empsaa = DB::selectOne("select * from convocation where id='$convocation->id'");
        return view('d_cs', compact('empsaa'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param \App\Models\Convocation $convocation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id  = Convocation::find($id);

        if (! $id) {
            return response()->json([
                'status' => 200,
                'convocation' => $id
            ]);
        }

        
        return view('edit/editconvoc', compact('id'));

    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Convocation $convocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id                = Convocation::find($id);
        $id->MATSA         = $request->MATSA;
        $id->MOTIF   = $request->MOTIF;
        $id->DATEEMIS   = $request->DATEEMIS;
        $id->DATECONVOC   = $request->DATECONVOC;
        $id->DATEPRES   = $request->DATEPRES;
        $id->OBSERVATION   = $request->OBSERVATION;
        
        

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
        $id = Convocation::findOrFail($id);
        $id->delete();

        return back()->with('success', 'Elémént supprimé !');
    }
}
