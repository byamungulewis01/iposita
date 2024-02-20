@extends('layouts.master')
@section('title')
    EUCL Service
@stop
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Notice-->
            @include('partial._alerts')
            <!--end::Notice-->

            <div class="d-flex flex-row mb-5">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                    <!--begin::Profile Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Body-->
                        <div class="card-body pt-4">
                            <!--begin::User-->

                            <!--begin::Contact-->
                            <div class="py-9">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Acount Name:</span>
                                    <a href="#" class="text-muted text-hover-primary">IPOSITA</a>
                                </div>

                            </div>
                            <!--end::Contact-->
                            <!--begin::Nav-->
                            <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                                <div class="navi-item mb-2">
                                    <a href="javascript:0" id="accountSammary" class="navi-link py-4">
                                        <span class="navi-icon mr-2">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path
                                                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                            fill="#000000" fill-rule="nonzero"></path>
                                                        <path
                                                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg"> Account Summary</span>
                                    </a>
                                </div>

                                <div class="navi-item mb-2">
                                    <a href="javascript:0" id="paymentRetry" class="navi-link py-4">
                                        <span class="navi-icon mr-2">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                        <path
                                                            d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                        <path
                                                            d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg">Meter History</span>
                                    </a>
                                </div>
                                <div class="navi-item mb-2">
                                    <a href="javascript:0" id="changePassword" class="navi-link py-4">
                                        <span class="navi-icon mr-2">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                        <path
                                                            d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                        <path
                                                            d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg">Change Password</span>
                                    </a>
                                </div>
                            </div>
                            <!--end::Nav-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Profile Card-->
                </div>
                <!--end::Aside-->
                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-9">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">


                        <div class="flex-wrap card-header">
                            <div class="card-title">
                                <h3 class="kt-portlet__head-title">
                                    EUCL Information
                                </h3>

                            </div>
                            {{-- <div class="card-toolbar">
                                    <a href="{{ route('admin.eucl-service.index') }}"
                                        class="btn btn-sm btn-danger float-end">Logout</a>

                                </div> --}}
                            <!--end::Dropdown-->

                        </div>

                        <!--end::Header-->
                        <!--begin::Form-->
                        <div class="card-body">
                            <div id="sammaryRespone">
                            </div>
                            <div id="paymentRetryResponse">

                            </div>
                            <div style="display: none" id="change-password-form">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <!--begin::Alert-->
                                    {{-- @include('partials._alerts') --}}
                                    <!--end::Alert-->
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Current
                                            Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="password"
                                                class="form-control form-control-lg form-control-solid mb-2"
                                                id="current_password" placeholder="Current password">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="password" class="form-control form-control-lg form-control-solid"
                                                id="new_password" placeholder="New password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Verify
                                            Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="password" class="form-control form-control-lg form-control-solid"
                                                id="confirm_password" placeholder="Verify password">
                                        </div>
                                    </div>
                                    <button type="button" id="paswordChange" class="btn btn-success mr-2">Change
                                        Password</button>
                                </div>
                            </div>
                        </div>
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <div class="card">
                <div class="card-body">
                    <h2>Vendor Account History</h2>
                    <div class="table-responsive">
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                            <thead>
                                <tr>
                                    <th># </th>
                                    <th>Transaction ID </th>
                                    <th>Meter number </th>
                                    <th>Amount</th>
                                    <th>Receipt number </th>
                                    <th>Total units</th>
                                    <th>Transaction time </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Profile Personal Information-->
@endsection
@section('scripts')
    <script>
        $(document).on('click', '#accountSammary', function() {
            $(this).addClass('active');
            $('#paymentRetry').removeClass('active');
            $('#changePassword').removeClass('active');
            $('#paymentRetryResponse').html('');
            $('#change-password-form').hide();
            let btn = $(this);
            btn.attr('disabled', true);
            btn.html(`<div class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                        </div>`);
            $.ajax({
                url: "{{ route('admin.eucl-service.sammary') }}",
                method: "get",
                dataType: 'json',
                success: function(response) {
                    if (response) {
                        // let meteName = response.meter_name;
                        if (response.messages == 'No Response Found') {

                            Swal.fire({
                                title: 'Error',
                                text: response.messagess,
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        } else {
                            // console.log(response);
                            let p3 = new Intl.NumberFormat().format(response.p3);
                            let p5 = new Intl.NumberFormat().format(response.p5);
                            let p11 = new Intl.NumberFormat().format(response.p11);

                            $('#sammaryRespone').html(`<div class="row m-0" >
                                <div class="col px-3 py-2 ">
                                    <div class="font-size-sm text-muted font-weight-bold">Account balance </div>
                                    <div class="font-weight-bolder">RWF ${p3 }</div>
                                </div>
                                <div class="col px-3 py-2">
                                    <div class="font-size-sm text-muted font-weight-bold">Daily opening balance</div>
                                    <div class="font-weight-bolder">RWF ${p5}</div>
                                </div>
                                <div class="col px-3 py-2">
                                    <div class="font-size-sm text-muted font-weight-bold">Monthly opening balance</div>
                                    <div class="font-weight-bolder">RWF ${p11}</div>
                                </div>
                            </div>`);
                        }
                    } else if (response.content && response.status) {
                        Swal.fire({
                            title: 'Error',
                            text: response.messagess,
                            icon: 'error',
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#3085d6',
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: "Something went wrong, please try again later",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                },
                error: function(response) {
                    Swal.fire({
                        title: "Error",
                        icon: "error",
                        text: "Unable to check details, try again"
                    });
                },
                complete: function() {
                    btn.html(`<span class="navi-icon mr-2">
                            <span class="svg-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path
                                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                            fill="#000000" fill-rule="nonzero"></path>
                                        <path
                                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                            fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="navi-text font-size-lg"> Account Summary</span>
                    `);

                }
            });
        });
    </script>

    <script>
        $(document).on('click', '#paymentRetry', function() {
            $(this).addClass('active');
            $('#accountSammary').removeClass('active');
            $('#changePassword').removeClass('active');

            $('#sammaryRespone').html('');
            $('#change-password-form').hide();
            $('#paymentRetryResponse').html(`<div class="input-group">
                                    <input class="form-control py-2" placeholder="Meter Number" type="search"
                                        name="meterNumber" id="meterNumber">
                                    <span class="input-group-append">
                                        <button class="btn btn-primary border-left-0 border btnCheckIdDetails"
                                            id="btnCheckIdDetails" type="button"> Check</button>
                                    </span>
                                </div>`);

        });
        $(document).on('click', '#btnCheckIdDetails', function() {

            let meter = $("#meterNumber").val();

            let btn = $(this);
            btn.attr('disabled', true);
            btn.html(`<div class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                        </div>`);
            $.ajax({
                url: "{{ route('admin.eucl-service.meterHistory') }}?meter_number=" + meter,
                method: "get",
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response) {
                        // let meteName = response.meter_name;
                        if (response.messages == 'Meter number not found') {

                            Swal.fire({
                                title: 'Error',
                                text: response.messages,
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        } else {
                            $('#paymentRetryResponse').html('');
                            let table = `<table class="table">
                                <tr><th>Receipt number</th> <th>Transaction time</th><th>Total amount</th><th>Total units</th> </tr>
                                `;

                            // Assuming response is an array of objects, each object representing a row in the table
                            response.forEach(item => {
                                // Assuming each item in the response has properties you want to display in the table
                                let row = `<tr>`;

                                // Modify the following line based on the properties in your response objects
                                row += `<td>${item.p4}</td>`;
                                const dateString = item.p3;
                                const year = dateString.slice(0, 4);
                                const month = dateString.slice(4, 6);
                                const day = dateString.slice(6, 8);
                                const hours = dateString.slice(8, 10);
                                const minutes = dateString.slice(10, 12);
                                const seconds = dateString.slice(12, 14);

                                const date = new Date(
                                    `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`
                                );
                                const formattedDate = date
                            .toLocaleString(); // Use toLocaleString for a readable format

                                row += `<td>${formattedDate}</td>`;
                                row += `<td>${item.p5}</td>`;
                                row += `<td>${item.p6}</td>`;
                                // Add more cells as needed

                                row += `</tr>`;

                                // Append the generated row to the table
                                table += row;
                            });

                            // Close the table element
                            table += `</table>`;

                            // Set the HTML of #sammaryRespone with the generated table
                            $('#sammaryRespone').html(`<div class="row m-0">${table}</div>`);
                        }
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: "Something went wrong, please try again later",
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                },
                error: function(response) {
                    Swal.fire({
                        title: "Error",
                        icon: "error",
                        text: "Unable to check details, try again"
                    });
                },
                complete: function() {
                    btn.html('Checked');

                }
            });

        });
    </script>
    <script>
        $(document).on('click', '#changePassword', function() {
            $(this).addClass('active');
            $('#accountSammary').removeClass('active');
            $('#paymentRetry').removeClass('active');
            $('#sammaryRespone').html('');
            $('#paymentRetryResponse').html('');
            $('#change-password-form').show();
            $(document).on('click', '#paswordChange', function() {
                let currect_password = $("#current_password").val();
                let new_password = $("#new_password").val();
                let confirm_password = $("#confirm_password").val();
                console.log(currect_password);
                $.ajax({
                    url: "{{ route('admin.eucl-service.changePassword') }}?currect_password=" +
                        currect_password + "&new_password=" +
                        new_password + "&confirm_password=" + confirm_password,
                    method: "get",
                    dataType: 'json',
                    success: function(response) {
                        if (response) {

                            if (response.messages == 'Not Found') {

                                Swal.fire({
                                    title: 'Error',
                                    text: response.messages,
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            } else {
                                Swal.fire({
                                    title: 'Success',
                                    text: 'Password changed',
                                    icon: 'success',
                                    confirmButtonText: 'Ok'
                                });
                            }
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: "Something went wrong, please try again later",
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            title: "Error",
                            icon: "error",
                            text: "Unable to check details, try again"
                        });
                    },
                    complete: function() {

                        $("#current_password").val('');
                        $("#new_password").val('');
                        $("#confirm_password").val('');

                    }
                });
            });

        });
    </script>
    <script>
        $(function() {
            $.ajax({
                url: "{{ route('admin.eucl-service.historyApi') }}",
                method: "get",
                dataType: 'json',
                success: function(data) {
                    data.pop();
                    // console.log(data);
                    $('#kt_datatable1').DataTable({
                        data: data,
                        processing: true,
                        columns: [{
                                data: '',
                            },
                            {
                                data: 'p0',
                            },
                            {
                                data: 'p9',
                            },
                            {
                                data: 'p4',
                            },
                            {
                                data: 'p12',
                            },
                            {
                                data: 'p14',
                            },
                        ],
                        columnDefs: [

                            {
                                targets: 0,
                                render: function(data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                }
                            },
                            {
                                targets: 6,
                                render: function(data, type, row, meta) {
                                    const dateString = row.p7;
                                    const year = dateString.slice(0, 4);
                                    const month = dateString.slice(4, 6);
                                    const day = dateString.slice(6, 8);
                                    const hours = dateString.slice(8, 10);
                                    const minutes = dateString.slice(10, 12);
                                    const seconds = dateString.slice(12, 14);

                                    const date = new Date(
                                        `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`
                                    );
                                    const formattedDate = date
                                        .toLocaleString(); // Use toLocaleString for a readable format
                                    return formattedDate;
                                }
                            },
                        ],
                    });
                }

            });
        });
    </script>
@endsection
