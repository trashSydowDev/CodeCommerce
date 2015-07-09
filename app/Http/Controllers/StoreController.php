<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\Repositories\AdminCategoriesRepository;

class StoreController extends Controller
{
    private $category;

    private $product;

    /**
     * Construct
     *
     * @param AdminCategoriesRepository $category
     * @param Product $product
     */
    public function __construct(AdminCategoriesRepository $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    /**
     * Shows recommended products and features
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->category->all();
        $featured = $this->product->featured()->get();
        $recommend = $this->product->recommend()->get();

        return view('store.index', compact('categories', 'featured', 'recommend'));
    }

    /**
     * Show products by categories
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function category($id)
    {
        $categories = $this->category->all();
        $category = $this->category->find($id);

        return view('store.category', compact('categories', 'category'));
    }
}
