@extends('admin/index')

@section('title','Blog')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>BLOGS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">EDIT BLOG</li>
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
                            <h3 class="card-title">Edit Blog</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{url('finalize-site-admin/blog-update/'.$blog_info->slug)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="heading">Heading</label>
                                    <input class="form-control" name="heading"
                                    placeholder="heading" value="{{$blog_info->heading}}">
                                    @error('heading')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="textarea" name="content"
                                    placeholder="description">{{$blog_info->content}}</textarea>
                                    @error('content')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Images</label>
                                    <div class="row blog-img-block0">
                                        <?php
                                            $blog_imgs = json_decode($blog_info->imgs);
                                        ?>
											<?php foreach ($blog_imgs as $key => $blog_img) {?>
                                        <div class="col-md-2 text-center">
                                            <img class="sm-img mb-2" src="{{ url('public/admin-assets/img/pages/blogs/' . $blog_img) }}">
                                            <button type="button" onclick="blog_img_delete('{{ $blog_info->slug }}',<?php echo $key; ?>,'finalize-site-admin/blog/remove-image')" class="btn btn-xs w-75 m-auto btn-block btn-warning"><i class="fas fa-plus-circle"></i> Delete </button>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="blog-img-section">
                                    <label for="imgs0">Image</label>
                                    <div class="row blog-img-block0">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="imgs0" class="custom-file-input" id="imgs0" accept="image/*">
                                                        <label class="custom-file-label" for="imgs0">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn add-blog-img btn-block btn-warning"><i class="fas fa-plus-circle"></i> Add More </button>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status"
                                        @if($blog_info->status == 0)
                                        checked
                                        @endif
                                        id="active_status" value="0">
                                        <label for="active_status" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status"
                                        @if($blog_info->status == 1)
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
