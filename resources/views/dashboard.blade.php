
@extends('layout')
@section('css')

@endsection
@section('main')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- [ Main Content ] start -->
                <div class="row">
                    <!--[ daily sales section ] start-->
                    <div class="col-md-6 col-xl-4">
                        <div class="card daily-sales">
                            <div class="card-block">
                                <h6 class="mb-4">Daily Collection</h6>
                                <div class="row d-flex align-items-center">
                                    <div class="col-9">
                                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>{{ $todayCollection->amount }}</h3>
                                    </div>

                                    <div class="col-3 text-right">
                                        <p class="m-b-0"><i class="feather icon-users"></i> {{ $todayCollection->totalCustomer }}</p>
                                    </div>
                                </div>
                                <div class="progress m-t-30" style="height: 7px;">
                                    <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--[ daily sales section ] end-->
                    <!--[ Monthly  sales section ] starts-->
                    <div class="col-md-6 col-xl-4">
                        <div class="card Monthly-sales">
                            <div class="card-block">
                                <h6 class="mb-4">Monthly Collection</h6>
                                <div class="row d-flex align-items-center">
                                    <div class="col-9">
                                        <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-down text-c-red f-30 m-r-10"></i>{{ $monthlyCollection->amount }}</h3>
                                    </div>
                                    <div class="col-3 text-right">
                                        <p class="m-b-0"><i class="feather icon-users"></i> {{ $monthlyCollection->totalCustomer }}</p>
                                    </div>
                                </div>
                                <div class="progress m-t-30" style="height: 7px;">
                                    <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--[ Monthly  sales section ] end-->
                    <!--[ year  sales section ] starts-->
                    <div class="col-md-12 col-xl-4">
                        <div class="card card-social">
                            <div class="card-block border-bottom">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-auto">
                                       BILL
                                    </div>
                                    <div class="col text-right">
                                        <h5 class="text-c-purple mb-0">Active Customer <span class="text-muted">{{ $monthlyBill->totalCustomer }}</span></h5>
                                        <h5 class="text-c-blue mb-0">Receivable BDT <span class="text-muted">{{ number_format($monthlyBill->total) }}</span></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="row align-items-center justify-content-center card-active">
                                    <div class="col-6">
                                        <a href="{{ route('transaction.generate') }}" class="btn indigo-bg white-font">BILL GENERATION</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!--[ year  sales section ] end-->
                    <!--[ Recent Users ] start-->
                    <div class="col-xl-8 col-md-6">
                        <div class="card Recent-Users">
                            <div class="card-header">
                                <h5>Zone base Active Customers</h5>
                            </div>
                            <div class="card-block px-0 py-3">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>

                                        @foreach($locationBaseCustomers as $loc)
                                            <tr class="unread">
                                                <td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-2.jpg" alt="activity-user"></td>
                                                <td>
                                                    <h6 class="mb-1">{{ $loc->location }}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>Active</h6>
                                                </td>
                                                <td><a href="#!" class="label theme-bg text-white f-12">{{ $loc->totalCustomer }}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--[ Recent Users ] end-->

                    <!-- [ statistics year chart ] start -->
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-event">
                            <div class="card-block">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col">
                                        <h5 class="m-0">Customers on {{ date('F,Y') }}</h5>
                                    </div>
                                </div>
                                @foreach($customers as $customer)
                                    <h4 class="mt-3 f-w-300">{{ $customer->connectionStatus }} Customers
                                    </h4>
                                    <span class="d-block text-uppercase"><img class="rounded-circle" style="width:40px;" src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="activity-user"> {{ $customer->totalCustomer }}</span>
                                    <span class="d-block text-uppercase"><img class="rounded-circle" style="width:40px;" src="{{ asset('assets/images/bdt.png') }}" alt="activity-user"> {{ number_format($customer->total) }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- [ statistics year chart ] end -->

                </div>
                <!-- [ Main Content ] end -->
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection