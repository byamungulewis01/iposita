@extends('layouts.master')
@section("title","Sys Parameter")

@section('subheader')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Sys Parameters</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Sys Parameters</a>
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

    @include('partial._alerts')
    <!--end::Notice-->
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="kt-portlet__head-title">
                    List of Sys Parameters
                </h3>
            </div>
{{--            <div class="card-toolbar">--}}
{{--                <a href="javascript:void(0)" class="btn btn-primary"--}}
{{--                   data-toggle="modal"--}}
{{--                   data-target="#addModal" >--}}
{{--                    <i class="la la-plus"></i>--}}
{{--                    New Record--}}
{{--                </a>--}}
{{--            </div>--}}
            <!--end::Dropdown-->


        </div>
        <div class="card-body">
            <!--begin: Datatable -->
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Values</th>
{{--                    <th>Description</th>--}}
                    <th title="dd/MM/YYYY">Created At</th>
                    <th title="dd/MM/YYYY">Updated At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paramenters as $key=>$parameter)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$parameter->name}}</td>
                        <td>{{$parameter->value}}</td>
                        <td>{{$parameter->created_at->format('Y-m-d H:m:s') }}</td>
                        <td>{{$parameter->updated_at->format('Y-m-d H:m:s')}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(App\Http\Requests\ValidateRole::class,'#add-role-form') !!}
    {!! JsValidator::formRequest(App\Http\Requests\ValidateRole::class,'#edit-role-form') !!}

    <script>
        $('.nav-settings').addClass('menu-item-active  menu-item-open');
        $('.nav-sys-parameter').addClass('menu-item-active');
        $('#kt_datatable1').DataTable({
            responsive: true
        });
        $('.edit-btn').click(function (e) {
            e.preventDefault();
            $('#_name').val($(this).data('name'));
            $('#_description').val($(this).data('description'));
            $('#edit-role-form').attr('action', $(this).data('url'));
        });
    </script>
@endsection
