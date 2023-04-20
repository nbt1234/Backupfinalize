@extends('admin/index')

@section('title','ATTRIBUTE-VALUES')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attributes Values</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Attribute-value</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Attribute Value</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" method="post" action="{{url('finalize-site-admin/attribute-value-add')}}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Attributes</label>
                                <div class="select2-primary">
                                    <select class="select2" id="attr_id" name="attr_id"
                                        data-placeholder="Select category" style="width:100%;">
                                        <option>Select Attribute</option>
                                        @foreach ($all_attr as $key => $attr)
                                        <option value={{ $attr->id }}>
                                            {{ $attr->attr_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('attr_id')
                                <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="attr_value">Attribute values</label>
                                <input type="text" name="attr_value" class="form-control" id="attr_value"
                                    placeholder="Enter attr value seperate by (,)" value="{{old('attr_value')}}">
                                @error('attr_value')
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Attributes Value</h3>
                    </div>
                    <div class="card-body">
                        <table id="data-table" class="table table-hover table-bordered table-striped el-table">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Attributes</th>
                                    <th>values</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_info as $single_info)
                                <tr>
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$single_info['attr_name']}}</td>
                                    <td>{{$single_info['attr_value']}}</td>
                                    <td>
                                        <a href="{{url('finalize-site-admin/attribute-value-edit/'.$single_info['id'])}}"
                                            target="_blank">
                                            <button type="button" class="btn btn-block bg-gradient-primary btn-xs">Edit</button>
                                        </a>
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
