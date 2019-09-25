@extends('navbarerp')

@section('main')
    <h1>添加坯布生产质量信息(Add Production and Quantity of Greyfabric Information)</h1>
    <hr/>
    
    {!! Form::open(['url' => 'ManufactureManage/Outputquantity', 'class' => 'form-horizontal','id'=>'frmAddprd_quan']) !!}
        @include('ManufactureManage.Outputquantity._form',
            [
                'submitButtonText1' => '添加班次(Add Shifts)',
                'attr' => '',
                'submitButtonText2'=>'保存(Add)',
                'btnclass' => 'btn btn-primary',
                'btnclass2' => 'btn btn-success btn-sm',
                'outputdate'=>date('Y-m-d'),
                'createname'=>Auth()->user()->name,
                'formtype'=>'new',
            ])
    {!! Form::close() !!}

    
    @include('errors.list')
    @include('ManufactureManage.Processinfos._selectprocessinfomodal')
@stop

@section('script')
    @include('ManufactureManage.Processinfos._selectprocessinfojs');
    <script type="text/javascript">
        jQuery(document).ready(function(e) {

            $("#length").blur(function () {
                var v_length = $("#length").val();
                if (v_length != "" && isNaN(v_length)) {
                    var arr = new Array();
                    arr = v_length.split('-');
                    var v_data = parseInt(arr[1]) - parseInt(arr[0]);
                    if (v_data < 0) {
                        alert("The value is wrong!");
                        return;
                    }
                    $("#length").val(v_data);
                }
                if ($("#length").val() > 0.0 && $("#totalpoints").val() >= 0.0) {
                    var v_100ypoint = ($("#totalpoints").val() / $("#length").val()) * 100;
                    var v_100ypoints = v_100ypoint.toFixed(2);
                    var v_grade;

                    if (v_100ypoints >= 0.0 && v_100ypoints < 24) {
                        v_grade = 'A';
                    } else if (v_100ypoints >= 24.00 && v_100ypoints < 36.00) {
                        v_grade = 'B';
                    } else {
                        v_grade = 'C';
                    }

                    $("#y100points").val(v_100ypoints);
                    $("#grade").val(v_grade);
                }
            });
            $("form input[id^='cd']").blur(function () {
                var v_totalpoints = 0.0;
                $("form input[id^='cd']").each(function () {
                    if ($(this).val() > 0.0 && !isNaN($(this).val()))
                        v_totalpoints += parseFloat($(this).val());
                })
                $("#totalpoints").val(v_totalpoints);

                if ($("#length").val() > 0.0 && $("#totalpoints").val() >= 0.0) {
                    var v_100ypoint = ($("#totalpoints").val() / $("#length").val()) * 100;
                    var v_100ypoints = v_100ypoint.toFixed(2);
                    var v_grade;


                    if (v_100ypoints >= 0.00 && v_100ypoints < 24.00) {
                        v_grade = 'A';
                    } else if (v_100ypoints >= 24.00 && v_100ypoints < 36.00) {
                        v_grade = 'B';
                    } else {
                        v_grade = 'C';
                    }

                    $("#y100points").val(v_100ypoints);
                    $("#grade").val(v_grade);
                }
            });
            $("#btnSubmit1").click(function () {
                $.ajax({
                    type: "POST",
                    url: "{{url('/ManufactureManage/Outputquantity/storenew')}}",
                    data: $("form#frmAddprd_quan").serialize(),
                    dataType: "json",
                    error: function (xhr, ajaxOptions, thrownError) {
                        // alert(thrownError.substring(0, 10));
                        alert(thrownError);
                    },
                    success: function (result) {
                        $v_note = $("#note").val();
                        alert("The data for Class " + $v_note + " saves successfully!");
                        $("form input[id^='cd']").val("");
                        // $("#note").val("");
                        $("#length").val("");
                        $("#totalpoints").val("");
                        $("#y100points").val("");
                        $("#grade").val("");
                    },
                });
            });
            {{--$("#btnSubmit2").click(function () {--}}
                {{--$.ajax({--}}
                    {{--type: "POST",--}}
                    {{--url: "{{url('/ManufactureManage/Outputquantity/')}}",--}}
                    {{--data: $("form#frmAddprd_quan").serialize(),--}}
                    {{--dataType: "json",--}}
                    {{--error: function (xhr, ajaxOptions, thrownError) {--}}
                        {{--// alert(thrownError.substring(0, 10));--}}
                        {{--alert(thrownError);--}}
                    {{--},--}}
                    {{--success: function (result) {--}}
                        {{--location.href ="{{url('/ManufactureManage/Outputquantity/')}}";--}}
                    {{--},--}}
                {{--});--}}
            {{--});--}}
        });
    </script>

@endsection