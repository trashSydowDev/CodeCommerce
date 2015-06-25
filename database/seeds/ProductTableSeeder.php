<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;
use CodeCommerce\Product;

/**
 * Class ProductTableSeeder
 */
class ProductTableSeeder extends Seeder
{
    private $product;

    /**
     * Construct
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Inserção de dados na tabela Products
     */
    public function run()
    {
        DB::table('products')->truncate();

        factory('CodeCommerce\Product', 40)->create();
    }
} 