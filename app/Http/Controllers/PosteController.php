<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;

class PosteController extends Controller
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
        //$poste = Poste::orderBy('id', 'asc')->Paginate(20);
        //$per = Personnel::all();
        return view('poste');
    }


    public function format() {
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
        //return view('pers')->with('alert', 'Ajout réussi');
        return back()->withStatus('success', 'Ajout réussi');
    }


    /**
     * Display the specified resource.
     * 
     * @param \App\Models\Poste $poste
     * @return \Illuminate\Http\Response
     */
    public function show(Poste $poste)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param \App\Models\Poste $poste
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $id  = Poste::find($id);

        if (! $id) {
            return response()->json([
                'status' => 200,
                'poste' => $id
            ]);
        }

        
        return view('edit/editposte', compact('id'));

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
        $id = Poste::find($id);
        $id->MATSA = $request->MATSA;
        $id->POSTE = $request->POSTE;
        $id->DENOMINATION = $request->DENOMINATION;
        $id->ENTREPRISE = $request->ENTREPRISE;
        $id->PERIODEDU = $request->PERIODEDU;
        $id->PERIODEAU = $request->PERIODEAU;
        $id->TACHES = $request->TACHES;
        $id->RYTMTAF = $request->RYTMTAF;
        $id->FACTEURNUI = $request->FACTEURNUI;
        $id->METRODATE = $request->METRODATE;
        $id->METROTYPE = $request->METROTYPE;
        $id->METROR = $request->METROR;
        
        $id->save();
        return view('pers')->with('success', 'Mise à jour réussie !');
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
