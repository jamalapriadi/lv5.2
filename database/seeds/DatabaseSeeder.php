<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Migrations\Migration;
use DB,Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        DB::table('users')->delete();

		$admin=array(
			'name'=>'Jamal Apriadi',
			'email'=>'jamal.apriadi@gmail.com',
			'password'=>Hash::make('jamal123'),
			'level'=>'admin'
		);
		DB::table('users')->insert($admin);

		$penulis=array(
			'name'=>'Vera Okti',
			'email'=>'vera@gmail.com',
			'password'=>Hash::make('vera123'),
			'level'=>'penulis'
		);
		DB::table('users')->insert($penulis);
    }
}
