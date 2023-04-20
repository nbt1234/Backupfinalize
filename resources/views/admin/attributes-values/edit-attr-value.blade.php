@extends('admin/index')

@section('title','ATTRIBUTE-VALUE')
@section('content')
<?php
// pre($cate_info); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attributes Value</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Attribute Value</li>
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
                            <h3 class="card-title">Edit Attribute Value</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post"
                            action="{{url('finalize-site-admin/attribute-value-update/'.$attr_info['id'])}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Attributes</label>
                                    <div class="select2-primary">
                                        <select class="select2" id="attr_id" name="attr_id"
                                            data-placeholder="Select category" style="width:100%;">
                                            <option>Select Attribute</option>
                                            @foreach ($all_attr as $key => $attr)
                                            <option value={{ $attr->id }} @if($attr->id==$attr_info['id']) selected @endif>
                                                {{ $attr->attr_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('attr_id')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="attr_value">Attribute values</label>
                                    <input type="text" name="attr_value" class="form-control" id="attr_value"
                                    placeholder="Enter attr value seperate by (,)" value="{{$attr_info['attr_value']}}">
                                    @error('attr_value')
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
