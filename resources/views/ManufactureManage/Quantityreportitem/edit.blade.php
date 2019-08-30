@extends('navbarerp')

@section('main')
    <h1>编辑(Editting)</h1>
    <hr/>
    
    {!! Form::model($quantityreportitem, ['method' => 'PATCH', 'action' => ['ManufactureManage\QuantityreportitemController@update', $quantityreportitem->id], 'class' => 'form-horizontal']) !!}
        @include('ManufactureManage.Quantityreportitem._form',
        [
            'submitButtonText' => '保存',
            'attr' => '',
            'btnclass' => 'btn btn-primary',
        ])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop

