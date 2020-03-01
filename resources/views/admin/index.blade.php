@extends('layout')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Student Information</h5>
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
                            <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                                <thead class="thead-dark">
                                <tr role="row" class="filter">
                                    <td colspan="2">
                                        <input  type="text" class="form-control form-filter input-sm" name="studentName" id="studentName" placeholder="Name"> </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" placeholder="StudentID" name="id_no" id="id_no"> </td>
                                    <td>
                                        <select class="form-control" name="classID" id="ClassID">
                                            <option value=""> -Class- </option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" placeholder="Emergency Number" name="emergency_number" id="emergency_number"> </td>

                                </tr>

                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Emergency Number</th>

                                    {{--<th scope="col text-center"><i class="feather icon-settings"></i></th>--}}
                                    {{--<th>Father Name</th>--}}
                                    {{--<th>Mother Name</th>--}}
                                    {{--<th>Section</th>--}}
                                    {{--<th>Parents Mobile</th>--}}
                                    {{--<th>Father's Occupation </th>--}}

                                </tr>
                                </thead>

                            </table>
                        </div>
                    {{--</div>--}}
                </div>

            </div>
        </div>

@endsection

@section('js')
    <script src="{{ asset("assets/datatable/student.js") }}" ></script>
@endsection
