<?php

namespace App\Exports;

use App\PortaDigital;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PortaDigitalExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PortaDigital::all();
    } public function headings(): array
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
            'planadquiere',
            'ncontacto',
            'imei',
            'fvc',
            'fentrega',
            'fexpedicion',
            'fnacimiento',
            'origen',
            'ngrabacion',
            'selector',
            'orden',
            'confronta',
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
