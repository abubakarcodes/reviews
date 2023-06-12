<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/img/logo/favicon-32x32.png') }}" type="image/png" sizes="16x16">
    <title>{{ config('app.name') }}: Dashboard</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/pace-progress/themes/blue/pace-theme-minimal.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uploadfile.css') }}">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('backend.layouts.inc.navbar')

        @include('backend.layouts.inc.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper py-2">
            <div class="container-fluid py-2">
                @yield('content')
            </div>

        </div>

        @include('backend.layouts.inc.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <script src="{{ asset('admin/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/plugins/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/fileupload.js') }}"></script>
    <script>
        $(function() {
            $('#myDataTable').dataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'print'
                ],
            });

            $('.customSelect').select2({
                theme: 'bootstrap4'
            });
            $('.customSelect').select2({
                theme: 'bootstrap4'
            });
            $('.customSelect2').select2({
                theme: 'bootstrap4'
            });

            $('.customSelect2').select2({
                theme: 'bootstrap4'
            });
            $('.customSelect3').select2({
                theme: 'bootstrap4'
            });

            $('.customSelect3').select2({
                theme: 'bootstrap4'
            });


            $('.customSelect4').select2({
                theme: 'bootstrap4'
            });

            $('.customSelect4').select2({
                theme: 'bootstrap4'
            });


            ClassicEditor
                .create(document.querySelector('.textarea'))
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('.textarea2'))
                .catch(error => {
                    console.error(error);
                });

            //   //Date range picker
            //   $('#reservation').daterangepicker()
            //   //Date range picker with time picker
            //   $('#reservationtime').daterangepicker({
            //     timePicker: true,
            //     timePickerIncrement: 30,
            //     locale: {
            //       format: 'MM/DD/YYYY hh:mm A'
            //     }
            //   })
            //   //Date range as a button
            //   $('#daterange-btn').daterangepicker(
            //     {
            //       ranges   : {
            //         'Today'       : [moment(), moment()],
            //         'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            //         'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            //         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            //         'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            //         'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            //       },
            //       startDate: moment().subtract(29, 'days'),
            //       endDate  : moment()
            //     },
            //     function (start, end) {
            //       $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            //     }
            //   )

            //   //Timepicker
            //   $('#timepicker').datetimepicker({
            //     format: 'LT'
            //   })

            //   //Bootstrap Duallistbox
            //   $('.duallistbox').bootstrapDualListbox()

            //   //Colorpicker
            //   $('.my-colorpicker1').colorpicker()
            //   //color picker with addon
            //   $('.my-colorpicker2').colorpicker()

            //   $('.my-colorpicker2').on('colorpickerChange', function(event) {
            //     $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            //   });

            //   $("input[data-bootstrap-switch]").each(function(){
            //     $(this).bootstrapSwitch('state', $(this).prop('checked'));
            //   });
        });
    </script>
    @stack('scripts')
    <script src="{{ asset('admin/plugins/pace-progress/pace.min.js') }}"></script>
</body>

</html>
