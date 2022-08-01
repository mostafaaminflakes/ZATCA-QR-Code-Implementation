<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ParCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('Par_codes')->insert([
        //     'Company_name' => Str::random(10),
        //     'reqistration_id' => int::random(10),
        //     'tax_id' => int::random(15),
        //     'print_time' => date('d/m/y'),
        //     'tot_vat' => float::random(15),
        //     'vat' => int::random(15),
        //     'printed_time' => int::random(1),
        // ]);
    }
}
