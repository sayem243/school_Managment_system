@extends('layout')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Student Transaction Table</h5>
                    <div class="card-header-right">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested">

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
                        <form method="post" action="{{ route('student_store') }}" class="needs-validation" novalidate>   @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row ">
                                        <label class="col-sm-4 col-form-label" for="name" >Student Name <span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="student_name" id="student_name" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Student full name</span>
                                            <div class="invalid-tooltip">
                                                Please provide a valid Student name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="name">Father's Name<span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="fname" id="fname" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Father's full name</span>
                                            <div class="invalid-tooltip">
                                                Please provide Fathers Name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="mobile">Father's Mobile No <span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="father_mobile" id="father_mobile" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Parents valid mobile no</span>
                                            <div class="invalid-tooltip">
                                                Please provide a valid Father's Mobile No.
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="photo">Student Photo<span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="file" class="form-control" name="photo" id="photo" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Upload your Recent Photo</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="bloodGroup">Blood Group</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="bloodGroup" id="bloodGroup" aria-describedby="validationTooltipUsernamePrepend"  />
                                            <span class="help-block">Please provide valid email address</span>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="email">Email Address</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="email" id="email" aria-describedby="validationTooltipUsernamePrepend"  />
                                            <span class="help-block">Please provide valid email address</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="permanent_address">Permanent Address <span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control" name="permanent_address" id="permanent_address" rows="2" aria-describedby="validationTooltipUsernamePrepend" required ></textarea>
                                            <span class="help-block">Permanent Address </span>
                                            <div class="invalid-tooltip">
                                                Please provide Permanent Address
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row ">
                                        <label class="col-sm-4 col-form-label" for="connectionDate">Date of Birth</label>
                                        <div class="col-sm-7">
                                            <input type="date" class="form-control datePicker" name="dob" id="dob" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Date of Birth </span>
                                            <div class="invalid-tooltip">
                                                Please provide your Excat Birth Date.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="name">Mother's Name<span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="mothername" id="mothername" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Mother's full name</span>
                                            <div class="invalid-tooltip">
                                                Please provide Mother's Name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="mobile">Mother's Mobile No <span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="mother_mobile" id="mother_mobile" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Parents valid mobile no</span>
                                            <div class="invalid-tooltip">
                                                Please provide a valid Mother's Mobile No.
                                            </div>
                                        </div>
                                    </div>




                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="emergency_number">Emergency Number <span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="emergency_number" id="emergency_number" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Parents valid mobile no</span>
                                            <div class="invalid-tooltip">
                                                Please provide a Emergency Mobile No.
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="father_occupation">Gender</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="gender" id="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            <span class="help-block">Select Your Gender </span>
                                            <div class="invalid-tooltip">
                                                Please Select Your Gender
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="father_occupation">Fathers Occupation<span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="father_occupation" id="father_occupation" />

                                            <span class="help-block">Father's Occupation </span>
                                            <div class="invalid-tooltip">
                                                Please provide a Father's Occupation
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="present_address"> Present Address <span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control" name="present_address" id="present_address" rows="2" aria-describedby="validationTooltipUsernamePrepend" required ></textarea>
                                            <span class="help-block">Present Address </span>
                                            <div class="invalid-tooltip">
                                                Please provide Present Address
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

