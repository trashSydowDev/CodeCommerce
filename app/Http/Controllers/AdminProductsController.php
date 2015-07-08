<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\ProductsRequest;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{
    private $products;

    private $tags;

    /**
     * Construct
     */
    public function  __construct(Product $products, Tag $tags)
    {
        $this->middleware('guest');
        $this->products = $products;
        $this->tags = $tags;
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
     * Show images product
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function showImages($id)
    {
        $product = $this->products->find($id);

        return view('products.images', compact('product'));
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

        $product = $this->products->fill($data);
        $product->save();

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

            $this->tags->firstOrCreate(['name' => $tag]);

            $tagId[] = $this->tags->where('name','=', $tag)->first()->id;

        }

        return $tagId;
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

        $tags = $this->getTags($request->input('tags'));

        $product = $this->products->find($id);
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
        $product = $this->products->find($id);

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
