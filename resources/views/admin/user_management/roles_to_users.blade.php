@extends('layouts.master')
@section("title","Roles Assignment")

@section('subheader')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">User Manage Roles</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route("admin.users.index")}}" class="text-muted">Users</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Manage Roles</a>
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
    <!-- begin:: Content -->
    @include('partial._alerts')
    <!--end::Notice-->
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="kt-portlet__head-title">
                    Manage Roles for <b>{{$user->name}}
                </h3>
            </div>
            <!--end::Dropdown-->
        </div>
        <div class="card-body">
            <!--begin: Datatable -->
            <form class="form" action="{{route('admin.user.add.roles.store')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="form-group row">


                    @foreach($roles as $role)
                        <div class="col-4" style="padding: 2px">
                            <label class="checkbox checkbox-outline checkbox-primary">
                                <input type="checkbox"
                                       @if($user->roles->contains($role)) checked
                                       @endif value="{{$role->id}}"
                                       name="roles[]"> {{$role->name}}
                                <span></span>
                            </label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                    Update Roles
                </button>

            </form>

        </div>


    </div>



@stop
