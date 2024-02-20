@extends('layouts.master')
@section("title"," Wallet")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5"> Wallet</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted"> Wallet</a>
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
                             Wallet
                        </h3>
                    </div>
                @if(!auth()->user()->branch)
                        <div class="card-toolbar">
                            <a href="javascript:void(0)" class="btn btn-primary mx-2"
                               data-toggle="modal"
                               data-target="#addModal">
                                <i class="la la-plus"></i>
                                New  Wallet
                            </a>

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
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        <a href="{{route('admin.iposita-top-ups.balance')}}" class="badge badge-secondary">
                            <i class=""></i>
                           Check Balance
                        </a>
                        {{ $dataTable->table() }}
                    </div>

                </div>


                {{--user role modal--}}
                <div data-backdrop="static" class="modal fade " id="addModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Wallet</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form class="kt-form" id="add-topup-form" action="{{route('admin.iposita-topups.store')}}" enctype="multipart/form-data"
                                  method="POST">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Service Provider</label>
                                        <select name="service_provider" id="service_provider" class="form-control">
                                            <option value="">choose</option>
                                            @foreach(\App\Models\ServiceProvider::all() as $service_provider)
                                                <option value="{{$service_provider->id}}">{{$service_provider->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Service</label>
                                        <select name="service" id="service" class="form-control">
                                            <option value="">choose</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="number" name="amount" class="form-control" aria-describedby="emailHelp"
                                               placeholder="Amount...">
                                    </div>
                                    <div class="form-group">
                                        <label>Attachment</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="attachment">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" id="description" required
                                                  class="form-control"></textarea>
                                    </div>

                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                            class="la la-close"></span> Close
                                    </button>
                                    <button type="submit" class="btn btn-primary"><span
                                            class="la la-check-circle-o"></span>
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--user update modal--}}
                {{--user role modal--}}
                <div data-backdrop="static" class="modal fade " id="branchPercentageModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">External  Percentage</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{--user update modal--}}

                <div data-backdrop="static" class="modal fade " id="updateToupModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Update Wallet</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form class="kt-form" id="edit-topup-form"  enctype="multipart/form-data"
                                  method="POST">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Service Provider</label>
                                        <select name="service_provider" id="_service_provider" class="form-control">
                                            <option value="">choose</option>
                                            @foreach(\App\Models\ServiceProvider::all() as $service_provider)
                                                <option value="{{$service_provider->id}}">{{$service_provider->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Service</label>
                                        <select name="service" id="_service" class="form-control">
                                            <option value="">choose</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="number" name="amount" id="_amount" class="form-control" aria-describedby="emailHelp"
                                               placeholder="Amount...">
                                    </div>
                                    <div class="form-group">
                                        <label>Attachment</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="_customFile" name="attachment">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" id="_description" required
                                                  class="form-control"></textarea>
                                    </div>

                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                            class="la la-close"></span> Close
                                    </button>
                                    <button type="submit" class="btn btn-primary"><span
                                            class="la la-check-circle-o"></span>
                                        Save
                                    </button>
                                </div>
                            </form>
                         </div>
                    </div>
                </div>
                <div data-backdrop="static" class="modal fade " id="revertModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Revert Wallet</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form class="kt-form" id="revert-topup-form"  enctype="multipart/form-data"
                                  method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Reason</label>
                                        <textarea name="reason" id="reason"
                                                  class="form-control" required></textarea>
                                    </div>

                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                            class="la la-close"></span> Close
                                    </button>
                                    <button type="submit" class="btn btn-primary"><span
                                            class="la la-check-circle-o"></span>
                                        Save
                                    </button>
                                </div>
                            </form>
                         </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

    <div  data-backdrop="static"  class="modal fade" id="messageModal" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Review Decision</h5>
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
        $('.nav-all-iposita-topups').addClass('menu-item-active');
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
        $(document).on('click', '.edit-btn', function (e) {
            e.preventDefault();
            button = $(this);
            var href = button.data('url');
            $("#_service_provider").val($(button).data("service_provider"));
            loadServices($(button).data("service_provider"), $("#_service"), $(button).data("service"));
            $("#_service").val($(button).data("service"));
            $("#_amount").val($(button).data("amount"));
            $("#_description").val($(button).data("description"));
            $('#edit-topup-form').attr("action", $(this).data('url'));
        })
        $(document).on('click', '.confirm-button', function (e) {
            e.preventDefault();
            btn = $(this);
            swal.fire({
                title: 'Are you sure!',
                text: 'This Record  Will be Submitted!',
                icon: 'warning',
                showCancelButton: true,
                showConfirmButton: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    let link = btn.attr('href');
                    window.location.href = link;

                }
            })
        })
        $("#service_provider").change(function (){
            let serviceEl = $("#service");
            loadServices($(this).val(),serviceEl);
        })

        var loadServices=function (providerId,serviceElement, selectedService = null) {

            let el = serviceElement;
            $.ajax({
                url: '/admin/load/services/'+providerId+'/provider/',
            }).done(function(response) {
                el.empty();
                el.append('<option selected disabled value="">-- select--</option>');
                response.forEach(function(item) {
                    el.append($("<option data-service='"+JSON.stringify(item)+"' value='"+item.id+"'>"+item.name+"</option>"))
                })
                if(selectedService){
                    el.val(selectedService);
                }
            })
        }

        $(document).on('click','.revert-btn', function (e){
            e.preventDefault();
            let btn = $(this);
            let link = btn.attr('href');
            let form = $("#revert-topup-form")
            form.attr('action', link);

        })

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
            $('#messageModal').modal('show');
        })
        //submit form revert topup form
        // $(document).on('submit', '#revert-topup-form', function (e){
        //         e.preventDefault();
        //     swal.fire({
        //         title: 'Are you sure!',
        //         text: 'This Record  Will be Reverted!',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         showConfirmButton: true
        //     }).then(function (result) {
        //         if (result.isConfirmed) {
        //             let form = $("#revert-topup-form");
        //             form.submit();
        //         }
        //     })
        //
        // })
    </script>

@endsection
