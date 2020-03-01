@extends('layout')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Transaction</h5>
                    <div class="card-header-right">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested">
                            <a href="{{ route('transaction_create') }}" class="btn btn-sm  btn-info"><i class="fas fa-sign-out-alt"></i>Add New</a>
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
                            <th>Date </th>
                            <th>Payment ID</th>
                            <th>Class </th>
                            <th>Student ID</th>
                            <th> Month</th>
                            <th>Debit</th>
                            <th>Batch of Month Fee </th>
                            <th>Due</th>
                            <th>Balance</th>

                            <th scope="col text-center" class="sorting_disabled" rowspan="1" colspan="1" aria-label style="width: 24px;">
                                <i class="feather icon-settings"></i>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=0; @endphp
                        @foreach($transactions as $transaction)
                            @php $i++ @endphp
                            <tr>
                                <td>{{$i}} </td>
                                <td>{{ date('d-m-Y', strtotime($transaction->created_at))}}</td>
                                <td>{{$transaction->payment_id}}</td>
                                <td>{{$transaction->studentclasses_id}}</td>
                                <td>{{$transaction->student_id}}</td>
                                <td>{{$transaction->batch->months['name']}}</td>
                                <td>{{ $transaction->debit }}</td>




                                {{--<td>{{$transaction->batch}} </td>--}}
                                <td>
                              {{$total_bill = $transaction->batch->examFee + $transaction->batch->admissionFee + $transaction->batch->monthlyFee}}
                               {{--@if($transaction->payment_id and )--}}
                                </td>

                                <td>
                                    @if($total_bill > $transaction->debit)
                                    {{ $due = $total_bill- $transaction->debit }}
                                        @endif
                                </td>

                                <td> @if($transaction->debit > $total_bill )
                                        {{ $balance= $transaction->debit-$total_bill }}

                                    @endif


                                    </td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                        <?php

                        ?>

                        </tbody>
                    </table>
                </div>
                {{--</div>--}}
            </div>

        </div>
    </div>

@endsection