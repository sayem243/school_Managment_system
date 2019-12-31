@extends('layout')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Student Information</h5>
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
                            <table class="table table-striped table-bordered dataTable no-footer">
                                <thead class="thead-dark">
                                <tr>
                                    <th>SL</th>
                                    <th> Name</th>
                                    <th>ID</th>
                                    <th>Father Name</th>
                                    <th>Mother Name</th>
                                    <th>Section</th>
                                    <th>Parents Mobile</th>
                                    <th>Father's Occupation </th>
                                    <th scope="col text-center" class="sorting_disabled" rowspan="1" colspan="1" aria-label style="width: 24px;">
                                        <i class="feather icon-settings"></i>
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @php $i=0; @endphp
                                @foreach($admins as $admin)
                                    @php $i++ @endphp
                                    <tr>
                                        <td>{{$i}} </td>
                                        <td>{{$admin->student_name}}</td>
                                        <td>{{$admin->id_no}}</td>
                                        <td>{{$admin->fname}}</td>
                                        <td>{{$admin->mothername}}</td>
                                        <td>{{$admin->section}}</td>
                                        <td>{{$admin->father_mobile}}</td>
                                        <td>{{$admin->father_occupation}}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    {{--</div>--}}
                </div>

            </div>
        </div>

@endsection