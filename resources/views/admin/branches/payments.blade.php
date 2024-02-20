@extends('layouts.master')
@section("title","Branch Top-up Requests")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Branch Top-up Requests</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Top-up Requests</a>
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
                            Branch Top-up Requests
                        </h3>
                    </div>

                    <div class="card-toolbar">
                        @if(auth()->user()->branch && auth()->user()->branch->is_external)
                            <a href="javascript:void(0)" class="btn btn-primary"
                               data-toggle="modal"
                               data-target="#addModal" >
                                <i class="la la-plus"></i>
                                New Request
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="kt_table_1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch</th>
                                <th>Service Provider</th>
                                <th>Service</th>
                                <th>Amount(Rwf)</th>
                                <th>Attachment</th>
                                <th>Status</th>
                                <th>Date</th>
                                @if(!isExternalBranch())
                                    <th>Approved by</th>
                                @endif
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{$payment->id}}</td>
                                        <td>{{optional($payment->branch)->name}}</td>
                                        <td>{{$payment->serviceProvider->name}}</td>
                                        <td>{{$payment->service->name}}</td>
                                        <td class="text-right">{{number_format($payment->amount)}}</td>
                                        <td class="text-center">
                                            @if($payment->attachment)
                                                <a href="{{asset('storage/'.$payment->attachment)}}" target="_blank">
                                                    <i class="la la-download fa-2x"></i>
                                                </a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge badge-{{\App\Constants\StatusColor::getStatusColor($payment->status)}}">{{$payment->status}}</span>
                                        </td>
                                        <td>{{$payment->created_at->format('d-m-Y')}}</td>
                                        @if(!isExternalBranch())
                                            <td>{{optional($payment->approvedBy)->name ?? "-"}}</td>
                                        @endif
                                        @if((!isExternalBranch() && strtolower($payment->status) =='submitted') || (isExternalBranch() && strtolower($payment->status) == 'pending'))
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">Actions
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        @if($payment->status =="Submitted")
                                                            @can("Approve Top-up Request")
                                                                <a href="{{route('admin.branch-top-ups.payment.approve',$payment->id)}}" class="dropdown-item btn-approve"
                                                                   data-toggle="modal"
                                                                   data-target="#messageModal"
                                                                > Review</a>
                                                            @endcan
                                                        @endif
                                                        @if($payment->status =="pending")
                                                            <a href="{{route('admin.branch-top-ups.payment.submit',$payment->id)}}" class="dropdown-item "> Submit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="#" class="edit-btn dropdown-item "
                                                               data-toggle="modal"
                                                               data-target="#editModal"
                                                               data-service-provider-id="{{$payment->serviceProvider->id}}"
                                                               data-service-id="{{$payment->service->id}}"
                                                               data-amount="{{$payment->amount}}"
                                                               data-attachment="{{$payment->attachment}}"
                                                               data-id="{{$payment->id}}"
                                                               data-is_active="{{$payment->status}}"
                                                               data-url="{{route("admin.branch-payment-top-ups.update",$payment->id)}}"> Edit</a>
                                                            <a href="{{route('admin.branch-top-ups.payment.delete',$payment->id)}}" class="dropdown-item delete-button"> Delete</a>
                                                        @endif
                                                    </div>
                                                </div>
                                    </tr>
                                    @else
                                        <td>-</td>
                                        @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

            <div  data-backdrop="static"  class="modal fade" id="addModal" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Request</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <form class="kt-form" id="transfer-form" action="{{route('admin.branch-payment-top-ups.store')}}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="alert alert-danger" style="display:none" id="add-error-bag">
                                </div>
                                    <div class=" form-group">
                                        <label for="service_provider">Service Provider</label>
                                        <select id="service_provider" class="form-control" name="service_provider">
                                            <option  selected value="">---Select---</option>
                                            @foreach($serviceProviders as $provider)
                                                <option value="{{$provider->id}}">{{$provider->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" form-group">
                                        <label for="service_id">Service </label>
                                        <select id="service_id" class="form-control" name="service">
                                            <option value="">---Select---</option>
                                        </select>
                                    </div>
                                    <div class=" form-group">
                                        <label for="amount">Amount</label>
                                        <input type="number" class="form-control" id="amount" name="amount"
                                               placeholder="Amount">
                                    </div>
                                    <div class=" form-group">
                                        <label for="amount">Attachment</label>
                                        <input type="file" class="form-control" id="attachment" name="attachment"
                                               placeholder="attachment">
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
            <div  data-backdrop="static"  class="modal fade" id="editModal" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Request</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <form class="kt-form" id="edit-transfer-form"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="modal-body">
                                <div class="alert alert-danger" style="display:none" id="add-error-bag">
                                </div>
                                    <div class=" form-group">
                                        <label for="_service_provider">Service Provider</label>
                                        <select id="_service_provider" class="form-control" name="service_provider">
                                            <option disabled selected value="">---Select---</option>
                                            @foreach($serviceProviders as $provider)
                                                <option value="{{$provider->id}}">{{$provider->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" form-group">
                                        <label for="_service_id">Service </label>
                                        <select id="_service_id" class="form-control" name="service">
                                            <option value="">---Select---</option>
                                        </select>
                                    </div>
                                    <div class=" form-group">
                                        <label for="_amount">Amount</label>
                                        <input type="number" class="form-control" id="_amount" name="amount"
                                               placeholder="Amount">
                                    </div>
                                    <div class=" form-group">
                                        <label for="_attachment">Attachment</label>
                                        <input type="file" class="form-control" id="_attachment" name="attachment"
                                               placeholder="attachment">
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
            <div  data-backdrop="static"  class="modal fade" id="messageModal" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Review Request</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <form class="kt-form" id="approval-form" action=""
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="alert alert-danger" style="display:none" id="add-error-bag">
                                </div>
                                <div class="form-group">
                                    <label for="decision">Decision</label>
                                    <select id="decision" class="form-control" name="decision" required>
                                        <option selected disabled value="">---Select---</option>
                                        <option value="Approved">Approve</option>
                                        <option value="Rejected">Reject</option>
                                    </select>
                                </div>
                                    <div class=" form-group">
                                        <label for="amount">Review</label>
                                        <textarea class="form-control" id="review_comment" name="review_comment" required
                                                  placeholder="review comment"></textarea>
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
    {!! JsValidator::formRequest(App\Http\Requests\validateTopupPayment::class,'#edit-transfer-form') !!}
    <script>
        $('.nav-top-ups-group').addClass('menu-item-active  menu-item-open');
        $('.nav-top-ups-make-request').addClass('menu-item-active');
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

        var loadServices=function (providerId, element, selectedServiceId = null) {
            let el = element;
            $.ajax({
                url: '/admin/load/services/'+providerId+'/provider',
            }).done(function(response) {
                el.empty();
                el.append('<option selected disabled value="">-- select--</option>');
                response.forEach(function(item) {
                    el.append($("<option data-service='"+JSON.stringify(item)+"' value='"+item.id+"'>"+item.name+"</option>"))
                })
                if(selectedServiceId){
                    el.val(selectedServiceId);
                }
            })
        }

        $("#approval-form").validate({
            errorClass: 'text-danger',
            rules: {
                decision: {
                    required: true,
                },
                review_comment: {
                    required: true,
                },
            },
            messages: {
                decision: {
                    required: "Please select decision",
                },
                review_comment: {
                    required: "Please enter review comment",
                },
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-approve', function () {
            let url = $(this).attr('href');
            $('#approval-form').attr('action', url);
        })
        $(document).on('click','.delete-button', function (e){
            e.preventDefault();
            btn = $(this);
            swal.fire({
                title:'Are you sure!',
                text:'This Top-up Request Will be Deleted!',
                icon:'warning',
                showCancelButton:true,
                showConfirmButton:true
            }).then(function(result){
                if(result.isConfirmed){
                    let link = btn.attr('href');
                    window.location.href = link;

                }
            })
        })
        $(document).on('click','.edit-btn', function (e){
            e.preventDefault();
            let url = $(this).data('url');
            $('#_service_provider').val($(this).data('service-provider-id'));
            loadServices($(this).data('service-provider-id'), $('#_service_id'), $(this).data('service-id'));
            $('#_service_id').val($(this).data('service-id'));
            $('#_amount').val($(this).data('amount'));
            $('#edit-transfer-form').attr('action', url);
        })
    </script>

@endsection
