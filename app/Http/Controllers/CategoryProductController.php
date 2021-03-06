<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryPrductRequest;
use App\Productype;
use Egulias\EmailValidator\Exception\AtextAfterCFWS;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    //
    private $category;

    public function __construct(Productype $category)
    {
        $this->category = $category;
    }

    public function create()
    {
        return view('admin.categoryProduct.create');
    }

    public function store(CreateCategoryPrductRequest $request)
    {
        try {

            $productCategory = new Productype();
            $productCategory->name = $request->name;
            $productCategory->description = $request->description;
            if ($request->file('image')) {
                $path = $request->file('image')->store('images', 'public');
                $productCategory->image = $path;
            }
            $productCategory->save();
            toastr()->success('Thêm danh mục thành công ');
        } catch (\Exception $exception) {
            toastr()->error('Thao tác thêm mới có lỗi ');
        }
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        try {
            $categoryProduct = $this->category->find($id);
            $categoryProduct->delete();
            toastr()->success('Xóa danh mục thành công ');
        } catch (\Exception $exception) {
            toastr()->error('Thao tác xóa có lỗi ');
        }

        return redirect()->route('categories.index');
    }

    public function update($id)
    {
        $categoryProduct = $this->category->find($id);
        return view('admin.categoryProduct.update', compact('categoryProduct'));
    }

    public function edit(CreateCategoryPrductRequest $request, $id)
    {
        try {
            $productCategory = $this->category->find($id);
            $productCategory->name = $request->name;
            $productCategory->description = $request->description;
            if ($request->file('image')) {
                $path = $request->file('image')->store('images', 'public');
                $productCategory->image = $path;
            }
            $productCategory->save();
            toastr()->success('Cập nhật thành công ');
        } catch (\Exception $exception) {
            toastr()->error('Thao tác cập nhập có lỗi rồi');
        }

        return redirect()->route('categories.index');
    }
}
