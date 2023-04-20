@extends('admin/index')

@section('title','CONTACT CREATORS')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Content Creators</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Content</li>
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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Content Creators</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{url('finalize-site-admin/creators-add')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label for="coupon_name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" 
                                    placeholder="Enter Name" value="{{old('coupon_name')}}">
                                    @error('coupon_name')
                                        <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="coupon_code">Content</label>
                                    <input type="text" class="form-control" name="content" id="content" 
                                    placeholder="Enter Content" value="{{old('coupon_code')}}">
                                    @error('coupon_code')
                                        <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="content-img-section">
                                    <label for="imgs">Image</label>
                                    <div class="row blog-img-block0">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="imgs" class="custom-file-input" accept="image/*"
                                                            id="imgs">
                                                        <label class="custom-file-label" for="imgs">Choose file</label>
                                                    </div>
                                                </div>
                                                @error('imgs0')
                                                <div class="form-valid-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status" checked
                                        id="active_status" value="0">
                                        <label for="active_status" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status"
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