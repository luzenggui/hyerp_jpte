<div class="form-group">
    {!! Form::label('fabricno', '落布号(Fabricno)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('fabricno',isset($fabricno) ? $fabricno:null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('machineno', '织机号(Machineno)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('machineno', null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('meter', '验布长(Meter)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('meter', null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('mass', '质量问题(Mass)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('mass', null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('remark', '备注(Remark)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-8 col-sm-9'>
        {!! Form::text('remark', null,['class' => 'form-control',$attr]) !!}
    </div>
</div>

{!! Form::hidden('outputhead_id', $outputhead_id, ['class' => 'form-control']) !!}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit($submitButtonText, ['class' => $btnclass, 'id' => 'btnSubmit']) !!}
    </div>
</div>

