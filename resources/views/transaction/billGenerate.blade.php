@extends('layout')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
               <div class="card-header">
                    <h5>Receive Payment</h5>
                    <div class="card-header-right">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested">
                            <a  href="{{ route('transaction.index') }}" class="btn btn-sm indigo-bg white-font"><i class="fa fa-th-list"></i>Billing</a>
                            <a href="{{ route('transaction.create') }}" class="btn btn-sm  btn-info"><i class="fas fa-sign-out-alt"></i>Add New</a>
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
                        <form method="post" action="{{ route('transaction.billcreate') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="zone_id">Customer Zone <span class="required">*</span></label>
                                <div class="col-sm-6 col-form-label">
                                    <select class="form-control" name="zone_id" id="zone_id" aria-describedby="validationTooltipPackagePrepend" required>
                                        <option value=""> --- Select Zone --- </option>
                                        @foreach($zones as $zone)
                                            <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-tooltip">
                                        Please provide a valid zone.
                                    </div>
                                </div>
                            </div>
                            {{--<div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="collection_id">Collection User </label>
                                <div class="col-sm-6 col-form-label">
                                    <select class="form-control" name="collection_id" id="collection_id" >
                                        <option value=""> --- Select Collection User --- </option>
                                        @foreach($collections as $collection)
                                            <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="package_id">Internet Package </label>
                                <div class="col-sm-6 col-form-label">
                                    <select class="form-control" name="package_id" id="package_id" >
                                        <option value=""> --- Select Internet Package --- </option>
                                        @foreach($packages as $package)
                                            <option value="{{ $package->id }}">{{ $package->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>--}}

                        <div class="separator"></div>
                        <div class="line aligncenter">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label"></div>
                                <div class="col-sm-6 col-form-label">
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