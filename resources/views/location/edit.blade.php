@extends('layout')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Create New Location</h5>
                    <div class="card-header-right">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested">
                            <a  href="{{ route('location.index') }}" class="btn btn-sm indigo-bg white-font"><i class="fa fa-th-list"></i>Location</a>
                            <a href="{{ route('location.create') }}" class="btn btn-sm  btn-info"><i class="fas fa-sign-out-alt"></i>Add New</a>
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
                        <form method="post" action="{{ route('location.update',[$post->id]) }}" class="needs-validation" novalidate> @csrf  {{ method_field('PUT') }}
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="location_type">Location Type <span class="required">*</span></label>
                                <div class="col-sm-6 col-form-label">
                                    <select id="location_type"  class="form-control" name="location_type">
                                        <option value="">Choose a location type</option>
                                        @foreach($types as $type)
                                            <option @if ($post->location_type == $type) selected="selected" @endif  value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-tooltip">
                                        Please provide a location type.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="name">Location Name <span class="required">*</span></label>
                                <div class="col-sm-6 col-form-label">
                                    <input type="text" class="form-control" value="{{ isset($post) ? $post->name : '' }}" name="name" id="name" aria-describedby="validationTooltipUsernamePrepend" required />
                                    <div class="invalid-tooltip">
                                        Please provide a valid location name.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="parent">Parent Name</label>
                                <div class="col-sm-6 col-form-label">
                                    <select id="parent"  class="form-control" name="parent">
                                        <option value="">Choose a parent name</option>
                                        {!! $trees !!}
                                    </select>
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
@section('js')
    <script src="{{ asset("assets/datatable/location.js") }}" ></script>
@endsection