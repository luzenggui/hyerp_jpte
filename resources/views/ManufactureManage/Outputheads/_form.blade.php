<div class="form-group">
    {!! Form::label('outputdate', '出货日期(Date)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::date('outputdate',isset($outputdate) ? $outputdate:null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('createname', '创建人(CreateName)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('createname', isset($createname) ? $createname:null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('insheetno', '厂编号(Fabric)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputhead))
            {!! Form::text('insheetno', $outputhead->processinfo->insheetno, ['class' => 'form-control', $attr,'data-toggle' => 'modal', 'data-target' => '#selectProcessinfoModal']) !!}
        @else
            {!! Form::text('insheetno', null, ['class' => 'form-control', $attr,'data-toggle' => 'modal', 'data-target' => '#selectProcessinfoModal']) !!}
        @endif
        {!! Form::hidden('processinfo_id', null, ['id' => 'processinfo_id']) !!}
    </div>

    {!! Form::label('contractno', '合同号(Contractno)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputhead))
            {!! Form::text('contractno', $outputhead->processinfo->contractno, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('contractno', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('density', '纬密(Density)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputhead))
            {!! Form::text('density', $outputhead->processinfo->density, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('density', null, ['class' => 'form-control','readonly', $attr]) !!}
        @endif
    </div>

    {!! Form::label('width', '门幅(Width)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputhead))
            {!! Form::text('width', $outputhead->processinfo->width, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('width', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('specification', '规格(Specification)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputhead))
            {!! Form::text('specification', $outputhead->processinfo->specification, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('specification', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>

    {!! Form::label('diliverydate', '交期(Plandshipdate)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputhead))
            {!! Form::text('diliverydate', $outputhead->processinfo->diliverydate, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('diliverydate', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('note', '备注(Note)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-8 col-sm-9'>
        {!! Form::text('note', null,['class' => 'form-control',$attr]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit($submitButtonText, ['class' => $btnclass, 'id' => 'btnSubmit']) !!}
    </div>
</div>

