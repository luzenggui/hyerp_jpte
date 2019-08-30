@extends('navbarerp')

@section('main')
    <h1>添加生产数据明细(Add production detail data for GreyFabric )</h1>
    <hr/>
    
    {!! Form::open(['url' => 'ManufactureManage/Outputitems', 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Outputitems._form',
            [
                'submitButtonText' => '添加',
                'attr' => '',
                'btnclass' => 'btn btn-primary',
                'fabricno'=>1,
            ])
    {!! Form::close() !!}

    
    @include('errors.list')
@stop
