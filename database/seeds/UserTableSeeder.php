<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder{

	public function run(){
		User::create(
			[
				'name' => 'John Doe',
				'email' => 'john.doe@gmail.com',
				'password' => \Hash::make('secret')
			]
		);

		
	}
}