<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(JhonatanPermissionInfoSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(DepartamentosSeeder::class);
        //$this->call(PlanadquieresSeeder::class);
        $this->call(EquipoSeeder::class);
        $this->call(tPlanSeeder::class);
        $this->call(TPagoSeeder::class);




    }
}
