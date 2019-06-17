@extends('admin.layout')

@section('title')
    Product type
@endsection

@section('content')
    <article class="content responsive-tables-page">
        <div align="left">
            <button type="button" class="btn btn-oval btn-primary" data-toggle="modal" data-target="#myModal"> Add Product Type </button>
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
                            <th width="10%">id</th>
                            <th width="35%"> Name</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $products_type as $product_type )
                        <tr>
                            <td>{{ $product_type->id }}</td>
                            <td>{{ $product_type->name }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-{{$product_type->id}}"> Edit </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $product_type->id }}">Delete</button>
                            </td>
                        </tr>
                        <!-- Modal content-->
                        <div class="modal fade" id="edit-{{$product_type->id}}" role="dialog">
                            <div class="modal-dialog">
                                <div style="width:150%;" class="modal-content">
                                    <div class="modal-header">
                                        <h4 align="left" class="modal-title">product_type
                                            <small>Edit</small>
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal -->
                                    <!-- start edit -->
                                    <div class="modal-body">
                                        <form method="post" action="product_type/{{$product_type->id}}/edit" id="sample_form" class="form-horizontal">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label class="control-label" > Name : </label>
                                                <div class="input">
                                                    <input type="text" name="name" class="form-control" value="{{ $product_type->name }}" />
                                                </div>
                                            </div>
                                            <div align="right">
                                                <button type="submit" class="btn btn-danger-oval btn-info"> Save </button>

                                                <button type="reset" class="btn btn-oval btn-danger">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end edit -->

                        <!-- start delete -->

                            <div id="delete-{{ $product_type->id }}" class="modal fade" role="dialog">
                                <form method="POST" action="product_type/{{ $product_type->id }}">
                                    @csrf
                                    @method('DELETE')

                                        <div class="modal-dialog">
                                            <div style="width:150%;" class="modal-content">
                                                <div class="modal-header">
                                                    <div align="left">
                                                        <h2 class="modal-title">product_type</h2>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 align="center" style="margin:0;">Are you sure you want to remove {{ $product_type->name }}?</h4>
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
            <br />
            <!-- start add -->
            <div class="container">
              <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                        <div style="width:150%;" class="modal-content">
                            <div class="modal-header">
                                <h4 align="left" class="modal-title">Product Type
                                    <small>Add</small>
                                </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="product_type" id="sample_form" class="form-horizontal">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label" > Name : </label>
                                        <div class="">
                                            <input type="text" name="name" class="
                                            form-control"/>

                                        </div>
                                    </div>
                                    <br />
                                    <div align="right">
                                        <button type="submit" class="btn btn-oval btn-primary"> Add Product Type </button>

                                        <button type="reset" class="btn btn-oval btn-danger"> Reset </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end add  -->
    </article>
@endsection
