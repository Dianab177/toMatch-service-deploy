<?php

namespace App\Imports;

use App\Models\AuxRecruiter;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AuxRecruitersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
                
        return new AuxRecruiter([
            
            'name' => $row['nombre_del_asistente'],
            'lastname' => $row['apellidos_del_asistente'],

            'email' => $row['email_del_asistente'],
            'company' => $row['empresa_del_asistente'],

            'first_interview' => $row['hora_primera_entrevita'],
            'last_interview' => $row['hora_ultima_entrevita'],

            'remote'  => $row['posibilidad_teletrabajo'],


            'barcelona' => $row['barcelona'],
            'madrid' => $row['madrid'],
            'asturias' => $row['asturias'],
            'sevilla' => $row['sevilla'],
            'malaga' => $row['malaga'],
            'cantabria' => $row['cantabria'],
            'galicia' => $row['galicia'],
            'castilla_y_leon' => $row['castilla_y_leon'],


            'php' => $row['php'],
            'java' => $row['java'],
            

            'idioma'  => $row['idioma'],
            'gender'  => $row['mujeres']


            
                       
        ]);
    }
}
