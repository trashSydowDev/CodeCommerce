<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests\ProductsRequest;
use CodeCommerce\Repositories\AdminCategoriesRepository;
use CodeCommerce\Repositories\AdminProductsRepository;
use CodeCommerce\Services\AdminProductsService;

class AdminProductsController extends Controller
{
    private $productsRepository;

    private $productsServices;

    /**
     * Construct
     *
     * @param AdminProductsRepository $productsRepository
     * @param AdminProductsService $productsServices
     */
    public function  __construct(AdminProductsRepository $productsRepository, AdminProductsService $productsServices)
    {
        $this->productsRepository = $productsRepository;
        $this->productsServices = $productsServices;
    }

    /**
     * Show products all.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = $this->productsRepository->paginate(10);

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
        $products_id = $this->productsRepository->find($id);

        return view('products.show', compact('products_id'));
    }

    /**
     * Show images product
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function showImages($id)
    {
        $product = $this->productsRepository->find($id);

        return view('products.images', compact('product'));
    }

    /**
     * Create products.
     *
     * @param AdminCategoriesRepository $categoryRepository
     * @return \Illuminate\View\View
     */
    public function create(AdminCategoriesRepository $categoryRepository)
    {
        $categories = $categoryRepository->lists('name', 'id');

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
        $this->productsServices->insert($request);

        return redirect()->route('products');
    }

    /**
     * Edit Products
     *
     * @param AdminCategoriesRepository $categoryRepository
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit(AdminCategoriesRepository $categoryRepository, $id)
    {
        $categories = $categoryRepository->lists('name', 'id');

        $products_id = $this->productsRepository->find($id);

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
        $this->productsRepository->find($id)->update($request->all());

        $this->productsServices->update($request, $id);

        return redirect()->route('products');
    }

    /**
     * Delete Products and images related
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->productsServices->delete($id);

        return redirect()->route('products');
    }
}
