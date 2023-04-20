@extends('admin/index')

@section('title','BRANDS')
@section('content')
<?php 
// pre($info); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brands</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Brand</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


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
                        <form role="form" method="post" action="{{url('finalize-site-admin/brand-update/'.$info->brand_slug)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="brand_name">Name</label>
                                    <input type="text" name="brand_name" class="form-control" id="brand_name"
                                    placeholder="Enter name" value="{{$info->brand_name}}">
                                    @error('brand_name')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="img">Logo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="img" class="custom-file-input" id="img">
                                            <label class="custom-file-label" for="img">Choose file</label>
                                        </div>
                                    </div>
                                    <img src="{{asset('public/admin-assets/img/brands/'.$info->logo)}}" class="sm-img">
                                    @error('img')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status" 
                                        @if($info->status == 0)
                                        checked
                                        @endif
                                        id="active_status" value="0">
                                        <label for="active_status" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status"
                                        @if($info->status == 1)
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