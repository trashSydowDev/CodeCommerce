<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests\ProductsImagesRequest;
use CodeCommerce\ProductImage;
use Illuminate\Support\Facades\File;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Storage;

class AdminProductsImagesController extends Controller
{
    private $products;
    private $productImage;

    /**
     * Construct
     */
    public function  __construct(Product $products, ProductImage $productImage)
    {
        $this->middleware('guest');
        $this->products = $products;
        $this->productImage = $productImage;
    }

    /**
     * images all.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $images = $this->productImage->all();

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
        $product = $this->products->find($id);

        return view('products.images.show', compact('product'));
    }

    /**
     * Form Upload image
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $product = $this->products->find($id);

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

        $image  = $this->productImage->create([
            'product_id' => $id,
            'extension' => $extension
        ]);

        $storage::disk('local_public')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('products_image_show', ['id' => $id]);
    }

    public function delete($id, Storage $storage)
    {
        $image = $this->productImage->find($id);

        if (file_exists(public_path() . '/uploads/products/' . $image->id . '.' . $image->extension)) {
            $storage::disk('local_public')->delete($image->id . '.' . $image->extension);
        }

        $product = $image->product;

        $image->delete();

        return redirect()->route('products_image', ['id' => $product->id]);
    }
}