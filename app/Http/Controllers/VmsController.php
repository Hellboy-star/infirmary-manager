<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use App\Models\Vms;
use Illuminate\Support\Facades\DB;


class VmsController extends Controller
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
        $vms = Vms::orderBy('id', 'asc')->Paginate(20);
        return view('rvms', compact('vms'));
        //return view('d_vms', compact('vms'));
    }

    

    //public function rap()
    //{
    //  return view('rappel');
    //}

    public function fetchvms()
    {
        $empa = Vms::all();
        $empsa = DB::select(" select vms.id, vms.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA, vms.POIDSVMS, vms.DATEVMS, vms.TYPVISI, vms.POULSVMS, vms.PLAINTESVMS, vms.TAVMS, vms.PA, vms.PTI, vms.PTE, vms.AVOD, vms.AVOG, vms.EXAMCLIVMS, vms.BILANVMS, vms.AVISP, vms.CONCLMED, vms.APTITUDE, vms.OBSERVATIONVMS from vms, personnels as per where vms.MATSA=per.MATSA order by vms.id asc ");
        $output = '';
        if ($empa->count() > 0) {
            $output .=
                '<table class="table0 table table-striped table-bordered align-middle">
           <thead>
           <tr>
           <th rowspan"2" width="10%">N°</th>
            <th rowspan"2">Date</th>
            <th rowspan"2">Nom et Prénoms</th>
            <th rowspan"2">N°IT</th>
            <th rowspan"2">Poste</th>
            <th rowspan"2">Sexe</th>
            <th rowspan"2">Poids</th>
            <th rowspan"2">Type de visite</th>
            <th rowspan"2">Plaintes</th>
            <th rowspan"2">Pouls</th>
            <th rowspan"2">TA</th>
            <th rowspan"2">PA</th>
            <th rowspan"2">PTI</th>
            <th rowspan"2">PTE</th>
            <th colspan="2" rowspan"2">AV</th>
            <th rowspan"2">Examen clinique</th>
            <th rowspan"2">Bilan</th>
            <th rowspan"2">Avis spécialisé</th>
            <th rowspan"2">Conclusion médicale</th>
            <th rowspan"2">Aptitude</th>
            <th rowspan"2">Observations</th>
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
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>OD</th>
                <th>OG</th>
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
                <td>' . $emp->DATEVMS . '</td>
                <td>' . $emp->nom . '</td>
                <td>' . $emp->MATSA . '</td>
                <td>' . $emp->LEMSA . '</td>
                <td>' . $emp->SEXSA . '</td>
                <td>' . $emp->POIDSVMS . '</td>
                <td>' . $emp->TYPVISI . '</td>
                <td>' . $emp->PLAINTESVMS . '</td>
                <td>' . $emp->POULSVMS . '</td>
                <td>' . $emp->TAVMS . '</td>
                <td>' . $emp->PA . '</td>
                <td>' . $emp->PTI . '</td>
                <td>' . $emp->PTE . '</td>
                <td>' . $emp->AVOD . '</td>
                <td>' . $emp->AVOG . '</td>
                <td>' . $emp->EXAMCLIVMS . '</td>
                <td>' . $emp->BILANVMS . '</td>
                <td>' . $emp->AVISP . '</td>
                <td>' . $emp->CONCLMED . '</td>
                <td>' . $emp->APTITUDE . '</td>
                <td>' . $emp->OBSERVATIONVMS . '</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
        }
    }

    public function fetchvmsr()
    {
        $empa = Vms::all();
        $empsa = DB::select(" select vms.id, vms.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA, vms.POIDSVMS, vms.DATEVMS, vms.TYPVISI, vms.POULSVMS, vms.PLAINTESVMS, vms.TAVMS, vms.PA, vms.PTI, vms.PTE, vms.AVOD, vms.AVOG, vms.EXAMCLIVMS, vms.BILANVMS, vms.AVISP, vms.CONCLMED, vms.APTITUDE, vms.OBSERVATIONVMS from vms, personnels as per where vms.MATSA=per.MATSA order by vms.id asc ");
        $output = '';
        if ($empa->count() > 0) {
            $output .=
                '<table class="table9 table table-striped table-bordered align-middle">
           <thead>
           <tr>
           <th width="10%">N°</th>
            <th>Date</th>
            <th>Nom et Prénoms</th>
            <th>Type de visite</th>
            <th>Plaintes</th>
            <th>Examen clinique</th>
            <th>Avis spécialisé</th>
            <th>Conclusion médicale</th>
            <th>Observations</th>
            <th></th>
            </tr>
            </thead>
            <tbody>';
            foreach ($empsa as $index=>$emp) {
                $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
                <td>' . $emp->DATEVMS . '</td>
                <td>' . $emp->nom . '</td>
                <td>' . $emp->TYPVISI . '</td>
                <td>' . $emp->PLAINTESVMS . '</td>
                <td>' . $emp->EXAMCLIVMS . '</td>
                <td>' . $emp->AVISP . '</td>
                <td>' . $emp->CONCLMED . '</td>
                <td>' . $emp->OBSERVATIONVMS . '</td>
                <td>
                    <div class="list-inline hstack gap-2 mb-2">
                        <a href="/e-vms/' . $emp->id . '" class="btn btn-info editIcon" >
                        <i class=" fas fa-pencil-alt fa-xs"></i></a>
                        <a href="/d-vms/' . $emp->id . '"    class="btn  btn-danger" >
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


    public function formvms() {
        return view('ervms');
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
        $id = new Vms;
        $id->MATSA = $request->input('MATSA');
        $id->POIDSVMS = $request->input('POIDSVMS');
        // $id->TAILLEVMS = $request->input('TAILLEVMS');
        $id->DATEVMS = $request->input('DATEVMS');
        $id->TYPVISI = $request->input('TYPVISI');
        $id->POULSVMS = $request->input('POULSVMS');
        $id->PLAINTESVMS = $request->input('PLAINTESVMS');
        $id->TAVMS = $request->input('TAVMS');
        $id->PA = $request->input('PA');
        $id->PTI = $request->input('PTI');
        $id->PTE = $request->input('PTE');
        $id->AVOD = $request->input('AVOD');
        $id->AVOG = $request->input('AVOG');
        $id->EXAMCLIVMS = $request->input('EXAMCLIVMS');
        $id->BILANVMS = $request->input('BILANVMS');
        $id->AVISP = $request->input('AVISP');
        $id->CONCLMED = $request->input('CONCLMED');
        $id->APTITUDE = $request->input('APTITUDE');
        $id->OBSERVATIONVMS = $request->input('OBSERVATIONVMS');
        $id ->USERS  = $request->input('USERS');
        $id ->DELETED  = $request->input('DELETED');
        $id->save();
        return back()->with('success', 'Ajout réussi');
    }


    /**
     * Display the specified resource.
     * 
     * @param \App\Models\Vms $vms
     * @return \Illuminate\Http\Response
     */
    public function show(Vms $vms)
    {
        //
        DB::statement("SET lc_time_names = 'fr_FR'");
        $empsaa = DB::selectOne("select * from vms where id='$vms->id'");
        return view('d_vms', compact('empsaa'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param \App\Models\Vms $vms
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id  = Vms::find($id);

        if (! $id) {
            return response()->json([
                'status' => 200,
                'vms' => $id
            ]);
        }

        
        return view('edit/editvms', compact('id'));

    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vms $vms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id                = Vms::find($id);
        $id->MATSA         = $request->MATSA;
        $id->POIDSVMS      = $request->POIDSVMS;
        $id->DATEVMS      = $request->DATEVMS;
        $id->TYPVISI          = $request->TYPVISI;
        $id->POULSVMS       = $request->POULSVMS;
        $id->PLAINTESVMS           = $request->PLAINTESVMS;
        $id->TAVMS    = $request->TAVMS;
        $id->PA   = $request->PA;
        $id->PTI   = $request->PTI;
        $id->PTE   = $request->PTE;
        $id->AVOD    = $request->AVOD;
        $id->AVOG    = $request->AVOG;
        $id->EXAMCLIVMS  = $request->EXAMCLIVMS;
        $id->BILANVMS   = $request->BILANVMS;
        $id->AVISP = $request->AVISP;
        $id->CONCLMED = $request->CONCLMED;
        $id->APTITUDE = $request->APTITUDE;
        $id->OBSERVATIONVMS = $request->OBSERVATIONVMS;
        // $id->TAILLEVMS = $request->TAILLEVMS;
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
        $id = Vms::findOrFail($id);
        $id->DELETED = 'Invalide';
        //$id->delete();
        $id->save();

        return back()->with('success', 'Elémént supprimé !');
    }
}