<?php

namespace App\Exports;

use App\Rechazos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RechazosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


        return Rechazos::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'numero_de_celular',
            'nombres',
            'documento',
            'causal',
            'linea',
            'departamento',
            'ciudad',
            'competencia',
            'modalidad',
            'frechazo',
            'observacion',
            'agente',
            'hora',
            'dia',
            'created_at',
            'updated_at'
        ];
    }



}
