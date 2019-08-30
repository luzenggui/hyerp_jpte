@extends('navbarerp')

@section('main')
    <h1>编辑(Editting)</h1>
    <hr/>
    
    {!! Form::model($processinfo, ['method' => 'PATCH', 'action' => ['ManufactureManage\ProcessinfoController@update', $processinfo->id], 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Processinfos._form',
        [
            'submitButtonText' => 'Save',
            'attr' => '',
            'btnclass' => 'btn btn-primary',
        ])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop

