
@extends('admin.layout')

@section('title')
    News
@endsection

@section('content')
    <article class="content responsive-tables-page">
        <div align="left">
            <button type="button" class="btn btn-oval btn-primary" data-toggle="modal" data-target="#myModal"> Add News </button>
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
                            <th width="5%"> Image </th>
                            <th width="5%"> Category </th>
                            <th width="5%"> Name </th>
                            <th width="15%"> Description </th>
                            <th width="15%"> Content </th>
                            <th width="5%"> Posted by </th>
                            <th width="10%"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $news as $new )
                        <tr>
                            <td>{{ $new->id }}</td>
                            <td>
                            	<img src='{{asset("images/$new->image")}}' width="70" title="{{$new->image}}">
                            </td>
                            <td>
                                {{ $new->category->name }}
                            </td>
                            <td>{{ $new->name }}</td>
                            <td style="font-size: 13px;">{{ $new->description }}</td>
                            <td style="font-size: 13px;">{{ $new->content }}</td>
                            <td>{{ $new->posted_by }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-{{$new->id}}"><em class="fa fa-pencil"></em></button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $new->id }}"><em class="fa fa-trash-o"></em></button>
                            </td>
                        </tr>
                        <!-- Modal content-->
                        <div class="modal fade" id="edit-{{$new->id}}" role="dialog">
                            <div class="modal-dialog">
                                <div style="width:150%;" class="modal-content">
                                    <div class="modal-header">
                                        <h4 align="left" class="modal-title">News
                                            <small>Edit</small>
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal -->
                                    <!-- start edit -->
                                    <div class="modal-body">
                                        <form method="post" action="news/{{ $new->id }}/edit" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                                            {{csrf_field()}} 
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label> Select category </label>
							                    <select class="c-select form-control boxed" name="category_id">
							                    @foreach ($categories as $category)
							                    	<?php
							                    		$category = App\Category::find($category->id);
							                    	?>
							                        <option value="{{ $category->id }}" <?php if($new->category_id == $category->id){ echo 'selected';}?>>{{ $category->name }}</option>
							                    @endforeach
							                    </select>
							                </div>
		                                    <div class="form-group">
                                                <div class="input-group">
                                                    <p id="img_edit">
                                                        <img style="width: 100px" title="selected" src='{{ asset("images/$new->image") }}'>
                                                    </p>
                                                    <div class="custom-file">
                                                        <input type="file" value="{{ $new->image }}" class="custom-file-input" id="inputGroupFile01" name="image" 
                                                        aria-describedby="inputGroupFileAddon01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file upoload</label>
                                                    </div>
                                                </div>
                                            </div>
		                                    <div class="form-group">
		                                        <label class="control-label" > Name : </label>
		                                        <div class="">
		                                            <input type="text" value="{{ $new->name }}" name="name" class="
		                                            form-control" placeholder="Enter name" />
		                                        </div>
		                                    </div>
		                                    <div class="form-group">
		                                    	<label> Description : </label>
		                                    	<textarea id="demo" class="form-control ckeditor" rows="2" name="description" placeholder="Enter descriptioin">{{ $new->description }}</textarea>
		                                    </div>
                                            <div class="form-group">
                                                <label> Content : </label>
                                                <textarea id="demo" class="form-control ckeditor" rows="2" name="content" placeholder="Enter content">{{ $new->content }}</textarea>
                                            </div>
		                                    <br />
		                                    <div align="right">
		                                        <button type="submit" class="btn btn-oval btn-primary"> Edit News </button>

		                                        <button type="reset" class="btn btn-oval btn-danger"> Reset </button>
		                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end edit -->

                        <!-- start delete -->

                            <div id="delete-{{ $new->id }}" class="modal fade" role="dialog">
                                <form method="POST" action="news/{{ $new->id }}">
                                    @csrf
                                    @method('DELETE')

                                        <div class="modal-dialog">
                                            <div style="width:150%;" class="modal-content">
                                                <div class="modal-header">
                                                    <div align="left">
                                                        <h2 class="modal-title">News
                                                            <small> delete </small>
                                                        </h2>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 align="center" style="margin:0;">Are you sure you want to remove {{ $new->name }}?</h4>
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
              <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                        <div style="width:150%;" class="modal-content">
                            <div class="modal-header">
                                <h4 align="left" class="modal-title">News
                                    <small>Add</small>
                                </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">

                                <form method="post" action="news" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
					                    <select class="c-select form-control boxed" name="category_id">
					                        <option selected disabled> select category </option>
					                    @foreach ($categories as $category)
					                    	<?php
					                    		$category = App\Category::find($category->id);
					                    	?>
					                        <option value="{{ $category->id }}">{{ $category->name }}</option>
					                    @endforeach
					                    </select>
					                </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" value="" class="custom-file-input" id="inputGroupFile01" name="image" 
                                                aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file upoload</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" > Name : </label>
                                        <div class="">
                                            <input type="text" name="name" class="
                                            form-control" placeholder="Enter name" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    	<label> Description </label>
                                    	<textarea id="demo" class="form-control ckeditor" name="description" rows="2" placeholder="Enter description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label> Content </label>
                                        <textarea id="demo" class="form-control ckeditor" name="content" rows="2" placeholder="Enter content"></textarea>
                                    </div>
                                    <br />
                                    <div align="right">
                                        <button type="submit" class="btn btn-oval btn-primary"> Add News </button>

                                        <button type="reset" class="btn btn-oval btn-danger"> Reset </button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            <!-- end add  -->
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

