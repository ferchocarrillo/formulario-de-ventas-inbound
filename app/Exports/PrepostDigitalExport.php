<?php

namespace App\Exports;


use App\prepostDigital;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PrepostDigitalExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return prepostDigital::all();
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
'confronta',
'token',
'selector',
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
