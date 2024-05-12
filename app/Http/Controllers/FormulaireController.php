<?php

namespace App\Http\Controllers;

use App\Models\Abs;
use App\Models\Antece;
use App\Models\At;
use App\Models\Chrono;
use App\Models\convocation;
use App\Models\Cs;
use App\Models\Mp;
use App\Models\Om;
use App\Models\Pachsta;
use App\Models\Poste;
use App\Models\Vac;
use App\Models\Vms;
use Illuminate\Http\Request;

class FormulaireController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('formulaire');
    }

    public function convostore(Request $request)
    {
        //
        $id = new Convocation;
        $id->MATSA = $request->input('MATSA');
        $id->MOTIF = $request->input('MOTIF');
        $id->DATEEMS = $request->input('DATEEMS');
        $id->DATECONVOC = $request->input('DATECONVOC');
        $id->DATEPRES = $request->input('DATEPRES');
        $id->OBSERVATION = $request->input('OBSERVATION');
        $id->save();
        return back()->withStatus('success', 'Ajout réussi');
    }

    public function postestore(Request $request)
    {
        //
        $id = new Poste;
        $id->MATSA = $request->input('MATSA');
        $id->POSTE = $request->input('POSTE');
        $id->DENOMINATION = $request->input('DENOMINATION');
        $id->ENTREPRISE = $request->input('ENTREPRISE');
        $id->PERIODEDU = $request->input('PERIODEDU');
        $id->PERIODEAU = $request->input('PERIODEAU');
        $id->TACHES = $request->input('TACHES');
        $id->RYTMTAF = $request->input('RYTMTAF');
        $id->FACTEURNUI = $request->input('FACTEURNUI');
        $id->METRODATE = $request->input('METRODATE');
        $id->METROTYPE = $request->input('METROTYPE');
        $id->METROR = $request->input('METROR');
        $id->save();
        return back()->withStatus('success', 'Ajout réussi');
    }

    public function tab(Request $request)
    {
        //
        $id = new Pachsta;
        $id->AXE = $request->input('AXE');
        $id->OBJECTIF = $request->input('OBJECTIF');
        $id->ACTIVITE = $request->input('ACTIVITE');
        $id->PERIODE = $request->input('PERIODE');
        $id->INDICATEUR = $request->input('INDICATEUR');
        $id->SOURCE = $request->input('SOURCE');
        $id->COUT = $request->input('COUT');
        $id->RESPONSABLE = $request->input('RESPONSABLE');
        $id->ANNEE = $request->input('ANNEE');
        $id->NUM = $request->input('NUM');
        $id->save();
        return back()->withStatus('success', 'Ajout réussi');
    }

    public function tab3(Request $request)
    {
        //
        $id = new Chrono;
        $id->ANNEE = $request->input('ANNEE');
        $id->ACTIV = $request->input('ACTIV');
        $id->JA = $request->input('JA');
        $id->F = $request->input('F');
        $id->M = $request->input('M');
        $id->AV = $request->input('AV');
        $id->MA = $request->input('MA');
        $id->JU = $request->input('JU');
        $id->JUI = $request->input('JUI');
        $id->AO = $request->input('AO');
        $id->S = $request->input('S');
        $id->O = $request->input('O');
        $id->N = $request->input('N');
        $id->D = $request->input('D');
        $id->RESP = $request->input('RESP');
        
        $id->save();
        return back()->withStatus('success', 'Ajout réussi');
    }

}
