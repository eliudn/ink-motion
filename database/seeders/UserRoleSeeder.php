<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private function idUser(){
        return DB::table('users')->where('int_id',1)->value('id');
    }
    public function run(): void
    {
        DB::table('users_roles')->insert([
            'user_id'=>$this->idUser(),
            'role_id'=>1
        ]);

    }
}
