<?php

namespace CodeCommerce\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class AdminCategoriesRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'CodeCommerce\Category';
    }
}
