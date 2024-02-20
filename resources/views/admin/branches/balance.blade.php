@extends('layouts.master')
@section("title","Branch Balance")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Branch Balance</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Branch Balance</a>
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
                            Branch Balance
                        </h3>
                    </div>

                    <div class="card-toolbar">
                        @can("Create Transaction")
                            <a href="javascript:void(0)" class="btn btn-primary"
                               data-toggle="modal"
                               data-target="#addModal" >
                                <i class="la la-plus"></i>
                                Make transfer
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="kt_table_1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Service Provider</th>
                                <th>Service</th>
                                <th>Amount(Rwf)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($balances as $balance)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{optional($balance->serviceProvider)->name ?? '-'}}</td>
                                    <td>{{optional($balance->service)->name ?? '-'}}</td>
                                    <td>{{number_format($balance->balance)}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

            <div  data-backdrop="static"  class="modal fade" id="addModal" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Make transfer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <form class="kt-form" id="transfer-form" action="{{route('admin.branch-transfer-top-ups.store')}}"
                              method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="alert alert-danger" style="display:none" id="add-error-bag">
                                </div>
                                <h2>From</h2>
                                <div class="row">
                                    {{--                                from--}}
                                    <div class="col-md-4 form-group">
                                        <label for="service_provider">Service Provider</label>
                                        <select id="service_provider" class="form-control" name="from_service_provider">
                                            <option disabled selected value="">---Select---</option>
                                            @foreach($serviceProviders as $provider)
                                                <option value="{{$provider->id}}">{{$provider->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="service_id">Service </label>
                                        <select id="service_id" class="form-control" name="from_service">
                                            <option value="">---Select---</option>
                                        </select>
                                    </div>
{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label for="amount">Current Amount</label>--}}
{{--                                        <input type="number" class="form-control" id="current_amount" name="current_amount" disabled--}}
{{--                                               placeholder="Amount">--}}
{{--                                    </div>--}}
                                    {{--                                to--}}
                                </div>
                                <h2>To</h2>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="service_provider">Service Provider</label>
                                        <select id="_service_provider" class="form-control" name="to_service_provider">
                                            <option disabled selected value="">---Select---</option>
                                            @foreach($serviceProviders as $provider)
                                                <option value="{{$provider->id}}">{{$provider->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="service_id">Service </label>
                                        <select id="_service_id" class="form-control" name="to_service">
                                            <option value="">---Select---</option>
                                        </select>
                                        <input type="hidden" name="service_charges_id" id="service_charges_id">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="amount">Amount</label>
                                        <input type="number" class="form-control" id="amount" name="amount"
                                               placeholder="Amount">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                        class="la la-close"></span> Close
                                </button>
                                <button type="submit" class="btn btn-primary confirm-btn"><span class="la la-check-circle-o"></span>
                                    Confirm Transfer
                                </button>
                            </div>
                        </form>
                    </div>
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
        $('.nav-balance-transfer').addClass('menu-item-active');
        $('#kt_table_1').DataTable({
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
        $("#service_provider, #_service_provider").change(function (){
            $('.reference_number_container').hide();
            let element = $(this).attr('id').startsWith('_') ? $("#_service_id") : $("#service_id");
            loadServices($(this).val(), element );
        })

        var loadServices=function (providerId, element) {
            let el = element;
            $.ajax({
                url: '/admin/load/services/'+providerId+'/provider',
            }).done(function(response) {
                el.empty();
                el.append('<option selected disabled value="">-- select--</option>');
                response.forEach(function(item) {
                    el.append($("<option data-service='"+JSON.stringify(item)+"' value='"+item.id+"'>"+item.name+"</option>"))
                })
            })
        }
    </script>

@endsection
