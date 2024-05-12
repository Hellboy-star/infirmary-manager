<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Soin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoinfamController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('soin');
    }

    public function fetchsoin(Request $request)
    {
        DB::statement("SET lc_time_names = 'fr_FR'");

        $empsa = Soin::all();
        $emp1 = DB::select("select * from soin where DELETED != 'Invalide' order by id asc ");

        $output = '';
        if ($empsa->count() > 0) {
            $output .= '<table class="table0 table table-striped table-bordered align-middle">
            <thead>
              <tr>
                <th>  N° </th>
                <th> NOM ET PRENOMS </th>
                <th> DATE </th>
                <th> TEMPERATURE </th>
                <th> POIDS </th>
                <th> POULS </th>
                <th> PLAINTE </th>
                <th> DIAGNOSTIC </th>
                <th> EXAMEN CLINIQUE </th>
                <th> BILAN </th>
                <th> TRAITEMENT </th>
                <th> OBSERVATION </th>
                
              </tr>
            </thead>
            <tbody>';
            foreach ($emp1 as $index=>$emp) {
                $output .=
                    '<tr> 
                    <td>' . ($index+1) . '</td>
                    <td>' . $emp->NOMPRE . '</td>
                    <td>' . $emp->DATESOIN . '</td>
                    <td>' . $emp->TEMPSOIN . '°</td>
                    <td>' . $emp->POIDSOIN . '</td>
                    <td>' . $emp->POULSOIN . '</td>
                    <td>' . $emp->PLAINTESOIN . '</td>
                    <td>' . $emp->DIAGNOSTICSOIN . '</td>
                    <td>' . $emp->EXAMSOIN . '</td>
                    <td>' . $emp->BILANSOIN . '</td>
                    <td>' . $emp->TRAITEMENTSOIN . '</td>
                    <td>' . $emp->OBSERVATIONSOIN . '</td>
                    
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
        }
    }

    public function fetchsoina(Request $request)
    {
        DB::statement("SET lc_time_names = 'fr_FR'");

        $empsa = Soin::all();
        $emp1 = DB::select("select * from soin where DELETED != 'Invalide' order by id asc ");

        $output = '';
        if ($empsa->count() > 0) {
            $output .= '<table class="table1 table table-striped table-bordered align-middle">
            <thead>
              <tr>
                <th>  N° </th>
                <th> NOM ET PRENOMS </th>
                <th> DATE </th>
                <th> TEMPERATURE </th>
                <th> PLAINTE </th>
                <th> DIAGNOSTIC </th>
                <th> TRAITEMENT </th>
                <th> OBSERVATION </th>
                <th> Outils </th>
                
              </tr>
            </thead>
            <tbody>';
            foreach ($emp1 as $index=>$emp) {
                $output .=
                    '<tr> 
                    <td>' . ($index+1) . '</td>
                    <td>' . $emp->NOMPRE . '</td>
                    <td>' . $emp->DATESOIN . '</td>
                    <td>' . $emp->TEMPSOIN . '°</td>
                    <td>' . $emp->PLAINTESOIN . '</td>
                    <td>' . $emp->DIAGNOSTICSOIN . '</td>
                    <td>' . $emp->TRAITEMENTSOIN . '</td>
                    <td>' . $emp->OBSERVATIONSOIN . '</td>
                    
                    <td>
                    <div class="list-inline hstack gap-2 mb-0">
                        <a href="/e-soin/' . $emp->id . '" class="btn btn-info editIcon" >
                        <i class=" fas fa-pencil-alt fa-xs"></i></a>
                        <a href="/d-soin/' . $emp->id . '"    class="btn  btn-danger" >
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('soinfamf');
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
        $id = new Soin;
        $id->NOMPRE = $request->input('NOMPRE');
        $id->DATESOIN = $request->input('DATESOIN');
        $id->TEMPSOIN = $request->input('TEMPSOIN');
        $id->POIDSOIN = $request->input('POIDSOIN');
        $id->POULSOIN = $request->input('POULSOIN');
        $id->PLAINTESOIN = $request->input('PLAINTESOIN');
        $id->DIAGNOSTICSOIN = $request->input('DIAGNOSTICSOIN');
        $id->EXAMSOIN = $request->input('EXAMSOIN');
        $id->BILANSOIN = $request->input('BILANSOIN');
        $id->TRAITEMENTSOIN = $request->input('TRAITEMENTSOIN');
        $id->OBSERVATIONSOIN = $request->input('OBSERVATIONSOIN');
        $id->USERS = $request->input('USERS');
        $id ->DELETED  = $request->input('DELETED');
        $id->save();
        //return view('registres')->with('alert', 'Ajout réussi');
        return back()->with('success', 'Ajout réussi');
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
        $id  = Soin::find($id);

        if (! $id) {
            return response()->json([
                'status' => 200,
                'soin' => $id
            ]);
        }

        
        return view('edit/editsoinfam', compact('id'));
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
        $id                = Soin::find($id);
        $id->NOMPRE         = $request->NOMPRE;
        $id->DATESOIN         = $request->DATESOIN;
        $id->TEMPSOIN         = $request->TEMPSOIN;
        $id->POIDSOIN         = $request->POIDSOIN;
        $id->POULSOIN         = $request->POULSOIN;
        $id->PLAINTESOIN         = $request->PLAINTESOIN;
        $id->DIAGNOSTICSOIN         = $request->DIAGNOSTICSOIN;
        $id->EXAMSOIN         = $request->EXAMSOIN;
        $id->BILANSOIN         = $request->BILANSOIN;
        $id->TRAITEMENTSOIN         = $request->TRAITEMENTSOIN;
        $id->OBSERVATIONSOIN         = $request->OBSERVATIONSOIN;
        $id->USERS         = $request->USERS;
        $id->DELETED         = $request->DELETED;
        

        $id->save();

        $a = new Audit;
        $a ->NUSERS  = $request->input('NUSERS');
        $a ->AUSERS  = $request->input('AUSERS');
        $a ->TABLES  = $request->input('TABLES');
        $a ->TID  = $request->input('TID');
        $a ->MATSA  = 'Null';
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
        //
    }
}
