@extends('admin/index')

@section('title','SUB CATEGORY')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sub Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Sub Category</li>
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
                      <a href="{{url('finalize-site-admin/sub-category-page')}}"><button type="button" class="btn btn-primary">Add Sub Category</button></a>
                  </div>
                  <div class="card-body">
                    <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_info as $single_info)
                                <tr>
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$single_info->subcate_name}}</td>
                                    <td>@if($single_info->status == 0)
                                        <a class="text-success" onclick="confirm_box_status('inactive',{{$single_info->subcat_id}},'finalize-site-admin/category-status-change',this,'Category')"><strong>Active</strong></a>
                                        @else
                                        <a class="text-danger" onclick="confirm_box_status('active',{{$single_info->subcat_id}},'finalize-site-admin/category-status-change',this,'Category')"><strong>Inactive</strong></a>
                                        @endif
                                    </td>
                                    <td>
                                    <a href="{{url('finalize-site-admin/category-edit/'.$single_info->sub_cate_slug)}}" target="_blank"><button type="button" class="btn btn-block bg-gradient-primary btn-xs">Edit</button></a>
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
