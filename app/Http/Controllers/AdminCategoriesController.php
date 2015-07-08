<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests\CategoryRequest;
use CodeCommerce\Repositories\AdminCategoriesRepository;

class AdminCategoriesController extends Controller
{
    private $categoriesRepository;

    /**
     * Construct
     */
    public function __construct(AdminCategoriesRepository $categoriesRepository)
    {
        $this->middleware('guest');
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * Show categories all
     *
     * @return Response
     */
    public function index()
    {
        $categories = $this->categoriesRepository->paginate(10);

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

        $this->categoriesRepository->create($data);

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
        $categories_id = $this->categoriesRepository->find($id);

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
        $categories_id = $this->categoriesRepository->find($id);

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
        $this->categoriesRepository->find($id)->update($request->all());

        return redirect()->route('categories');
    }

    /**
     * Delete Categories and products related
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = $this->categoriesRepository->find($id);

        foreach($category->products as $prod) {
            $prod->delete();
        }
        $category->delete();

        return redirect()->route('categories');
    }
}
