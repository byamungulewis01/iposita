@extends('layouts.master')
@section("title","Branches")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Services</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Services</a>
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
                            Services
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="javascript:void(0)" class="btn btn-primary"
                           data-toggle="modal"
                           data-target="#addModal">
                            <i class="la la-plus"></i>
                            New Service
                        </a>
                    </div>
                    <!--end::Dropdown-->

                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        {{ $dataTable->table() }}
                    </div>

                </div>


                {{--Service   modal--}}
                <div data-backdrop="static" class="modal fade " id="addModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add new Service</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form class="kt-form" id="add-service-form" action="{{route('admin.services.store')}} "
                                  method="POST">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class=" form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="Service Provider Name">
                                    </div>
                                    <div class=" form-group">
                                        <label>Display Name</label>
                                        <input type="text" name="display_label" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="Display Name">
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

                <div data-backdrop="static" class="modal fade " id="service-update" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Service</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form class="kt-form" id="update-service-form"
                                  method="POST">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class=" form-group">
                                        <label>Name</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="Service Provider Name">
                                    </div>
                                    <div class=" form-group">
                                        <label>Display Name</label>
                                        <input type="text" id="display_label" name="display_label" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="Display Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="is_active">Active</label>
                                        <select class="form-control form-control-sm" id="status" name="status">
                                            <option value="Active">Yes</option>
                                            <option value="Inactive">No</option>
                                        </select>

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


@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(App\Http\Requests\ValidateService::class,'#add-service-form') !!}
    {!! JsValidator::formRequest(App\Http\Requests\ValidateUpdateService::class,'#service-update') !!}
    {{ $dataTable->scripts() }}

    <script>
        $(".nav-all-services").addClass('menu-item-active');
        $('#service-update').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget);
            var href = button.data('url');
            $("#name").val($(button).data("name"));
            $("#display_label").val($(button).data("display_label"));
            $('#update-service-form').attr("action", $(this).data('url'));
            var modal = $(this);
            modal.find('form').attr('action', href)
        })
        $(document).on('click','.delete-button', function (e){
            e.preventDefault();
            btn = $(this);
            swal.fire({
                title:'Are you sure!',
                text:'This Service Will be Deleted!',
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
    </script>

@endsection
