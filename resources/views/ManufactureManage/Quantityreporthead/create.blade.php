@extends('navbarerp')

@section('main')
    <h1>添加坯布质量数据(Add Quantity data for GreyFabric)</h1>
    <hr/>
    
    {!! Form::open(['url' => 'ManufactureManage/Quantityreporthead', 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Quantityreporthead._form',
            [
                'submitButtonText' => '添加',
                'attr' => '',
                'btnclass' => 'btn btn-primary',
                'djdate'=>date('Y-m-d'),
                'createname'=>Auth()->user()->name,
                'manufactureshifts'=>'X',
            ])
    {!! Form::close() !!}

    
    @include('errors.list')
    @include('ManufactureManage.Processinfos._selectprocessinfomodal');
@stop

@section('script')
    @include('ManufactureManage.Processinfos._selectprocessinfojs');
@endsection