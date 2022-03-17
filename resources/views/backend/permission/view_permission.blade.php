@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">View Permission</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-security"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage Role & Perms</li>
                                <li class="breadcrumb-item active" aria-current="page">View Permission</li>
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
                            <h3 class="box-title">View Permission</h3>
                            <a href="{{ route('permission.add') }}" style="float: right;"
                                class="btn btn-rounded btn-success mb-5"> Add Permission</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th>Name</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $key => $permission)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                {{-- Edit Button, Pass User ID --}}
                                                <a href="{{ route('permission.edit', $permission->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                {{-- Delete Button, Pass User ID --}}
                                                <a href="" class="btn btn-danger"
                                                    id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
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
<!-- /.content-wrapper -->

@endsection