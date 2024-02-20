@extends("layouts.master")
@section("title", 'services Assignment')
@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Users</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">services Assignment</a>
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
@section("content")
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            @include('partial._alerts')
            <div class="card card-custom gutter-b">
                <div class="flex-wrap card-header">
                    <div class="card-title">
                        <h3 class="kt-portlet__head-title">
                            Manage services of <b>{{$branch->name}}
                        </h3>
                    </div>
                    <div class="card-toolbar">

                    </div>
                    <!--end::Dropdown-->

                    {{-- {{dd($branch->services)}} --}}
                </div>
                <div class="card-body">
                    <!--begin: Datatable -->
                    <form class="form" action="{{route('admin.branches.services.store',encryptId($branch->id))}}" method="POST" id="branch-services-form">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{encryptId($branch->id)}}">
                        <div class="form-group">


                                @foreach($providers as $provider)
                                    <h3>{{$provider->name}}</h3>
                                <div class="row">
                                @foreach($provider->services as $service)
                                    <div class="col-md-3" style="padding: 2px">
                                        <label class="checkbox checkbox-outline checkbox-primary">
                                            <input type="checkbox" data-provider="{{$provider->id}}"
                                                   @if($branch->services()->where("service_id",$service->id)
                                                       ->where("service_provider_id",$provider->id)->exists() ) checked
                                                   @endif value="{{$service->id}}"
                                                   name="services[]"> {{$service->name}}
                                            <span></span>
                                        </label>
                                    </div>
                                @endforeach
                                </div>
                                <br>
                                @endforeach

                        </div>
                        <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                            Update services
                        </button>

                    </form>

                </div>


            </div>

        </div>
    </div>
@stop
@section("scripts")
    <script>
        $('.nav-user-managements').addClass('menu-item-active  menu-item-open');
        $('.nav-all-users').addClass('menu-item-active');

        $(document).on('submit', '#branch-services-form', function (e) {
            e.preventDefault();
            //get selected services
            var services = [];
            $.each($('input[name="services[]"]:checked'), function () {
                services.push({
                    service_id: $(this).val(),
                    service_provider_id: $(this).data('provider'),
                });
            });
            // make Ajax request to store services
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    services: services
                },
                success: function (data) {
                    if (data.status) {
                        // show success message usin sweetalert
                        swal.fire({
                            title: "Success",
                            text: data.message,
                            type: "success",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "OK"
                        });
                    } else {
                        // show error message using sweetalert
                        swal({
                            title: "Error",
                            text: "Something went wrong",
                            type: "error",
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "OK"
                        });
                    }
            }
            });
        });
    </script>
@stop

