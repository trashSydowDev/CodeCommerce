<?php

namespace CodeCommerce\Services;

use CodeCommerce\Http\Requests\ProductsImagesRequest;
use CodeCommerce\Repositories\AdminProductsImagesRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductsImagesService
{
    private $productsImagesRepository;

    /**
     * Construct
     *
     * @param AdminProductsImagesRepository $productsImagesRepository
     */
    public function __construct(AdminProductsImagesRepository $productsImagesRepository)
    {
        $this->productsImagesRepository = $productsImagesRepository;
    }

    public function upload(ProductsImagesRequest $request, $id, Storage $storage)
    {
        $file = $request->file('image');

        $extension = $file->getClientOriginalExtension();

        $image  = $this->productsImagesRepository->create([
            'product_id' => $id,
            'extension' => $extension
        ]);

        $storage::disk('local_public')->put($image->id . '.' . $extension, File::get($file));
    }

    /**
     * Delete the image and returns the product id
     *
     * @param $id
     * @param Storage $storage
     * @return $id Product
     */
    public function delete($id, Storage $storage)
    {
        $image = $this->productsImagesRepository->find($id);

        $products = $image->product;

        if (file_exists(public_path() . '/uploads/products/' . $image->id . '.' . $image->extension)) {
            $storage::disk('local_public')->delete($image->id . '.' . $image->extension);
        }

        $image->delete();

        return $products;
    }
} 