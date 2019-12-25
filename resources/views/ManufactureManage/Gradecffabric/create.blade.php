@extends('navbarerp')

@section('main')
    <h1>添加成布C级布信息(Add Grade C Finishfabric Information)</h1>
    <hr/>
    
    {!! Form::open(['url' => 'ManufactureManage/Gradecffabric', 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Gradecffabric._form',
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