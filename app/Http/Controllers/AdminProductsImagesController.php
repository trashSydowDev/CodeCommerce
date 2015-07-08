<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests\ProductsImagesRequest;

use CodeCommerce\Repositories\AdminProductsImagesRepository;
use CodeCommerce\Repositories\AdminProductsRepository;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductsImagesController extends Controller
{
    private $productsRepository;
    private $productImageRepository;

    /**
     * Construct
     */
    public function  __construct(AdminProductsRepository $productsRepository, AdminProductsImagesRepository $productsImagesRepository)
    {
        $this->middleware('guest');
        $this->productsRepository = $productsRepository;
        $this->productImageRepository = $productsImagesRepository;
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
        $file = $request->file('image');

        $extension = $file->getClientOriginalExtension();

        $image  = $this->productImageRepository->create([
            'product_id' => $id,
            'extension' => $extension
        ]);

        $storage::disk('local_public')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('products_image', ['id' => $id]);
    }

    public function destroy($id, Storage $storage)
    {
        $image = $this->productImageRepository->find($id);

        if (file_exists(public_path() . '/uploads/products/' . $image->id . '.' . $image->extension)) {
            $storage::disk('local_public')->delete($image->id . '.' . $image->extension);
        }

        $product = $image->product;

        $image->delete();

        return redirect()->route('products_image', ['id' => $product->id]);
    }
}