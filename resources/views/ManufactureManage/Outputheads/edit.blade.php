@extends('navbarerp')

@section('main')
    <h1>编辑(Editting)</h1>
    <hr/>
    
    {!! Form::model($outputhead, ['method' => 'PATCH', 'action' => ['ManufactureManage\OutputheadController@update', $outputhead->id], 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Outputheads._form',
        [
            'submitButtonText' => 'Save',
            'attr' => '',
            'btnclass' => 'btn btn-primary',
        ])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop

