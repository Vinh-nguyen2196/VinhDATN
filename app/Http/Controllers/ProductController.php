<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $model;
    public function __construct(product $product)
    {
        $this->model = $product;
    }

    public function getAll() {
        $products = $this->model->all();
        return view('admin.products.list', compact('products'));
    }
}
