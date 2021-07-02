<?php

namespace App\Exports;

use App\Prepost;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PrepostExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prepost::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'numero',
            'nombres',
            'documento',
            'fexpedicion',
            'tipocliente',
            'correo',
            'departamento',
            'id_ciudad',
            'barrio',
            'direccion',
            'corte',
            'planventa',
            'activacion',
            'token',
            'confronta',
            'orden',
            'observaciones',
            'agente',
            'revisados',
            'estadorevisado',
            'obs2',
            'backoffice',
            'hora',
            'dia',
            'created_at',
            'updated_at',
        ];
    }

}
