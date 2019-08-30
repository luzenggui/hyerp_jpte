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
    @include('ManufactureManage.Processinfos._selectprocessinfomodal');
@stop

@section('script')
    @include('ManufactureManage.Processinfos._selectprocessinfojs');
@endsection