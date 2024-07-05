<?php

namespace App\Imports;

use App\Models\Recruiter;
use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RecruitersImport implements ToModel, WithHeadingRow
{
    private $company;

    public function __construct()
    {
        $this->company = Company::pluck('id', 'name');
    } 
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //
        switch ($row['hora_primera_entrevita']) {
            case '11H00':
                $f_interview = 6;
                break;
            case '11H30':
                $f_interview = 8;
                break;
            default:
                $f_interview = 1;
                break;

            
        }

        switch ($row['hora_ultima_entrevita']) {
            case '11H30':
                $l_interview = 8;
                break;
            default:
                $l_interview = 15;
                break;

            
        }
        $gender = '';
        if ( $row['mujeres'] == 'Pref. Mujeres') $gender = 'Mujer';
        

        return new Recruiter([
            //
            'event_id' => 1,
            'company_id' => $this->company[$row['empresa_del_asistente']],

            'name' => $row['nombre_del_asistente'],
            'lastname' => $row['apellidos_del_asistente'],

            'email' => $row['email_del_asistente'],

            'first_interview' => $f_interview,
            'last_interview' => $l_interview,

            'remote' => $row['posibilidad_teletrabajo'],

            'gender' => $gender
            
        
            
           
        ]);
    }
}
