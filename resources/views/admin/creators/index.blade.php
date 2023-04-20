@extends('admin/index')

@section('title','Content Creators')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Content Creators</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Content creators</li>
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
                      <a href="{{url('finalize-site-admin/creators-content-page')}}"><button type="button" class="btn btn-primary">Add Content</button></a>
                  </div>
                  <div class="card-body">
                    <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_info as $single_info)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{$single_info->title}}</td>
                                <td>{{$single_info->sub_title}}</td>
                                <td>@if($single_info->status == 0)
                                    <a class="text-success" onclick="confirm_box_status('inactive',{{$single_info->id}},'finalize-site-admin/coupon-change',this,'Coupon')"><strong>Active</strong></a>
                                    @else
                                    <a class="text-danger" onclick="confirm_box_status('active',{{$single_info->id}},'finalize-site-admin/coupon-change',this,'Coupon')"><strong>Inactive</strong></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('finalize-site-admin/creators-edit/'.$single_info->id)}}" target="_blank"><button type="button" class="btn btn-block bg-gradient-primary btn-xs">Edit</button></a>
                                    <a onclick="confirm_box_delete('{{$single_info->id}}','finalize-site-admin/creators-delete')"><button type="button" class="mt-2 btn btn-block bg-gradient-danger btn-xs">Delete</button></a>
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
