@extends('admin/index')

@section('title','CATEGORY')
@section('content')
<?php 
// pre($cate_info); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    @if(session('flash-error'))
    <p class="admin-toastr" onclick="toastr_danger('{{session()->get('flash-error')}}')"></p>
    @endif
    @if(session('flash-success'))
    <p class="admin-toastr" onclick="toastr_success('{{session()->get('flash-success')}}')"></p>
    @endif

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Category</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{url('admin/category-update/'.$cate_info->slug)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Parent Category</label>
                                    <select class="form-control select2" style="width: 100%;" name="parent_id">
                                        <option value=0>Select parent category</option>
                                        @foreach($parent_cate as $single_info)
                                        <option 
                                        @if($single_info->cat_id == $cate_info->parent_id)
                                        selected
                                        @endif  
                                        value="{{$single_info->cat_id}}">{{$single_info->cate_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cate_name">Name</label>
                                    <input type="text" name="cate_name" class="form-control" id="cate_name"
                                    placeholder="Enter name" value="{{$cate_info->cate_name}}">
                                    @error('cate_name')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="textarea" name="description"
                                    placeholder="description">{{$cate_info->description}}</textarea>
                                    @error('description')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="img">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="img" class="custom-file-input" id="img">
                                            <label class="custom-file-label" for="img">Choose file</label>
                                        </div>
                                    </div>
                                    <img src="{{asset('public/admin-assets/img/categories/'.$cate_info->cate_img)}}" class="sm-img">
                                    @error('img')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status" 
                                        @if($cate_info->status == 0)
                                        checked
                                        @endif
                                        id="active_status" value="0">
                                        <label for="active_status" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status"
                                        @if($cate_info->status == 1)
                                        checked
                                        @endif
                                        id="inactive_status" value="1">
                                        <label for="inactive_status" class="custom-control-label">Inactive</label>
                                    </div>
                                    @error('status')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>
</div>
@stop