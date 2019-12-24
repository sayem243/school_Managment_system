@extends('layout')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Teachers  Information</h5>
                    <div class="card-header-right">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested">
                            {{--<a  href="{{ route('internet.index') }}" class="btn btn-sm indigo-bg white-font"><i class="fa fa-th-list"></i>Package</a>--}}
                            <a href="{{ route('teacher_create') }}" class="btn btn-sm  btn-info"><i class="fas fa-sign-out-alt"></i>Add New</a>
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
                    <div class="row">
                    @foreach($teachers as $teacher)

                        <div class="col-md-6">
                            <div class="listview-item big teacher">
                                <div class="pull-left">
                                    <img src="{{ Storage::url($teacher->photo) }}" width="100px">
                                </div>
                                <div class="listview-item-body">
                                    <h2 class="listview-item-heading"><strong><a href=""> {{$teacher->name  }}</a></strong></h2>
                                    <b> Associate Professor &amp; <br>Director, MBA &amp; EMBA Programs</b> <br>Ph.D., Macquarie University, Australia <br>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                    @endforeach

                    </div>
                   {{-- end row--}}

                </div>
                {{--end of card body--}}
            </div>
        </div>
    </div>

@endsection