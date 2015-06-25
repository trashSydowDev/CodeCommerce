<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use CodeCommerce\Category;


class CategoryTableSeeder extends Seeder
{
    private $category;
    private $faker;

    public function __construct(Faker $faker, Category $category)
    {
        $this->category = $category;
        $this->faker = $faker;
    }

    public function run()
    {
        DB::table('categories')->truncate();

        $faker = $this->faker->create();

        foreach (range(1,7) as $i) {
            $this->category->create([
                'name' => $faker->word(),
                'description' => $faker->sentence(),
            ]);

        }
    }
} 