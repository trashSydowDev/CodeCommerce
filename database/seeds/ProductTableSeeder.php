<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use CodeCommerce\Product;


class ProductTableSeeder extends Seeder
{
    private $product;
    private $faker;

    public function __construct(Faker $faker, Product $product)
    {
        $this->product = $product;
        $this->faker = $faker;
    }

    public function run()
    {
        DB::table('products')->truncate();

        $faker = $this->faker->create();

        foreach (range(1,7) as $i) {
            $this->product->create([
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'price'         => $faker->randomNumber(2),
                'featured'      => 1,
                'recommend'     => 0
            ]);

        }

    }
} 