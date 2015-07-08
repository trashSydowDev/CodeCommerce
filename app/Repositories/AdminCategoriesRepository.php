<?php

namespace CodeCommerce\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;
use CodeCommerce\Category;

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
