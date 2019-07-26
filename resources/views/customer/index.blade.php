@extends('layout')
@section('css')

@endsection
@section('main')
     <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Customers</h5>
                    <div class="card-header-right">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
                            <a  href="{{ route('customer.index') }}" class="btn btn-sm indigo-bg white-font"><i class="fa fa-th-list"></i>Customer</a>
                            <a href="{{ route('customer.create') }}" class="btn btn-sm  btn-info"><i class="fas fa-sign-out-alt"></i>Add New</a>
                            <a href="{{ route('transaction.create') }}" class="btn btn-sm  btn-danger"><i class="fas fa-money-bill"></i>Payment Receive</a>
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
                    <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                    <thead class="thead-dark">
                    <tr role="row" class="filter">
                        <td colspan="2">
                            <input  type="text" class="form-control form-filter input-sm" name="customerName" id="customerName" placeholder="Name"> </td>

                        </td>
                        <td>
                            <input type="text" class="form-control form-filter input-sm" placeholder="UserID" name="customerUser" id="customerUser"> </td>
                        <td>
                            <input type="text" class="form-control form-filter input-sm" placeholder="Mobile" name="customerMobile" id="customerMobile"> </td>
                        <td>
                           <select class="form-control" name="zoneId" id="zoneId">
                               <option value=""> -Zone- </option>
                               @foreach($locations as $location)
                               <option value="{{ $location->id }}">{{ $location->name }}</option>
                               @endforeach
                           </select>
                        </td>
                        <td>
                            <select class="form-control" name="package_id" id="package_id" aria-describedby="validationTooltipPackagePrepend" required>
                                <option value=""> -Package- </option>
                                @foreach($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <select class="form-control" name="bandWidth" id="bandWidth" >
                                <option value=""> -Type - </option>
                                @foreach($settings as $setting)
                                    @if($setting->type =='Bandwidth')
                                        <option value="{{ $setting->id }}">{{ $setting->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="connectionMode" id="connectionMode" >
                                <option value=""> -Mode - </option>
                                @foreach($settings as $setting)
                                    @if($setting->type =='Mode')
                                        <option value="{{ $setting->id }}">{{ $setting->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <select class="form-control" name="assignBandWidth" id="assignBandWidth" >
                                <option value=""> -Band Width - </option>
                                @foreach($settings as $setting)
                                    @if($setting->type =='Assign Bandwidth')
                                        <option value="{{ $setting->id }}">{{ $setting->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="connectionStatus" id="connectionStatus" >
                                <option value="">-Status-</option>
                                @foreach($settings as $setting)
                                    @if($setting->type =='Status')
                                        <option value="{{ $setting->id }}">{{ $setting->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td colspan="4"></td>
                    </tr>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Name</th>
                            <th scope="col">UserID</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Zone</th>
                            <th scope="col">Package</th>
                            <th scope="col">Type</th>
                            <th scope="col">Mode</th>
                            <th scope="col">Bandwidth</th>
                            <th scope="col">Status</th>
                            <th scope="col">Connected</th>
                            <th scope="col">Outstanding</th>
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
    <script src="{{ asset("assets/datatable/customer.js") }}" ></script>
@endsection