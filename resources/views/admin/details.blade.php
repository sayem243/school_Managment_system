@extends('layout')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Student All Information </h5>
                    <div class="card-header-right">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested">

                        <a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="whatever">Open @mdo</button> </a>

                            {{--<a  href="{{ route('internet.index') }}" class="btn btn-sm indigo-bg white-font"><i class="fa fa-th-list"></i>Package</a>--}}
                            {{--<a href="{{ route('internet.create') }}" class="btn btn-sm  btn-info"><i class="fas fa-sign-out-alt"></i>Add New</a>--}}

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
                {{--<div class="card-block">--}}
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

                    {{--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Student Name: </label>
                                                {{$details->student_name}}
                                            </div>
                                            <div class="form-group">
                                                <label for=""> Father's Name :</label>
                                                {{$details->fname}}
                                            </div>
                                            <div class="form-group">
                                                <label for="">Present Address :</label>
                                                {{$details->present_address}}
                                            </div>



                                            <div class="form-group">
                                                <label class="">Father's Mobile Number :</label>
                                                {{$details->father_mobile}}
                                            </div>


                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Last Name:</label>
                                                {{$details->student_name}}
                                            </div>

                                            <div class="form-group">
                                                <label for="">Mother's Name :</label>
                                                {{$details->mothername}}
                                            </div>

                                            <div class="form-group">
                                                <label for="">Permanent Address :</label>
                                                {{$details->permanent_address}}
                                            </div>

                                            <div class="form-group">
                                                <label for="">Date of Birth :</label>
                                                {{$details->dob}}
                                            </div>

                                            <div class="form-group">
                                                <label for="">Blood Group :</label>
                                                {{$details->bloodGroup}}
                                            </div>

                                        </div>
                                    </div>

                                </div>




                </div>
                {{--</div>--}}
            </div>

        </div>
    </div>

@endsection

