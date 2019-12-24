@extends('layout')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>New Teacher</h5>
                    <div class="card-header-right">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested">

                           {{-- <a  href="{{ route('customer.index') }}" class="btn btn-sm indigo-bg white-font"><i class="fa fa-th-list"></i>Customer</a>
                            <a href="{{ route('customer.create') }}" class="btn btn-sm  btn-info"><i class="fas fa-sign-out-alt"></i>Add New</a>
                            --}}
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
                    <div class="card-body">
                        <form method="post" action="{{ route('teacher_store') }}" class="needs-validation" enctype="multipart/form-data" novalidate>   @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="name">Name <span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <input type="text" class="form-control" name="name" id="name" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Teacher's full name</span>
                                            <div class="invalid-tooltip">
                                                Please provide a valid  name.
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-form-label" for="mobile">Mobile No <span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <input type="text" class="form-control" name="mobile" id="mobile" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Parents valid mobile no</span>
                                            <div class="invalid-tooltip">
                                                Please provide a valid mobile no.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="photo">Photo Upload<span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <input type="file" class="form-control" name="photo" id="photo" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Upload your Recent Photo</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="father_occupation">Gender</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="BSC">Bsc/Hons/Engineering  <span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <input type="text" class="form-control" name="BSC" id="BSC" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Enter Your Bachelor Degree</span>
                                            <div class="invalid-tooltip">
                                                Enter Your Bachelor Degree.
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-form-label" for="joining_date">Joining Date<span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <input type="DATE" class="form-control" name="joining_date" id="joining_date">
                                        </div>
                                    </div>


                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label class="col-form-label" for="fathername">Father's Name<span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <input type="text" class="form-control" name="fathername" id="fathername" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Father's full name</span>
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
                                        <label class="col-form-label" for="nid">NID<span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <input type="text" class="form-control" name="nid" id="nid" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="photo">CV Upload<span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <input type="file" class="form-control" name="CV" id="CV" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Upload your Updated Cv</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="MSC">M.Sc/MA/MBA  <span class="required">*</span></label>
                                        <div class="col-form-label">
                                            <input type="text" class="form-control" name="MSC" id="MSC" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Enter Your Masters Degree</span>
                                            <div class="invalid-tooltip">
                                                Enter Your Masters Degree.
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-form-label" for="mobile">PhD</label>
                                        <div class="col-form-label">
                                            <input type="text" class="form-control" name="PhD" id="PhD" aria-describedby="validationTooltipUsernamePrepend"  />
                                            <span class="help-block">Enter Your Bachelor Degree</span>
                                            <div class="invalid-tooltip">
                                                Enter Your Bachelor Degree.
                                            </div>
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

