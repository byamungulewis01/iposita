@extends('layouts.master')
@section("title","Branch Top-ups report")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5"> Top-Ups</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Branch Top-ups Report</a>
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
                            Branch Top-ups Report
                        </h3>
                    </div>
                    @if(!auth()->user()->branch)
                        <div class="card-toolbar">
                            <div class="dropdown dropdown-inline">
                                <a href="#" class="btn btn-light-primary mx-2 font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-download"></i> Export</a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover">
                                        <li class="navi-item">
                                            <a target="_blank" href="{{request()->fullUrl()}}{{str_contains(request()->fullUrl(), '?')?'&':'?'}}is_download=1&type=excel" class="navi-link">

                                                <i class="la la-file-excel"></i>
                                                Excel
                                            </a>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a target="_blank" href="{{request()->fullUrl()}}{{str_contains(request()->fullUrl(), '?')?'&':'?'}}is_download=1&type=pdf" class="navi-link">

                                                <i class="la la-file-pdf"></i>
                                                PDF
                                            </a>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                        </div>
                @endif
                <!--end::Dropdown-->

                </div>
                <div class="card-body">
                    <div class="accordion accordion-toggle-arrow mb-3" id="accordionExample1">
                        <div class="card">
                            <div class="card-header py-0">
                                <div class="card-title {{request()->fullUrl()==route("admin.all.transactions")?'collapsed':''}}" data-toggle="collapse" data-target="#application-payment-section" aria-expanded="false">Filter Report</div>
                            </div>
                            <div id="application-payment-section" class="collapse" data-parent="#accordionExample1" style="">
                                <div class="p-5">
                                    <form method="get" action="{{route('admin.branch-top-ups.report')}}" id="search-form" >
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <input type="hidden" value="0" name="is_download" id="is_download">
                                                <label for="start_date"> Start Date</label>
                                                <input placeholder="YYY-MM-DD"
                                                       required readonly autocomplete="off" value="{{request('start_date')}}" type="text" name="start_date" id="start_date" class="form-control end-today-datepicker">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="end_date"> End Date</label>
                                                <input placeholder="YYY-MM-DD"
                                                       required readonly value="{{request('end_date')}}" type="text" name="end_date" id="end_date" class="form-control end-today-datepicker" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="status"> Status</label>
                                                <select multiple id="status" name="status[]" class="form-control">
                                                    <option {{in_array(\App\Models\IpositaTopup::STATUS_PENDING,request('status')??[])?'selected':''}} value="{{\App\Models\IpositaTopup::STATUS_PENDING}}">{{strtoupper(\App\Models\IpositaTopup::STATUS_PENDING)}}</option>
                                                    <option {{in_array(\App\Models\IpositaTopup::STATUS_APPROVED,request('status')??[])?'selected':''}} value="{{\App\Models\IpositaTopup::STATUS_APPROVED}}">{{\App\Models\IpositaTopup::STATUS_APPROVED}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="serviceProviders"> Service Provider</label>
                                                <select multiple id="serviceProviders" name="serviceProviders[]" class="form-control">
                                                    @foreach($serviceProviders as $serviceProvider)
                                                        <option {{in_array($serviceProvider->id,request('serviceProviders')??[])?'selected':''}} value="{{$serviceProvider->id}}">{{$serviceProvider->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="services"> Services</label>
                                                <select multiple id="services" name="services[]" class="form-control">
                                                    @foreach(\App\Models\Service::all() as $service)
                                                        <option {{in_array($service->id,request('services')??[])?'selected':''}} value="{{$service->id}}">{{$service->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="branches"> Branch</label>
                                                <select multiple id="branches" name="branches[]" class="form-control">
                                                    @foreach($branches as $branch)
                                                        <option {{in_array($branch->id,request('branches')??[])?'selected':''}} value="{{$branch->id}}">{{$branch->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary btn-sm mb-5 search-btn"> <span class="la la-search"></span> Search</button>
                                                <a href="{{route('admin.system-top-ups.report')}}" class="btn btn-outline-danger btn-sm mb-5 ml-5"><span class="la la-eraser"></span> Clear Form</a>
                                                <a id="ajaxUrl" href="{{request()->fullUrl()}}"></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        {{ $dataTable->table() }}
                    </div>

                </div>


            </div>

        </div>
    </div>

    <form action="" method="post" id="delete-top-up-form">
        @csrf
        @method('DELETE')
    </form>



@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(App\Http\Requests\ValidateBranchTopup::class,'#add-topup-form') !!}
    {!! JsValidator::formRequest(App\Http\Requests\ValidateBranchTopup::class,'#edit-topup-form') !!}
    {{ $dataTable->scripts() }}

    <script>
        $('.nav-all-reports').addClass('menu-item-active menu-item-open');
        $('.nav-branch-report').addClass('menu-item-active');
        $(document).on('click', '.delete-button', function (e) {
            e.preventDefault();
            btn = $(this);
            swal.fire({
                title: 'Are you sure!',
                text: 'This Record  Will be Deleted!',
                icon: 'warning',
                showCancelButton: true,
                showConfirmButton: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    let link = btn.attr('href');
                    let form = $("#delete-top-up-form")
                    form.attr('action', link);
                    form.submit();

                }
            })
        })

        $("#serviceProviders").change(function (){
            let serviceEl = $("#services");
            loadServices($(this).val(),serviceEl);
        })

        var loadServices=function (providerId,serviceElement, selectedService = null) {

            let el = serviceElement;
            $.ajax({
                url: '/admin/load/services/'+providerId+'/provider/',
            }).done(function(response) {
                el.empty();
                response.forEach(function(item) {
                    el.append($("<option data-service='"+JSON.stringify(item)+"' value='"+item.id+"'>"+item.name+"</option>"))
                })
                if(selectedService){
                    el.val(selectedService);
                }
            })
        }

    </script>

@endsection
