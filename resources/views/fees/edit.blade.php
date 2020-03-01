@extends('layout')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Fees</h5>
                    <div class="card-header-right">
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

                        <form method="post" action="{{ route('fees_update',$fees->id) }}" class="needs-validation" novalidate>

                            <div class="form-group row">
                                @csrf
                                <label class="col-sm-3 col-form-label" for="month">Months <span class="required">*</span></label>
                                <div class="col-sm-2 col-form-label">
                                    <select class="form-control" name="month" id="month">
                                        <option value=""> Select Months</option>
                                        @foreach($months as $month)
                                            <option value="{{$month->id}}"{{$month->id==$fees->month_id?'selected="selected"': ''}} > {{$month->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-tooltip">
                                        Select Month
                                    </div>
                                </div>
                                <label class="col-sm-0 col-form-label" for="date">Year :</label>
                                <div class="col-sm-2 col-form-label">
                                    <input type="text" class="form-control" name="year" id="year" value="{{$fees->year}}"/>
                                </div>

                            </div>


                            <div class="form-group row">
                                @csrf
                                <label class="col-sm-3 col-form-label" for="class_name">Class <span class="required">*</span></label>
                                <div class="col-sm-2 col-form-label">
                                    <select class="form-control" name="class_name" id="class_name">
                                        <option value=""> Select Class</option>
                                        @foreach($classes as $class)
                                            <option value="{{$class->id}}" {{$class->id==$fees->class_id?'selected="selected"': ''}} > {{$class->class_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-tooltip">
                                        Please create a new class.
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="admissionFees">Admission Fee (<span id="admissionFees"> </span>)</label>

                                <div class="col-sm-2 col-form-label">
                                    <input type="text" class="form-control" name="admissionFee" id="admissionFee" value="{{$fees->admissionFee}}" />
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="monthly_fee">Monthly Fee (<span id="monthly_fee"></span>) </label>
                                <div class="col-sm-2 col-form-label">
                                    <input type="text" class="form-control admissionFees" name="monthlyFee" id="monthlyFee" value="{{$fees->monthlyFee}}" />
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="exam_fee">Exam Fee (<span id="exam_fee"></span>)</label>
                                <div class="col-sm-2 col-form-label">
                                    <input type="text" class="form-control" name="examFee" id="examFee" value="{{$fees->examFee}}"/>
                                </div>

                            </div>

                            <div class="separator"></div>
                            <div class="line aligncenter">
                                <div class="form-group row">
                                    <div class="col-sm-4 col-form-label"></div>
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

    <script type="text/javascript">

        $("#class_name").on('change',function (e) {
            var element=e.target;
            e.preventDefault();
            var id= $(this).val();
            if(id==''){
                $('#admissionFees').val('');
                return false;
            }
            $.ajax({
                type:'GET',
                dataType:'json',
                url:'/student/class/fees/admissionfees/'+id,
                data:{},
                success:function (data) {
                    $('#admissionFees').text(data[0].admission_fee);
                    $('#exam_fee').text(data[0].exam_fee);
                    $('#monthly_fee').text(data[0].monthly_fee);
                }
            });

        });


    </script>


@endsection
