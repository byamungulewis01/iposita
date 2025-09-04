@extends("layouts.master")
@section("title","Dashboard")
@section('page-header')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                <!--end::Page Title-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
@stop
@section("content")
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <div class="row">
                <div class="col-md-3">
                    <!--begin::Stats Widget 29-->
                    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('assets/media/svg/shapes/abstract-2.svg')}})">
                        <!--begin::Body-->
                        <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-info">
													<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Mail-opened.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
															<path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                            <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{countBranches()}}</span>
                            <span class="font-weight-bold font-size-sm">Total Branches</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 29-->
                </div>

                <div class="col-md-3">
                    <!--begin::Stats Widget 26-->
                    <div class="card card-custom bg-primary card-stretch gutter-b">
                        <!--begin::ody-->
                        <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-white">
													<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Group.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"></polygon>
															<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
															<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{countServiceProviders()}}</span>
                            <span class="font-weight-bold font-size-sm text-white">Total Service Provider</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 26-->
                </div>

                <div class="col-md-3">
                    <!--begin::Stats Widget 27-->
                    <div class="card card-custom bg-light-success card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-success">
													<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
															<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
															<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
															<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                            <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{countServices()}}</span>
                            <span class="font-weight-bold font-size-sm">Total Services</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 27-->
                </div>
                <div class="col-md-3">
                    <!--begin::Stats Widget 27-->
                    <div class="card card-custom bg-success card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-white">
													<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
															<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
															<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
															<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{countTransactions()}}</span>
                            <span class="font-weight-bold font-size-sm text-white">Total Transactions</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 27-->
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="card-spacer bg-white card-rounded flex-grow-1 h-100">
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col px-3 py-2 ">
                                <div class="font-size-sm text-muted font-weight-bold">Monthly Sales</div>
                                <div class="font-weight-bolder" >RWF {{number_format(monthlyAmount())}}</div>
                            </div>
                            <div class="col px-3 py-2">
                                <div class="font-size-sm text-muted font-weight-bold">Annual Sales</div>
                                <div class="font-weight-bolder" >RWF {{number_format(annualAmount())}}</div>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col px-3 py-2 ">
                                <div class="font-size-sm text-muted font-weight-bold">Monthly Charges</div>
                                <div class="font-weight-bolder" >RWF {{number_format(monthlyAmount("total_charges"))}}</div>
                            </div>
                            <div class="col px-3 py-2">
                                <div class="font-size-sm text-muted font-weight-bold">Annual Charges</div>
                                <div class="font-weight-bolder">RWF {{number_format(annualAmount("total_charges"))}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <hr>
                                <h4> Charges Per Service in {{now()->year}} </h4>
                                <div id="charges-per-service"></div>
                            </div>
                        </div>

                        <!--end::Row-->
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="card card-body rounded shadow-sm border-0 h-100">
                        <h4> Total Charges Per Month in {{now()->year}} </h4>
                        <div id="charges-per-month"></div>
                    </div>
                </div>
            </div>

            <div class="row mt-10">
                <div class="col-md-12">
                    <div class="card card-body rounded shadow-sm border-0 h-100">
                        <h4> Total Sales Per Month in {{now()->year}} </h4>
                        <div id="sales-per-month"></div>
                    </div>
                </div>

                <!--end
                   <div class="col-md-4">

                       <div class="card card-custom card-shadowless gutter-b h-100">

                           <div class="card-header border-0">
                               <h3 class="card-title font-weight-bolder text-dark">Service Balances</h3>
                           </div>

                           <div class="card-body pt-2">
                               @foreach(getBalance() ?? [] as $balance)

                                   <div class="d-flex align-items-center mb-10">

                                       <div class="d-flex flex-column flex-grow-1">
                                           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">{{optional($balance->service)->name}}</a>
                                           <span class="text-muted font-weight-bold">{{optional($balance->serviceProvider)->name}}</span>
                                       </div>

                                       <div>
                                           <span class="text-dark-75 font-weight-bolder font-size-lg mb-1">{{number_format($balance->balance)}} RWF</span>
                                       </div>
                                   </div>

                               @endforeach
                           </div>

                       </div>
               </div>
               </div>


  -->
               <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@section("scripts")
    <script>
        $('.nav-dashboard').addClass('menu-item-active');

        let pieData=@json(chargesPerService());
        console.log(pieData);
        var options1 = {
            series: Object.values(pieData),
            chart: {
                type: 'donut',
            },
            plotOptions: {
                pie: {
                    startAngle: -90,
                    endAngle: 270
                }
            },
            labels: Object.keys(pieData),
            fill: {
                type: 'gradient',
            },
            legend: {
                formatter: function (val, opts) {
                    return val + " : " + opts.w.globals.series[opts.seriesIndex].toLocaleString()
                },
                position: 'bottom'
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val.toLocaleString();
                    }
                }
            },
            // title: {
            //     text: "Beneficiaries by Gender"
            // },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };
        var chartId = "#charges-per-service"
        var chart1 = new ApexCharts(document.querySelector(chartId), options1);
        chart1.render();

        var _demo13 = function () {
            let data=@json(chargesPerMonth());
            const apexChart = "#charges-per-month";
            var options12 = {
                series:[
                    {
                        name: "Total Charges",
                        data: Object.values(data)
                    }
                ],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: Object.keys(data),
                },
                yaxis: {
                    title: {
                        text: 'RWF'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return "RWF "+val.toLocaleString()
                        }
                    }
                }
            };

            var chart12 = new ApexCharts(document.querySelector(apexChart), options12);
            chart12.render();
        }

        var _demo12 = function () {
            let data=@json(salesPerMonth());
            const apexChart = "#sales-per-month";
            var options12 = {
                series:[
                    {
                        name: "Total Sales",
                        data: Object.values(data)
                    }
                ],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: Object.keys(data),
                },
                yaxis: {
                    title: {
                        text: 'RWF'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return "RWF "+val.toLocaleString()
                        }
                    }
                }
            };

            var chart12 = new ApexCharts(document.querySelector(apexChart), options12);
            chart12.render();
        }
        $(function () {
            _demo13();
            _demo12();
        });

    </script>
@stop
