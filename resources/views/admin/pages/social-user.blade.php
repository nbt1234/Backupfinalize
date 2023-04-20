
@extends('admin/index')

@section('title','Social User')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Social User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/edit-social-user')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Social User</li>
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
                        <!-- form start -->
                        <form role="form" method="post" action="{{url('finalize-site-admin/edit-social-user')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                              <div class="form-group">
                                    <label for="heading">Facebook Url</label>
                                    <input type="text" class="form-control" name="facebook_url" placeholder="Enter Facebook Url"
                                        value="{{$result[0]->facebook_url}}">
                                    @error('facebook_url')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="heading">Twitter Url</label>
                                    <input type="text" class="form-control" name="twitter_url" placeholder="Enter Twitter Url"
                                        value="{{$result[0]->twitter_url}}">
                                    @error('twitter_url')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                              
                                <div class="form-group">
                                    <label for="heading">Linkedin Url</label>
                                    <input type="text" class="form-control" name="linkedin_url" placeholder="Enter Linkedin Url"
                                        value="{{$result[0]->linkedin_url}}">
                                    @error('linkedin_url')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="heading">Instagram Url</label>
                                    <input type="text" class="form-control" name="instagram_url" placeholder="Enter Instagram Url"
                                        value="{{$result[0]->instagram_url}}">
                                    @error('instagram_url')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="heading">Telegram Url</label>
                                    <input type="text" class="form-control" name="telegram_url" placeholder="Enter Telegram  Url"
                                        value="{{$result[0]->telegram_url}}">
                                    @error('telegram_url')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status" checked
                                            id="active_status" value="0">
                                        <label for="active_status" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status" 
                                            id="inactive_status" value="1">
                                        <label for="inactive_status" class="custom-control-label">Inactive</label>
                                    </div>
                                    @error('status')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>

                </div>
            </div>
        </div>
        

                    <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
    </section>
                 
</div>
@stop
