@extends('navbarerp')

@section('main')
    <h1>添加质量明细数据(Add Quantity detail data for GreyFabric )</h1>
    <hr/>
    
    {!! Form::open(['url' => 'ManufactureManage/Quantityreportitem', 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Quantityreportitem._form',
            [
                'submitButtonText' => '添加',
                'attr' => '',
                'btnclass' => 'btn btn-primary',
            ])
    {!! Form::close() !!}

    
    @include('errors.list')
@endsection

@section('script')
    <script type="text/javascript">
        jQuery(document).ready(function(e) {
                $("#length").blur(function() {
                    if ($("#length").val() > 0.0 && $("#totalpoints").val() > 0.0)
                        {
                            var v_100ypoint = ($("#totalpoints").val() / $("#length").val()) * 100;
                            var v_100ypoints = v_100ypoint.toFixed(2);
                            var v_grade;

                            if (v_100ypoints>=0.0 && v_100ypoints<24)
                            {   v_grade='A';}
                            else if(v_100ypoints>=24.00 && v_100ypoints<36.00)
                            {    v_grade='B';}
                            else
                            {   v_grade='C';}

                            $("#y100points").val(v_100ypoints);
                            $("#grade").val(v_grade);
                        }
                    });
            $("#totalpoints").blur(function() {
                if ($("#length").val() > 0.0 && $("#totalpoints").val() > 0.0)
                {
                    var v_100ypoint = ($("#totalpoints").val() / $("#length").val()) * 100;
                    var v_100ypoints = v_100ypoint.toFixed(2);
                    var v_grade;


                    if (v_100ypoints>=0.00 && v_100ypoints<24.00)
                    {v_grade='A';}
                    else if(v_100ypoints>=24.00 && v_100ypoints<36.00)
                    {    v_grade='B';}
                    else
                    {   v_grade='C';}

                    $("#y100points").val(v_100ypoints);
                    $("#grade").val(v_grade);

                     // alert(v_100ypoints + v_grade);
                }
            });
        });
    </script>
@endsection