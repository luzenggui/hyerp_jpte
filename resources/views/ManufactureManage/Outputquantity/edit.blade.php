@extends('navbarerp')

@section('main')
    <h1>编辑(Editting)</h1>
    <hr/>
    
    {!! Form::model($outputquantity, ['method' => 'PATCH', 'action' => ['ManufactureManage\OutputquantityController@update', $outputquantity->id], 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Outputquantity._form',
        [
            'submitButtonText' => 'Save',
            'attr' => '',
            'btnclass' => 'btn btn-primary',
        ])
    {!! Form::close() !!}
    
    @include('errors.list')
    @include('ManufactureManage.Processinfos._selectprocessinfomodal');
@stop

@section('script')
    @include('ManufactureManage.Processinfos._selectprocessinfojs');
    <script type="text/javascript">
        jQuery(document).ready(function(e) {

            $("#length").blur(function () {
                if ($("#length").val() > 0.0 && $("#totalpoints").val() > 0.0) {
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
            $("#totalpoints").blur(function () {
                if ($("#length").val() > 0.0 && $("#totalpoints").val() > 0.0) {
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
            $("form input[id^='cd']").blur(function () {
                var v_totalpoints=0.0;
                $("form input[id^='cd']").each(function(){
                    if($(this).val()>0.0)
                        v_totalpoints += parseFloat($(this).val());
                })
                $("#totalpoints").val(v_totalpoints);

                if ($("#length").val() > 0.0 && $("#totalpoints").val() > 0.0) {
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
        });

    </script>

@endsection

