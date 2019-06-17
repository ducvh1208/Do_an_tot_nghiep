<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Product_type;

use App\Product;

use App\Category;

use App\News;

class PageController extends Controller
{
	public function store(){
		$products_type = Product_type::all();
		/*$products = DB::table('products')->paginate(9);*/

		return view('user.store',compact('products_type'));
    }

    public function blog($id){
    	$categories = Category::all();
    	$news = News::where('category_id', $id)->get();
    	return view('user.blog',compact('categories','news'));
    }

    


    public function ajax_blog(Request $request)
        {
            if($request->get('query'))
            {
                $query = $request->get('query');
                $news = DB::table('news')
                ->where('category_id', '=', $query)->get();
                $output = '<div class="row">';
                $output = '<div class="recent-post-widget">';
                foreach($news as $new)
                {
                           $output .= '
                           <div class="blog-item col-12 col-lg-12 btn" data-toggle="modal" data-target="#quickview-'. $new->id.'">
                               <ul class="recent-posts ">
                                    <li class="d-md-flex">
                                        <div style="cursor: pointer;" class="col-12 col-sm-12 col-md-3 col-lg-3 post-img px-0">
                                            <img src="http://localhost/emhairsalon/public/images/'.$new->image.'" alt="'.$new->name.'" class="alignleft" title="Read more">
                                        </div >
                                        <div class="col-12 col-sm-12 col-md-9 col-lg-9 post-text text-left px-0 ml-md-3 ">
                                            <h4 style="cursor: pointer;">'.$new->name.'</h4>
                                            <span style="color: #a79d9d; font-size:13px"><i class="fa fa-clock" style="color:#4e423070"> </i> '.$new->updated_at.' </span>
                                            <p class="text-second">'.$new->description.'</p>
                                        </div>

                                    </li>
                                </ul>
                            </div>

                            <div class="modal fade" id="quickview-'.$new->id.'">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Read more</h5>
                                            <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="view-main d-lg-flex">
                                                <div class="view-img col-12 col-sm-12 col-md-12 col-lg-6" style="height:260px;">
                                                    <img src="http://localhost/emhairsalon/public/images/'.$new->image.'" alt="'.$new->name.'" style="width: 100%; height: 100%;">
                                                </div>
                                                <div class="view-title col-12 col-sm-12 col-md-12 col-lg-6 ">

                                                    <h4>'.$new->name.'</h4>
                                                    <span><i class="fa fa-clock"> </i>'.$new->updated_at.'</span>
                                                    <p class="text-second">'.$new->description.'</p>

                                                </div>
                                            </div>
                                            <div>
                                                <h3>Details</h3>
                                                <p>'.$new->content.'</p>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           ';
               }
               $output .= '</div>';
               $output .= '</div>';
               
               echo $output;
           }
        }

    /*public function get_home(Request $request){
        if($request->ajax() || 'NULL'){
            $categories = Category::all();
            $news = News::all();
            return view('user.blog',compact('news','categories'));
        }
    }*/
}


