<?php

use Illuminate\Database\Seeder;

class Pegawai extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	for($i = 0; $i < 50; $i++) {
        App\Pegawai::create([
            'nama' => $faker->name,
            'posisi' => $faker->jobTitle,
            'gaji' => $faker->numberBetween($min = 1500000, $max = 5000000)
        ]);
    	}
	}
}
