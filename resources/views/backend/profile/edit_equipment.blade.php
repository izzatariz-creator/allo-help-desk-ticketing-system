@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Equipment</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-account-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage Profile</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Equipment</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Header (Page header) -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Equipment</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('equipment.update')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">


                                        <div class="row">
                                            <div class="col-md-6">

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
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->

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
                                                    </div>
                                                </div>

                                            </div><!-- End Col Md-6 -->


                                        </div> <!-- End Row -->

                                        <div class="row">
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
                                                    </div>

                                                </div>

                                            </div> <!-- End Col Md-6 -->

                                            <div class="col-md-6">

                                            </div><!-- End Col Md-6 -->


                                        </div> <!-- End Row -->

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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

@endsection