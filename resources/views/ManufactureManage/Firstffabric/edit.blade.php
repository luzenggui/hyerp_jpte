@extends('navbarerp')

@section('main')
    <h1>编辑(Editting)</h1>
    <hr/>
    
    {!! Form::model($firstffabric, ['method' => 'PATCH', 'action' => ['ManufactureManage\FirstffabricController@update', $firstffabric->id], 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Firstffabric._form',
        [
            'submitButtonText' => 'Save',
            'attr' => '',
            'btnclass' => 'btn btn-primary',
        ])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop

