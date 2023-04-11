<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSavingServiceSeeder extends Seeder
{

    private array $fileSavingService =[
        'local'
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->fileSavingService as $file){
            DB::table('file_saving_service')->insert([
                'name'=>$file
            ]);
        }
    }
}
