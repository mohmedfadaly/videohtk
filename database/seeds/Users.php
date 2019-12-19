<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\models\User::create([
            'name'=> 'admin',
            'email' => 'fadalyfad74@gmail.com',
            'password' => bcrypt('00001111'),
            'group' => 'admin'
        ]);
    }
}
