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
                        @if (session('success'))
                            <div class="alert alert-success violet" role="alert">
                                <div class="alert-icon"><i class="feather icon-alert-triangle" style="font-size: 30px;"></i></div>
                                <div class="alert-text">
                                    {!! session('success') !!}
                                </div>
                            </div>
                        @endif
                        @if (session('warning'))
                            <div class="alert alert-danger violet" role="alert">
                                <div class="alert-icon"><i class="feather icon-alert-triangle" style="font-size: 30px;"></i></div>
                                <div class="alert-text">
                                    {!! session('warning') !!}
                                </div>
                            </div>
                        @endif

                    <div class="card-body">
                        <form method="post" action="{{ route('transaction.store') }}" class="needs-validation" novalidate>
                            <div class="form-group row">
                                @csrf
                                <label class="col-sm-3 col-form-label" for="customer_id">Customer Name <span class="required">*</span></label>
                                <div class="col-sm-6 col-form-label">
                                    <select class="form-control select2" name="customer_id" id="customer_id" aria-describedby="validationTooltipPackagePrepend" required>
                                        <option value=""> -Select customer- </option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}({{$customer->username}})</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">Customer select for receive payment</span>
                                    <div class="invalid-tooltip">
                                        Please provide a valid customer.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="paymentMonth">Payment Month <span class="required">*</span></label>
                                <div class="col-sm-6 col-form-label">
                                    <select class="form-control" name="month" id="month"  >
                                        @php ( $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'))
                                        @foreach($months as $month)
                                            <option value="{{ $month }}">{{ $month }},{{ now()->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="paymentMethod">Payment Method <span class="required">*</span></label>
                                <div class="col-sm-6 col-form-label">
                                   <select class="form-control" name="paymentMethod" id="paymentMethod"  >
                                       @foreach($methods as $method)
                                       <option value="{{ $method }}">{{ $method }}</option>
                                       @endforeach
                                   </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="amount">Amount <span class="required">*</span></label>
                                <div class="col-sm-6 col-form-label">
                                    <input type="number" class="form-control" placeholder="Enter amount" name="amount" id="amount"  />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="process">Process<span class="required">*</span></label>
                                <div class="col-sm-6 col-form-label">
                                    <select class="form-control" name="process" id="process">
                                        @foreach($process as $pro)
                                            <option value="{{ $pro }}">{{ $pro }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="collection_id">Collect To<span class="required">*</span></label>
                                <div class="col-sm-6 col-form-label">
                                    <select class="form-control" name="collection_id" id="collection_id" >
                                        @foreach($collections as $collection)
                                            <option value="{{ $collection['id'] }}">{{ $collection['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="remark">Remark</label>
                                <div class="col-sm-6 col-form-label"><textarea class="form-control" name="remark" id="remark" rows="2" ></textarea>
                                </div>
                            </div>
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