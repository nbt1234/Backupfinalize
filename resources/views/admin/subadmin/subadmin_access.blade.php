@extends('admin/index')
@section('title','Subadmin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SUBADMIN</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Subadmin</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Subadmin Access</h3>
                    </div>
                    <!-- form start -->
                    @if (!empty($subadmin_data))
                    @php
                     $subadmin_info = json_decode($subadmin_data->fields, true);
                    @endphp
                    <form role="form" method="post" action="{{url('finalize-site-admin/subadmin-insert-access/'.$id)}}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" id="category" name="fields[]" value="category_section"
                                                @if (isset($subadmin_info) && in_array('category_section',
                                                $subadmin_info)) checked @endif>
                                            <label for="category">
                                                Category
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" id="sub_category" name="fields[]" value="sub_category_section"
                                                @if (isset($subadmin_info) && in_array('sub_category_section',
                                                $subadmin_info)) checked @endif>
                                            <label for="sub_category">
                                                Sub Category
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" id="subadmin_section" name="fields[]" value="subadmin_section"
                                                @if (isset($subadmin_info) && in_array('subadmin_section',
                                                $subadmin_info)) checked @endif>
                                            <label for="subadmin_section">
                                                Sub Admin
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @else
                    <p class="alert alert-danger site-errors">No Sudadmin found</p>
                    @endif
                </div>

            </div>
        </div>
    </section>
</div>
@stop
