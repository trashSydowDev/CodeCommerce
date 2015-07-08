<?php

namespace CodeCommerce\Services;

use CodeCommerce\Http\Requests\CategoryRequest;
use CodeCommerce\Repositories\AdminCategoriesRepository;

class AdminCategoriesService
{
    private $categoriesRepository;

    /**
     * Construc
     *
     * @param AdminCategoriesRepository $categoriesRepository
     */
    public function __construct(AdminCategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * Insert Category
     *
     * @param CategoryRequest $request
     */
    public function insert(CategoryRequest $request)
    {
        $data = $request->all();

        $this->categoriesRepository->create($data);
    }

    /**
     * Delete Caregory
     *
     * @param $id
     */
    public function delete($id)
    {
        $category = $this->categoriesRepository->find($id);

        foreach($category->products as $prod) {
            $prod->delete();
        }

        $category->delete();
    }
}
