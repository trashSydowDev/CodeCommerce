<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests\ProductsImagesRequest;
use CodeCommerce\Repositories\AdminProductsImagesRepository;
use CodeCommerce\Repositories\AdminProductsRepository;
use CodeCommerce\Services\AdminProductsImagesService;
use Illuminate\Support\Facades\Storage;

/**
 * Class AdminProductsImagesController
 * @package CodeCommerce\Http\Controllers
 */
class AdminProductsImagesController extends Controller
{
    private $productsRepository;
    private $productImageRepository;
    private $productsImagesService;

    /**
     * Construct
     *
     * @param AdminProductsRepository $productsRepository
     * @param AdminProductsImagesRepository $productsImagesRepository
     * @param AdminProductsImagesService $productsImagesService
     */
    public function  __construct(AdminProductsRepository $productsRepository, AdminProductsImagesRepository $productsImagesRepository, AdminProductsImagesService $productsImagesService)
    {
        $this->productsRepository = $productsRepository;
        $this->productImageRepository = $productsImagesRepository;
        $this->productsImagesService = $productsImagesService;
    }

    /**
     * images all.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $images = $this->productImageRepository->all();

        return view('products.images.index', compact('images'));
    }

    /**
     * Show images product
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $image = $this->productImageRepository->find($id);

        return view('products.images.show', compact('image'));
    }

    /**
     * Form Upload image
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $product = $this->productsRepository->find($id);

        return view('products.images.create', compact('product'));
    }

    /**
     * Upload image
     *
     * @param ProductsImagesRequest $request
     * @param $id
     * @param Storage $storage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductsImagesRequest $request, $id, Storage $storage)
    {
        $this->productsImagesService->upload($request, $id, $storage);

        return redirect()->route('products_image', ['id' => $id]);
    }

    /**
     * Delete image
     *
     * @param $id
     * @param Storage $storage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id, Storage $storage)
    {
        $products = $this->productsImagesService->delete($id, $storage);

        return redirect()->route('products_image', ['id' => $products->id]);
    }
}
