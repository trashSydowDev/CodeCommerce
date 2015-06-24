<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\CategoryRequest;

class AdminCategoriesController extends Controller
{
    private $categories;

    /**
     * Construct
     */
    public function __construct(Category $category)
    {
        $this->middleware('guest');
        $this->categories = $category;
    }

    /**
     * Show categories all
     *
     * @return Response
     */
    public function index()
    {
        $categories = $this->categories->all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Create categories.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Stores the data in the database
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        $category = $this->categories->fill($data);

        $category->save();

        return redirect()->route('categories');
    }

    /**
     * Show categories.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $categories_id = $this->categories->find($id);

        return view('categories.show', compact('categories_id'));
    }

    /**
     * Edit Categories
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $categories_id = $this->categories->find($id);

        return view('categories.edit', compact('categories_id'));
    }

    /**
     * Update Categories
     *
     * @param CategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->categories->find($id)->update($request->all());

        return redirect()->route('categories');
    }

    /**
     * Delete Categories
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $this->categories->find($id)->delete();

        return redirect()->route('categories');
    }
}
