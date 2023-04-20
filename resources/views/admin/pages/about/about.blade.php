<?php
// pre($about_us);
?>

@extends('admin/index')

@section('title','ABOUT-US')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ABOUT-US</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit About-Us</li>
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
                <form role="form" method="post" action="{{url('finalize-site-admin/about-us-edit')}}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Section 1</h3>
                        </div>
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="heading[0]">Heading</label>
                                <input type="text" name="heading[0]" class="form-control" id="heading[0]"
                                    placeholder="Enter heading" value="{{$about_us[0]->heading}}">
                                @error('heading.0')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="img0">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="img0" class="custom-file-input" id="img0">
                                        <label class="custom-file-label" for="img0">Choose file</label>
                                    </div>
                                </div>
                                <img src="{{asset('public/admin-assets/img/pages/about/'.$about_us[0]->image)}}" class="sm-img">
                                @error('img0')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content[0]">Content</label>
                                <textarea name="content[0]" class="textarea" id="content" placeholder="Enter content"
                                    value="">{{$about_us[0]->content}}</textarea>
                                @error('content.0')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Section 2</h3>
                        </div>
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="heading[1]">Heading</label>
                                <input type="text" name="heading[1]" class="form-control" id="heading[1]"
                                    placeholder="Enter heading" value="{{$about_us[1]->heading}}">
                                @error('heading.1')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="img1">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="img1" class="custom-file-input" id="img1">
                                        <label class="custom-file-label" for="img1">Choose file</label>
                                    </div>
                                </div>
                                <img src="{{asset('public/admin-assets/img/pages/about/'.$about_us[1]->image)}}" class="sm-img">
                                @error('img1')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content[1]">Content</label>
                                <textarea name="content[1]" class="textarea" id="content" placeholder="Enter content"
                                    value="">{{$about_us[1]->content}}</textarea>
                                @error('content.1')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Section 3</h3>
                        </div>
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="heading[2]">Heading</label>
                                <input type="text" name="heading[2]" class="form-control" id="heading[2]"
                                    placeholder="Enter heading" value="{{$about_us[2]->heading}}">
                                @error('heading.2')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="img2">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="img2" class="custom-file-input" id="img2">
                                        <label class="custom-file-label" for="img2">Choose file</label>
                                    </div>
                                </div>
                                <img src="{{asset('public/admin-assets/img/pages/about/'.$about_us[2]->image)}}" class="sm-img">
                                @error('img2')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content[2]">Content</label>
                                <textarea name="content[2]" class="textarea" id="content" placeholder="Enter content"
                                    value="">{{$about_us[2]->content}}</textarea>
                                @error('content.2')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Section 4</h3>
                        </div>
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="heading[3]">Heading</label>
                                <input type="text" name="heading[3]" class="form-control" id="heading[3]"
                                    placeholder="Enter heading" value="{{$about_us[3]->heading}}">
                                @error('heading.3')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="img3">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="img3" class="custom-file-input" id="img3">
                                        <label class="custom-file-label" for="img3">Choose file</label>
                                    </div>
                                </div>
                                <img src="{{asset('public/admin-assets/img/pages/about/'.$about_us[3]->image)}}" class="sm-img">
                                @error('img3')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content[3]">Content</label>
                                <textarea name="content[3]" class="textarea" id="content" placeholder="Enter content"
                                    value="">{{$about_us[3]->content}}</textarea>
                                @error('content.3')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </section>
</div>
@stop
