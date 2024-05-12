<?php

namespace App\Http\Controllers;

use App\Models\Aptitude;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AptitudeController extends Controller
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
        return view('aptitude');
    }

    
    public function fetchapti(Request $request)
    {
        $empa = Aptitude::all();
        $empsa = DB::select(" select aptitude.id, aptitude.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  aptitude.DATEAP, aptitude.FILAPTI from aptitude , personnels as per where aptitude.MATSA = per.MATSA and DELETED != 'Invalide' order by aptitude.id asc ");
        $output = '';
        if ($empa->count() > 0) {
            $output .= '<table id="data-table-buttons" class="table2 table table-striped table-bordered align-middle">
           <thead>
           <tr>
           <th width="10%">N°</th>
            <th>Date</th>
            <th>Matricule</th>
            <th>Nom et Prénoms</th>
            <th>Outils</th>
            
            </tr>
            </thead>
            <tbody>';
            foreach ($empsa as $index=>$emp) {
                $output .= '<tr height="127%">
                <td>' . ($index+1) . '</td>
                <td>' . $emp->DATEAP . '</td>
                <td>' . $emp->MATSA . '</td>
                <td>' . $emp->nom . '</td>
                <td>
                    <div class="list-inline hstack gap-2 mb-2">
                        <a href="/v-aptitude/' . $emp->id . '" class="btn btn-info " >
                        <i class=" fa-solid fa-download fa-xs"></i>Télécharger</a>
                    
                        <a href="/e-aptitude/' . $emp->id . '" class="btn btn-info editIcon" >
                        <i class=" fas fa-pencil-alt fa-xs"></i></a>
                        <a href="/d-aptitude/' . $emp->id . '"    class="btn  btn-danger" >
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



    // public function detail()
    // {
    //     $om = Aptitude::orderBy('id', 'asc')->Paginate(20);
    //     return view('aptitude', compact('om'));
    // }


    public function formaptit() {
        return view('eraptitude');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $id = new Aptitude;
        // $id->MATSA = $request->input('MATSA');
        // $id->c = $request->input('DATEAP');
        // $id->c = $request->input('ORDONNANCE');
        if ($request->hasFile('FILAPTI')) {
            // Le fichier a été téléchargé avec succès
            $id->MATSA = $request->input('MATSA');
            $id->DATEAP = $request->input('DATEAP');
            // $id->ORDONNANCE = $request->input('ORDONNANCE');
            $file = $request->file('FILAPTI');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->FILAPTI->move('assets', $filename);
            $id->FILAPTI=$filename;
            $id ->USERS  = $request->input('USERS');
            $id ->DELETED  = $request->input('DELETED');

            // Effectuez le traitement du fichier ici
        } else {
            // Le fichier n'a pas été téléchargé
            // Gérez cette situation en conséquence
            // $id->MATSA = $request->input('MATSA');
            // $id->DATEAP = $request->input('DATEAP');
            // $id->ORDONNANCE = $request->input('ORDONNANCE');
            return back()->with('echec', 'Echec de l\'Ajout ');
        }
        // $file=$request->FILE;
        

        $id->save();
        //return view('registres')->with('alert', 'Ajout réussi');
        return back()->with('success', 'Ajout réussi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aptitude  $aptitude
     * @return \Illuminate\Http\Response
     */
    public function show(Aptitude $aptitude)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aptitude  $aptitude
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $id  = Aptitude::find($id);

        if (! $id) {
            return response()->json([
                'status' => 200,
                'aptitude' => $id
            ]);
        }

        
        return view('edit/editaptitu', compact('id'));

    }

    
    public function affichePDF($id)
    {
        $id = Aptitude::find($id);

        if (!$id) {
            return redirect()->back()->with('error', 'PDF non trouvé.');
        }

        // $empsa  = DB::select(" select at.id, at.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA, at.IPP, at.DATECONS, at.DATEACID, at.LIEU, at.CAUSEAT, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, at.DATE2CNSSAT, at.AVISCNSSAT, at.NBRARRETAT, at.TRAITEMENTAT, at.MESECORRECT, at.OBSERVATIONAT from at, personnels as per where at.MATSA = per.MATSA and DELETED != 'Invalide' order by at.id desc ");
        // $empsa1 = DB::select(" select cs.id, cs.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA,  cs.POIDSCS, cs.TAILLECS, cs.DATECS, cs.TCS, cs.POULSCS, cs.TACS, cs.PLAINTESCS, cs.EXAMCLICS, cs.BILAN, cs.DIAGNOSTIC, cs.TRAITEMENTCS, cs.OBSERVATIONCS from cs, personnels as per where cs.MATSA = per.MATSA and DELETED != 'Invalide' order by cs.id desc ");
        // $empsa2 = DB::select(" select mp.id, mp.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  mp.DATEMP, mp.MPNUMTAB, mp.MPDESIGNATION, mp.MALCARAPRO, mp.AGENTPATH, mp.DATE1CNSSMP, mp.DATE2CNSSMP, mp.AVISCNSSMP, mp.TRAITEMENTMP, mp.OBSERVATIONMP from mp, personnels as per where mp.MATSA = per.MATSA and DELETED != 'Invalide' order by mp.id desc ");
        // $empsa3 = DB::select(" select vms.id, vms.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA, vms.POIDSVMS, vms.DATEVMS, vms.TYPVISI, vms.POULSVMS, vms.PLAINTESVMS, vms.TAVMS, vms.PA, vms.PTI, vms.PTE, vms.AVOD, vms.AVOG, vms.EXAMCLIVMS, vms.BILANVMS, vms.AVISP, vms.CONCLMED, vms.APTITUDE, vms.OBSERVATIONVMS from vms, personnels as per where vms.MATSA = per.MATSA and DELETED != 'Invalide' order by vms.id desc ");
        // $empsa4 = DB::select(" select vac.id, vac.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  vac.DATEDOSE, vac.DATEEXP, vac.VACCIN, vac.LOT, vac.TYPE, vac.DOSE, vac.CENTRE, vac.DATE from vac , personnels as per where vac.MATSA = per.MATSA and DELETED != 'Invalide' order by vac.id desc ");
        // $empsa5 = DB::select(" select abs.id, abs.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  abs.TYPEABS, abs.CAUSE, abs.DEBUT, abs.REPRISE, abs.NBRARRET from abs , personnels as per where abs.MATSA = per.MATSA and DELETED != 'Invalide' order by abs.id desc ");
        // $empsa6 = DB::select(" select convocation.id, convocation.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  convocation.MOTIF, convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION from convocation , personnels as per where convocation.MATSA = per.MATSA and DELETED != 'Invalide'  order by convocation.id desc ");
        // $empsa7 = DB::select(" select aptitude.id, aptitude.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  aptitude.DATE, aptitude.ORDONNANCE, aptitude.FILE from om , personnels as per where aptitude.MATSA = per.MATSA and DELETED != 'Invalide' order by aptitude.id desc ");
        // return view('registres', compact('id', 'empsa', 'empsa1', 'empsa2', 'empsa3', 'empsa4', 'empsa5', 'empsa6', 'empsa7'))->with('success', 'Mise à jour réussie !');

        return view('pdfvu', compact('id'))->with('success', 'Mise à jour réussie !');
        // return back()->with('success', 'Mise à jour réussie !');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aptitude  $aptitude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id                = Aptitude::find($id);
        $id->MATSA         = $request->MATSA;
        $id->DATEAP      = $request->DATEAP;
        // $id->ORDONNANCE      = $request->ORDONNANCE;
        if ($request->hasFile('FILAPTI')) {
            // Le fichier a été téléchargé avec succès
            $file = $request->file('FILAPTI');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->FILAPTI->move('assets', $filename);
            $id->FILAPTI=$filename; 
        $id->USERS = $request->USERS;
        $id->DELETED = $request->DELETED;

            // Effectuez le traitement du fichier ici
        } else {
                // Le fichier n'a pas été téléchargé
                // Gérez cette situation en conséquence
                $id->MATSA         = $request->MATSA;
                $id->DATEAP      = $request->DATEAP;
                // $id->ORDONNANCE      = $request->ORDONNANCE; 
        $id->USERS = $request->USERS;
        $id->DELETED = $request->DELETED;
        }
        // $file=$request->FILAPTI;
       

        $a = new Audit;
        $a ->NUSERS  = $request->input('NUSERS');
        $a ->AUSERS  = $request->input('AUSERS');
        $a ->TABLES  = $request->input('TABLES');
        $a ->TID  = $request->input('TID');
        $a ->MATSA  = $request->input('MATSA');
        $a ->ATABLES  = $request->input('ATABLES');

        $id->save();

        $a->save();

        $empsa  = DB::select(" select at.id, at.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA, at.IPP, at.DATECONS, at.DATEACID, at.LIEU, at.CAUSEAT, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, at.DATE2CNSSAT, at.AVISCNSSAT, at.NBRARRETAT, at.TRAITEMENTAT, at.MESECORRECT, at.OBSERVATIONAT from at, personnels as per where at.MATSA = per.MATSA and DELETED != 'Invalide' order by at.id desc ");
        $empsa1 = DB::select(" select cs.id, cs.MATSA, concat(NOMSA, '    ', PRESA)as nom, LEMSA, SEXSA,  cs.POIDSCS, cs.TAILLECS, cs.DATECS, cs.TCS, cs.POULSCS, cs.TACS, cs.PLAINTESCS, cs.EXAMCLICS, cs.BILAN, cs.DIAGNOSTIC, cs.TRAITEMENTCS, cs.OBSERVATIONCS from cs, personnels as per where cs.MATSA = per.MATSA and DELETED != 'Invalide' order by cs.id desc ");
        $empsa2 = DB::select(" select mp.id, mp.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  mp.DATEMP, mp.MPNUMTAB, mp.MPDESIGNATION, mp.MALCARAPRO, mp.AGENTPATH, mp.DATE1CNSSMP, mp.DATE2CNSSMP, mp.AVISCNSSMP, mp.TRAITEMENTMP, mp.OBSERVATIONMP from mp, personnels as per where mp.MATSA = per.MATSA and DELETED != 'Invalide' order by mp.id desc ");
        $empsa3 = DB::select(" select vms.id, vms.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA, vms.POIDSVMS, vms.DATEVMS, vms.TYPVISI, vms.POULSVMS, vms.PLAINTESVMS, vms.TAVMS, vms.PA, vms.PTI, vms.PTE, vms.AVOD, vms.AVOG, vms.EXAMCLIVMS, vms.BILANVMS, vms.AVISP, vms.CONCLMED, vms.APTITUDE, vms.OBSERVATIONVMS from vms, personnels as per where vms.MATSA = per.MATSA and DELETED != 'Invalide' order by vms.id desc ");
        $empsa4 = DB::select(" select vac.id, vac.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  vac.DATEDOSE, vac.DATEEXP, vac.VACCIN, vac.LOT, vac.TYPE, vac.DOSE, vac.CENTRE, vac.DATE from vac , personnels as per where vac.MATSA = per.MATSA and DELETED != 'Invalide' order by vac.id desc ");
        $empsa5 = DB::select(" select abs.id, abs.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  abs.TYPEABS, abs.CAUSE, abs.DEBUT, abs.REPRISE, abs.NBRARRET from abs , personnels as per where abs.MATSA = per.MATSA and DELETED != 'Invalide' order by abs.id desc ");
        $empsa6 = DB::select(" select convocation.id, convocation.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  convocation.MOTIF, convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION from convocation , personnels as per where convocation.MATSA = per.MATSA and DELETED != 'Invalide'  order by convocation.id desc ");
        $empsa7 = DB::select(" select aptitude.id, aptitude.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  aptitude.DATE, aptitude.ORDONNANCE, aptitude.FILE from om , personnels as per where aptitude.MATSA = per.MATSA and DELETED != 'Invalide' order by aptitude.id desc ");
        return view('registres', compact('empsa', 'empsa1', 'empsa2', 'empsa3', 'empsa4', 'empsa5', 'empsa6', 'empsa7'))->with('success', 'Mise à jour réussie !');
    }

    /**
     * Remove the specified resource faptitude storage.
     *
     * @param  \App\Models\Aptitude  $aptitude
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Aptitude::findOrFail($id);
        $id->DELETED = 'Invalide';
        //$id->delete();
        $id->save();

        return back()->with('success', 'Elémént supprimé !');
    }
}
