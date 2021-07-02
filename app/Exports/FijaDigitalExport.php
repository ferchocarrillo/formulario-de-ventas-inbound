<?php

namespace App\Exports;


use App\fijaDigital;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FijaDigitalExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return fijaDigital::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'nombres',
            'documento',
            'fexpedicion',
            'correo',
            'departamento',
            'id_ciudad',
            'barrio',
            'direccion',
            'estrato',
            'ngrabacion',
            'ncontacto',
            'producto',
            'FOX',
            'HBO',
            'cds_movil',
            'cds_fija',
            'Paquete_Adultos',
            'Decodificador',
            'Svas_lineas',
            'velocidad',
            'tecnologia',
            'orden',
            'selector',
            'confronta',
            'observacion',
            'agente',
            'revisados',
            'estadorevisado',
            'obs2',
            'backoffice',
            'hora',
            'dia',
            'created_at',
            'updated_at'

        ];
    }
}
