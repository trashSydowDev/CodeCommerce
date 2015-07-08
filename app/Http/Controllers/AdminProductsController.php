<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests\ProductsRequest;
use CodeCommerce\Repositories\AdminCategoriesRepository;
use CodeCommerce\Repositories\AdminProductsRepository;
use CodeCommerce\Repositories\TagsRepository;
use CodeCommerce\Tag;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{
    private $productsRepository;

    private $tags;

    /**
     * Construct
     */
    public function  __construct(AdminProductsRepository $productsRepository, Tag $tags)
    {
        $this->middleware('guest');
        $this->productsRepository = $productsRepository;
        $this->tags = $tags;
    }

    /**
     * Show products all.
     *
     * @return Response
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
        $data = $request->all();

        $product = $this->productsRepository->create($data);

        $tags = $this->getTags($request->input('tags'));

        $product->tags()->sync($tags);

        return redirect()->route('products');
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

    /**
     * Edit Products
     *
     * @param AdminCategoriesRepository $categoryRepository
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit(AdminCategoriesRepository $categoryRepository, $id )
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

        $tags = $this->getTags($request->input('tags'));

        $product = $this->productsRepository->find($id);
        $product->tags()->sync($tags);

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
        $product = $this->productsRepository->find($id);

        foreach($product->images as $image) {
            if (file_exists(public_path() . '/uploads/products/' . $image->id . '.' . $image->extension)) {
                Storage::disk('local_public')->delete($image->id . '.' . $image->extension);
            }
            $image->delete();
        }
        $product->delete();

        return redirect()->route('products');
    }
}
