@extends('layouts.master')
@section("title","Roles")

@section('subheader')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Roles</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Roles</a>
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
                    List of User Roles
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="javascript:void(0)" class="btn btn-primary"
                   data-toggle="modal"
                   data-target="#addModal" >
                    <i class="la la-plus"></i>
                    New Record
                </a>
            </div>
            <!--end::Dropdown-->


        </div>
        <div class="card-body">
            <!--begin: Datatable -->
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Permissions</th>
                    <th title="dd/MM/YYYY">Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $key=>$role)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->description }}</td>
                        <td>

                            <a href="{{route('admin.roles.add.permissions',$role->id)}}"><span class="badge badge-success">{{count($role->permissions)}}</span></a>

                        </td>
                        <td>{{$role->created_at->format('Y-m-d')}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="{{route('admin.roles.add.permissions',$role->id)}}">Manage Permissions</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class=" edit-btn dropdown-item "
                                       data-toggle="modal"
                                       data-target="#user_role_edit_modal"
                                       data-name="{{$role->name}}"
                                       data-is_active="{{$role->is_active}}"
                                       data-id="{{$role->id}}"
                                       data-url="{{ route('admin.roles.update',$role->id) }}"
                                       data-description="{{$role->description}}">
                                        Edit
                                    </a>
                                    <a class="delete_btn dropdown-item"
                                       data-url="">
                                        Delete
                                    </a>
                                </div>
                            </div>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>


        {{--user role modal--}}
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form" id="add-role-form" action="{{route('admin.roles.store')}} "
                          method="POST">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" name="name" class="form-control" aria-describedby="emailHelp"
                                       placeholder="Role name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" aria-describedby="emailHelp"
                                          placeholder="role description"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                    class="la la-close"></span> Close
                            </button>
                            <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                                Save Role
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--user update modal--}}
        <div class="modal fade" id="user_role_edit_modal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form" id="edit-role-form" action="{{route('admin.roles.store')}} "
                          method="POST">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" name="name" id="_name" class="form-control" aria-describedby="emailHelp"
                                       placeholder="Department name">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="_description" aria-describedby="emailHelp"
                                          placeholder="role description"></textarea>
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                    class="la la-close"></span> Close
                            </button>
                            <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                                Edit Role
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(App\Http\Requests\ValidateRole::class,'#add-role-form') !!}
    {!! JsValidator::formRequest(App\Http\Requests\ValidateRole::class,'#edit-role-form') !!}

    <script>
        $('.nav-user-managements').addClass('menu-item-active  menu-item-open');
        $('.nav-roles').addClass('menu-item-active');
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
