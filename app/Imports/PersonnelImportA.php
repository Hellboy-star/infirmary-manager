<?php

namespace App\Imports;

use Illuminate\Support\Facades\Log;

use App\Models\Personnel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class PersonnelImportA implements SkipsOnError, WithValidation
{
    use Importable, SkipsErrors;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    

     public function collection(Collection $rows)
     {
         foreach ($rows as $row) {
             $personnel = Personnel::where('MATSfA', $row['MATSA'])->first();
 
 
                 // Create new personnel record
                 Personnel::create([
                     'MATSA' => $row['MATSA'],
 
                 ]);
 
         }
     }
 
     public function rules(): array
     {
         return [
             '*.MATSA' => 'required|unique:personnels,matricule',
             '*.FONSA' => 'required|string',
 
         ];
     }

     
}
