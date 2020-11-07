<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function home()
    {
        return view('products.main');
    }

    public function printAllProducts()
    {
        return view('products.allProducts');
    }

    public function addProduct()
    {
        return view('products.addProduct');
    }
}
