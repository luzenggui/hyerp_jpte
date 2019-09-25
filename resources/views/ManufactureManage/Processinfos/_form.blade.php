<div class="form-group">
    {!! Form::label('insheetno', '厂编号(Fabric)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($prcessinfo))
            {!! Form::text('insheetno',$prcessinfo->insheetno ,null, ['class' => 'form-control', $attr]) !!}
         @else
            {!! Form::text('insheetno', null, ['class' => 'form-control', $attr]) !!}
         @endif
    </div>

    {!! Form::label('pattern', '花型(Pattern)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($prcessinfo))
            {!! Form::text('pattern',$prcessinfo->pattern,null, ['class' => 'form-control', $attr]) !!}
        @else
            {!! Form::text('pattern', null, ['class' => 'form-control', $attr]) !!}
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('width', '坯布门幅(GF_Width)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($prcessinfo))
            {!! Form::text('width',$prcessinfo->width,null, ['class' => 'form-control', $attr]) !!}
        @else
            {!! Form::text('width', null, ['class' => 'form-control', $attr]) !!}
        @endif
    </div>

    {!! Form::label('ffwidth', '成布门幅(FF_Width)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($prcessinfo))
            {!! Form::text('ffwidth',$prcessinfo->fdwidth,null, ['class' => 'form-control', $attr]) !!}
        @else
            {!! Form::text('ffwidth', null, ['class' => 'form-control', $attr]) !!}
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('syarntype', '纱支(Syarntype)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($prcessinfo))
            {!! Form::text('syarntype',$prcessinfo->syarntype,null, ['class' => 'form-control', $attr]) !!}
        @else
            {!! Form::text('syarntype', null, ['class' => 'form-control', $attr]) !!}
        @endif
    </div>

    {!! Form::label('specification', '产品规格(Specification)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($prcessinfo))
            {!! Form::text('specification',$prcessinfo->specification,null, ['class' => 'form-control', $attr]) !!}
        @else
            {!! Form::text('specification', null, ['class' => 'form-control', $attr]) !!}
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('density', '纬密(Density)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($prcessinfo))
            {!! Form::text('density',$prcessinfo->density,null, ['class' => 'form-control', $attr]) !!}
        @else
            {!! Form::text('density', null, ['class' => 'form-control', $attr]) !!}
        @endif
    </div>

    {!! Form::label('diliverydate', '交期(Planedshipdate)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($prcessinfo))
            {!! Form::text('diliverydate',$prcessinfo->diliverydate,null, ['class' => 'form-control', $attr]) !!}
        @else
            {!! Form::date('diliverydate', isset($diliverydate) ? $diliverydate : null, ['class' => 'form-control', $attr]) !!}
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('orderquantity', '合同数量(Orderquantity)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-3 col-sm-3'>
        @if(isset($prcessinfo))
            {!! Form::text('orderquantity',$prcessinfo->orderquantity,null, ['class' => 'form-control', $attr]) !!}
        @else
            {!! Form::text('orderquantity', null, ['class' => 'form-control', $attr]) !!}
        @endif
    </div>

    <div class='col-xs-1 col-sm-1'>
        @if(isset($prcessinfo))
            {!! Form::text('unit',$prcessinfo->unit,null, ['class' => 'form-control', $attr]) !!}
        @else
            {!! Form::select('unit', array('YD'=>'YD','M'=>'M'),null, ['class' => 'form-control', $attr]) !!}
        @endif
    </div>

    {!! Form::label('contractno', '合同号(Contractno)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($prcessinfo))
            {!! Form::text('contractno',$prcessinfo->contractno,null, ['class' => 'form-control', $attr]) !!}
        @else
            {!! Form::text('contractno', null, ['class' => 'form-control', $attr]) !!}
        @endif
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit($submitButtonText, ['class' => $btnclass, 'id' => 'btnSubmit']) !!}
    </div>
</div>

