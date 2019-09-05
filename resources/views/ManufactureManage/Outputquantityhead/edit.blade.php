@extends('navbarerp')

@section('main')
    <h1>编辑(Editting)</h1>
    <hr/>
    
    {!! Form::model($outputquantityhead, ['method' => 'PATCH', 'action' => ['ManufactureManage\OutputquantityheadController@update', $outputquantityhead->id], 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Outputquantityhead._form',
        [
            'submitButtonText' => 'Save',
            'attr' => '',
            'btnclass' => 'btn btn-primary',
        ])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop

