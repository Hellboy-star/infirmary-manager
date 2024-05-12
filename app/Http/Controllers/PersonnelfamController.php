<?php

namespace App\Http\Controllers;

use App\Models\Personnelfam;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\ValidationException;


use App\Imports\PersonnelfamImport;


use Illuminate\Support\Facades\DB;


class PersonnelfamController extends Controller
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
        return view('personnelfam');
    }

    public function fetchperf(Request $request)
    {
        DB::statement("SET lc_time_names = 'fr_FR'");

        $empsa = personnel::all();
        $emp1 = DB::select("select  MATSA, NOMSA, PRESA, SEXSA, NOMFA, PREFA  from pers ");

        $output = '';
        if ($empsa->count() > 0) {
            $output .= '<table class="table0 table table-striped table-bordered align-middle">
            <thead>
              <tr>
                <th>  N° </th>
                <th>  Matricule </th>
                <th> Nom  </th>
                <th>  Prénoms </th>
                <th> Sexe </th>
                <th> Nom </th>
                <th> Prénoms </th>
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
                    <td>' . $emp->NOMFA . '</td>
                    <td>' . $emp->PREFA . '</td>
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
    }

    function import(Request $request)
    {

        $patient = DB::delete("delete  from personfam");

        $file = $request->file('select_file')->store('import');
        $import = new PersonnelfamImport;
        $import->import($file);


        return back()->withStatus('Importation effectuée avec succès');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\personnelfam  $personnelfam
     * @return \Illuminate\Http\Response
     */
    public function show(personnelfam $personnelfam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\personnelfam  $personnelfam
     * @return \Illuminate\Http\Response
     */
    public function edit(personnelfam $personnelfam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\personnelfam  $personnelfam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, personnelfam $personnelfam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\personnelfam  $personnelfam
     * @return \Illuminate\Http\Response
     */
    public function destroy(personnelfam $personnelfam)
    {
        //
    }
}