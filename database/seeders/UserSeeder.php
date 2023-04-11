<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    use HasUuids;
    /**
     * Run the database seeds.
     */
    public function newUniqueId():string
    {
        return (string) Uuid::uuid4();
    }

    public function run(): void
    {

        for ($index = 0; $index<=10; $index++){
            DB::table('users')->insert([
                'id'=>$this->newUniqueId(),
                'int_id'=>$index,
                //'first_name'=> 'defaultFirstName'.$index,
                //'last_name'=> 'defaultLastName'.$index,
                'nick_name'=>'default'.$index,
                'email'=> Str::random(10).'@default.com',

                //'cellphone'=>'123456789' ,
                'password'=> password_hash('defaul',PASSWORD_DEFAULT),
                'state_id'=> rand(1,4),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()

            ]);
        }
    }
}
