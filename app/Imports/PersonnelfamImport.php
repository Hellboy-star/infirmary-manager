<?php

namespace App\Imports;

use App\Models\Personnelfam;

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

class PersonnelfamImport implements ToModel, SkipsOnError
{
    use Importable, SkipsErrors;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function model(array $row)
    // {
    //     return new Personnelfam([
    //         'MATFA' => $row[0],
    //         'SITFA' => $row[1],
    //         'NOMFA' => $row[2],
    //         'PREFA' => $row[3],
    //         'DNMFA' => $row[4],
    //         'CHAFA' => $row[5],

    //     ]);
    // }


    public function model(array $row)
    {
        // Recherche un enregistrement existant basé sur le MATFA (par exemple)
        $personnel = Personnelfam::where('MATFA', $row['0'])->first();

        // Si l'enregistrement existe, mettez à jour ses valeurs
        // Sinon, créez un nouvel enregistrement
        if ($personnel) {
            $personnel->update([
                'MATFA' => $row[0],
                'SITFA' => $row[1],
                'NOMFA' => $row[2],
                'PREFA' => $row[3],
                'DNMFA' => $row[4],
                'CHAFA' => $row[5],
                // Autres champs à mettre à jour
            ]);
        } else {
            $personnel = new Personnelfam([
                'MATFA' => $row[0],
                'SITFA' => $row[1],
                'NOMFA' => $row[2],
                'PREFA' => $row[3],
                'DNMFA' => $row[4],
                'CHAFA' => $row[5],
                // Autres champs à créer
            ]);
        }

        return $personnel;
    }



}