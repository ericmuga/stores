<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SuppliersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Supplier::create(['name'=>$faker->name(),'phone'=>$faker->phoneNumber(), 'email'=>$faker->email(),
                'address'=>$faker->address(),'bank_id'=>rand(1,30)

			]);
		}
	}

}