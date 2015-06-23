<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;

class AdminProductsController extends Controller
{
    private $products;

    /**
     * Construct
     */
    public function  __construct(Product $products)
    {
        $this->middleware('guest');
        $this->products = $products;
    }

    /**
     * Show products all.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->products->all();

        return view('products.index', compact('products'));
    }

    /**
     * Show products.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function showAction($id)
    {
        $products_id = $this->products->find($id);

        return view('products.show', compact('products_id'));
    }

    /**
     * Edit Products
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function editAction($id)
    {
        $products_id = $this->products->find($id);

        return view('products.show', compact('products_id'));
    }

    /**
     * Update Products
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function updateAction($id)
    {
        $products_id = $this->products->find($id);

        return view('products.show', compact('products_id'));
    }

    /**
     * Delete Products
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function deleteAction($id)
    {
        $products_id = $this->products->find($id);

        return view('products.show', compact('products_id'));
    }
}
