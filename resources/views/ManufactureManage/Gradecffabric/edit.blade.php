@extends('navbarerp')

@section('main')
    <h1>编辑(Editting)</h1>
    <hr/>
    
    {!! Form::model($gradecffabric, ['method' => 'PATCH', 'action' => ['ManufactureManage\GradecffabricController@update', $gradecffabric->id], 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Gradecffabric._form',
        [
            'submitButtonText' => 'Save',
            'attr' => '',
            'btnclass' => 'btn btn-primary',
        ])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop

