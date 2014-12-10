<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BanksTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Bank::create(['name'=>$faker->company(), 'account_no'=>rand(1,1000000), 'branch'=>$faker->streetName(), 'balance'=>rand(-1000000,1000000)

			]);
		}
	}

}