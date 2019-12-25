@extends('navbarerp')

@section('main')
    <h1>添加成布首落布(Add First Finishment of Finishfabric Information)</h1>
    <hr/>
    
    {!! Form::open(['url' => 'ManufactureManage/Firstffabric', 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Firstffabric._form',
            [
                'submitButtonText' => '添加(Add)',
                'attr' => '',
                'btnclass' => 'btn btn-primary',
                'indate'=>date('Y-m-d',time()-5*60*60),
                'createname'=>Auth()->user()->name,
            ])
    {!! Form::close() !!}

    
    @include('errors.list')
    @include('ManufactureManage.Processinfos._selectprocessinfomodal')
@stop

@section('script')

    @include('ManufactureManage.Processinfos._selectprocessinfojs');
@endsection