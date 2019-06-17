<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Product_type;

class Product_typeController extends Controller
{
    
    public function index()
    {
        $products_type = Product_type::all();

        return view('admin/products/product_type',compact('products_type'));
    }

    
    public function store(Request $request)
    {
        $products_type = Product_type::all();
        
        $products_type = new Product_type;

        request()->validate([
            'name'=>['required','unique:product_type','min:3','max:255'],
        ]);

        $products_type->name = request('name');
        $products_type->save();

        return back()->with('create_success','Bạn đã tạo thành công!');

    }

    
    
    public function update(Request $request, $id)
    {
        $product_type = Product_type::find($id);

        $product_type->update(request(['name']));
        
        return back()->with('create_success','Bạn đã sửa thành công!');
    }

    
    public function destroy($id)
    {
        $product_type = Product_type::find($id);

        $product_type->delete();

        return back()->with('create_success','Bạn đã xóa thành công');
    }
}
