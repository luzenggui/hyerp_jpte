<div class="form-group">
    {!! Form::label('pattern', '花型(Pattern)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($firstffabric))
            {!! Form::text('pattern', $firstffabric->processinfo->pattern, ['class' => 'form-control', $attr,'data-toggle' => 'modal', 'data-target' => '#selectProcessinfoModal']) !!}
        @else
            {!! Form::text('pattern', null, ['class' => 'form-control', $attr,'data-toggle' => 'modal', 'data-target' => '#selectProcessinfoModal']) !!}
        @endif
        {!! Form::hidden('processinfo_id', null, ['id' => 'processinfo_id']) !!}
    </div>

    {!! Form::label('indate', '日期(Indate)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::date('indate', isset($indate) ? $indate:null, ['class' => 'form-control', $attr]) !!}
    </div>


</div>

<div class="form-group">
    {!! Form::label('diliverydate', '交期(Plannedshipdate)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($firstffabric))
            {!! Form::date('diliverydate', $firstffabric->processinfo->diliverydate, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::date('diliverydate', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>

    {!! Form::label('contractno', '合同号(ContractNo)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($firstffabric))
            {!! Form::text('contractno', $firstffabric->processinfo->contractno, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('contractno', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('specification', '产品规格(Specification)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($firstffabric))
            {!! Form::text('specification', $firstffabric->processinfo->specification, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('specification', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>


    {!! Form::label('width', '坯布门幅(GF_Width)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($firstffabric))
            {!! Form::text('width', $firstffabric->processinfo->width, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('width', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('Length', '码长(Length)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('length',  null , ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('remark1', '备注1(Remark1)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('remark1',  null , ['class' => 'form-control', $attr]) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('remark2', '备注2(Remark2)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('remark2',  null , ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::hidden('createname', isset($createname) ? $createname:null, ['class' => 'form-control', 'readonly',$attr]) !!}

</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit($submitButtonText, ['class' => $btnclass, 'id' => 'btnSubmit']) !!}
    </div>
</div>

