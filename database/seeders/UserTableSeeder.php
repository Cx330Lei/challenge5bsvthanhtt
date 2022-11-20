<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            'username'=>'student1',
            'name'=>'student1',
            'email'=>'student1@gmail.com',
            'password'=>bcrypt('123456a@A'),
            'phone'=>'089999999',
            'image'=>'kem_241.jpg',
            'role'=>'0',
            'created_at'=>new Datetime()
        ];
        DB::table('users')->insert($data);
    }
}
