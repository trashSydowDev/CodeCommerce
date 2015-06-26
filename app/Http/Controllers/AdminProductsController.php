<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\ProductsRequest;
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
        $products = $this->products->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show products.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $products_id = $this->products->find($id);

        return view('products.show', compact('products_id'));
    }

    /**
     * Create products.
     *
     * @param Category $category
     * @return \Illuminate\View\View
     */
    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('products.create', compact('categories'));
    }

    /**
     * Stores the data in the database
     *
     * @param ProductsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductsRequest $request)
    {
        $data = $request->all();

        $category = $this->products->fill($data);

        $category->save();

        return redirect()->route('products');
    }

    /**
     * Edit Products
     *
     * @param Category $category
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit(Category $category, $id )
    {
        $categories = $category->lists('name', 'id');

        $products_id = $this->products->find($id);

        return view('products.edit', compact('products_id', 'categories'));
    }

    /**
     * Update Products
     *
     * @param ProductsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductsRequest $request, $id)
    {
        $this->products->find($id)->update($request->all());

        return redirect()->route('products');
    }

    /**
     * Delete Products
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $this->products->find($id)->delete();

        return redirect()->route('products');
    }
}
