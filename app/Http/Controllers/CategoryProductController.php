<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryPrductRequest;
use App\Productype;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    //
    public function create()
    {
        return view('admin.categoryProduct.create');
    }

    public function store(CreateCategoryPrductRequest $request)
    {

        $productCategory = new Productype();
        $productCategory->name = $request->name;
        $productCategory->description = $request->description;
        if ($request->file('image')) {
            $path = $request->file('image')->store('images', 'public');
            $productCategory->image = $path;
        }
        $productCategory->save();
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        Productype::destroy($id);
        return redirect()->route('categories.index');
    }

    public function update($id)
    {
        $categoryProduct = Productype::find($id);
        return view('admin.categoryProduct.update', compact('categoryProduct'));
    }

    public function edit(CreateCategoryPrductRequest $request, $id)
    {
        $productCategory = Productype::find($id);
        $productCategory->name = $request->name;
        $productCategory->description = $request->description;
        if ($request->file('image')) {
            $currentImg = $productCategory->image;
            if ($currentImg) {
                unlink(storage_path('app/public/' . $currentImg));
            }
            $path = $request->file('image')->store('images', 'public');
            $productCategory->image = $path;
        }
        $productCategory->save();
        return redirect()->route('categories.index');
    }
}
