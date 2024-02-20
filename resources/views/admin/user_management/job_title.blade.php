@extends("layouts.master")
@section("title","Job Titles")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Job Titles</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Job Titles</a>
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
            @include('partial._alerts')
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap">
                    <div class="card-title">
                        <h3 class="kt-portlet__head-title">
                            List of Job Titles
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="javascript:void(0)" class="btn btn-primary"
                           data-toggle="modal"
                           data-target="#addModal" >
                            <i class="la la-plus"></i>
                            New Job Title
                        </a>
                    </div>
                    <!--end::Dropdown-->


                </div>
                <div class="card-body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-hover table-checkable" id="kt_datatable1">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobTitles  as $key=>$item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary  dropdown-toggle btn-sm"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">Actions</button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item dropdown-item-color btn-edit" href="#"
                                               data-name="{{$item->name}}"
                                               data-url="{{ route('admin.job.title.update', encryptId($item->id)) }}"
                                               data-description="{{$item->description}}"
                                               data-toggle="modal"
                                               data-target="#editModal"> <i class="la la-pencil"></i> Edit</a>
                                            <a class="dropdown-item dropdown-item-color btn-delete" href="#"
                                               data-url="{{ route('admin.job.title.destroy', encryptId($item->id))}}"><i class="la la-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="modal fade " id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Job Titles</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form action="{{route("admin.job.title.store")}}" method="POST" id="add-program-form">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group" >
                                        <label for="name">Name</label>
                                        <input name="name" type="text" id="name" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label for="description">Description</label>
                                        <input name="description" type="text" id="description" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle-o"></span> Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade " id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Job Titl</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form action="" method="POST" id="edit-program-form">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group" >
                                        <label for="edit-name">Name</label>
                                        <input name="name" type="text" id="edit-name" class="form-control" required/>
                                    </div>
                                    <div class="form-group" >
                                        <label for="description">Description</label>
                                        <input name="description" type="text" id="edit-description" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle-o"></span> Confirm</button>
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
        $('.nav-all-job-titles').addClass('menu-item-active');
        // $('.nav-job-titles').addClass('menu-item-active');

        $('#kt_datatable1').DataTable({
            responsive: true
        });

        $(document).on('click','.btn-edit',function(e) {
            e.preventDefault();
            $('#edit-name').val($(this).data('name'));
            $('#edit-description').val($(this).data('description'));
            $('#edit-program-form').attr("action", $(this).data('url'));
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            swal.fire({
                title: 'Are you sure?',
                text: "This Job Title Will be deleted.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#06c4ff',
                confirmButtonText: 'Yes, Continue',
                cancelButtonColor: '#ff1533',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    $(location).attr('href', url)
                }
            });
        })
    </script>
@endsection
