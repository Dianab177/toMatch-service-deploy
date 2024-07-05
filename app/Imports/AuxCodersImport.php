<?php

namespace App\Imports;

use App\Models\AuxCoder;
use App\Models\Promotion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AuxCodersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
                
        return new AuxCoder([
            
            'profile' => $row['perfil'],
            'promocion' => $row['promocion'],
            'name' => $row['nombre'],
            'lastname' => $row['apellidos'],
            'gender'  => $row['genero'],
            'ubicacion' => $row['ubicacion'],
            'idioma' => $row['idioma'],
            'php' => $row['php'],
            'java' => $row['java'],
            'javascript' => $row['javascript'],
            'react' => $row['react'],
            'ingles_alto'  => $row['ingles_alto']
                       
        ]);
    }
}
