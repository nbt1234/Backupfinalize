<?php
// pre($all_info);
?>

@extends('admin/index')

@section('title','PAGES')
@section('content')
<?php
// pre($cate_info); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PAGES</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">pages</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Home</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-image"></i></span>

                                        <div class="info-box-content align-self-center text-dark">
                                            <span class="info-box-text">Banner</span>
                                        </div>
                                        <span class="align-self-center p-2 text-xl">
                                            <a href="{{url('finalize-site-admin/banner')}}" title="Edit Site Banner">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                                        <div class=" info-box-content align-self-center text-dark">
                                            <span class="info-box-text">Account</span>
                                        </div>
                                        <span class="align-self-center p-2 text-xl">
                                            <a href="{{url('finalize-site-admin/account-page')}}" title="Edit account-page">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-orange"><i class="far fa-flag"></i></span>

                                        <div class=" info-box-content align-self-center text-dark">
                                            <span class="info-box-text">About</span>
                                        </div>
                                        <span class="align-self-center p-2 text-xl">
                                            <a href="{{url('finalize-site-admin/privacy-policy')}}" title="Edit Privacy-Policy">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-fuchsia"><i class="far fa-flag"></i></span>

                                        <div class=" info-box-content align-self-center text-dark">
                                            <span class="info-box-text">Services</span>
                                        </div>
                                        <span class="align-self-center p-2 text-xl">
                                            <a href="{{url('finalize-site-admin/privacy-policy')}}" title="Edit Privacy-Policy">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-teal"><i class="far fa-flag"></i></span>

                                        <div class=" info-box-content align-self-center text-dark">
                                            <span class="info-box-text">Contact</span>
                                        </div>
                                        <span class="align-self-center p-2 text-xl">
                                            <a href="{{url('finalize-site-admin/contact')}}" title="Edit Privacy-Policy">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box" title="Privacy-Policy">
                                        <span class="info-box-icon bg-warning"><i class="fas fa-user-secret"></i></span>

                                        <div class="info-box-content align-self-center text-dark">
                                            <span class="info-box-text">Privacy Policy</span>
                                        </div>
                                        <span class="align-self-center p-2 text-xl">
                                            <a href="{{url('finalize-site-admin/privacy-policy')}}" title="Edit Privacy-Policy">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3 col-sm-6 col-12 ">

                                    <div class="info-box" title="Terms and Conditions">
                                        <span class="info-box-icon bg-danger"><i class="fas fa-gavel"></i></span>

                                        <div class="info-box-content align-self-center text-dark">
                                            <span class="info-box-text">T & C</span>
                                        </div>
                                        <span class="align-self-center p-2 text-xl">
                                            <a href="{{url('finalize-site-admin/terms-condition')}}" title="Edit T&C">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!------------------------------- Other SECTION------------------------------------- -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Other Pages</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-image"></i></span>

                                        <div class="info-box-content align-self-center text-dark">
                                            <span class="info-box-text">About Us</span>
                                        </div>
                                        <span class="align-self-center p-2 text-xl">
                                            <a href="{{url('finalize-site-admin/about-us')}}" title="Edit Site Banner">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                                        <div class="info-box-content align-self-center text-dark">
                                            <span class="info-box-text">Social Users</span>
                                        </div>
                                        <span class="align-self-center p-2 text-xl">
                                            <a href="{{url('finalize-site-admin/social-users')}}" title="Edit Social Users">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i class="far fa-address-card"></i></span>

                                        <div class=" info-box-content align-self-center text-dark">
                                            <span class="info-box-text">Contact Us</span>
                                        </div>
                                        <span class="align-self-center p-2 text-xl">
                                            <a href="{{url('finalize-site-admin/contact-us')}}" title="Edit welcome">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                


                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!------------------------------- TEMPLATE SECTION------------------------------------- -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">TEMPLATE</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-12 ">
                                    <a href="{{url('finalize-site-admin/template')}}">

                                        <div class="info-box" title="Add Template">
                                            <span class="info-box-icon bg-danger"><i class="fas fa-plus"></i></span>

                                            <div class="info-box-content align-self-center text-dark">
                                                <span class="info-box-text">Add Template</span>
                                            </div>

                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                @foreach ($template as $i => $value) <div class="col-md-3 col-sm-6 col-12">
                                    <!-- <a href="{{url('finalize-site-admin/template-edit/'.$value->slug)}}"> -->
                                    <div class="info-box" title=" {{ucfirst($value->name)}} Template">
                                        <span class="info-box-icon @if ($i%2==0)
                                                bg-primary
                                            @else
                                                bg-pink
                                            @endif ">T{{$i+1}}</span>

                                        <div class="info-box-content align-self-center text-dark">
                                            <span class="info-box-text">{{substr(ucfirst($value->name),0,7)}}</span>
                                        </div>
                                        <div class="col flex-grow-0 align-self-center">
                                            <div class="row">
                                                <span class="text-primary text-lg">
                                                    <a href="{{url('finalize-site-admin/template-edit/'.$value->slug)}}" title="Edit {{ucfirst($value->name)}}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="row">
                                                <span class="text-danger text-lg"
                                                    onclick="confirm_box_delete({{$value->id}},'finalize-site-admin/template-delete')">
                                                    <a title="Delete {{ucfirst($value->name)}}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- </a> -->
                                    <!-- /.info-box -->
                                </div>
                                @endforeach
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@stop
