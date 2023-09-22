<?php

namespace Database\Seeders;

use App\Models\Rango;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RangoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rango::create([
            'desde' => 0.01,
            'hasta' => 10,
            'incremento' => 15
        ]);

        Rango::create([
            'desde' => 10.01,
            'hasta' => 20,
            'incremento' => 14.5
        ]);

        Rango::create([
            'desde' => 20.01,
            'hasta' => 30,
            'incremento' => 14
        ]);

        Rango::create([
            'desde' => 30.01,
            'hasta' => 40,
            'incremento' => 13.5
        ]);

        Rango::create([
            'desde' => 40.01,
            'hasta' => 50,
            'incremento' => 13
        ]);

        Rango::create([
            'desde' => 50.01,
            'hasta' => 60,
            'incremento' => 13
        ]);

        Rango::create([
            'desde' => 60.01,
            'hasta' => 70,
            'incremento' => 13
        ]);

        Rango::create([
            'desde' => 70.01,
            'hasta' => 80,
            'incremento' => 13
        ]);

        Rango::create([
            'desde' => 80.01,
            'hasta' => 90,
            'incremento' => 12.5
        ]);

        Rango::create([
            'desde' => 90.01,
            'hasta' => 100,
            'incremento' => 12
        ]);

        Rango::create([
            'desde' => 100.01,
            'hasta' => 200,
            'incremento' => 11.5
        ]);

        Rango::create([
            'desde' => 200.01,
            'hasta' => 300,
            'incremento' => 11
        ]);

        Rango::create([
            'desde' => 300.01,
            'hasta' => 400,
            'incremento' => 10.5
        ]);

        Rango::create([
            'desde' => 400.01,
            'hasta' => 500,
            'incremento' => 10
        ]);

        Rango::create([
            'desde' => 500.01,
            'hasta' => 600,
            'incremento' => 9.5
        ]);

        Rango::create([
            'desde' => 600.01,
            'hasta' => 700,
            'incremento' => 9
        ]);

        Rango::create([
            'desde' => 700.01,
            'hasta' => 800,
            'incremento' => 8.5
        ]);

        Rango::create([
            'desde' => 800.01,
            'hasta' => 900,
            'incremento' => 8
        ]);

        Rango::create([
            'desde' => 900.01,
            'hasta' => 1000,
            'incremento' => 7.5
        ]);

        Rango::create([
            'desde' => 1000.01,
            'hasta' => 2000,
            'incremento' => 7
        ]);

        Rango::create([
            'desde' => 2000.01,
            'hasta' => 2500,
            'incremento' => 6.5
        ]);

        Rango::create([
            'desde' => 2500.01,
            'hasta' => 3000,
            'incremento' => 6
        ]);
        Rango::create([
            'desde' => 3000.01,
            'hasta' => 3500,
            'incremento' => 5.5
        ]);

        Rango::create([
            'desde' => 3500.01,
            'hasta' => 4000,
            'incremento' => 5.5
        ]);

        Rango::create([
            'desde' => 4000.01,
            'hasta' => 4500,
            'incremento' => 5
        ]);

        Rango::create([
            'desde' => 4500.01,
            'hasta' => 5000,
            'incremento' => 4.5
        ]);

        Rango::create([
            'desde' => 5000.01,
            'hasta' => 100000,
            'incremento' => 4
        ]);
    }
}
