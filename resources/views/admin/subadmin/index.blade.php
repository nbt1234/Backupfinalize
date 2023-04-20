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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <a href="{{url('finalize-site-admin/subadmin-page')}}"><button type="button" class="btn btn-primary">Add Subadmin</button></a>
                  </div>
                  <div class="card-body">
                    <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Avatar</th>
                                <th>Block Status</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subadmin as $single_info)
                                <tr>
                                    <td>{{$loop->iteration }}</td>
                                    <td>{!! $single_info->username !!}</td>
                                    <td>{{ $single_info->email }}</td>
                                    <td><img src="{{ url('public/admin-assets/img/avatar/' . $single_info->avatar)}}" class="sm-img"> </td>
                                    <td>@if($single_info->user_status == 0)
                                        <a class="text-success" onclick="confirm_box_status('inactive',{{$single_info->ID}},'finalize-site-admin/subadmin-status-change',this,'SUBADMIN')"><strong>Active</strong></a>
                                        @else
                                        <a class="text-danger" onclick="confirm_box_status('active',{{$single_info->ID}},'finalize-site-admin/subadmin-status-change',this,'Subadmin')"><strong>Inactive</strong></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a target="_blank" class="text-info" href="{{ url('finalize-site-admin/subadmin-access/'.$single_info->ID) }}"><strong>Access</strong></a>
                                    </td>
                                    <td>
                                        <a href="{{url('finalize-site-admin/subadmin-edit/'.$single_info->ID)}}" target="_blank"><button type="button" class="btn btn-block bg-gradient-primary btn-xs">Edit</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@stop
