<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product_type;

use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products_type = Product_type::all();
        $products = Product::all();

        return view('admin/products/product',compact('products', 'products_type'));
    }

    
    public function store(Request $request)
    {
        $product_type = Product_type::all();

        request()->validate([
        'product_id' => ['required'],
        'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        'name' => ['required']
        ]);
  
        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $imageName);

        $product = new Product;

        $product->product_id = request('product_id');

        $product->image = $imageName;

        $product->name = request('name');

        $product->trademark = request('trademark');

        $product->price = request('price');

        $product->detail = request('detail');

        $product->save();

    return back()
    ->with('create_success', 'Bạn đã tạo thành công!');
    }

    
   
    public function edit($id)
    {
        $products = Product::find($id);

        return view('admin/products/product',compact('products'));

    }

    public function update(Request $request, $id)
    {
            
            $product = Product::find($id);

            if(request('image') != ""){

                request()->validate(
                [
                    'product_id' => ['required'],
                    'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
                    'name' => ['required']
                ]);
                 $imageName = time().'.'.request()->image->getClientOriginalExtension();

                request()->image->move(public_path('images'), $imageName);
                $product->image = $imageName;

            }
            else{
                request()->validate(
                [
                    'product_id' => ['required'],
                    
                    'name' => ['required']
                ]);
                
            }

            $product->product_id = request('product_id');
            
            $product->name = request('name');

            $product->trademark = request('trademark');

            $product->price = request('price');

            $product->detail = request('detail');

            $product->save();

        return back()
        ->with('create_success', 'Bạn đã sửa thành công!');
    }
    
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return back()->with('create_success', 'Bạn đã xóa thành công!');
    }
}
