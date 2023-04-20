@extends('admin/index')

@section('title','ATTRIBUTE')
@section('content')
<?php 
// pre($cate_info); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attributes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Attribute</li>
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
                            <h3 class="card-title">Edit Attribute</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{url('finalize-site-admin/attribute-update/'.$attr_info->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                  <div class="form-group">
                                    <label for="attr_name">Name</label>
                                    <input type="text" name="attr_name" class="form-control" id="attr_name"
                                    placeholder="Enter name" value="{{$attr_info->attr_name}}">
                                    @error('attr_name')
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