<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        return view('admin/categories',compact('categories'));
    }

    public function store(Category $category)
    {
        request()->validate([
            'name'=>'required|unique:categories,name'
        ]);
        
        $category->name = request('name');
        $category->save();
        return back()
        ->with('create_success', 'Bạn đã tạo thành công!');
    }



    public function edit(Category $categories)
    {
        return view('admin/categories',compact('categories'));
    }


    
    public function update(Category $categories)
    {
        $categories->update(request(['name']));
        return back()->with('create_success', 'Bạn đã sửa thành công!');
    }

    
    public function destroy($id)
    {
            $category = Category::find($id);
            $category->delete();
            return back()->with('create_success', 'Bạn đã xóa thành công!');
    }
}
