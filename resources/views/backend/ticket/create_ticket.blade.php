@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Create Ticket</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-file"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage Ticket</li>
                                <li class="breadcrumb-item active" aria-current="page">Create Ticket</li>
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
                    <h4 class="box-title">Create Ticket</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{route('ticket.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">


                                        <div class="row">
                                            <!-- Start Row -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Title of Ticket <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="title" class="form-control" required="" placeholder="Ticket Title">
                                                        @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Ticket Category <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" required="" class="form-control">
															<option value="" selected="" disabled="">Select Ticket Category</option>
															@foreach($categoryData as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                                    <h5>Problem Description <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="description" id="description" class="form-control" required="" placeholder="Problem Description" aria-invalid="true" rows="5"></textarea>
                                                        @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5 style="padding-top: 15px;">Priority <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="priority" required="" class="form-control">
															<option value="" selected="" disabled="">Select Priority</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
														</select>
                                                        @error('priority')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Retail Service Provider <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="rsp_id" required="" class="form-control">
															<option value="" selected="" disabled="">Select Retail Service Provider</option>
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
                                                    <h5>Modem <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="modem_id" required="" class="form-control">
															<option value="" selected="" disabled="">Select Modem</option>
															@foreach($modemData as $modem)
															<option value="{{ $modem->id }}" {{ ($editData->modem_id ==
																$modem->id) ? "selected" :"" }} >{{ $modem->name }}</option>
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
                                                    <h5>Router <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="router_id" required="" class="form-control">
															<option value="" selected="" disabled="">Select Router</option>
															@foreach($routerData as $router)
															<option value="{{ $router->id }}" {{ ($editData->router_id ==
																$router->id) ? "selected" :"" }} >{{ $router->name }}</option>
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
                                                    <h5>Address <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="address" class="form-control" placeholder="Installation Address" required="" value="{{ $editData->address }}"">
                                                        @error('address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->
                                        </div> <!-- End Row -->



                                        <div class="text-xs-right" style="padding-top: 10px;">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                                            <input type="reset" class="btn btn-rounded btn-info mb-5" value="Reset">
                                        </div>
                            </form>

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