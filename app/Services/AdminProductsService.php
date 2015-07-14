<?php

namespace CodeCommerce\Services;

use CodeCommerce\Http\Requests\ProductsRequest;
use CodeCommerce\Repositories\AdminProductsRepository;
use CodeCommerce\Tag;
use Illuminate\Support\Facades\Storage;

class AdminProductsService
{
    private $productsRepository;

    private $tags;

    /**
     * Construct
     *
     * @param AdminProductsRepository $productsRepository
     * @param Tag $tags
     */
    public function __construct(AdminProductsRepository $productsRepository, Tag $tags)
    {
        $this->productsRepository = $productsRepository;
        $this->tags = $tags;
    }

    /**
     * Insert the new products
     *
     * @param ProductsRequest $request
     */
    public function insert(ProductsRequest $request)
    {
        $data = $request->all();

        $product = $this->productsRepository->create($data);

        $tags = $this->getTags($request->input('tags'));

        $product->tags()->sync($tags);

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
        $tags = $this->getTags($request->input('tags'));

        $product = $this->productsRepository->find($id);

        $product->tags()->sync($tags);
    }

    /**
     * Delete Products and images related
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $product = $this->productsRepository->find($id);

        foreach($product->images as $image) {
            if (file_exists(public_path() . '/uploads/products/' . $image->id . '.' . $image->extension)) {
                Storage::disk('local_public')->delete($image->id . '.' . $image->extension);
            }
            $image->delete();
        }

        $product->delete();
    }

    /**
     * Get tags to get the id
     *
     * @param $tags
     * @return array
     */
    private function getTags($tags)
    {
        $datas = explode(',', $tags);

        foreach ($datas as $tag) {

            $tagId[] = $this->tags->firstOrCreate(['name' => $tag])->id;

        }

        return $tagId;
    }
}
