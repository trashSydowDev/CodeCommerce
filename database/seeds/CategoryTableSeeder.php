<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use CodeCommerce\Category;

/**
 * Class CategoryTableSeeder
 */
class CategoryTableSeeder extends Seeder
{
    private $category;

    /**
     * Construct
     *
     * @param Category $category
     */
    public function __construct (Category $category)
    {
        $this->category = $category;
    }

    /**
     * Inserção de dados na tabela Categories
     */
    public function run()
    {
        DB::table('categories')->truncate();

        factory('CodeCommerce\Category', 15)->create();

    }
} 