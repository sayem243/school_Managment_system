@extends('layout')
@section('css')

@endsection
@section('main')
     <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Customers</h5>
                    <div class="card-header-right">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
                            <a  href="{{ route('customer.import') }}" class="btn btn-sm indigo-bg white-font"><i class="fa fa-th-list"></i>Customer</a>
                            <a href="{{ route('customer.importForm') }}" class="btn btn-sm  btn-info"><i class="fas fa-sign-out-alt"></i>Add New</a>
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
                            <th scope="col">Created</th>
                            <th scope="col">Name</th>
                            <th scope="col">File</th>
                            <th scope="col text-center"><i class="feather icon-settings"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($entities as $entity)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ date('d-m-Y', strtotime($entity->created_at)) }}</td>
                                <td>{{ $entity->name }}</td><td><a href="{{ \Illuminate\Support\Facades\URL::asset("public/uploads/".$entity->file) }}" target="_blank">Download</a> </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
                                        <a href="{{ route('customer.importDelete',['id' => $entity->id]) }}" class="btn btn-sm yellow-bg white-font"><i class="fa fa-trash"></i>Delete</a>
                                        <a href="{{ route('customer.importFile',['id' => $entity->id]) }}" class="btn btn-sm  btn-info"><i class="fas fa-download"></i>Import</a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
