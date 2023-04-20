@extends('admin/index')

@section('title','PAYMENT HISTORY')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payment History</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Payment History</li>
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
                   
                  <div class="card-body">
                    <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Payment ID</th>
                                <th>Razarpay ID</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result as $single_info)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{$single_info->name}}</td>
                                <td>{{$single_info->payment_id}}</td>
                                <td>{{$single_info->razarpay_id}}</td>
                                <td>{{$single_info->amount}}</td>
                                <td>@if($single_info->status == 0)
                                    <a class="text-success" onclick="confirm_box_status('inactive',{{$single_info->id}},'finalize-site-admin/faq-status-change',this,'FAQ')"><strong>Active</strong></a>
                                    @else
                                    <a class="text-danger" onclick="confirm_box_status('active',{{$single_info->id}},'finalize-site-admin/faq-status-change',this,'FAQ')"><strong>Inactive</strong></a>
                                    @endif
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
