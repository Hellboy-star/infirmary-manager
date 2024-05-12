<?php

namespace App\Http\Controllers;

use PDF;
use Dompdf\Dompdf;

use App\Models\Personnel;
use App\Models\Antece;
use Illuminate\Http\Request;
use App\Imports\PersonnelImport;
use App\Imports\PersonnelImportA;
use App\Models\Abs;
use App\Models\Chrono;
use App\Models\Convocation;
use App\Models\Pachsta;
use App\Models\Poste;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\ValidationException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;




class PersonnelController extends Controller
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
        //$personnel = Personnel::orderBy('id', 'asc')->Paginate(10);
        return view('pers');
    }

    function get_pante_data()
    {
        $pante_data = DB::table(' SELECT * FROM personnels LEFT JOIN antece ON personnels.MATSA = antece.MATSA WHERE personnels.id=$personnel->id ')
            ->get();
        return $pante_data;
    }

    public function fetchper(Request $request)
    {


        $empsa = Personnel::all();
        $emp1  = DB::select("select id, MATSA, NOMSA, PRESA, SEXSA, LEMSA, TELSA, TBLIB, VILSA, DNASA, ANCSA, LIESA from personnels ");

        $output = '';
        if ($empsa->count() > 0) {
            $output .= '<table class="table0 table table-striped table-bordered align-middle">
            <thead>
              <tr>
                <th width="1%"> N° </th>
                <th> MATRICULE </th>
                <th> NOM  </th>
                <th> PRENOMS </th>
                <th> SEXE </th>
                <th> POSTE </th>
                <th> TELEPHONE </th>
                <th> SERVICE </th>
                <th> DATE de NAISSANCE </th>
                <th> ANCIENNETE AU POSTE </th>
                <th> TEST </th>
                <th width="50%"> FAMILLE </th>
                <th width="50%"> DOSSIER MEDICAL </th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emp1 as $index=>$emp) {
                $output .=
                    '<tr> 
                        <td>' . ($index+1) . '</td>
                        <td>' . $emp->MATSA . '</td>
                        <td>' . $emp->NOMSA . '</td>
                        <td>' . $emp->PRESA . '</td>
                        <td>' . $emp->SEXSA . '</td>   
                        <td>' . $emp->LEMSA . '</td>
                        <td>' . $emp->TELSA . '</td>
                        <td>' . $emp->TBLIB . '</td>
                        <td>' . $emp->DNASA . '</td>
                        <td>' . $emp->ANCSA . '</td>
                        <td>' . $emp->LIESA . '</td>
                        <td>
                            <div class="list-inline hstack gap-2 mb-0">
                                <a href="/personnelfam/' . $emp->id . '" style="border:none; background-color:transparent"  class="text-success mx-1 editIcon" ><i class="bi-eye h5"></i></a>
                            </div>
                        </td>
                        <td>
                        <div class="list-inline hstack gap-2 mb-0">
                            <a href="/personnel/' . $emp->id . '" style="border:none; background-color:transparent"  class="text-success mx-1 editIcon" ><i class="bi-eye h5"></i></a>
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


    public function fetchperso(Request $request)
    {
        $sig = DB::selectone("SELECT id, MATSA,NOMSA, PRESA, SEXSA, LEMSA, SECSA, NBRSA, DNASA from personnels where id=$request->id ");
        return response()->json([
            'lm' => $sig,
        ]);
    }

    public function poste()
    {
        return view("eposte");
    }

    public function ante()
    {
        //
        return view("eantecedent");
    }

    public function convoc()
    {
        return view("econvocation");
    }

    public function absent()
    {
        return view("eabsenteisme");
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

    
    public function importp(Request $request)
    {

        $patient = DB::delete("delete  from personnels");
        $file   = $request->file('select_file')->store('import');
        $import = new PersonnelImport;
        $import->import($file);
        return back()->withStatus('Importation effectuée avec succès');

    }

    // public function generatePDF($id)
    // {
    //     if ($id) {
    //         $empsaa = DB::selectOne(" select * from personnels  where id='$id' "); // personnel

    //         $empsaa0 = DB::selectOne(" SELECT * FROM dosmed WHERE id=$id "); // personnel & antecedents

    //         $empsaa00 = DB::select(" SELECT * FROM dosmed WHERE id=$id "); // personnel & antecedents

    //         $empsaa000 = DB::select(" SELECT * FROM dosmed WHERE id=$id "); // personnel & antecedents

    //         $empsaa0000 = DB::select(" SELECT * FROM dosmed WHERE id=$id "); // personnel & antecedents

    //         $empsaa00000 = DB::select(" SELECT * FROM dosmed WHERE id=$id "); // personnel & antecedents

    //         $empsaa1 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  poste.POSTE, poste.DENOMINATION, 
    //     poste.ENTREPRISE, poste.PERIODEDU, poste.PERIODEAU, poste.TACHES, poste.RYTMTAF, poste.FACTEURNUI, poste.METRODATE, poste.METROTYPE, poste.METROR 
    //     from personnels as per, poste  WHERE per.id='$id' AND poste.MATSA = per.MATSA "); // postes

    //         $empsaa2 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  vac.DATEDOSE, vac.DATEEXP, 
    //     vac.VACCIN, vac.LOT, vac.TYPE, vac.DOSE, vac.CENTRE, vac.DATE from personnels as per LEFT JOIN vac ON vac.MATSA = per.MATSA where per.id='$id' "); // vaccination

    //         $empsaa3 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  abs.TYPEABS, abs.CAUSE, abs.DEBUT, 
    //     abs.REPRISE, abs.NBRARRET from personnels as per left JOIN abs ON abs.MATSA = per.MATSA where per.id='$id' "); // absenteisme

    //         $empsaa4 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA, at.IPP, at.DATECONS, at.DATEACID, 
    //     at.LIEU, at.CAUSEAT, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, at.DATE2CNSSAT, at.AVISCNSSAT, at.NBRARRETAT, at.TRAITEMENTAT, 
    //     at.MESECORRECT, at.OBSERVATIONAT from personnels as per LEFT JOIN at ON at.MATSA = per.MATSA  where per.id='$id' "); // accident de travail

    //         $empsaa5 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  mp.DATEMP, mp.MPNUMTAB, 
    //     mp.MPDESIGNATION, mp.MALCARAPRO, mp.AGENTPATH, mp.DATE1CNSSMP, mp.DATE2CNSSMP, mp.AVISCNSSMP, mp.TRAITEMENTMP, mp.OBSERVATIONMP 
    //     from personnels as per LEFT JOIN mp ON mp.MATSA = per.MATSA where per.id='$id' "); // maladie professionnelle

    //         $empsaa6 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  convocation.MOTIF, 
    //     convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION from  
    //     personnels as per left JOIN convocation ON convocation.MATSA = per.MATSA where per.id='$id' "); // convocation

    //         $empsaa7 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA,  cs.POIDSCS, cs.TAILLECS, cs.DATECS, 
    //     cs.TCS, cs.POULSCS, cs.TACS, cs.PLAINTESCS, cs.EXAMCLICS, cs.BILAN, cs.DIAGNOSTIC, cs.TRAITEMENTCS, cs.OBSERVATIONCS 
    //     from personnels as per LEFT JOIN cs ON cs.MATSA = per.MATSA where per.id='$id' "); // consultation

    //         $empsaa8 = DB::selectOne(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, per.LEMSA, per.SEXSA, per.SECSA, vms.POIDSVMS, vms.DATEVMS, 
    //     vms.TYPVISI, vms.POULSVMS, vms.PLAINTESVMS, vms.TAVMS, vms.PA, vms.PTI, vms.PTE, vms.AVOD, vms.AVOG, vms.EXAMCLIVMS, vms.BILANVMS, 
    //     vms.AVISP, vms.CONCLMED, vms.APTITUDE, vms.OBSERVATIONVMS from personnels as per left JOIN vms ON vms.MATSA = per.MATSA where per.id='$id' "); // visite medicale specialise



    //         $pdf         = new Dompdf();
    //         $htmlContent = view('personnel', compact('empsaa', 'empsaa00000', 'empsaa0000', 'empsaa000', 'empsaa00', 'empsaa0', 'empsaa1', 'empsaa2', 'empsaa3', 'empsaa4', 'empsaa5', 'empsaa6', 'empsaa7', 'empsaa8'));
    //         $pdf->loadHtml($htmlContent);
    //         $pdf->setPaper('a4', 'landscape');
    //         $pdf->render();
    //         return $pdf->download('dossier_medical.pdf');
    //     } else {
    //         return response()->json(['error' => 'ID de personnel invalide'], 400);
    //     }
    // }


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
     * @param  \App\Models\personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function show(personnel $personnel)
    {
        DB::statement("SET lc_time_names = 'fr_FR'");


        // $empsaa= $this->get_pante_data();
        $empsaa = DB::selectOne(" select * from personnels  where id='$personnel->id' "); // personnel

        // $empsaa = DB::selectOne(" select personnels.id, * from personnels FULL JOIN antece where personnels.id='$personnel->id' "); // personnel

        $empsaa0 = DB::selectOne(" SELECT * FROM dosmed WHERE id=$personnel->id "); // personnel & antecedents

        $empsaa00 = DB::select(" SELECT * FROM dosmed WHERE id=$personnel->id "); // personnel & antecedents

        $empsaa000 = DB::select(" SELECT * FROM dosmed WHERE id=$personnel->id "); // personnel & antecedents

        $empsaa0000 = DB::select(" SELECT * FROM dosmed WHERE id=$personnel->id "); // personnel & antecedents

        $empsaa00000 = DB::select(" SELECT * FROM dosmed WHERE id=$personnel->id "); // personnel & antecedents

        $empsaa1 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  poste.POSTE, poste.DENOMINATION, 
        poste.ENTREPRISE, poste.PERIODEDU, poste.PERIODEAU, poste.TACHES, poste.RYTMTAF, poste.FACTEURNUI, poste.METRODATE, poste.METROTYPE, poste.METROR 
        from personnels as per, poste  WHERE per.id='$personnel->id' AND poste.MATSA = per.MATSA "); // postes

        $empsaa2 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  vac.DATEDOSE, vac.DATEEXP, 
        vac.VACCIN, vac.LOT, vac.TYPE, vac.DOSE, vac.CENTRE, vac.DATE from personnels as per LEFT JOIN vac ON vac.MATSA = per.MATSA where per.id='$personnel->id' "); // vaccination

        $empsaa3 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  abs.TYPEABS, abs.CAUSE, abs.DEBUT, 
        abs.REPRISE, abs.NBRARRET from personnels as per left JOIN abs ON abs.MATSA = per.MATSA where per.id='$personnel->id' "); // absenteisme

        $empsaa4 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA, at.IPP, at.DATECONS, at.DATEACID, 
        at.LIEU, at.CAUSEAT, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, at.DATE2CNSSAT, at.AVISCNSSAT, at.NBRARRETAT, at.TRAITEMENTAT, 
        at.MESECORRECT, at.OBSERVATIONAT from personnels as per LEFT JOIN at ON at.MATSA = per.MATSA  where per.id='$personnel->id' "); // accident de travail

        $empsaa5 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  mp.DATEMP, mp.MPNUMTAB, 
        mp.MPDESIGNATION, mp.MALCARAPRO, mp.AGENTPATH, mp.DATE1CNSSMP, mp.DATE2CNSSMP, mp.AVISCNSSMP, mp.TRAITEMENTMP, mp.OBSERVATIONMP 
        from personnels as per LEFT JOIN mp ON mp.MATSA = per.MATSA where per.id='$personnel->id' "); // maladie professionnelle

        $empsaa6 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  convocation.MOTIF, 
        convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION from  
        personnels as per left JOIN convocation ON convocation.MATSA = per.MATSA where per.id='$personnel->id' "); // convocation

        $empsaa7 = DB::select(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA,  cs.POIDSCS, cs.TAILLECS, cs.DATECS, 
        cs.TCS, cs.POULSCS, cs.TACS, cs.PLAINTESCS, cs.EXAMCLICS, cs.BILAN, cs.DIAGNOSTIC, cs.TRAITEMENTCS, cs.OBSERVATIONCS 
        from personnels as per LEFT JOIN cs ON cs.MATSA = per.MATSA where per.id='$personnel->id' "); // consultation

        $empsaa8 = DB::selectOne(" select per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, per.LEMSA, per.SEXSA, per.SECSA, vms.POIDSVMS, vms.DATEVMS, 
        vms.TYPVISI, vms.POULSVMS, vms.PLAINTESVMS, vms.TAVMS, vms.PA, vms.PTI, vms.PTE, vms.AVOD, vms.AVOG, vms.EXAMCLIVMS, vms.BILANVMS, 
        vms.AVISP, vms.CONCLMED, vms.APTITUDE, vms.OBSERVATIONVMS from personnels as per left JOIN vms ON vms.MATSA = per.MATSA where per.id='$personnel->id' "); // visite medicale specialise

        return view('personnel', compact('empsaa', 'empsaa00000', 'empsaa0000', 'empsaa000', 'empsaa00', 'empsaa0', 'empsaa1', 'empsaa2', 'empsaa3', 'empsaa4', 'empsaa5', 'empsaa6', 'empsaa7', 'empsaa8'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $per = Personnel::find($request->personnel_id);
        if ($per) {
            return response()->json([
                'status' => 200,
                'personnel' => $per
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, personnel $personnel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(personnel $personnel)
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function absstore(Request $request)
    {
        //
        $id           = new Abs;
        $id->MATSA    = $request->input('MATSA');
        $id->TYPE     = $request->input('TYPE');
        $id->CAUSE    = $request->input('CAUSE');
        $id->DEBUT    = $request->input('DEBUT');
        $id->REPRISE  = $request->input('REPRISE');
        $id->NBRARRET = $request->input('NBRARRET');
        $id->save();
        return back()->withStatus('success', 'Ajout réussi');
    }

    public function convostore(Request $request)
    {
        //
        $id              = new Convocation;
        $id->MATSA       = $request->input('MATSA');
        $id->MOTIF       = $request->input('MOTIF');
        $id->DATEEMS     = $request->input('DATEEMS');
        $id->DATECONVOC  = $request->input('DATECONVOC');
        $id->DATEPRES    = $request->input('DATEPRES');
        $id->OBSERVATION = $request->input('OBSERVATION');
        $id->save();
        return back()->withStatus('success', 'Ajout réussi');
    }

    public function antestore(Request $request)
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
        return back()->withStatus('success', 'Ajout réussi');
    }

    public function postestore(Request $request)
    {
        //
        $id               = new Poste;
        $id->MATSA        = $request->input('MATSA');
        $id->POSTE        = $request->input('POSTE');
        $id->DENOMINATION = $request->input('DENOMINATION');
        $id->ENTREPRISE   = $request->input('ENTREPRISE');
        $id->PERIODEDU    = $request->input('PERIODEDU');
        $id->PERIODEAU    = $request->input('PERIODEAU');
        $id->TACHES       = $request->input('TACHES');
        $id->RYTMTAF      = $request->input('RYTMTAF');
        $id->FACTEURNUI   = $request->input('FACTEURNUI');
        $id->METRODATE    = $request->input('METRODATE');
        $id->METROTYPE    = $request->input('METROTYPE');
        $id->METROR       = $request->input('METROR');
        $id->save();
        return back()->withStatus('success', 'Ajout réussi');
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

    public function tab3(Request $request)
    {
        //
        $id        = new Chrono;
        $id->ANNEE = $request->input('ANNEE');
        $id->ACTIV = $request->input('ACTIV');
        $id->JA    = $request->input('JA');
        $id->F     = $request->input('F');
        $id->M     = $request->input('M');
        $id->AV    = $request->input('AV');
        $id->MA    = $request->input('MA');
        $id->JU    = $request->input('JU');
        $id->JUI   = $request->input('JUI');
        $id->AO    = $request->input('AO');
        $id->S     = $request->input('S');
        $id->O     = $request->input('O');
        $id->N     = $request->input('N');
        $id->D     = $request->input('D');
        $id->RESP  = $request->input('RESP');

        $id->save();
        return back()->withStatus('success', 'Ajout réussi');
    }

}