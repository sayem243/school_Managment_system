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
                                        <label class="col-sm-4 col-form-label" for="studentID" >Student ID <span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="student_name" id="student_name" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Student ID</span>
                                            <div class="invalid-tooltip">
                                                Please provide a valid Student ID.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="debit">Debit Amount<span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="debit" id="debit" aria-describedby="validationTooltipUsernamePrepend" required />
                                            <span class="help-block">Debit</span>
                                            <div class="invalid-tooltip">
                                               Debit
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="studentclasses_id">Class <span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="studentclasses_id">
                                                <option value="">Select Class</option>
                                                @foreach($classes as $class)
                                                    <option value="{{$class->id}}"> {{$class->class_name  .$class->group}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="credit">Credit Amount <span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="emergency_number" id="emergency_number" aria-describedby="validationTooltipUsernamePrepend"  />
                                            <span class="help-block">Credit :</span>
                                            <div class="invalid-tooltip">
                                                Credit Amount
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

