@extends('layouts.master')
@section("title","Service Providers")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Service Providers</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Service Providers</a>
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
                            Service Providers
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="javascript:void(0)" class="btn btn-primary"
                           data-toggle="modal"
                           data-target="#addModal">
                            <i class="la la-plus"></i>
                            New Service Provider
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


                {{--Service Provider  modal--}}
                <div data-backdrop="static" class="modal fade " id="addModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Service Provider</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form class="kt-form" id="add-provider-form" action="{{route('admin.providers.store')}} "
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
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control"
                                                   aria-describedby="emailHelp"
                                                   placeholder="Email">
                                        </div>
                                            <div class="form-group">
                                                <label>Telephone</label>
                                                <input type="text" name="telephone" class="form-control"
                                                       aria-describedby="emailHelp"
                                                       placeholder="Telephone">
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
                <div data-backdrop="static" class="modal fade " id="provider-update" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Service Provider</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form class="kt-form" id="provider-update-form" action=""
                                  method="POST">
                                {{csrf_field()}}
                                <div class="modal-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control"
                                                   aria-describedby="emailHelp"
                                                   placeholder="user name" id="name">
                                        </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="Enter Email" id="email">
                                    </div>
                                            <div class="form-group">
                                                <label>Telephone</label>
                                                <input type="text" name="telephone" class="form-control"
                                                       aria-describedby="emailHelp"
                                                       placeholder="Telephone" id="telephone">
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

                {{--representative modal--}}

                <div data-backdrop="static" class="modal fade " id="representative-modal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Representative Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form class="kt-form" id="representative-form" action=""
                                  method="POST">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="user name" id="rep-name">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="Enter Email" id="rep-email">
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="text" name="telephone" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="Telephone" id="rep-telephone">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                            class="la la-close"></span> Close
                                    </button>
                                    <button type="submit" class="btn btn-primary" id="save-rep"><span
                                            class="la la-check-circle-o"></span>
                                        Update
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
    {!! JsValidator::formRequest(App\Http\Requests\ValidateUpdateServiceProvider::class,'#provider-update-form') !!}
    {!! JsValidator::formRequest(App\Http\Requests\ValidateServiceProvider::class,'#add-provider-form') !!}
    {{ $dataTable->scripts() }}

    <script>

        $(".nav-all-service-providers").addClass('menu-item-active');
        $('#provider-update').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget);
            var href = button.data('url');
            $("#name").val($(button).data("name"));
            $("#email").val($(button).data("email"));
            $("#telephone").val($(button).data("telephone"));
            $('#provider-update-form').attr("action", $(this).data('url'));
            var modal = $(this);
            modal.find('form').attr('action', href)
        })
        $(document).on('click','.delete-button', function (e){
            e.preventDefault();
            btn = $(this);
            swal.fire({
                title:'Are you sure!',
                text:'This Service Provider Will be Deleted!',
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
        $(document).on('click','.representative-btn',function (e){
            e.preventDefault();
            btn = $(this);
            $('.representative-modal').modal('show');
            $('#representative-form').attr('action',btn.data('url'));
            $('#rep-name').val(btn.data('name'));
            $('#rep-email').val(btn.data('email'));
            $('#rep-telephone').val(btn.data('telephone'));
        })

        $(document).on('click','#save-rep', function (e){
            e.preventDefault();
          let  btn = $(this);
            if (btn.text() == 'Save'){
                btn.text('Saving...');
                btn.attr('disabled',true).addClass('spinner spinner-white spinner-right');
                $('#representative-form').submit();
            }
            else {
                btn.text('Save');
                $('#rep-name').attr('disabled',false);
                $('#rep-email').attr('disabled',false);
                $('#rep-telephone').attr('disabled',false);i
            }

        })

        $(function (){
            console.log('loaded');
            $('#rep-name').attr('disabled',true);
            $('#rep-email').attr('disabled',true);
            $('#rep-telephone').attr('disabled',true);
        })

    </script>


@endsection
