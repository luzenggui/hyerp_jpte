@extends('navbarerp')

@section('main')
    <h1>编辑(Editting)</h1>
    <hr/>
    
    {!! Form::model($quantityreporthead, ['method' => 'PATCH', 'action' => ['ManufactureManage\QuantityreportheadController@update', $quantityreporthead->id], 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Quantityreporthead._form',
        [
            'submitButtonText' => 'Save',
            'attr' => '',
            'btnclass' => 'btn btn-primary',
        ])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop

