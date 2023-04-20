@extends('admin/index')

@section('title','TOURNAMENT')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tournament</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tournament</li>
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
                      <a href="{{url('finalize-site-admin/add-tournament')}}"><button type="button" class="btn btn-primary">Add Tournament</button></a>
                  </div>
                  <div class="card-body">
                    <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Tournament Name</th>
                                <th>Tournament Date</th>
                                <th>Players</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result as $single_info)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{$single_info->tournament_name}}</td>
                                <td>{{$single_info->tournament_date}}</td>
                                <td>{{$single_info->players}}</td>
                                <td>{{$single_info->amount}}</td>
                                <td>@if($single_info->status == 0)
                                    <a class="text-success" onclick="confirm_box_status('inactive',{{$single_info->id}},'finalize-site-admin/faq-status-change',this,'FAQ')"><strong>Active</strong></a>
                                    @else
                                    <a class="text-danger" onclick="confirm_box_status('active',{{$single_info->id}},'finalize-site-admin/faq-status-change',this,'FAQ')"><strong>Inactive</strong></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('finalize-site-admin/edit-tournament/'.$single_info->id)}}" target="_blank"><button type="button" class="btn btn-block bg-gradient-primary btn-xs">Edit</button></a>
                                    <a onclick="confirm_box_delete('{{$single_info->id}}','finalize-site-admin/tournament-delete')"><button type="button" class="mt-2 btn btn-block bg-gradient-danger btn-xs">Delete</button></a>
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
