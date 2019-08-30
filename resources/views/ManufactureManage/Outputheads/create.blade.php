@extends('navbarerp')

@section('main')
    <h1>添加坯布生产数据(Add production data for GreyFabric)</h1>
    <hr/>
    
    {!! Form::open(['url' => 'ManufactureManage/Outputheads', 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Outputheads._form',
            [
                'submitButtonText' => '添加',
                'attr' => '',
                'btnclass' => 'btn btn-primary',
                'outputdate'=>date('Y-m-d'),
                'createname'=>Auth()->user()->name,
            ])
    {!! Form::close() !!}

    
    @include('errors.list')
    @include('ManufactureManage.Processinfos._selectprocessinfomodal');
@stop

@section('script')
    @include('ManufactureManage.Processinfos._selectprocessinfojs');
@endsection