@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Role</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-security"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage Role & Perms</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
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
                    <h4 class="box-title">Edit Role</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('role.update.store', $role->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="form-group">
                                            <h5>Role Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $role->name }}">
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>

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

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Assign / Revoke Role</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row mb-4">
                        <div class="col">

                        <div class="p-1">
                            @if ($role->permissions)
                                @foreach ($role->permissions as $role_permission)
                                    <form class="px-1 py-2" method="POST"
                                        action="{{ route('role.permission.revoke', [$role->id, $role_permission->id]) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-warning text-dark" type="submit">{{ $role_permission->name }}</button>
                                    </form>
                                @endforeach
                            @endif
                        </div>

                        <span class="text-danger px-1 py-2">*</span>Click on the permission to revoke

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('role.permission.assign', $role->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="form-group">
                                            <h5>Permission</h5>
                                            <div class="controls">
                                                <select name="permission" class="form-control">
                                                    @foreach($permissions as $permission)
                                                    <option value="{{ $permission->name }}">{{ $permission->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Assign">
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