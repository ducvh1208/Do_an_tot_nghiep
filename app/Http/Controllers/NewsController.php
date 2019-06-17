<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Category;

use App\News;

use Validator;

class NewsController extends Controller
{
   
    public function index()
    {
        $news = News::all();
        $categories = Category::all();

        return view('admin/news',compact('news','categories'));
    }

    
    public function store(Request $request)
    {

        request()->validate([

        'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        'category_id' => ['required'],
        'name' => ['required', 'unique:news'],
        'description' => ['required']
        ]);
  
        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $imageName);

        $news = new News;

        $news->image = $imageName;

        $news->category_id = request('category_id');

        $news->name = request('name');

        $news->description = request('description');

        $news->save();

    return back()
    ->with('create_success', 'Bạn đã tạo thành công!');

    }


   
    public function edit($id)

    {
        $categories = Category::all();
        $news = News::find($id);

        return view('admin/news',compact('news','categories'));
    }

    
    public function update(Request $request, $id)
    {
       
        if(request('image') != ""){

            request()->validate(
                [
                    'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
                    'category_id' => ['required'],
                    'name' => ['required' ],
                    'description' => ['required']
                ]);
                $imageName = time().'.'.request()->image->getClientOriginalExtension();

                request()->image->move(public_path('images'), $imageName);

                $news->image = $imageName;
        }
        else{
            
            request()->validate(
                [
                    'category_id' => ['required'],
                    'name' => ['required' ],
                    'description' => ['required']
                ]);
        }
        
        $news = News::find($id);
  
        $news->category_id = request('category_id');

        $news->name = request('name');

        $news->description = request('description');

        $news->save();

    return back()
    ->with('create_success', 'Bạn đã sửa thành công!');
    }

    
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();

        return back()->with('create_success','Bạn đã xóa thành công!');
    }
}
