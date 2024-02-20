@extends("layouts.master")
@section("title", 'Permissions Assignment')
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
                            <a class="text-muted">Permissions Assignment</a>
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
                    Manage Permissions of <b>{{$user->name}}
                </h3>
            </div>
            <div class="card-toolbar">

            </div>
            <!--end::Dropdown-->

{{-- {{dd($user->permissions)}} --}}
        </div>
        <div class="card-body">
            <!--begin: Datatable -->
            <form class="form" action="{{route('admin.permissions_to_user.store')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="user_id" value="{{encryptId($user->id)}}">
                <div class="form-group">

                    <div class="row">
                        @foreach($permissions as $permission)
                            <div class="col-md-3" style="padding: 2px">
                                <label class="checkbox checkbox-outline checkbox-primary">
                                    <input type="checkbox"
                                           @if($user->permissions->contains($permission)) checked
                                           @endif value="{{$permission->id}}"
                                           name="permissions[]"> {{$permission->name}}
                                    <span></span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                    Update Permissions
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
    </script>
@stop

