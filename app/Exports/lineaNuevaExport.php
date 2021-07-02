<?php

namespace App\Exports;


use App\lineaNueva;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LineaNuevaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return lineaNueva::all();
    }
    public function headings(): array
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
            'tipocliente',
            'ncontacto',
            'selector',
            'ngrabacion',
            'orden',
            'confronta',
            'observaciones',
            'agente',
            'revisados',
            'estadorevisado',
            'obs2',
            'backoffice',
            'created_at',
            'updated_at',
            'hora',
            'dia',
         ];
        }

    }
