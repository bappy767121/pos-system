<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductSlockController extends Controller
{
    public function index()
    {
        $this->data['products']= Product::all();

        return view('products.stocks', $this->data);
    }
}
