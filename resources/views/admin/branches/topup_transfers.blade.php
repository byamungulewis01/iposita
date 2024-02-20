@extends('layouts.master')
@section("title","Branch Topups Transfer")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Branch Top-Ups Transfer</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Branch Top-ups Transfer</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--end::Toolbar-->
        </div>
    </div>
@stop
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            @include('partial._alerts')
            <div class="card card-custom gutter-b">
                <div class="flex-wrap card-header">
                    <div class="card-title">
                        <h3 class="kt-portlet__head-title">
                            Branch Transfers history
                        </h3>
                    </div>
                    <!--end::Dropdown-->

                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="topup_transfers_table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>From Service Provider</th>
                                <th>From Service</th>
                                <th>Amount</th>
                                <th>To Service Provider</th>
                                <th>To Service</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($topup_transfers as $topup_transfer)
                                <tr>
                                    <td>{{$topup_transfer->id}}</td>
                                    <td>{{$topup_transfer->from_service_provider->name}}</td>
                                    <td>{{$topup_transfer->from_service->name}}</td>
                                    <td>{{$topup_transfer->amount}}</td>
                                    <td>{{$topup_transfer->to_service_provider->name}}</td>
                                    <td>{{$topup_transfer->to_service->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

@stop

@section('scripts')
            <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
            {!! JsValidator::formRequest(App\Http\Requests\ValidateTopupTransfer::class,'#transfer-form') !!}
            <script>
                $('.nav-balances').addClass('menu-item-active  menu-item-open');
                $('.nav-transfer-histories').addClass('menu-item-active');
                $('#topup_transfers_table').DataTable({
                    // responsive: true,
                    // paging: false,
                    // searching: false,
                    // info: false,
                    columnDefs: [
                        {
                            targets: [0, 1, 2, 3],
                            className: 'text-center'
                        }
                    ]
                });
            </script>

@endsection
