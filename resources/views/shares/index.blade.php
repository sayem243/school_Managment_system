
            @extends('layout')

            @section('css')
                <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
                <style>
                    input, th span {
                        cursor: pointer;
                    }
                </style>
            @endsection
            @section('main')
                <section class="content-header box box-info">
                   {{-- <h1>
                        Buttons
                        <small>Control panel</small>
                    </h1>
                    <a href="#" class="btn btn-block mini btn bg-purple margin right pull-right"><i class="fa fa-dashboard"></i> Home</a>
--}}
                    <div class="box-header">
                        <h1 class="box-title">Customers
                            <small>Customer Information Details</small>
                        </h1>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn bg-purple btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                <i class="fa fa-sign-out"></i> Create New</button>
                            <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                <i class="fa fa-th-list"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                </section>
                <section class="content">

                    <div class="callout callout-info">
                        <h4>Notification!</h4>
                        <ul>
                            <li>Instructions for how to use modals are available on the</li>
                            <li>Instructions for how to use modals are available on the</li>
                            <li>Instructions for how to use modals are available on the</li>
                            <li>Instructions for how to use modals are available on the</li>
                        </ul>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">

                                <div class="box-body table-responsive">

                                    @if(session()->get('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div><br />
                                    @endif
                                    <table id="users" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Stock Name</td>
                                            <td>Stock Price</td>
                                            <td>Stock Quantity</td>
                                            <td colspan="2">Action</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($shares as $share)
                                            <tr>
                                                <td>{{$share->id}}</td>
                                                <td>{{$share->share_name}}</td>
                                                <td>{{$share->share_price}}</td>
                                                <td>{{$share->share_qty}}</td>
                                                <td><a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary">Edit</a></td>
                                                <td><a href="{{ route('shares.destroy',$share->id)}}" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </section>

                <!-- /.row -->

            @endsection

            @section('js')
                <script src="{{ asset('adminlte/js/back.js') }}"></script>

@endsection