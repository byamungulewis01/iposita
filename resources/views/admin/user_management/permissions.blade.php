@extends("layouts.master")
@section("title","User Permissions")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Permissions</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Users Management</a>
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
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="kt-portlet__head-title">
                    List of Permissions
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
{{--                    <th>Description</th>--}}
                    <th title="dd/MM/YYYY">Created At</th>
                    {{--<th>Actions</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $key=>$permission)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$permission->name}}</td>
{{--                        <td>{{$permission->description }}</td>--}}
                        <td>{{$permission->created_at->format('Y-m-d')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="modal fade" data-backdrop="static" id="addModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new permission</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form validate-form" id="department_form" action="{{route('admin.permissions.store')}} "
                          method="POST">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Permission</label>
                                <input type="text" name="name" class="form-control" aria-describedby="emailHelp"
                                       placeholder="Permission name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" aria-describedby="emailHelp"
                                          placeholder="permission description"></textarea>
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                    class="la la-close"></span> Close
                            </button>
                            <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                                Save Permission
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
    <script>
        $('.nav-user-managements').addClass('menu-item-active  menu-item-open');
        $('.nav-all-permissions').addClass('menu-item-active');

        $('#kt_datatable1').DataTable({
            responsive: true
        });
    </script>
@endsection
