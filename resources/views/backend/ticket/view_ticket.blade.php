@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">View Ticket</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-file"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage Ticket</li>
                                <li class="breadcrumb-item active" aria-current="page">View Ticket</li>
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
                            <h3 class="box-title">Ticket List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="tablebaru" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ticket Reference</th>
                                            <th>Ticket Title</th>
                                            <th>Category</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                            <th>RSP</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $ticket)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $ticket->ticket_ref }}</td>
                                            <td>{{ $ticket->title }}</td>
                                            <td>{{ $ticket->category }}</td>
                                            <td>{{ $ticket->priority }}</td>
                                            <td>{{ $ticket->status }}</td>
                                            <td>{{ $ticket->rsp_id }}</td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Category</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                            <th>RSP</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>

@endsection