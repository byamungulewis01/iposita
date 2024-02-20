@extends('layouts.master')
@section("title","User Flow History")

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
                            <a class="text-muted">User Flow History</a>
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
                            User Flow History
                        </h3>
                    </div>
                    <!--end::Dropdown-->

                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="card shadow-none">
                        <div class="card-body">
                            <div class="row my-5">
                                <div class="col-md-12">
                                    @forelse($histories as $history)
                                        <div class="timeline timeline-5 my-4">
                                            <div class="timeline-item">
                                                <div class="timeline-label">
                                                    <small>{{$history->created_at->format('h:i s A')}}</small>
                                                </div>
                                                <div class="timeline-badge"><span class="bg-{{$history->action == 'Activate' ? 'Primary': 'info'}}"></span>
                                                </div>
                                                <div class="timeline-content bg-light p-4">
                                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">
                                                        {{\App\Models\User::find($history->done_by)->name}}
{{--                                                        {{optional($history->doneBy)->name}}--}}
                                                    </a>
                                                    <p>
                                                        {{ $history->reason}}

                                                    </p>
                                                    <span
                                                        class="label label-light-dark-75  label-inline ml-2 rounded-pill">{{$history->created_at->format('d M Y')}}</span>
                                                    <span
                                                        class="label label-{{$history->action == 'Activate' ? 'Primary': 'info'}}  label-inline ml-2 rounded-pill float-md-right">{{ $history->action }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-custom alert-notice alert-light-info rounded-0">
                                            <div class="alert-icon">
                                                <i class="flaticon-clock"></i>
                                            </div>
                                            <div class="alert-text">
                                                No history found yet.
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>

        </div>
    </div>


@stop
