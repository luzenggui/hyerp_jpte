<div class="form-group">

    {!! Form::label('insheetno', '厂编号(Fabric)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('insheetno', null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('pattern', '花型(Pattern)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('pattern', null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('density', '纬密(Density)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('density', null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('width', '门幅(Width)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('width', null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('syarntype', '纱支(Syarntype)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('syarntype', null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('contractno', '合同号(Contractno)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('contractno', null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('diliverydate', '交期(Planedshipdate)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::date('diliverydate', isset($diliverydate) ? $diliverydate: null , ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('orderquantity', '合同数量(Orderquantity)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-3 col-sm-3'>
        {!! Form::text('orderquantity', null, ['class' => 'form-control', $attr]) !!}
    </div>

    <div class='col-xs-1 col-sm-1'>
        {!! Form::select('unit', array('M'=>'M','YD'=>'YD'),null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('specification', '产品规格(Specification)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('specification', null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>



<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit($submitButtonText, ['class' => $btnclass, 'id' => 'btnSubmit']) !!}
    </div>
</div>

