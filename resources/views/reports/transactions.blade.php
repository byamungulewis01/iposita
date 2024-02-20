@extends('layouts.master')
@section("title","Transactions Report")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Transactions</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Transactions Report</a>
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
                             Transactions Report
                        </h3>
                    </div>
                    <div class="card-toolbar">
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
                    </div>
                    <!--end::Dropdown-->

                </div>
                <div class="card-body">
                    <div class="accordion accordion-toggle-arrow mb-3" id="accordionExample1">
                        <div class="card">
                            <div class="card-header py-0">
                                <div class="card-title {{request()->fullUrl()==route("admin.transactions.report")?'collapsed':''}}" data-toggle="collapse" data-target="#application-payment-section" aria-expanded="false">Advanced Filter</div>
                            </div>
                            <div id="application-payment-section" class="collapse" data-parent="#accordionExample1" style="">
                                <div class="p-5">
                                    <form method="get" action="{{route('admin.transactions.report')}}" id="search-form" >
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
                                                    <option {{in_array(\App\Models\Transaction::PENDING,request('status')??[])?'selected':''}} value="{{\App\Models\Transaction::PENDING}}">{{\App\Models\Transaction::PENDING}}</option>
                                                    <option {{in_array(\App\Models\Transaction::SUCCESS,request('status')??[])?'selected':''}} value="{{\App\Models\Transaction::SUCCESS}}">{{\App\Models\Transaction::SUCCESS}}</option>
                                                    <option {{in_array(\App\Models\Transaction::FAILED,request('status')??[])?'selected':''}} value="{{\App\Models\Transaction::FAILED}}">{{\App\Models\Transaction::FAILED}}</option>
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
                                                <label for="provinces"> Services</label>
                                                <select multiple id="provinces" name="services[]" class="form-control">
                                                    @foreach(\App\Models\Service::all() as $service)
                                                        <option {{in_array($service->id,request('services')??[])?'selected':''}} value="{{$service->id}}">{{$service->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="branches"> Branch</label>
                                                <select multiple id="branches" name="branches[]" class="form-control">
                                                    @foreach($branches as $branch)
                                                        <option {{in_array($branch->id,request('branches')??[])?'selected':''}} value="{{$branch->id}}">{{$branch->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @can('Manage System Users')
                                                <div class="form-group col-md-3">
                                                    <label for="users"> User</label>
                                                    <select multiple id="users" name="users[]" class="form-control">
                                                    </select>
                                                </div>
                                            @endcan


                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary btn-sm mb-5 search-btn"> <span class="la la-search"></span> Search</button>
                                                <a href="{{route('admin.transactions.report')}}" class="btn btn-outline-danger btn-sm mb-5 ml-5"><span class="la la-eraser"></span> Clear Form</a>
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
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                            <thead>
                            <tr>
                                <th>Branch</th>
                                <th>Meter Number</th>
                                <th>Customer Name</th>
                                <th>Customer Telephone</th>
                                <th>Customer Email</th>
                                <th>Service Provider</th>
                                <th>Service</th>
                                <th>Amount</th>
                                <th>Token</th>
                                <th>Total Charges</th>
                                <th>Created At</th>
                                <th>Status</th>
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
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(App\Http\Requests\TransactionRequest::class,'#add-form') !!}
    <script>

        $('.nav-all-reports').addClass('menu-item-active menu-item-open');
        $('.nav-transactions-report').addClass('menu-item-active');
        var confirm_btn=$(".confirm-btn");
        let url= $("#ajaxUrl").attr('href')
        let charges = null;
        $('#kt_datatable1').DataTable({
            processing: true,
            serverSide: true,
            ajax: url,
            columns: [
                {data: 'branch_name', name: 'branch_name'},
                {data: 'reference_number', name: 'reference_number'},
                {data: 'customer_name', name: 'customer_name'},
                {data: 'customer_phone', name: 'customer_phone'},
                {data: 'customer_email', name: 'customer_email'},
                {data: 'service_provider_name', name: 'serviceCharges.serviceProvider.name'},
                {data: 'service_name', name: 'serviceCharges.service.name'},
                {data: 'amount', name: 'amount'},
                {data: 'token', name: 'token'},
                {data: 'total_charges', name: 'total_charges'},
                {data: 'created_at', name: 'created_at'},
                {data: 'status', name: 'status'},
            ],
            'order': [[10, 'desc']]
        });

        $("#service_provider").change(function (){
            $('.reference_number_container').hide();
            loadServices($(this).val())
        })
        $("#service_id").change(function (){
            var data=$(this).find(':selected').data('service');
            charges=data.charges;
            console.log(charges)
            $("#display-label").html(data.display_label);
            if(data.require_remote_fetch===true){
                $("#reference_number_input").html('<div class="input-group">'
                    +'<input class="form-control py-2" type="search" name="reference_number" id="reference-number">'
                    +'<span class="input-group-append">'
                    +' <button class="btn btn-primary border-left-0 border check-btn" type="button"> Check</button>'
                    +' </span></div>');
                confirm_btn.hide();
            }else{
                $("#reference_number_input").html('<input id="reference-number" type="text" name="reference_number" class="form-control" aria-describedby="emailHelp">');
                $('.after_check_container').show();
                confirm_btn.show();
            }
            $('.reference_number_container').show();
        })

        var loadServices=function (providerId){
            let el = $('#service_id');
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

        $(document).on("click",".check-btn",function (e) {
            e.preventDefault();
            checkReference();
            $(".check-btn").attr("disabled", true);
        })

        var checkReference=function (){
            var referenceNumber=$("#reference-number").val();
            if(referenceNumber){
                let el = $('#service_id');

                $.ajax({
                    url: "/admin/load/services/"+$("#service_provider").val()+"/provider",
                }).done(function(response) {
                    $('#customer-name').val("Akimana Aime")
                    $(".check-btn").attr("disabled", false);
                    $('.after_check_container').show();
                    confirm_btn.show();
                })
            }else{
                swal.fire({
                    title: "Error",
                    text: "Reference Number is required",
                    icon: 'warning',
                    showCancelButton:false,
                    confirmButtonColor: '#06c4ff',
                    confirmButtonText: 'Ok',
                    cancelButtonColor: '#ff1533',
                    cancelButtonText: 'ok',
                    reverseButtons: true
                }).then(function (result) {
                    $(".check-btn").attr("disabled", false);
                })
            }

        }

        $(document).on("keyup","#amount",function (e) {
            e.preventDefault();
            let amount = $("#amount").val();
            let charge_fee = 0;
            let message = "<br>";
            let serviceChargesId = $("#service_charges_id");
            chargeType = charges[0].charges_type;
            if (chargeType === 'Flat') {
                serviceChargesId.val(charges[0].id);
                let flat = charges[0].charges
                message += "Flat : "+ flat;
                $("#charges_fee").html(flat+message);
            } else if (chargeType === 'Percentage') {
                serviceChargesId.val(charges[0].id);
                percent = charges[0].charges
                message += "Percentage : "+percent;
                charge_fee = (amount * percent / 100);
                $("#charges_fee").html(charge_fee+message);
            } else if (chargeType === 'Range') {
                //amount between range min and max
                let cat = charges.filter(item => Number(item.min) <= amount && Number(item.max )>= amount);
                console.log(cat)
                if (cat.length > 0) {
                    serviceChargesId.val(cat[0].id);
                    message += "Range : " +cat[0].min + " - "+cat[0].max, " Fee : "+cat[0].charges;
                    $("#charges_fee").html(cat[0].charges+message);
                } else {
                    message +='Category not found'
                    $("#charges_fee").html("0"+message);
                }
            }
            checkBalance();
            $("#alert-charges").show();
        })

        $(document).on('change','#branches', function (e){
            e.preventDefault();
            let el = $(this)
            let branchesId =el.val();
            loadUsers(branchesId,"#users");
        });
        var loadUsers=function (branches,element,selectedValue=null) {
            let el = $(element);
            $.ajax({
                url: '{{route("branches.users")}}',
                data:{
                    branches:branches.toString().split(','),
                }
            }).done(function(response) {
                el.empty();
                el.append('<option value="">-- select--</option>');
                response.forEach(function(item) {
                    el.append($('<option>', {
                        value: item.id,
                        text: item.name,
                    }))
                })
                if(selectedValue){
                    el.val(selectedValue);
                }
            })
        }

        $(function (){
            var users =@json(request("users"));
            loadUsers($("#branches").val(),'#users',users);
        })
    </script>


@endsection

