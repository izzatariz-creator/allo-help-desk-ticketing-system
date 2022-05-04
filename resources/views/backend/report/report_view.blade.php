@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Report Generation</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-clipboard"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Report Generation</li>
                                <li class="breadcrumb-item active" aria-current="page">Generate Report</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">By Date </h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{ route('by.date') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Select Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" class="form-control" required="">
                                            @error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right pt-3">
                                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Generate">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>

                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">By Month </h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{ route('by.month') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Select Month <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="month" class="form-control">
                                                <option value="" disabled hidden selected>Select Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">Jun</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                            @error('month')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Select Year <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="year" class="form-control">
                                                <option value="" disabled hidden selected>Select Year</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                            </select>
                                            @error('year')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right pt-3">
                                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Generate">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>

                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">By Year </h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{ route('by.year') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Select Year <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="year" class="form-control">
                                                <option value="" disabled hidden selected>Select Year</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                            </select>
                                            @error('year')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right pt-3">
                                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Generate">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->

@endsection