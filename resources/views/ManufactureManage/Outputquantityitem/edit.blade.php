@extends('navbarerp')

@section('main')
    <h1>编辑(Editting)</h1>
    <hr/>
    
    {!! Form::model($outputquantityitem, ['method' => 'PATCH', 'action' => ['ManufactureManage\OutputquantityitemController@update', $outputquantityitem->id], 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Outputquantityitem._form',
        [
            'submitButtonText' => '保存',
            'attr' => '',
            'btnclass' => 'btn btn-primary',
        ])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop

