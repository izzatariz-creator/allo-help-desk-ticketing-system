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
                            <a href="{{ route('ticket.create') }}" style="float: right;"
                                class="btn btn-rounded btn-success mb-5"> Add Ticket</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="text-center">Ticket Reference</th>
                                            <th width="15%">Ticket Submitter</th>
                                            <th>Ticket Title</th>
                                            <th width="10%" class="text-center">Category</th>
                                            <th width="5%" class="text-center">Priority</th>
                                            <th width="5%" class="text-center">Status</th>
                                            <th width="10%" class="text-center">RSP</th>
                                            <th width="10%" class="text-center">Date Created</th>
                                            <th width="8%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $ticket)
                                        <tr>
                                            {{-- <td class="text-center">{{ $key+1 }}</td> --}}
                                            <td class="text-center">{{ $ticket->ticket_ref }}</td>
                                            <td>{{ $ticket['user']['name'] }}</td>
                                            <td>{{ $ticket->title }}</td>
                                            <td class="text-center">{{ $ticket['category']['name'] }}</td>
                                            <td class="text-center">
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
                                            <td class="text-center">
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
                                            <td class="text-center">{{ $ticket['retail_service_provider']['name'] }}
                                            </td>
                                            <td class="text-center">
                                                {{ $ticket->created_at->format('d-m-Y H:i:s') }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('ticket.view.detail',$ticket->id) }}"
                                                    class="btn btn-success btn-block btn-small">View</a>
                                                @if ($ticket->status!="Closed")
                                                    @if ($ticket->technician===NULL)
                                                        <a href="{{ route('ticket.edit',$ticket->id) }}"
                                                            class="btn btn-info btn-block btn-small">Edit</a>
                                                    @endif
                                                @endif
                                                <a href="{{ route('ticket.delete',$ticket->id) }}" id="delete"
                                                    class="btn btn-danger btn-block btn-small">Delete</a>
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