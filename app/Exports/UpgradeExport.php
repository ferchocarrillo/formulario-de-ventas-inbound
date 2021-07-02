<?php

namespace App\Exports;

use App\Upgrade;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UpgradeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Upgrade::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'numero',
            'nombres',
            'documento',
            'correo',
            'fventa',
            'corte',
            'planhistorico',
            'planventa',
            'activacion',
            'ngrabacion',
            'confronta',
            'orden',
            'observacion',
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
