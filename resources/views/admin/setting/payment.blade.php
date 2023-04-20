@extends('admin/index')

@section('title','TEMPLATE')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payment setting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Payments</li>
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
                            <h3 class="card-title">Paypal Settings</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{url('finalize-site-admin/setting-paypal-edit')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form_group">
                                    <label for="paypal_mode" class="d-block">Paypal Mode</label>
                                    <input type="checkbox" class="form-control" data-bootstrap-switch
                                        data-off-color="danger" id="paypal_mode" name="paypal_mode"
                                         @if(!$paypal->status) checked @endif >
                                </div>

                                <div class="form-group">
                                    <label for="paypal_client_id">Client ID</label>
                                    <input type="text" name="paypal_client_id" class="form-control"
                                        id="paypal_client_id" placeholder="Enter client id"
                                        value="{{$paypal->details['paypal_client_id'] }}">
                                    @error('paypal_client_id')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="paypal_secret_id">Secret ID</label>
                                    <input type="text" name="paypal_secret_id" class="form-control"
                                        id="paypal_secret_id" placeholder="Enter secret id"
                                        value="{{$paypal->details['paypal_secret_id']}}">
                                    @error('paypal_secret_id')
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
    </section>
</div>
@stop
