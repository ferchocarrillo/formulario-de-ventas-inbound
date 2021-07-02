<?php

namespace App\Exports;


use App\upgradeDigital;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UpgradeDigitalExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return upgradeDigital::all();
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
            'selector',
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
