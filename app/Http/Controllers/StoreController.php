<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()
    {
        $featured = Product::featured()->get();

        $recommend = Product::recommend()->get();

        $categories = Category::all();

        return view('store.index', compact('categories', 'featured', 'recommend'));
    }
}
