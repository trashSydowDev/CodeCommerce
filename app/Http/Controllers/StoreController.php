<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\Repositories\AdminCategoriesRepository;
use CodeCommerce\Tag;

class StoreController extends Controller
{
    private $category;

    private $product;

    private $tag;

    /**
     * Construct
     *
     * @param AdminCategoriesRepository $category
     * @param Product $product
     * @param Tag $tag
     */
    public function __construct(AdminCategoriesRepository $category, Product $product, Tag $tag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->tag = $tag;
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
        $products = $this->product->ofCategory($id)->get();

        return view('store.category', compact('categories', 'category', 'products'));
    }

    public function product($id)
    {
        $categories = $this->category->all();
        $products = $this->product->find($id);

        return view('store.product', compact('categories', 'products', 'tags', 'test'));
    }

    public function tags($id)
    {
        $tag = $this->tag->find($id);
        $categories = $this->category->all();

        return view('store.tag', compact('categories','tag'));
    }
}
