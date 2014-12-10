<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class InventoriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Inventory::create(['name'=>$faker->text(10),'description'=>$faker->realText(10),
                                'initials'=>$faker->text(10), 'Qty'=>rand(0,100),

                             ]);
		}
	}

}