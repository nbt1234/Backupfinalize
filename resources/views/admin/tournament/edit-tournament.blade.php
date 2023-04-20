
@extends('admin/index')

@section('title','TOURNAMENT')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>TOURNAMENT</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/edit-tournament')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Tournament</li>
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
                        <form role="form" method="post" action="{{url('finalize-site-admin/edit-tournament-page/'.$result[0]->id)}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                
                                <div class="form-group">
                                    <label for="heading">Tournament Name:</label>
                                    <input type="text" class="form-control" name="tournament_name" placeholder="Enter Tournament Name"
                                        value="{{$result[0]->tournament_name}}">
                                    @error('tournament_name')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="heading">Tournament Date:</label>
                                    <input type="date" class="form-control" name="tournament_date" placeholder="Enter Tournament Date"
                                        value="{{$result[0]->tournament_date}}">
                                    @error('tournament_date')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="heading">Tournament Time:</label>
                                    <input type="time" class="form-control" name="tournament_time" placeholder="Enter Tournament Time"
                                        value="{{$result[0]->tournament_time}}">
                                    @error('tournament_time')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="heading">Registration Start Date:</label>
                                    <input type="date" class="form-control" name="registration_start_date" placeholder="Registration Start Date"
                                        value="{{$result[0]->registration_start_date}}">
                                    @error('registration_start_date')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="heading">Registration End Date:</label>
                                    <input type="date" class="form-control" name="registration_end_date" placeholder="Enter Registration End Date"
                                        value="{{$result[0]->registration_end_date}}">
                                    @error('registration_end_date')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="heading">No Of Players:</label>
                                    <input type="text" class="form-control" name="players" placeholder="Enter No Of Players"
                                        value="{{$result[0]->players}}">
                                    @error('players')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="heading">Amount:</label>
                                    <input type="text" class="form-control" name="amount" placeholder="Enter price"
                                        value="{{$result[0]->amount}}">
                                    @error('amount')
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
