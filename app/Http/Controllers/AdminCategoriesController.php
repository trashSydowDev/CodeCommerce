<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

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
    public function createAction()
    {
        return view('categories.create');
    }

    /**
     * Stores the data in the database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $category = $this->categories->fill($data);

        $category->save();

        return redirect('admin/categories');
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
     * Show categories.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function showAction($id)
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
    public function editAction($id)
    {
        $categories_id = $this->categories->find($id);

        return view('categories.show', compact('categories_id'));
    }

    /**
     * Update Categories
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function updateAction($id)
    {
        $categories_id = $this->categories->find($id);

        return view('categories.show', compact('categories_id'));
    }

    /**
     * Delete Categories
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function deleteAction($id)
    {
        $categories_id = $this->categories->find($id);

        return view('categories.show', compact('categories_id'));
    }
}
