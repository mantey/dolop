<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
			'name' => 'Rodrigo',
            'email' => 'teste@teste.com',
            'password' => Hash::make('teste')
        ));
    }
}