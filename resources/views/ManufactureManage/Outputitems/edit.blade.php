@extends('navbarerp')

@section('main')
    <h1>编辑(Editting)</h1>
    <hr/>
    
    {!! Form::model($outputitem, ['method' => 'PATCH', 'action' => ['ManufactureManage\OutputitemController@update', $outputitem->id], 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Outputitems._form',
        [
            'submitButtonText' => '保存',
            'attr' => '',
            'btnclass' => 'btn btn-primary',
        ])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop

