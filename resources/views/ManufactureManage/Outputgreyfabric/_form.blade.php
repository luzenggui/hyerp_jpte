<div class="form-group">
    {!! Form::label('insheetno', '厂编号(Fabric)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputgreyfabric))
            {!! Form::text('insheetno', $outputgreyfabric->processinfo->insheetno, ['class' => 'form-control', $attr,'data-toggle' => 'modal', 'data-target' => '#selectProcessinfoModal']) !!}
        @else
            {!! Form::text('insheetno', null, ['class' => 'form-control', $attr,'data-toggle' => 'modal', 'data-target' => '#selectProcessinfoModal']) !!}
        @endif
        {!! Form::hidden('processinfo_id', null, ['id' => 'processinfo_id']) !!}
    </div>

    {!! Form::label('outputdate', '出货日期(Outputdate)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::date('outputdate', isset($outputdate) ? $outputdate:null, ['class' => 'form-control', $attr]) !!}
    </div>


</div>

<div class="form-group">
    {!! Form::label('pattern', '花型(Pattern)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputgreyfabric))
            {!! Form::text('pattern', $outputgreyfabric->processinfo->pattern, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('pattern', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>

    {!! Form::label('diliverydate', '交期(Plannedshipdate)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputgreyfabric))
            {!! Form::date('diliverydate', $outputgreyfabric->processinfo->diliverydate, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::date('diliverydate', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('orderquantity', '合同数量(Plannedqty)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputgreyfabric))
            {!! Form::text('orderquantity', $outputgreyfabric->processinfo->orderquantity, ['class' => 'form-control', 'readonly',$attr,]) !!}
        @else
            {!! Form::text('orderquantity', null, ['class' => 'form-control','readonly', $attr,]) !!}
        @endif
    </div>

    {!! Form::label('segmentqty', '段数(Segmentqty):', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('segmentqty', null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('qtyinspected', '验布长度(Qtyinspected)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('qtyinspected',  null , ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('ifcomplete', '是否了机(Ifcomplete)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::select('ifcomplete', array('否'=>'否','是'=>'是'), ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('qtyoutput', '出货长度(Qtyoutput)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('qtyoutput', null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('qtyleft', '余下长度(Qtyleft)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('qtyleft', null, ['class' => 'form-control', 'readonly',$attr]) !!}
    </div>


    {!! Form::hidden('createname', isset($createname) ? $createname:null, ['class' => 'form-control', 'readonly',$attr]) !!}

</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit($submitButtonText, ['class' => $btnclass, 'id' => 'btnSubmit']) !!}
    </div>
</div>

