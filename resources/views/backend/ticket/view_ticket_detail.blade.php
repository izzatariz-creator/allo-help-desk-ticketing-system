@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Ticket Detail</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-file"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage Ticket</li>
                                <li class="breadcrumb-item active" aria-current="page">Ticket Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Ticket Detail</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <!-- Start Row -->


                                            <div class="controls">
                                                <input type="text" name="ticket_id" class="form-control" hidden
                                                    tabindex="-1" aria-hidden="true" value="{{ $editData->id }}">
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Ticket Reference</h5>
                                                    <div class="controls">
                                                        <input type="text" name="ticket_ref" class="form-control"
                                                            disabled="" tabindex="-1" aria-hidden="true"
                                                            value="{{ $editData->ticket_ref }}">
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Ticket Submitter</h5>
                                                    <div class="controls">
                                                        <input type="text" name="user_id" class="form-control"
                                                            disabled="" tabindex="-1" aria-hidden="true"
                                                            value="{{ $editData['user']['name'] }}">
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->


                                        </div> <!-- End Row -->


                                        <div class="row">
                                            <!-- Start Row -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Title of Ticket</h5>
                                                    <div class="controls">
                                                        <input type="text" name="title" class="form-control" disabled=""
                                                            tabindex="-1" aria-hidden="true"
                                                            value="{{ $editData->title }}">
                                                        @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Ticket Category</h5>
                                                    <div class="controls">
                                                        <select name="category_id" disabled="" tabindex="-1"
                                                            aria-hidden="true" class="form-control">
                                                            <option value="" selected="" disabled="">Select Ticket
                                                                Category</option>
                                                            @foreach($categoryData as $category)
                                                            <option value="{{ $category->id }}" {{ ($editData->
                                                                category_id ==
                                                                $category->id) ? "selected" :"" }} >{{ $category->name
                                                                }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- End Col Md-6 -->


                                        </div> <!-- End Row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Problem Description</h5>
                                                    <div class="controls">
                                                        <textarea name="description" id="description"
                                                            class="form-control" disabled="" tabindex="-1"
                                                            aria-hidden="true" placeholder="Problem Description"
                                                            aria-invalid="true"
                                                            rows="5">{{ $editData->description }}</textarea>
                                                        @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5 style="padding-top: 15px;">Priority</h5>
                                                    <div class="controls">
                                                        <select name="priority" disabled="" tabindex="-1"
                                                            aria-hidden="true" class="form-control">
                                                            <option value="" selected="" disabled="">Select Priority
                                                            </option>
                                                            <option value="Low" {{ ($editData->priority ==
                                                                "Low") ? "selected" :"" }}>Low</option>
                                                            <option value="Normal" {{ ($editData->priority ==
                                                                "Normal") ? "selected" :"" }}>Normal</option>
                                                            <option value="High" {{ ($editData->priority ==
                                                                "High") ? "selected" :"" }}>High</option>
                                                        </select>
                                                        @error('priority')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Retail Service Provider</h5>
                                                    <div class="controls">
                                                        <select name="rsp_id" disabled="" tabindex="-1"
                                                            aria-hidden="true" class="form-control">
                                                            @foreach($rspData as $rsp)
                                                            <option value="{{ $rsp->id }}" {{ ($editData->rsp_id ==
                                                                $rsp->id) ? "selected" :"" }} >{{ $rsp->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('rsp_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- End Col Md-6 -->
                                        </div> <!-- End Row -->

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Modem</h5>
                                                    <div class="controls">
                                                        <select name="modem_id" disabled="" tabindex="-1"
                                                            aria-hidden="true" class="form-control">
                                                            <option value="" selected="" disabled="">Select Modem
                                                            </option>
                                                            @foreach($modemData as $modem)
                                                            <option value="{{ $modem->id }}" {{ ($editData->modem_id ==
                                                                $modem->id) ? "selected" :"" }} >{{ $modem->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('modem_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Router</h5>
                                                    <div class="controls">
                                                        <select name="router_id" disabled="" tabindex="-1"
                                                            aria-hidden="true" class="form-control">
                                                            <option value="" selected="" disabled="">Select Router
                                                            </option>
                                                            @foreach($routerData as $router)
                                                            <option value="{{ $router->id }}" {{ ($editData->router_id
                                                                ==
                                                                $router->id) ? "selected" :"" }} >{{ $router->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('router_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->

                                        </div> <!-- End Row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Address</h5>
                                                    <div class="controls">
                                                        <input type="text" name="address" class="form-control"
                                                            disabled="" tabindex="-1" aria-hidden="true"
                                                            value="{{ $editData->address }}"">
                                                        @error('address')
                                                        <span class=" text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->


                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Assigned Technician</h5>
                                                    <div class="controls">
                                                        <select name="technician_id" disabled="" tabindex="-1"
                                                            aria-hidden="true" class="form-control">
                                                            <option value="" selected="" disabled="">Select Technician
                                                            </option>
                                                            @foreach($techData as $tech)
                                                            <option value="{{ $tech->id }}" {{ ($editData->technician_id
                                                                ==
                                                                $tech->id) ? "selected" :"" }} >{{ $tech->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->

                                        </div> <!-- End Row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Status</h5>
                                                    <div class="controls">
                                                        <select name="status" disabled="" tabindex="-1"
                                                            aria-hidden="true" class="form-control">
                                                            <option value="" selected="" disabled="">Select Status
                                                            </option>
                                                            <option value="Open" {{ ($editData->status ==
                                                                "Open") ? "selected" :"" }}>Open</option>
                                                            <option value="Pending" {{ ($editData->status ==
                                                                "Pending") ? "selected" :"" }}>Pending</option>
                                                            <option value="On Hold" {{ ($editData->status ==
                                                                "On Hold") ? "selected" :"" }}>On Hold</option>
                                                            <option value="Solved" {{ ($editData->status ==
                                                                "On Hold") ? "selected" :"" }}>Solved</option>
                                                            <option value="Closed" {{ ($editData->status ==
                                                                "Closed") ? "selected" :"" }}>Closed</option>
                                                        </select>
                                                        @error('priority')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->

                                        </div> <!-- End Row -->

                                    </form>

                                        <div class="text-xs-right" style="padding-top: 10px;">
                                            <a href="{{ route('ticket.edit',$editData->id) }}"
                                                class="btn btn-rounded btn-info mb-5">Edit</a>
                                            <a href="{{ route('ticket.detail.pdf',$editData->id) }}"
                                                class="btn btn-rounded btn-primary mb-5">PDF</a>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-rounded btn-danger mb-5" data-toggle="modal"
                                                data-target="#exampleModalCenter">
                                                Close Ticket
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Close Ticket</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form method="POST" action="{{ route('ticket.close',$editData->id) }}">
                                                            @csrf
                                                        <div class="modal-body">
                                                            <div class="box-body">
                                                                <div class="row">
                                                                    <div class="col">
                                
                                                                            <div class="row">
                                                                                <div class="col-12">
                                            
                                                                                    <div class="form-group">
                                                                                        <h5>Closing Ticket Remarks <span class="text-danger">*</span></h5>
                                                                                        <div class="controls">
                                                                                            <textarea name="remark" class="form-control" required="" placeholder="Closing Ticket Remarks" aria-invalid="true" rows="5"></textarea>
                                                                                            @error('remark')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                    </div>
                                                                    <!-- /.col -->
                                                                </div>
                                                                <!-- /.row -->
                                                            </div>
                                                            <!-- /.box-body -->
                                                        </div>

                                                        <div class="modal-footer">
                                                                <div class="text-xs-right">
                                                                    <input type="submit" class="btn btn-rounded btn-danger mb-5" value="Close Ticket">
                                                                    <button type="button" class="btn btn-rounded btn-info mb-5" data-dismiss="modal">Cancel</button>
                                                                </div>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>

    </div>
</div>
<!-- /.content-wrapper -->

@endsection