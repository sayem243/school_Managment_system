@extends('layout')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
               <div class="card-header">
                    <h5>Create New Package</h5>
                    <div class="card-header-right">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested">
                            <a  href="{{ route('internet.index') }}" class="btn btn-sm indigo-bg white-font"><i class="fa fa-th-list"></i>Package</a>
                            <a href="{{ route('internet.create') }}" class="btn btn-sm  btn-info"><i class="fas fa-sign-out-alt"></i>Add New</a>
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
                        <form method="post" action="{{ route('user.store') }}" class="needs-validation" novalidate>
                            <div class="form-group row">
                                @csrf
                                <label class="col-sm-3 col-form-label" for="name">Employee Name <span class="required">*</span></label>
                                <div class="col-sm-6 col-form-label">
                                    <input type="text" class="form-control" name="name" id="name" aria-describedby="validationTooltipUsernamePrepend" placeholder="Enter full name" required />
                                    <div class="invalid-tooltip">
                                        Please enter employee name.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="price">User Name <span class="required">*</span></label>
                                <div class="col-sm-6 col-form-label">
                                    <input type="text" class="form-control" placeholder="Enter user name" name="username" id="username" aria-describedby="validationTooltipUsernamePrepend" required />
                                    <div class="invalid-tooltip">
                                        Please provide a unique user name.
                                    </div>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="price">Email Address <span class="required">*</span></label>
                                <div class="col-sm-6 col-form-label">
                                    <input type="text" class="form-control" placeholder="Enter email address" name="email" id="email"  />

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="youtube">Mobile no</label>
                                <div class="col-sm-6 col-form-label">
                                    <input type="text" class="form-control" placeholder="Enter mobile no" name="mobile" id="mobile" aria-describedby="validationTooltipUsernamePrepend" required  /> <div class="invalid-tooltip">
                                        Please provide a unique mobile no.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="role">Role</label>
                                <div class="col-sm-6 col-form-label">
                                    <select class="form-control" name="role" id="role"  >
                                        @php ( $roles = array('admin' => 'Admin','user' => 'User'))
                                        @foreach($roles as $key => $role)
                                            <option value="{{ $key }}">{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="bdix">Password</label>
                                <div class="col-sm-6 col-form-label">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password"  />
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="akamai">Re-password</label>
                                <div class="col-sm-6 col-form-label">
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter password confirmation"  />
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