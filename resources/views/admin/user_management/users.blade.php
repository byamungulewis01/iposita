@extends('layouts.master')
@section("title","User Management")
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
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
        @include('partial._alerts')
    <div class="card card-custom gutter-b">
        <div class="flex-wrap card-header">
            <div class="card-title">
                <h3 class="kt-portlet__head-title">
                    Users
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="javascript:void(0)" class="btn btn-primary"
                   data-toggle="modal"
                   data-target="#addModal" >
                    <i class="la la-plus"></i>
                    New User
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


        {{--user role modal--}}
        <div data-backdrop="static" class="modal fade" id="addModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form" id="add-user-form" action="{{route('admin.users.store')}} "
                          method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="name" class="col-form-label">Photo</label>
                                    <div class="custom-file mb-2">
                                        <input type="file" name="photo" class="custom-file-input" aria-describedby="emailHelp"
                                               placeholder="user photo">
                                        <label class="custom-file-label">Photo</label>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" aria-describedby="emailHelp"
                                           placeholder="user name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp"
                                           placeholder="Email">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Telephone</label>
                                    <input type="text" name="telephone" class="form-control"
                                           aria-describedby="emailHelp"
                                           placeholder="Telephone">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>National ID Number</label>
                                    <input type="text" name="national_id" class="form-control"
                                           required
                                           aria-describedby="emailHelp"
                                           placeholder="enter national id" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>National ID Attachment</label>
                                    <input type="file" name="nid_attachment" class="form-control"
                                           required
                                           aria-describedby="emailHelp"
                                           placeholder="Telephone">
                                </div>
                                @if(auth()->user()->branch_id)
                                    <input type="hidden" name="branch" value="{{auth()->user()->branch_id}}">
                                @else
                                    <div class="col-md-6 form-group">
                                        <label for="add-branch"> Branch</label>
                                        <select id="add-branch" name="branch" class="form-control">
                                            <option selected disabled value="">---select--</option>
                                            @foreach($branches as $branch)
                                                <option {{in_array($branch->id,request('branches')??[])?'selected':''}} value="{{$branch->id}}">{{$branch->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                    class="la la-close"></span> Close
                            </button>
                            <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                                Save User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--user update modal--}}
        <div data-backdrop="static" class="modal fade" id="edit-user-model" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form" id="edit-user-form" action=""
                          method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="name" class="col-form-label">Photo</label>
                                    <div class="custom-file mb-2">
                                        <input type="file" name="photo" class="custom-file-input" aria-describedby="emailHelp"
                                               placeholder="user photo">
                                        <label class="custom-file-label">Photo</label>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" name="name" class="form-control form-control-sm" aria-describedby="emailHelp"
                                           placeholder="user name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" name="email" class="form-control form-control-sm" aria-describedby="emailHelp"
                                           placeholder="Email">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="telephone">Telephone</label>
                                    <input id="telephone" type="text" name="telephone" class="form-control form-control-sm"
                                           aria-describedby="emailHelp"
                                           placeholder="Telephone">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control" id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>National ID Number</label>
                                    <input type="text" name="national_id" id="nationalId" class="form-control"
                                           required
                                           aria-describedby="emailHelp"
                                           placeholder="enter national id" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>National ID Attachment</label>
                                    <input type="file" name="nid_attachment" class="form-control"
                                           required
                                           aria-describedby="emailHelp"
                                           placeholder="Telephone">
                                </div>

                                @if(auth()->user()->branch_id)
                                    <input type="hidden" name="branch" value="{{auth()->user()->branch_id}}">
                                @else
                                    <div class="col-md-6 form-group">
                                        <label for="edit-branch"> Branch</label>
                                        <select id="edit-branch" name="branch" class="form-control">
                                            <option selected disabled value="">---select--</option>
                                            @foreach($branches as $branch)
                                                <option {{in_array($branch->id,request('branches')??[])?'selected':''}} value="{{$branch->id}}">{{$branch->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="col-md-6 form-group">
                                    <label for="is_active">Active</label>
                                    <select class="form-control form-control-sm" id="is_active" name="is_active">
                                        <option disabled selected>--select--</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                    class="la la-close"></span> Close
                            </button>
                            <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div data-backdrop="static" class="modal fade" id="disable-user-modal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">User Account Settings</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form" id="disable-user-form" action=""
                          method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group ">
                                <label for="reason">reason</label>
                                <textarea id="reason" name="reason" class="form-control form-control-sm" aria-describedby="emailHelp"
                                          placeholder="reason"></textarea>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                    class="la la-close"></span> Close
                            </button>
                            <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                                Confirm
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
    {!! JsValidator::formRequest(App\Http\Requests\ValidateUpdateUser::class,'#edit-user-form') !!}
    {!! JsValidator::formRequest(App\Http\Requests\ValidateUser::class,'#add-user-form') !!}
    {{ $dataTable->scripts() }}
    <script  src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        $(function(){
            bsCustomFileInput.init()
            $('.zone-container').hide();
            $('.territory-container').hide();
            $('.branch-container').hide();
        })

        $('.nav-user-managements').addClass('menu-item-active  menu-item-open');
        $('.nav-all-users').addClass('menu-item-active');

        $('#edit-user-model').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget);
            var href = button.data('url');
            $("#telephone").val($(button).data("telephone"));
            $("#email").val($(button).data("email"));
            $("#name").val($(button).data("name"));
            $("#gender").val($(button).data("gender"));
            $("#is_active").val($(button).data("is_active"));
            $("#edit-branch").val($(button).data("branch"));
            $("#nationalId").val($(button).data("national_id"));
            $('#edit-user-form').attr("action", $(this).data('url'));
            var modal = $(this);
            modal.find('form').attr('action', href)
        })

        $(document).on('click','.reset-btn', function (e){
            e.preventDefault();
            btn = $(this);
            swal.fire({
                title:'Are you sure!',
                text:'This user account  will have reset!',
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
        $(document).on('click','.reset-device-btn', function (e){
            e.preventDefault();
            btn = $(this);
            swal.fire({
                title:'Are you sure!',
                text:'This user Device ID  will have reset!',
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
        $(document).on('click','.disable-user-btn',function (e){
            e.preventDefault();
            btn = $(this);
            href = btn.attr('href');
            $("#disable-user-form").attr('action',href);

        })

    </script>
    <script>
        $(document).on('change', '#zone', function(e) {
            var zones=$(this).val()
            loadTerritory(zones, '#territory')
            $('#branch').empty();
        });

        $(document).on('change', '#territory', function(e) {
            var territories=$(this).val()
            loadBranch(territories, '#branch')
        });
    </script>

    @endsection
