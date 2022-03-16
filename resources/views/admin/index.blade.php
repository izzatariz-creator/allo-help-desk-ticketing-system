@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row justify-content-center">

                <!-- Ticket Counter -->

                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up hov-rs">
                        @php
                        $openticket = DB::table('tickets')->where('status',"Open");
                        @endphp
                        <div class="box-body text-center">
                            <div class="icon bg-success rounded w-60 h-60 mx-auto">
                                <i class="text-light mr-0 font-size-24 mdi mdi-ticket-confirmation"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Open Ticket(s)</p>
                                <h3 class="text-dark mb-0 font-weight-500">{{ $openticket->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up hov-rs">
                        @php
                        $pendingticket = DB::table('tickets')->where('status',"Pending");
                        @endphp
                        <div class="box-body text-center">
                            <div class="icon bg-primary rounded w-60 h-60 mx-auto">
                                <i class="text-light mr-0 font-size-24 mdi mdi-ticket-confirmation"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Pending Ticket(s)</p>
                                <h3 class="text-dark mb-0 font-weight-500">{{ $pendingticket->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up hov-rs">
                        @php
                        $onholdticket = DB::table('tickets')->where('status',"On Hold");
                        @endphp
                        <div class="box-body text-center">
                            <div class="icon bg-info rounded w-60 h-60 mx-auto">
                                <i class="text-light mr-0 font-size-24 mdi mdi-ticket-confirmation"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">On Hold Ticket(s)</p>
                                <h3 class="text-dark mb-0 font-weight-500">{{ $onholdticket->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up hov-rs">
                        @php
                        $solvedticket = DB::table('tickets')->where('status',"Solved");
                        @endphp
                        <div class="box-body text-center">
                            <div class="icon bg-warning rounded w-60 h-60 mx-auto">
                                <i class="text-dark mr-0 font-size-24 mdi mdi-ticket-confirmation"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Solved Ticket(s)</p>
                                <h3 class="text-dark mb-0 font-weight-500">{{ $solvedticket->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up hov-rs">
                        @php
                        $closedticket = DB::table('tickets')->where('status',"Closed");
                        @endphp
                        <div class="box-body text-center">
                            <div class="icon bg-danger rounded w-60 h-60 mx-auto">
                                <i class="text-light mr-0 font-size-24 mdi mdi-ticket-confirmation"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Closed Ticket(s)</p>
                                <h3 class="text-dark mb-0 font-weight-500">{{ $closedticket->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Graf Pertama --}}

                

            </div>
        </section>
        <!-- /.content -->
    </div>
</div>

@endsection