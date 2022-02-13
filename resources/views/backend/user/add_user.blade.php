@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Add User</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-account-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage User</li>
                                <li class="breadcrumb-item active" aria-current="page">Add User</li>
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
                    <h4 class="box-title">Add User</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('user.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">


                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>User Role <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="role" id="role" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Select Role
                                                            </option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="Technician">Technician</option>
                                                            <option value="User">End User</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Full Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" required="">
                                                    </div>

                                                </div>

                                            </div><!-- End Col Md-6 -->


                                        </div> <!-- End Row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"
                                                            required="">
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 -->

                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Password <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" name="password" class="form-control"
                                                            required="">
                                                    </div>
                                                </div>
                                            </div> <!-- End Col Md-6 --> --}}

                                            <div class="col-md-6">
                                            </div><!-- End Col Md-6 -->
                                        </div> <!-- End Row -->



                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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