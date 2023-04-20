@extends('vendor/index')

@section('title','PRODUCTS')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('vendor/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <a href="{{url('vendor/product-page')}}"><button type="button" class="btn btn-primary">Add Product</button></a>
                  </div>
                  <div class="card-body">
                    <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_info as $single_info)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{$single_info->pro_name}}</td>
                                <td><img src="{{asset('public/products/'.$single_info->main_image)}}" class="sm-img"></td>

                                <td>@if($single_info->status == 0)
                                    <a class="text-success" onclick="confirm_box_status('inactive',{{$single_info->id}},'vendor/product-status-change',this,'Product')"><strong>Active</strong></a>
                                    @else
                                    <a class="text-danger" onclick="confirm_box_status('active',{{$single_info->id}},'vendor/product-status-change',this,'Product')"><strong>Inactive</strong></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('vendor/product-edit/'.$single_info->pro_slug)}}" target="_blank"><button type="button" class="btn btn-block bg-gradient-primary btn-xs">Edit</button></a>
                                    <a onclick="confirm_box_delete('{{$single_info->id}}','vendor/product-delete')"><button type="button" class="mt-2 btn btn-block bg-gradient-danger btn-xs">Delete</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@stop
