<?php

namespace App\Imports;

use App\Models\Personnel;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class PersonnelImport implements ToModel, SkipsOnError

{
    use Importable, SkipsErrors;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function model(array $row)
    // {
    //     return new Personnel([

    //         'FONTSA' => $row['0'],
    //         'TBLIB' => $row['1'],
    //         'RESSA' => $row['2'],
    //         'DIRSA' => $row['3'],
    //         'MATSA' => $row['4'],
    //         'CATSA' => $row['5'],
    //         'NOMSA' => $row['6'],
    //         'PRESA' => $row['7'],
    //         'LEMSA' => $row['8'],
    //         'SECSA' => $row['9'],
    //         'VILSA' => $row['10'],
    //         'TELSA' => $row['11'],
    //         'LIESA' => $row['12'],
    //         'NATSA' => $row['13'],
    //         'SITSA' => $row['14'],
    //         'NBRSA' => $row['15'],
    //         'CHASA' => $row['16'],
    //         'SSOSA' => $row['17'],
    //         'SEXSA' => $row['18'],
    //         'ALLSA' => $row['19'],
    //         'DNASA' => $row['20'],
    //         'ANCSA' => $row['21'],

    //     ]);
    // }


    public function model(array $row)
    {
        // Recherche un enregistrement existant basé sur le MATSA (par exemple)
        $personnel = Personnel::where('MATSA', $row['4'])->first();

        // Si l'enregistrement existe, mettez à jour ses valeurs
        // Sinon, créez un nouvel enregistrement
        if ($personnel) {
            $personnel->update([
                'FONTSA' => $row['0'],
                'TBLIB' => $row['1'],
                'RESSA' => $row['2'],
                'DIRSA' => $row['3'],
                'MATSA' => $row['4'],
                'CATSA' => $row['5'],
                'NOMSA' => $row['6'],
                'PRESA' => $row['7'],
                'LEMSA' => $row['8'],
                'SECSA' => $row['9'],
                'VILSA' => $row['10'],
                'TELSA' => $row['11'],
                'LIESA' => $row['12'],
                'NATSA' => $row['13'],
                'SITSA' => $row['14'],
                'NBRSA' => $row['15'],
                'CHASA' => $row['16'],
                'SSOSA' => $row['17'],
                'SEXSA' => $row['18'],
                'ALLSA' => $row['19'],
                'DNASA' => $row['20'],
                'ANCSA' => $row['21'],
                // Autres champs à mettre à jour
            ]);
        } else {
            $personnel = new Personnel([
                'FONTSA' => $row['0'],
                'TBLIB' => $row['1'],
                'RESSA' => $row['2'],
                'DIRSA' => $row['3'],
                'MATSA' => $row['4'],
                'CATSA' => $row['5'],
                'NOMSA' => $row['6'],
                'PRESA' => $row['7'],
                'LEMSA' => $row['8'],
                'SECSA' => $row['9'],
                'VILSA' => $row['10'],
                'TELSA' => $row['11'],
                'LIESA' => $row['12'],
                'NATSA' => $row['13'],
                'SITSA' => $row['14'],
                'NBRSA' => $row['15'],
                'CHASA' => $row['16'],
                'SSOSA' => $row['17'],
                'SEXSA' => $row['18'],
                'ALLSA' => $row['19'],
                'DNASA' => $row['20'],
                'ANCSA' => $row['21'],
                // Autres champs à créer
            ]);
        }

        return $personnel;
    }


}