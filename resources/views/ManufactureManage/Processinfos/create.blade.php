@extends('navbarerp')

@section('main')
    <h1>添加工艺单信息(Add Process Information)</h1>
    <hr/>
    
    {!! Form::open(['url' => 'ManufactureManage/Processinfos', 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Processinfos._form',
            [
                'submitButtonText' => '添加(Add)',
                'attr' => '',
                'btnclass' => 'btn btn-primary',
                'diliverydate'=>date('Y-m-d'),
            ])
    {!! Form::close() !!}

    
    @include('errors.list')
@stop
