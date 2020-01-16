@extends('layout')
@section('css')

@endsection
@section('main')
     <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Billing</h5>
                    <div class="card-header-right">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
                            <a  href="{{ route('transaction.index') }}" class="btn btn-sm indigo-bg white-font"><i class="fa fa-th-list"></i>Billing</a>
                            <a  href="{{ route('transaction.generate') }}" class="btn btn-sm orange-bg white-font"><i class="fa fa-refresh"></i>Bill Generate</a>
                            <a href="{{ route('transaction.create') }}" class="btn btn-sm  btn-info"><i class="fas fa-sign-out-alt"></i>Add New</a>
                        </div>
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="list-unstyled dropdown-info card-option dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                <li class="dropdown-item">

                                    <a id="excelBtn" class="dropdown-item" href="javascript:"> <i class="far fa-file-excel"></i> Excel</a></li>
                                <li class="dropdown-item">
                                    <a id="pdfBtn" class="dropdown-item" href="javascript:"> <i class="far fa-file-pdf"></i> PDF</a></li>
                                <li class="dropdown-item">
                                <a id="printBtn" class="dropdown-item" href="javascript:"> <i class="fa fa-print" aria-hidden="true"></i> Print</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-block">
                    <table class="table table-striped table-bordered" style="width: 100%">
                        <thead class="thead-dark">
                        <tr role="row" class="filter">
                            <td colspan="2">
                                <input  type="date" class="form-control form-filter input-sm input-daterange" name="updated" id="updated" placeholder="date"> </td>
                            <td>
                                <input  type="text" class="form-control  input-sm" name="customerName" id="customerName" placeholder="Name"> </td>
                            <td>
                                <input type="text" class="form-control  input-sm" placeholder="Mobile" name="customerMobile" id="customerMobile"> </td>
                            <td>
                                <input type="text" class="form-control  input-sm" placeholder="Username" name="username" id="username"> </td>
                            <td>
                                <select class="form-control" name="packageId" id="packageId" >
                                    <option value=""> -Package- </option>
                                    @foreach($packages as $package)
                                        <option value="{{ $package->id }}">{{ $package->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="collectionId" id="collectionId">
                                    <option value=""> -Users- </option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td colspan="2">
                                <select class="form-control" name="zoneId" id="zoneId">
                                    <option value=""> -Zone- </option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="month" id="month"  >
                                    <option value=""> -Month- </option>
                                    @php ( $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'))
                                    @foreach($months as $month)
                                        <option value="{{ $month }}">{{ $month }},{{ now()->year }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td colspan="2">
                                <input  type="text" class="form-control form-filter input-sm" name="balance" id="balance" placeholder="Balance"> </td>
                            </td>
                            <td colspan="2">
                                <select class="form-control" name="process" id="process"  >
                                    <option value=""> -Process- </option>
                                    <option value="Paid">Paid</option>
                                    <option value="">Due</option>
                                </select>
                            </td>

                        </tr>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Date</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Username</th>
                            <th scope="col">Package</th>
                            <th scope="col">Collection</th>
                            <th scope="col">Zone</th>
                            <th scope="col">Monthly</th>
                            <th scope="col">Month</th>
                            <th scope="col">Receive</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Process</th>
                            <th scope="col text-center"><i class="feather icon-settings"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset("assets/datatable/transaction.js") }}" ></script>
@endsection