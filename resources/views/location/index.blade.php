
@extends('layout')
@section('css')

@endsection
@section('main')
     <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Location</h5>
                    <div class="card-header-right">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
                            <a  href="{{ route('location.index') }}" class="btn btn-sm indigo-bg white-font"><i class="fa fa-th-list"></i>Location</a>
                            <a href="{{ route('location.create') }}" class="btn btn-sm  btn-info"><i class="fas fa-sign-out-alt"></i>Add New</a>
                        </div>
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="list-unstyled dropdown-info card-option dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                <li class="dropdown-item">

                                    <a id="excelBtn" class="dropdown-item" href="javascript:"> <i class="far fa-file-excel"></i> Excel</a></li>
                                <li class="dropdown-item">
                                    <a id="pdfBtn" class="dropdown-item" href="javascript:"> <i class="far fa-file-pdf"></i> PDF</a></li>
                                <li class="dropdown-item">
                                <a id="printBtn" class="dropdown-item" href="javascript:"> <i class="fa fa-print" aria-hidden="true"></i> Print</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-block">
                    <table class="table table-striped table-bordered" style="width: 100%">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Name</th>
                            <th scope="col">Parent</th>
                            <th scope="col">Type</th>
                            <th scope="col text-center"><i class="feather icon-settings"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset("assets/datatable/location.js") }}" ></script>
@endsection