<?php
// pre($contact_data);
?>

@extends('admin/index')

@section('title','CONTACT')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>FOOTER</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Contact</li>
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
                            <h3 class="card-title">Edit Contact</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{url('finalize-site-admin/contact-edit')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="heading">Heading</label>
                                    <input type="text" name="heading" class="form-control" id="heading"
                                        placeholder="Enter Heading" value="{{$contact_data->heading}}">
                                    @error('heading')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" rows="5" class="form-control" id="content"
                                        placeholder="Enter content">{{$contact_data->content}}</textarea>
                                    @error('content')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Contact</h3>
                        </div>
                        @php
                          $links=json_decode($contact_data->urls);
                        @endphp
                        <!-- form start -->

                        <div class="card-body">
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" class="form-control" id="facebook"
                                    placeholder="Enter facebook" value="{{$links->facebook??''}}">
                                @error('facebook')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="insta">Insta</label>
                                <input type="text" name="insta" class="form-control" id="insta"
                                    placeholder="Enter Instagram link" value="{{$links->insta??''}}">
                                @error('insta')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="youtube">Youtube</label>
                                <input type="text" name="youtube" class="form-control" id="youtube"
                                    placeholder="Enter Youtube link" value="{{$links->youtube??''}}">
                                @error('youtube')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" class="form-control" id="twitter"
                                    placeholder="Enter Twitter Link" value="{{$links->twitter??''}}">
                                @error('twitter')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="google">Google +</label>
                                <input type="text" name="google" class="form-control" id="google"
                                    placeholder="Enter Google plus link" value="{{$links->google??''}}">
                                @error('google')
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
