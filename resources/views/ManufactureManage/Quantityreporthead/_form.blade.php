<div class="form-group">
    {!! Form::label('djdate', '日期(DateOfInspection)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::date('djdate',isset($djdate) ? $djdate:null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('createname', '创建人(CreateName)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('createname', isset($createname) ? $createname:null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('checkno', '检验工号(CheckNo)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('checkno', null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('note', '备注(Note)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('note', null, ['class' => 'form-control', 'readonly', $attr]) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('manufactureshifts', '班别(Workshifts)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
       {!! Form::text('manufactureshifts', isset($manufactureshifts) ? $manufactureshifts:null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('pattern', '花型(Pattern)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($quantityreporthead))
            {!! Form::text('pattern', $quantityreporthead->processinfo->pattern, ['class' => 'form-control', $attr,'data-toggle' => 'modal', 'data-target' => '#selectProcessinfoModal']) !!}
        @else
            {!! Form::text('pattern', null, ['class' => 'form-control', $attr,'data-toggle' => 'modal', 'data-target' => '#selectProcessinfoModal']) !!}
        @endif
        {!! Form::hidden('processinfo_id', null, ['id' => 'processinfo_id']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('machineno', '机台号(MachineNo)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('machineno', null, ['class' => 'form-control',  $attr]) !!}
    </div>

    {!! Form::label('checkshifts', '验布班次(Checkshifts)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('checkshifts', null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('length', '码长(Length)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('length', null, ['class' => 'form-control', 'readonly',$attr]) !!}
    </div>

    {!! Form::label('totalpoints', '总罚分(TotalPoints)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('totalpoints', null,['class' => 'form-control',$attr]) !!}
    </div>


</div>

<div class="form-group">
    {!! Form::label('grade', '等级(Grade)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('grade', null,['class' => 'form-control','readonly',$attr]) !!}
    </div>

    {!! Form::label('y100points', '总罚分(100yPoints)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('y100points', null,['class' => 'form-control','readonly',$attr]) !!}
    </div>

</div>

<div class="form-group">
     {!! Form::label('density', '纬密(Density)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($quantityreporthead))
            {!! Form::text('density', $quantityreporthead->processinfo->width, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('density', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>

    {!! Form::label('width', '门幅(Width)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($quantityreporthead))
            {!! Form::text('width', $quantityreporthead->processinfo->width, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('width', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit($submitButtonText, ['class' => $btnclass, 'id' => 'btnSubmit']) !!}
    </div>
</div>

