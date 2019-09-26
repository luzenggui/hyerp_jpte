@extends('navbarerp')

@section('main')
    <h1>添加坯布出货信息(Add Finishment of Greyfabric Information)</h1>
    <hr/>
    
    {!! Form::open(['url' => 'ManufactureManage/Outputgreyfabric', 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Outputgreyfabric._form',
            [
                'submitButtonText' => '添加(Add)',
                'attr' => '',
                'btnclass' => 'btn btn-primary',
                'outputdate'=>date('Y-m-d'),
                'createname'=>Auth()->user()->name,
            ])
    {!! Form::close() !!}

    
    @include('errors.list')
    @include('ManufactureManage.Processinfos._selectprocessinfomodal')
@stop

@section('script')

    <script type="text/javascript">
        jQuery(document).ready(function(e) {
            $("#segmentqty").blur(function() {
                // $("#qtyinspected").val(1);
                // console.log('aa1');
                $.ajax({
                    type: "GET",
                    url: "{{url('ManufactureManage/Outputgreyfabric/create/summeter')}}",
                    data: {
                        "processinfo_id" : $("#processinfo_id").val(),
                        "outputdate" : $("#outputdate").val(),
                    },
                    dataType: "json",
                    error: function (xhr, ajaxOptions, thrownError) {

                        alert('error');
                    },
                    success: function (result) {
                        // alert(result);
                        $("#qtyinspected").val(result);
                    },
                });
            });
            $("#qtyoutput").blur(function() {
                if($("#qtyoutput").val()>=0)
                {
                    $("#qtyleft").val($("#qtyinspected").val()-$("#qtyoutput").val());
                }
            });
        });
    </script>
    @include('ManufactureManage.Processinfos._selectprocessinfojs');
@endsection