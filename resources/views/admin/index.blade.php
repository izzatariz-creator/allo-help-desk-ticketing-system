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

                        <a href="{{ route('ticket.view.open') }}">
                            <div class="box-body text-center">
                                <div class="icon bg-success rounded w-60 h-60 mx-auto">
                                    <i class="text-light mr-0 font-size-24 mdi mdi-ticket-confirmation"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Open Ticket(s)</p>
                                    <h3 class="text-dark mb-0 font-weight-500">{{ $openticket->count() }}</h3>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up hov-rs">
                        @php
                        $pendingticket = DB::table('tickets')->where('status',"Pending");
                        @endphp

                        <a href="{{ route('ticket.view.pending') }}">
                            <div class="box-body text-center">
                                <div class="icon bg-primary rounded w-60 h-60 mx-auto">
                                    <i class="text-light mr-0 font-size-24 mdi mdi-ticket-confirmation"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Pending Ticket(s)</p>
                                    <h3 class="text-dark mb-0 font-weight-500">{{ $pendingticket->count() }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up hov-rs">
                        @php
                        $onholdticket = DB::table('tickets')->where('status',"On Hold");
                        @endphp

                        <a href="{{ route('ticket.view.onhold') }}">
                            <div class="box-body text-center">
                                <div class="icon bg-info rounded w-60 h-60 mx-auto">
                                    <i class="text-light mr-0 font-size-24 mdi mdi-ticket-confirmation"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">On Hold Ticket(s)</p>
                                    <h3 class="text-dark mb-0 font-weight-500">{{ $onholdticket->count() }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up hov-rs">
                        @php
                        $solvedticket = DB::table('tickets')->where('status',"Solved");
                        @endphp

                        <a href="{{ route('ticket.view.solved') }}">
                            <div class="box-body text-center">
                                <div class="icon bg-warning rounded w-60 h-60 mx-auto">
                                    <i class="text-dark mr-0 font-size-24 mdi mdi-ticket-confirmation"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Solved Ticket(s)</p>
                                    <h3 class="text-dark mb-0 font-weight-500">{{ $solvedticket->count() }}</h3>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up hov-rs">
                        @php
                        $closedticket = DB::table('tickets')->where('status',"Closed");
                        @endphp

                        <a href="{{ route('ticket.view.closed') }}">
                            <div class="box-body text-center">
                                <div class="icon bg-danger rounded w-60 h-60 mx-auto">
                                    <i class="text-light mr-0 font-size-24 mdi mdi-ticket-confirmation"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Closed Ticket(s)</p>
                                    <h3 class="text-dark mb-0 font-weight-500">{{ $closedticket->count() }}</h3>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                {{-- Graf Pertama --}}

                {{-- <div class="col-xl-6 col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">
                                Earning Summary
                            </h4>
                        </div>
                        <div class="box-body py-0">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="box no-shadow mb-0">
                                        <div class="box-body px-0">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div>
                                                    <div id="chart41"></div>
                                                </div>
                                                <div>
                                                    <h5>Top Order</h5>
                                                    <h4 class="text-dark my-0 font-weight-500">$39k</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="box no-shadow mb-0">
                                        <div class="box-body px-0">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div>
                                                    <div id="chart42"></div>
                                                </div>
                                                <div>
                                                    <h5>Average Order</h5>
                                                    <h4 class="text-dark my-0 font-weight-500">$24k</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="charts_widget_43_chart"></div>
                        </div>
                    </div>
                </div> --}}
                

                {{-- Graph Kedua --}}

                {{-- <div class="col-xl-6 col-12">
                    <div class="box bg-info bg-img"
                        style="background-image: url({{ asset('backend/images/gallery/bg-1.png') }})">
                        <div class="box-body text-center">
                            <img src="{{ asset('backend/images/trophy.png') }}" class="mt-50" alt="" />
                            <div class="max-w-500 mx-auto">
                                <h2 class="text-white mb-20 font-weight-500">Best Employee Johen,</h2>
                                <p class="text-white-50 mb-10 font-size-20">You've got 50.5% more sales today.
                                    You've reached 8th milestone, checkout author section</p>
                            </div>
                        </div>
                    </div> --}}

            
                    {{-- Graph Ketiga --}}

                    {{-- <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="box overflow-hidden">
                                <div class="box-body pb-0">
                                    <div>
                                        <h2 class="text-dark mb-0 font-weight-500">18.8k</h2>
                                        <p class="text-mute mb-0 font-size-20">Total users</p>
                                    </div>
                                </div>
                                <div class="box-body p-0">
                                    <div id="revenue1"></div>
                                </div>
                            </div>
                        </div> --}}
                        
                        {{-- Graph Keempat --}}

                        {{-- <div class="col-lg-6 col-12">
                            <div class="box overflow-hidden">
                                <div class="box-body pb-0">
                                    <div>
                                        <h2 class="text-dark mb-0 font-weight-500">35.8k</h2>
                                        <p class="text-mute mb-0 font-size-20">Average reach per post</p>
                                    </div>
                                </div>
                                <div class="box-body p-0">
                                    <div id="revenue2"></div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
</div>

@endsection