<?php

namespace App\Http\Controllers;

use App\Models\Antece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnteController extends Controller
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
        //$antece = Antece::orderBy('id', 'asc')->Paginate(20);
        //$per = Personnel::all();
        return view('rante');
    }

    public function fetchabs(Request $request)
    {
        $empa   = Antece::all();
        $empsa  = DB::select("select * from antece");
        $output = '';
        if ($empa->count() > 0) {
            $output .= '<table id="data-table-buttons" class="table1 table table-striped table-bordered align-middle">
           <thead>
           <tr>
            <th width="10%">N°</th>
            <th colspan="2">NOM et PRENOMS</th>
            <th> MATRICULE </th>
            <th> TYPE </th>
            <th> CAUSE </th>
            <th> DEBUT </th>
            <th> REPRISE </th>
            <th> NBRE DE JOURS D\'ARRET </th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empa as $emp) {
                $output .= '<tr height="127%">
                <td>' . $emp->id . '</td>
                <td>' . $emp->NOMSA . '</td>
                <td>' . $emp->PRESA . '</td>
                <td>' . $emp->MATSA . '</td>
                <td>' . $emp->TYPE . '</td>
                <td>' . $emp->CAUSE . '</td>
                <td>' . $emp->DEBUT . '</td>
                <td>' . $emp->REPRISE . '</td>
                <td>' . $emp->NBRARRET . '</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
        }
    }


    public function formante()
    {
        return view('eantecedent');
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
        $id            = new Antece;
        $id->MATSA     = $request->input('MATSA');
        $id->HYPER     = $request->input('HYPER');
        $id->HYPO      = $request->input('HYPO');
        $id->DIABETE   = $request->input('DIABETE');
        $id->ULCERE    = $request->input('ULCERE');
        $id->ASTHME    = $request->input('ASTHME');
        $id->SINUSITE  = $request->input('SINUSITE');
        $id->HEMOROIDE = $request->input('HEMOROIDE');
        $id->EPILEPSIE = $request->input('EPILEPSIE');
        $id->DREPANO   = $request->input('DREPANO');
        $id->HEPATIE   = $request->input('HEPATIE');
        $id->AUTRES    = $request->input('AUTRES');
        $id->PEC       = $request->input('PEC');
        $id->PRM       = $request->input('PRM');
        $id->PRC       = $request->input('PRC');
        $id->PHTA      = $request->input('PHTA');
        $id->PDIABETE  = $request->input('PDIABETE');
        $id->PAUTRE    = $request->input('PAUTRE');
        $id->MHTA      = $request->input('MHTA');
        $id->MDIABETE  = $request->input('MDIABETE');
        $id->MAUTRE    = $request->input('MAUTRE');
        $id->FAC       = $request->input('FAC');
        $id->TABAC     = $request->input('TABAC');
        $id->ALCOOL    = $request->input('ALCOOL');
        $id->SOF       = $request->input('SOF');
        $id->save();
        //return view('registres')->with('alert', 'Ajout réussi');
        return back()->withStatus('success', 'Ajout réussi');
    }


    /**
     * Display the specified resource.
     * 
     * @param \App\Models\Antece $antece
     * @return \Illuminate\Http\Response
     */
    public function show(Antece $antece)
    {
        //
        DB::statement("SET lc_time_names = 'fr_FR'");
        $empsaa = DB::selectOne("select * from antece where id='$antece->id'");
        return view('rabs', compact('empsaa'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param \App\Models\Antece $antece
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id  = Antece::find($id);

        if (! $id) {
            return response()->json([
                'status' => 200,
                'ante' => $id
            ]);
        }

        
        return view('edit/editante', compact('id'));

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
        $id              = Antece::find($id);
        $id->MATSA       = $request->MATSA;
        $id->HYPER     = $request->HYPER;
        $id->HYPO      = $request->HYPO;
        $id->DIABETE   = $request->DIABETE;
        $id->ULCERE    = $request->ULCERE;
        $id->ASTHME    = $request->ASTHME;
        $id->SINUSITE  = $request->SINUSITE;
        $id->HEMOROIDE = $request->HEMOROIDE;
        $id->EPILEPSIE = $request->EPILEPSIE;
        $id->DREPANO   = $request->DREPANO;
        $id->HEPATIE   = $request->HEPATIE;
        $id->AUTRES    = $request->AUTRES;
        $id->PEC       = $request->PEC;
        $id->PRM       = $request->PRM;
        $id->PRC       = $request->PRC;
        $id->PHTA      = $request->PHTA;
        $id->PDIABETE  = $request->PDIABETE;
        $id->PAUTRE    = $request->PAUTRE;
        $id->MHTA      = $request->MHTA;
        $id->MDIABETE  = $request->MDIABETE;
        $id->MAUTRE    = $request->MAUTRE;
        $id->FAC       = $request->FAC;
        $id->TABAC     = $request->TABAC;
        $id->ALCOOL    = $request->ALCOOL;
        $id->SOF       = $request->SOF;

        $id->save();

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
        $id = Antece::findOrFail($id);
        $id->delete();

        return back()->with('success', 'Elémént supprimé !');
    }
}