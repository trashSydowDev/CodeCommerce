<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin');
    }
} 