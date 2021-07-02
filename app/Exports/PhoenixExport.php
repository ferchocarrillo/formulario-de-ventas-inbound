<?php

namespace App\Exports;

use App\Phoenix;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PhoenixExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Phoenix::all();
    }public function headings(): array
    {
        return [
'id',
'numero',
'documento',
'nombres',
'apellidos',
'correo',
'departamento',
'id_ciudad',
'barrio',
'direccion',
'nip',
'tipocliente',
'ncontacto',
'planadquiere',
'tipoPagos',
'modelo',
'ngrabacion',
'orden',
'confronta',
'observaciones',
'selector',
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
