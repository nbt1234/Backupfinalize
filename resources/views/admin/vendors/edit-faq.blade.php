@extends('admin/index')

@section('title','FAQs')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>FAQs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">EDIT FAQ</li>
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
                            <h3 class="card-title">Edit FAQ</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{url('finalize-site-admin/faq-update/'.$faq_info->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="heading">Heading</label>
                                    <textarea class="textarea" name="heading"
                                    placeholder="heading">{{$faq_info->heading}}</textarea>
                                    @error('heading')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="textarea" name="description"
                                    placeholder="description">{{$faq_info->content}}</textarea>
                                    @error('description')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status"
                                        @if($faq_info->status == 0)
                                        checked
                                        @endif
                                        id="active_status" value="0">
                                        <label for="active_status" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status"
                                        @if($faq_info->status == 1)
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
