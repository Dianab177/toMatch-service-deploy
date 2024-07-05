<?php

namespace App\Imports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CompaniesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        switch ($row['categoria_de_empresa']) {
            case 'Alto':
                $category = 1;
                break;
            case 'Medio':
                $category = 2;
                break;
            case 'Bajo':
                $category = 3;
                break;
            
        }
        return new Company([
            //
            'name'  => $row['nombre_de_empresa'],
            'priority' => $category
           
        ]);
    }
}
