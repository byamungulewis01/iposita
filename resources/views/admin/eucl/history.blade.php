@extends('layouts.master')
@section('title')
    EUCL Service
@stop
@section('navigation')
    <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Profile</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">User Profile</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->

            <!--end::Toolbar-->
        </div>
    </div>
@stop
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Notice-->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                            <thead>
                                <tr>
                                    <th>Transaction ID </th>
                                    <th>Opening balance</th>
                                    <th>Amount</th>
                                    <th>Meter number </th>
                                    <th>Total amount</th>
                                    <th>Total units</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Profile Personal Information-->
@endsection
@section('scripts')
    <script>
        $(function() {
            $.ajax({
                url: "{{ route('admin.eucl-service.historyApi') }}",
                method: "get",
                dataType: 'json',
                success: function(data) {

                    console.log(data);

                    $('#kt_datatable1').DataTable({
                        data: data,
                        processing: true,
                        columns: [{
                                data: 'p0',
                            },
                            {
                                data: 'p3',
                            },
                            {
                                data: 'p4',
                            },
                            {
                                data: 'p9',
                            },
                            {
                                data: 'p13',
                            },
                            {
                                data: 'p14',
                            }
                        ]
                    });
                }

            });
        });
    </script>
@endsection
