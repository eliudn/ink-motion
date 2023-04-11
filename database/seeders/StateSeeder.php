<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{

    private array $states =[
        'deshabilitado',
        'activo',
        'bloqueado',
        'denegdo'
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->states as $state){
            DB::table('states')->insert([
                'state'=>$state


            ]);
        }
    }
}
