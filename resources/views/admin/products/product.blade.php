
@extends('admin.layout')

@section('title')
    Product
@endsection

@section('content')
   
    <article class="content responsive-tables-page">
        <div align="left">
            <button type="button" class="btn btn-oval btn-primary" data-toggle="modal" data-target="#add"> Add Product </button>
        </div>
        @if ($message = Session::get('create_success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="color:#fff;" >&times;</button>
                {{$message}}
            </div>
        @endif
        @if ( count($errors) > 0)

            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" style="color:#fff;" >&times;</button>
                <ul>
                    
                    @foreach ($errors->all() as $error)
                    
                        <li> {{$error}} </li>

                    @endforeach

                </ul>
            </div>

        @endif
            <br />
            <div style="box-sizing: border-box; padding: 10px;" class="table-responsive">
                <table style="text-align: center; " class="table table-bordered table-striped" id="user_table">
                    <thead>
                        <tr>
                            <th width="5%"> id </th>
                            <th width="5%"> Type </th>
                            <th width="5%"> Image </th>
                            <th width="5%"> Name </th>
                            <th width="5%"> Trademark </th>
                            <th width="15%"> Price </th>
                            <th width="55%"> Detail </th>
                            <th width="10%"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $products as $product )
                        
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <?php
                                    $products_type = App\Product_type::where('id', $product->product_id)->get();

                                    foreach ($products_type as $product_type) {
                                         echo $product_type->name;
                                     } 
                                ?>
                            </td>
                            <td>
                                <img src='{{asset("images/$product->image")}}' width="70" title="{{$product->image}}">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->trademark }}</td>
                            <td>{{ $product->price }}</td>
                            <td style="font-size: 13px;">{{ $product->detail }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-{{$product->id}}"><em class="fa fa-pencil"></em></button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $product->id }}"><em class="fa fa-trash-o"></em></button>
                            </td>
                        </tr>

                                   
                     <!-- start edit-->

                         <div class="modal fade" id="edit-{{$product->id}}" role="dialog">
                            <div class="modal-dialog">
                                <div style="width:150%;" class="modal-content">
                                    <div class="modal-header">
                                        <h4 align="left" class="modal-title"> Product
                                            <small>Edit</small>
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal-body">
                                        <form method="post" action="product/{{ $product->id }}/edit" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                                            {{csrf_field()}} 
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label> Select product type </label>
                                                <select class="c-select form-control boxed" name="product_id">
                                                <?php
                                                    $products_type = App\Product_type::find($product_type->id)->get();

                                                ?>
                                                @foreach ($products_type as $product_type)
                                        
                                                    <option value="{{ $product_type->id }}" <?php if($product->product_id == $product_type->id){ echo 'selected';}?>>{{ $product_type->name }}</option>

                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <p>
                                                        <img title="selected" style="width: 100px" src='{{ asset("images/$product->image") }}'>

                                                    </p>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" value="{{ $product->image }}" 
                                                        aria-describedby="inputGroupFileAddon01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file upoload</label>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" > Name : </label>
                                                <div class="">
                                                    <input type="text" value="{{ $product->name }}" name="name" class="
                                                    form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" > Trademark : </label>
                                                <div class="">
                                                    <input type="text" value="{{ $product->trademark }}" name="trademark" class="
                                                    form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" > Price : </label>
                                                <div class="">
                                                    <input type="text" value="{{ $product->price }}" name="price" class="
                                                    form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> Detail : </label>
                                                <textarea id="demo" class="form-control ckeditor" rows="2" name="detail" >{{ $product->detail }}</textarea>
                                            </div>
                                            <div align="right">
                                                <button type="submit" class="btn btn-oval btn-primary"> Save </button>

                                                <button type="reset" class="btn btn-oval btn-danger"> Reset </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end edit -->

                        <!-- start delete -->

                            <div id="delete-{{ $product->id }}" class="modal fade" role="dialog">
                                <form method="POST" action="product/{{ $product->id }}">
                                    @csrf
                                    @method('DELETE')

                                        <div class="modal-dialog">
                                            <div style="width:150%;" class="modal-content">
                                                <div class="modal-header">
                                                    <div align="left">
                                                        <h2 class="modal-title"> Product
                                                            <small> delete </small>
                                                        </h2>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 align="center" style="margin:0;">Are you sure you want to remove {{ $product->name }}?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger-oval btn-danger">OK</button>
                                                    <button type="button" class="btn btn-danger-oval btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                  </form>
                            </div>
                        <!-- end delete -->

                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- start add -->

            <div class="modal fade" id="add" role="dialog">
            <div class="modal-dialog">
                <div style="width:150%;" class="modal-content">
                    <div class="modal-header">
                        <h4 align="left" class="modal-title"> Product
                            <small>Add</small>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal -->
                    <div class="modal-body">
                        <form method="post" action="product" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                            @csrf 
                            @method('POST')
                            <div class="form-group">
                                <label> select product type </label>
                                <select class="c-select form-control boxed" name="product_id">

                                    <option selected disabled> select product type </option>
                                
                                @foreach ($products_type as $product_type)
                        
                                    <option value="{{ $product_type->id }}" name="product_type">{{ $product_type->name }}</option>

                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" 
                                        aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file upoload</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" > Name : </label>
                                <div class="">
                                    <input type="text" name="name" class="
                                    form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" > Trademark : </label>
                                <div class="">
                                    <input type="text" name="trademark" class="
                                    form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" > Price : </label>
                                <div class="">
                                    <input type="text" name="price" class="
                                    form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Detail : </label>
                                <textarea id="demo" class="form-control ckeditor" rows="2" name="detail" ></textarea>
                            </div>
                            <div align="right">
                                <button type="submit" class="btn btn-oval btn-primary"> Add product new </button>

                                <button type="reset" class="btn btn-oval btn-danger"> Reset </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </article>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            
            $(".custom-file-input").click(function(){
                
                $("[title^='selected']").css( "display", "none" );
            });
        });
    </script>
@endsection
