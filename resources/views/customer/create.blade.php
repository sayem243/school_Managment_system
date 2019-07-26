@extends('layout')

@section('main')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
               <div class="card-header">
                    <h5>Create New Customer</h5>
                    <div class="card-header-right">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested">
                            <a  href="{{ route('customer.index') }}" class="btn btn-sm indigo-bg white-font"><i class="fa fa-th-list"></i>Customer</a>
                            <a href="{{ route('customer.create') }}" class="btn btn-sm  btn-info"><i class="fas fa-sign-out-alt"></i>Add New</a>
                        </div>
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle btn-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right" x-placement="bottom-end" >
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    @if ($errors->any())
                        <div class="alert alert-danger violet" role="alert">
                            <div class="alert-icon"><i class="feather icon-alert-triangle" style="font-size: 30px;"></i></div>
                            <div class="alert-text">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="post" action="{{ route('customer.store') }}" class="needs-validation" novalidate>   @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="package">Internet Package <span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <select class="form-control" name="package_id" id="package_id" aria-describedby="validationTooltipPackagePrepend" required>
                                                <option value=""> -Choose a internet package- </option>
                                                @foreach($packages as $package)
                                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block">Customer select internet package</span>
                                            <div class="invalid-tooltip">
                                                Please provide a valid internet package.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-form-label" for="name">Customer Name <span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <input type="text" class="form-control" name="name" id="name" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Customer full name</span>
                                            <div class="invalid-tooltip">
                                                Please provide a valid customer name.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="username">Customer UserID <span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <input type="text" class="form-control" name="username" id="username" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Customer need unique user id</span>
                                            <div class="invalid-tooltip">
                                                Please provide a valid customer user id.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="mobile">Mobile No <span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <input type="text" class="form-control" name="mobile" id="mobile" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Customer valid mobile no</span>
                                            <div class="invalid-tooltip">
                                                Please provide a valid mobile no.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="email">Email Address</label>
                                        <div class="col-form-label">
                                            <input type="text" class="form-control" name="email" id="email" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Customer valid email address</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="address">Address <span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" aria-describedby="validationTooltipUsernamePrepend" required ></textarea>
                                            <span class="help-block">Customer post/courier address</span>
                                            <div class="invalid-tooltip">
                                                Please provide a customer address.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="thana">Zone Name<span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <select class="form-control" name="zone_id" id="zone_id" aria-describedby="validationTooltipPackagePrepend" required>
                                                <option value=""> -Choose a zone name - </option>
                                                @foreach($locations as $location)
                                                    @if('Zone' == $location->location_type)
                                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                             <div class="invalid-tooltip">
                                                Please provide a valid zone name.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="connectionStatus">Connection Status</label>
                                        <div class="col-form-label">
                                            <select class="form-control" name="connectionStatus" id="connectionStatus" >
                                                <option value=""> -Choose a connection status - </option>
                                                @foreach($settings as $setting)
                                                    @if($setting->type ==='Status')
                                                        <option value="{{ $setting->id }}">{{ $setting->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-form-label" for="bandWidth">Bandwidth Type</label>
                                        <div class="col-form-label">
                                            <select class="form-control" name="bandWidth" id="bandWidth" >
                                                <option value=""> -Choose a connection type - </option>
                                                @foreach($settings as $setting)
                                                    @if($setting->type ==='Bandwidth')
                                                        <option value="{{ $setting->id }}">{{ $setting->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="assignBandwidth">Assign Bandwidth
                                        </label>
                                        <div class="col-form-label">
                                            <select class="form-control" name="assignBandWidth" id="assignBandWidth" >
                                                <option value=""> -Choose a assign bandwidth - </option>
                                                @foreach($settings as $setting)
                                                    @if($setting->type ==='Assign Bandwidth')
                                                        <option value="{{ $setting->id }}">{{ $setting->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="connectionMode">Connection Mode
                                        </label>
                                        <div class="col-form-label">
                                            <select class="form-control" name="connectionMode" id="connectionMode" >
                                                <option value=""> -Choose a connection mode - </option>
                                                @foreach($settings as $setting)
                                                    @if($setting->type === 'Mode')
                                                        <option value="{{ $setting->id }}">{{ $setting->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="connectionDate">Connection Date</label>
                                        <div class="col-form-label">
                                            <input type="date" class="form-control datePicker" name="connectionDate" id="connectionDate" aria-describedby="validationTooltipUsernamePrepend" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="connectionMode">Monthly Bill</label>
                                        <div class="col-form-label">
                                            <input type="text" class="form-control" name="monthlyBill" id="monthlyBill"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="connectionMode">Opening Balance</label>
                                        <div class="col-form-label">
                                            <input type="text" class="form-control" name="openingBalance" id="openingBalance" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="separator"></div>
                        <div class="line aligncenter">
                            <div class="form-group row">
                                <div class="col-sm-5 col-form-label"></div>
                                <div class="col-form-label">
                                    <button type="submit" class="btn purple-bg white-font"> <i class="feather icon-save"></i> Save</button>
                                    <button type="reset" class="btn btn btn-outline-danger"> <i class="feather icon-refresh-ccw"></i> Cancel</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection