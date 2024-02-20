@extends('layouts.master')
@section("title","Branches")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Branches</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Branches</a>
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
                            Branches
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="javascript:void(0)" class="btn btn-primary"
                           data-toggle="modal"
                           data-target="#addModal">
                            <i class="la la-plus"></i>
                            New Branch
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
                <div data-backdrop="static" class="modal fade " id="addModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add new Branch</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form class="kt-form" id="add-user-form" action="{{route('admin.branches.store')}} "
                                  method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="row">
                                        <div class=" col-md-6 form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control"
                                                   aria-describedby="emailHelp"
                                                   placeholder="user name">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control"
                                                   aria-describedby="emailHelp"
                                                   placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Telephone</label>
                                                <input type="text" name="telephone" class="form-control"
                                                       aria-describedby="emailHelp"
                                                       placeholder="Telephone">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Branch Type</label>
                                                <select class="form-control form-control-sm" id="branch_type" name="branch_type">
                                                    <option value="Internal" selected>Internal</option>
                                                    <option value="External">External</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Province</label>
                                                <select name="province_id" class="form-control province" id="province">
                                                    <option disabled selected>--select--</option>
                                                    @foreach($provinces as $province)
                                                        <option value="{{$province->id}}"
                                                                class="form-control">{{$province->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>District</label>
                                                <select name="district_id" id="district" class="form-control district">
                                                    <option disabled selected>--select--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sector</label>
                                                <select name="sector_id" class="form-control sector" id="sector">
                                                    <option disabled selected>--select--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contract</label>
                                                <input name="contract" type="file" class="form-control" id="_contract">
                                            </div>
                                        </div>
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
                {{--user role modal--}}
                <div data-backdrop="static" class="modal fade " id="branchPercentageModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">External Branch Percentage</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form class="kt-form" id="set-percentage-form"
                                  method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="row">
                                        <div class=" col-md-12 form-group">
                                            <label>Percentage(%)</label>
                                            <input type="number" name="percentage" step="any" min="0.1" max="100" class="form-control"
                                                   aria-describedby="emailHelp"
                                                   placeholder="Branch Percentage">
                                        </div>
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

                <div data-backdrop="static" class="modal fade " id="branch-update" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Update Branch</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form class="kt-form" id="branch-update-form" action=""
                                  method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="row">
                                        <div class=" col-md-6 form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                   aria-describedby="emailHelp"
                                                   placeholder="Branch Name">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                   aria-describedby="emailHelp"
                                                   placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Telephone</label>
                                                <input type="text" name="telephone" id="telephone" class="form-control"
                                                       aria-describedby="emailHelp"
                                                       placeholder="Telephone">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Branch Type</label>
                                                <select class="form-control form-control-sm" id="branch_type" name="branch_type">
                                                    <option value="Internal" selected>Internal</option>
                                                    <option value="External">External</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Province</label>
                                                    <select name="province_id" class="form-control province" required
                                                            id="_province">
                                                        <option disabled selected class="form-control">--select--</option>

                                                        @foreach($provinces as $province)
                                                            <option value="{{$province->id}}"
                                                                    class="form-control">{{$province->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>District</label>
                                                <select name="district_id" id="_district" required
                                                        class="form-control district">
                                                    <option disabled selected class="form-control">--select--</option>
                                                    {{--                                                    <option class="form-control">Kigali</option>--}}
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sector</label>
                                                <select name="sector_id" class="form-control sector" required
                                                        id="_sector">
                                                    <option disabled selected class="form-control">--select--</option>
                                                    {{--                                                    <option class="form-control">Kigali</option>--}}
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contract</label>
                                                <input name="contract" type="file" class="form-control" id="_contract">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="is_active">Active</label>
                                                <select class="form-control form-control-sm" id="status" name="status">
                                                    <option value="Active" selected>Yes</option>
                                                    <option value="Inactive">No</option>
                                                </select>

                                            </div>
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


            </div>

        </div>
    </div>


@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(App\Http\Requests\ValidateUpdateBranch::class,'#branch-update-form') !!}
    {!! JsValidator::formRequest(App\Http\Requests\ValidateBranch::class,'#add-user-form') !!}
    {{ $dataTable->scripts() }}

    <script>
        $('.nav-branches').addClass('menu-item-open');
        var initData = function () {
            var provinceId = $('#provinceId').val();
            var districtId = $('#districtId').val();
            var sectorId = $('#sectorId').val();
            if (provinceId) {
                loadDistricts(provinceId, districtId);
                loadSector(districtId, sectorId);
            }
        };
        var loadDistricts = function (provinceId, selectedValue,element) {
            $.getJSON('/districts/' + provinceId, function (data) {
                console.log("Districts", data)
                var district = $(element);
                district.empty();
                district.append("<option value='' selected disabled>--Choose District--</option>");
                $.each(data, function (index, value) {
                    district.append('<option value="' + value.id + '">' + value.name + '</option>');
                });
                if (selectedValue)
                    district.val(selectedValue);
            });
        };
        var loadSector = function (districtId, selectedValue,sectorElement) {
            $.getJSON('/sectors/' + districtId, function (data) {
                var element = $(sectorElement);
                element.empty();
                element.append("<option value='' selected>--Choose Sector--</option>");
                $.each(data, function (index, value) {
                    element.append('<option value="' + value.id + '">' + value.name + '</option>');
                });
                if (selectedValue)
                    element.val(selectedValue);
            });
        };

        $('.province').on('change', function () {
            loadDistricts($(this).val(), 0,'.district');
        });

        $('.district').on('change', function () {
            loadSector($(this).val(), 0,'.sector');
        });


        $('#branch-update').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var href = button.data('url');
            $("#name").val($(button).data("name"));
            $("#email").val($(button).data("email"));
            $("#telephone").val($(button).data("telephone"));
            $('#branch-update-form').attr("action", $(this).data('url'));
            $('#_province').val($(button).data("province_id"))
            loadDistricts($(button).data("province_id"),$(button).data("district_id"),"#_district")
            loadSector($(button).data("district_id"),$(button).data("sector_id"),"#_sector")
            var modal = $(this);
            modal.find('form').attr('action', href)
        })

        $(document).on('click', '.delete-button', function (e) {
            e.preventDefault();
            btn = $(this);
            swal.fire({
                title: 'Are you sure!',
                text: 'This Branch  Will be Deleted!',
                icon: 'warning',
                showCancelButton: true,
                showConfirmButton: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    let link = btn.attr('href');
                    window.location.href = link;

                }
            })
        })

        $(document).on('click','.btn-set-percentage', function (e){
            e.preventDefault();
            btn = $(this);
            url = btn.data('url');
            percentage = btn.data('percentage');
            $("[name='percentage']").val(percentage);
            form = $('#set-percentage-form');
            form.attr('action',url);
        })

    </script>
@endsection
