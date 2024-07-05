<?php

namespace App\Imports;

use App\Models\Coder;
use App\Models\Promotion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

//use Maatwebsite\Excel\Concerns\WithValidation;

class CodersImport implements ToModel, WithHeadingRow
{

    private $promo;

    public function __construct()
    {
        $this->promo = Promotion::pluck('id', 'name');
    } 

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
                
        return new Coder([
            
            'event_id' => 1,
            //'promo_id' =>  $this->promo[$row['promocion']],
            'promo_id' =>  $this->promo['P1_850_FEMCODERS'],
            'name' => $row['nombre'],
            'lastname' => $row['apellidos'],
            'gender' => $row['genero'],
            'profile' => $row['perfil']
                       
        ]);
    }
}
