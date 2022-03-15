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
                            <a href="{{ route('ticket.create') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Ticket</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="tablebaru" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="2%">No</th>
                                            <th width="5%">Ticket Reference</th>
                                            <th width="10%">Ticket Submitter</th>
                                            <th>Ticket Title</th>
                                            <th width="15%">Category</th>
                                            <th width="10%">Priority</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">RSP</th>
                                            <th width="14%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $ticket)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $ticket->ticket_ref }}</td>
                                            <td>{{ $ticket['user']['name'] }}</td>
                                            <td>{{ $ticket->title }}</td>
                                            <td>{{ $ticket['category']['name'] }}</td>
                                            <td>
                                                @if ($ticket->priority=="Low")
                                                <span class="badge rounded-pill bg-success">Low</span>
                                                @else
                                                @endif

                                                @if ($ticket->priority=="Normal")
                                                <span class="badge rounded-pill bg-warning text-dark">Normal</span>
                                                @else
                                                @endif

                                                @if ($ticket->priority=="High")
                                                <span class="badge rounded-pill bg-danger ">High</span>
                                                @else
                                                @endif
                                            </td>
                                            <td>
                                                @if ($ticket->status=="Open")
                                                <span class="badge bg-success">Open</span>
                                                @else
                                                @endif
                                                @if ($ticket->status=="Pending")
                                                <span class="badge bg-success">Pending</span>
                                                @else
                                                @endif
                                                @if ($ticket->status=="On Hold")
                                                <span class="badge bg-success">On Hold</span>
                                                @else
                                                @endif
                                                @if ($ticket->status=="Solved")
                                                <span class="badge bg-success">Solved</span>
                                                @else
                                                @endif
                                                @if ($ticket->status=="Closed")
                                                <span class="badge bg-success">Closed</span>
                                                @else
                                                @endif
                                            </td>
                                            <td>{{ $ticket['retail_service_provider']['name'] }}</td>
                                            <td>
                                                <a href="{{ route('ticket.view.detail',$ticket->id) }}" class="btn btn-success">View</a>
                                                <a href="{{ route('ticket.edit',$ticket->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ route('ticket.delete',$ticket->id) }}" id="delete" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        {{-- <tr>
                                            <th></th>
                                        </tr> --}}
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