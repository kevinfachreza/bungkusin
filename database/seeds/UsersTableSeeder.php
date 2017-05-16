<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 33;

        for ($i = 0; $i < $limit; $i++) {
            App\User::create([
				'name' => $faker->name,
				'email' => $faker->email,
				'password' => bcrypt('123456'),
				'penjual' => 1,
				'avatar' => 'assets/users/avatar.png',
				'hp' => $faker->phoneNumber,
				'alamat' => $faker->address,
				]);
        }
    }
}
