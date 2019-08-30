@extends('navbarerp')

@section('main')
    <h1>编辑(Editting)</h1>
    <hr/>
    
    {!! Form::model($outputgreyfabric, ['method' => 'PATCH', 'action' => ['ManufactureManage\OutputgreyfabricController@update', $outputgreyfabric->id], 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Outputgreyfabric._form',
        [
            'submitButtonText' => 'Save',
            'attr' => '',
            'btnclass' => 'btn btn-primary',
        ])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop

