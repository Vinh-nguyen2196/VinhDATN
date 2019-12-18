<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\product;
use App\Productype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $product;
    protected $productType;

    public function __construct(product $product, Productype $productype)
    {
        $this->product = $product;
        $this->productType = $productype;
    }

    public function getAll()
    {
        $products = $this->product->all();
        return view('admin.products.list', compact('products'));
    }

    public function create()
    {
        $types = $this->productType->all();
        return view('admin.products.add', compact('types'));
    }

    public function store(CreateProductRequest $request) {
        $data = [
            'id_type' => $request->type,
            'name' => $request->name,
            'unit' => $request->unit,
            'id_user' => auth()->user()->id,
            'unit_price' => $request->unit_price,
            'description' => $request->description,
            'promotion_price' => $request->promotion_price,
            'state' => $request->state,
            'new' => 1,
        ];
        if ($request->image){
            $image = $request->image;
            $data['image'] = $image->store('images', 'public');
        }
        $this->product->create($data);
        Session::flash('success','Create product success!');
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);
        $product->delete();
        Session::flash('success','Delete product success!');
        return redirect()->route('products.index');
    }

    public function update($id) {
        $product = $this->product->find($id);
        $types = $this->productType->all();
        return view('admin.products.edit', compact('product', 'types'));
    }

    public function edit(UpdateProductRequest $request, $id)
    {
        $product = $this->product->find($id);
        $data = [
            'id_type' => $request->type,
            'name' => $request->name,
            'unit' => $request->unit,
            'id_user' => auth()->user()->id,
            'unit_price' => $request->unit_price,
            'description' => $request->description,
            'promotion_price' => $request->promotion_price,
            'state' => $request->state,
            'new' => 1,
        ];
        if ($request->image){
            $image = $request->image;
            $data['image'] = $image->store('images', 'public');
        }
        $product->update($data);
        Session::flash('success','Update product success!');
        return redirect()->route('products.index');
    }
}
