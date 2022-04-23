<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">

    <title>Allo Help Desk Ticketing System</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/2.0.0/css/searchPanes.dataTables.min.css">

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        <!-- Header -->
        @include('admin.body.header')
        <!-- /.Header -->

        <!-- Sidebar -->
        @include('admin.body.sidebar')
        <!-- /.Sidebar -->

        <!-- Main Content -->
        @yield('admin')
        <!-- /.Main Content -->

        <!-- Footer -->
        @include('admin.body.footer')
        <!-- Footer -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
    <script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>

    {{-- DataTable JS --}}
    <script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('backend/js/pages/data-table.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/2.0.0/js/dataTables.searchPanes.min.js"></script>

    <!-- Sunny Admin App -->
    <script src="{{ asset('backend/js/template.js') }}"></script>
    <script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('backend/js/pages/widget-charts2.js') }}"></script>
    <script src="{{asset('../assets/vendor_components/chart.js-master/Chart.min.js')}}"></script>

    <!-- Toaster JS & Script -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;
    
        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;
    
        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break; 
        }
        @endif 
    </script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
        $(function(){
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            var link = $(this).attr("href");
                        Swal.fire({
                        title: 'Are you sure?',
                        text: "Delete This Data?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        }
                        }) 
        });
        });  
    </script>

<script type="text/javascript">
    $('#myTable').DataTable( {
        "order": [[ 7, "desc" ]],
        searchPanes: {
            viewTotal: true
        },
    dom: 'Pfrtip',
    columnDefs: [
            {
                searchPanes: {
                    show: true
                },
                targets: [3,4,5,6]
            },
        ]
} );
</script>

</body>

</html>