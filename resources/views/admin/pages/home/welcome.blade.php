<?php
// pre($welcome_data);
?>

@extends('admin/index')

@section('title','WELCOME')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>WELCOME</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Welcome</li>
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
                            <h3 class="card-title">Edit Welcome</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{url('finalize-site-admin/welcome-edit')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="heading">Welcome Heading</label>
                                    <input type="text" name="heading" class="form-control" id="heading"
                                        placeholder="Enter Heading" value="{{$welcome_data->heading}}">
                                    @error('heading')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" class="form-control" rows=5 id="content" placeholder="Enter content"
                                        value="">{{$welcome_data->content}}</textarea>
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
