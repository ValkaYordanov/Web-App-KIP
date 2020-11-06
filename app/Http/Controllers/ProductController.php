<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function home()
    {
        return view('products.main');
    }
}
