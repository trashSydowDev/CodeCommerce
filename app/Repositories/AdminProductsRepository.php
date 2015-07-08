<?php

namespace CodeCommerce\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class AdminProductsRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'CodeCommerce\Product';
    }
}
