<?php

use Illuminate\Database\Seeder;
use App\Models\User;

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
        DB::table('users')->delete();
	    User::create(array(
	        'name'     => 'Syed Arsalan Ahmed',
	        'username' => 'syed',
	        'email'    => 'syedarslanahmed99@gmail.com',
	        'password' => Hash::make('goodLuck!'),
	    ));
    }
}
