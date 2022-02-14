@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">My Profile</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-account-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage Profile</li>
                                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
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

                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-white">
                            <h3 class="widget-user-username" style="text-align: center">{{ $user->name }}</h3>

                            <a href="{{ route('profile.edit') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Edit Profile</a>

                        </div>

                        <div class="widget-user-image">
                            <img class="rounded-circle"
                                src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }} "
                                alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Email Address</h5>
                                        <span class="description-text">{{ $user->email }}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 br-1 bl-1">
                                    <div class="description-block">
                                        <h5 class="description-header">Contact Number</h5>
                                        <span class="description-text">{{ $user->contact_number }}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Address</h5>
                                        <span class="description-text">{{ $user->address }}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="box">
                <div class="box-body box-profile">
                    <div class="row">
                        <div class="col-12">
                            <a href="" style="float: right;" class="btn btn-rounded btn-success mb-5"> Edit Equipment</a>
                            <h4 class="description-header">Equipment Details</h4> 
                            <br>
                            <hr style="width:100%;text-align:left;margin-left:0"> 
                            <div>
                                <p>PLACEHOLDER #1:<span class="text-gray pl-10">DATA #1</span> </p>
                                <p>PLACEHOLDER #2:<span class="text-gray pl-10">DATA #2</span></p>
                                <p>PLACEHOLDER #3:<span class="text-gray pl-10">DATA #3</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>


        </section>
        <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->

@endsection