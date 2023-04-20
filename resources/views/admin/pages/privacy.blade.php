<?php
// pre($all_info);
?>

@extends('admin/index')

@section('title','PRIVACY')
@section('content')
<?php
// pre($cate_info); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PRIVACY POLICY</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Privacy</li>
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
                            <h3 class="card-title">Edit Privacy</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{url('finalize-site-admin/privacy-edit')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="heading">Heading</label>
                                    <input type="text" name="heading" class="form-control" id="heading"
                                        placeholder="Enter heading" value="{{$privacy_info->heading}}">
                                    @error('heading')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" class="textarea" id="content" placeholder="Enter content"
                                        value="">{{$privacy_info->content}}</textarea>
                                    @error('content')
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
