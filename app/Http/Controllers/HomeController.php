<?php

namespace App\Http\Controllers;

use App\Models\At;
use App\Models\Cs;
use App\Models\Mp;
use App\Models\Vms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        // Requête SQL pour extraire des données de la table "At"
        $values1 = At::where('DELETED', '!=', 'invalide')
			->selectRaw('COUNT(id) as total, DATE_FORMAT(MONTH(DATECONS), "%M") as mois')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        // Requête SQL pour extraire des données de la table "Mp"
        $values2 = Mp::where('DELETED', '!=', 'invalide')
			->selectRaw('COUNT(id) as total, DATE_FORMAT(MONTH(DATEMP), "%M") as mois')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        // Fusionnez les résultats dans un seul tableau
        $combinedData = [
            'values1' => $values1,
            'values2' => $values2,
        ];


        $empsa6 = DB::select(" select  convocation.id, DATEDIFF(DATECONVOC , NOW()) as DATER , convocation.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  convocation.MOTIF, convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION from convocation , personnels as per where convocation.MATSA = per.MATSA and DELETED != 'Invalide' and DATEDIFF(DATECONVOC , NOW()) >=0 order by DATEDIFF(DATECONVOC , NOW()) >=0 asc limit 10 ");
        return view('home', compact('empsa6', 'combinedData'));
    }

    public function fetchhomec()
{
    $empsa = DB::select("SELECT convocation.id, DATEDIFF(DATECONVOC, NOW()) as DATER, convocation.MATSA, CONCAT(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA, convocation.MOTIF, convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION FROM convocation, personnels as per WHERE convocation.MATSA = per.MATSA AND DELETED != 'Invalide' AND DATEDIFF(DATECONVOC, NOW()) >= 0 ORDER BY DATEDIFF(DATECONVOC, NOW()) ASC");

    if (count($empsa) > 0) {
        $output = '<table id="data-table-buttons" class="table0 table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom et Prénoms</th>
                <th>Motif</th>
                <th>Date d\'émission</th>
                <th>Date de convocation</th>
                <th>Nombre de jours restant</th>
                <th>Outil</th>
            </tr>
        </thead>
        <tbody>';

        foreach ($empsa as $emp) {
            $output .= '<tr height="127%">
                <td>' . $emp->MATSA . '</td>
                <td>' . $emp->nom . '</td>
                <td>' . $emp->MOTIF . '</td>
                <td>' . $emp->DATEEMIS . '</td>
                <td>' . $emp->DATECONVOC . '</td>
                <td>' . $emp->DATER . '</td>
                <td>
                    <div class="list-inline hstack gap-2 mb-0">
                        <a href="/c-conv/' . $emp->id . '" class="btn btn-info editIcon" >
                        <i class=" fas fa-pencil-alt fa-xs"></i></a>
                    </div>
                </td>
            </tr>';
        }

        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h1 class="text-center text-secondary my-5">Aucune convocation à venir.</h1>';
    }
}

    public function fetchhomev()
    {
        $empa   = DB::select(" SELECT vac.id, DATEDIFF(DATEEXP, NOW()) AS DATER, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA, vac.MATSA, vac.VACCIN, vac.LOT, vac.TYPE, vac.DOSE, vac.CENTRE FROM vac, personnels AS per WHERE vac.MATSA = per.MATSA and DELETED != 'Invalide' and DATEDIFF(DATEEXP , NOW()) >=0 order by DATEDIFF(DATEEXP , NOW()) >=0 asc ");
        $empsa  = DB::select(" SELECT vac.id, DATEDIFF(DATEEXP, NOW()) AS DATER, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA, vac.MATSA, vac.VACCIN, vac.LOT, vac.TYPE, vac.DOSE, vac.CENTRE FROM vac, personnels AS per WHERE vac.MATSA = per.MATSA and DELETED != 'Invalide' and DATEDIFF(DATEEXP , NOW()) >=0 order by DATEDIFF(DATEEXP , NOW()) >=0 asc ");
        $output = '';
        if ($empa > 0) {
            $output .= '<table id="data-table-buttons" class="table1 table table-striped table-bordered align-middle">
            <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom et Prénoms</th>
                <th>Vaccin</th>
                <th>Type</th>
                <th>Dose</th>
                <th>Nombre de jours restant</th>
            </tr>
        </thead>
            <tbody>';
            foreach ($empsa as $emp) {
                $output .= '<tr height="127%">
                <td>' . $emp->MATSA . '</td>
                <td>' . $emp->nom . '</td>
                <td>' . $emp->VACCIN . '</td>
                <td>' . $emp->TYPE . '</td>
                <td>' . $emp->DOSE . '</td>
				<td>' . $emp->DATER . '</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Aucune convocation à venir.</h1>';
        }
    }

    // public function fetchhomeg()
    // {
    //     // Requête SQL pour extraire des données de la table "At"
    //     $values1 = At::selectRaw('COUNT(id) as total, DATE_FORMAT(MONTH(DATECONS), "%M") as mois')
    //         ->groupBy('mois')
    //         ->orderBy('mois')
    //         ->get();

    //     // Requête SQL pour extraire des données de la table "Mp"
    //     $values2 = Mp::selectRaw('COUNT(id) as total, DATE_FORMAT(MONTH(DATEMP), "%M") as mois')
    //         ->groupBy('mois')
    //         ->orderBy('mois')
    //         ->get();

    //     // Fusionnez les résultats dans un seul tableau
    //     $combinedData = [
    //         'values1' => $values1,
    //         'values2' => $values2,
    //     ];

    //     // Renvoyez les données combinées au format JSON
    //     return response()->json($combinedData);
    // }

}