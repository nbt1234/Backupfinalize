<?php
// pre($contact_us);
?>

@extends('admin/index')

@section('title','CONTACT-US')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CONTACT-US</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Contact-Us</li>
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
                <form role="form" method="post" action="{{url('finalize-site-admin/contact-us-edit')}}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Contact Us</h3>
                        </div>
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" class="form-control" id="contact"
                                    placeholder="Enter contact" value="{{$contact_us->contact??''}}">
                                @error('contact')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="toll_free">Toll Free (Contact)</label>
                                <input type="text" name="toll_free" class="form-control" id="toll_free"
                                    placeholder="Enter Toll Free Contact" value="{{$contact_us->toll_free??''}}">
                                @error('toll_free')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="business_no">Business No.</label>
                                <input type="text" name="business_no" class="form-control" id="business_no"
                                    placeholder="Enter Business Number" value="{{$contact_us->business_no??''}}">
                                @error('business_no')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="Enter email" value="{{$contact_us->email??''}}">
                                @error('email')
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
