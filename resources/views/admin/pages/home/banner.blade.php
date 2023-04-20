
@extends('admin/index')

@section('title','BANNER')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>BANNER</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Banner</li>
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
                        <!-- form start -->
                        <form role="form" method="post" action="{{url('finalize-site-admin/banner-edit')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="heading">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Title"
                                        value="{{$banner_data[0]->heading}}">
                                    @error('title')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="heading">Sub Title</label>
                                    <input type="text" class="form-control" name="sub_title" placeholder="Sub Title"
                                        value="{{$banner_data[0]->content}}">
                                    @error('sub_title')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="banner-img-section">
                                    <label for="imgs0">Image</label>
                                    <div class="row banner-img-block0">
                                    <img class="sm-img mb-2" src="{{ url('public/admin-assets/img/pages/banner/' . $banner_data[0]->image) }}">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="imgs0" class="custom-file-input"
                                                            id="imgs0">
                                                        <label class="custom-file-label" for="imgs0">Choose file</label>
                                                    </div>
                                                </div>
                                                @error('imgs0')
                                                <div class="form-valid-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                </div>
            </div>
        </div>
                    

                    <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
    </section>
                 
</div>
@stop
