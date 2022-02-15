@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">View Modem</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-wifi"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage Modem</li>
                                <li class="breadcrumb-item active" aria-current="page">View Modem</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Modem List</h3>
                            <a href="{{ route('modem.add') }}" style="float: right;"
                                class="btn btn-rounded btn-success mb-5"> Add Modem</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th width="25%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $modem )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td> {{ $modem->brand }}</td>
                                            <td> {{ $modem->model }}</td>
                                            <td>
                                                <a href="{{ route('modem.edit',$modem->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href=""
                                                    class="btn btn-danger" id="delete">Delete</a>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>

@endsection