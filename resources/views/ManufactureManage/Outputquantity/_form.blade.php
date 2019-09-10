<div class="form-group">
    {!! Form::label('outputdate', '日期(Date)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::date('outputdate',isset($outputdate) ? $outputdate:null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('createname', '创建人(CreateName)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('createname', isset($createname) ? $createname:null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('checkshifts', '验布班次(Checkshifts)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::select('checkshifts', array('A'=>'A','B'=>'B','C'=>'C',), ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('checkno', '检验工号(CheckNo)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('checkno', null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('insheetno', '厂编号(Fabric)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputquantity))
            {!! Form::text('insheetno', $outputquantity->processinfo->insheetno, ['class' => 'form-control', $attr,'data-toggle' => 'modal', 'data-target' => '#selectProcessinfoModal']) !!}
        @else
            {!! Form::text('insheetno', null, ['class' => 'form-control', $attr,'data-toggle' => 'modal', 'data-target' => '#selectProcessinfoModal']) !!}
        @endif
        {!! Form::hidden('processinfo_id', null, ['id' => 'processinfo_id']) !!}
    </div>

    {!! Form::label('orderquantity', '合同数量(Orderquantity)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputquantity))
            {!! Form::text('orderquantity', $outputquantity->processinfo->orderquantity, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('orderquantity', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>
</div>



<div class="form-group">
    {!! Form::label('pattern', '花型(Pattern)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputquantity))
            {!! Form::text('pattern', $outputquantity->processinfo->pattern, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('pattern', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>

    {!! Form::label('diliverydate', '交期(Plandshipdate)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputquantity))
            {!! Form::text('diliverydate', $outputquantity->processinfo->diliverydate, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('diliverydate', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('density', '纬密(Density)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputquantity))
            {!! Form::text('density', $outputquantity->processinfo->density, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('density', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>

    {!! Form::label('width', '门幅(Width)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputquantity))
            {!! Form::text('width', $outputquantity->processinfo->width, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('width', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('remark', '备注(Remark)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-7 col-sm-9'>
        {!! Form::text('remark', null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<h3><strong>生产数据/Production Data:</strong></h3>
<hr/>
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

<h3><strong>质量数据/Quantity Data:</strong></h3>
<hr/>
<div class="form-group">
    {!! Form::label('note', '织布工号(Note)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('note',null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('manufactureshifts', '班别(Manufactureshifts)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::select('manufactureshifts', array('A'=>'A','B'=>'B','C'=>'C',), ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('length', '码长(Length)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='ccol-xs-1 col-sm-1'>
        {!! Form::text('length',null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('loosewarp', '松吊经(Loosewarp)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('loosewarp', null,['class' => 'form-control',$attr,'id'=>'cd1']) !!}
    </div>

    {!! Form::label('wrongdraft', '错综(Wrongdraft)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('wrongdraft', null,['class' => 'form-control',$attr,'id'=>'cd2']) !!}
    </div>

    {!! Form::label('dentmark', '筘路(Dentmark)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('dentmark', null,['class' => 'form-control',$attr,'id'=>'cd3']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('warpstreak', '错扣(Warpstreak)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('warpstreak', null,['class' => 'form-control',$attr,'id'=>'cd4']) !!}
    </div>

    {!! Form::label('brokend_fillings', '断经/纬(Brokend_fillings)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('brokend_fillings', null,['class' => 'form-control',$attr,'id'=>'cd5']) !!}
    </div>

    {!! Form::label('hole', '破洞(Hole)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('hole', null,['class' => 'form-control',$attr,'id'=>'cd6']) !!}
    </div>

    {!! Form::label('wrongend_pick', '错花/错格(Wrongend_pick)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('wrongend_pick', null,['class' => 'form-control',$attr,'id'=>'cd7']) !!}
    </div>

    {!! Form::label('oiledend_pick', '油经/纬(Oiledend_pick)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('oiledend_pick', null,['class' => 'form-control',$attr,'id'=>'cd8']) !!}
    </div>

    {!! Form::label('shirikend_pick', '经/纬起圈(Shirikend_pick)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('shirikend_pick', null,['class' => 'form-control',$attr,'id'=>'cd9']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('doublewarp_weft', '双经/双纬(Doublewarp_weft)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('doublewarp_weft', null,['class' => 'form-control',$attr,'id'=>'cd10']) !!}
    </div>

    {!! Form::label('shw_selvedgemark', '边撑疵(Shw_selvedgemark)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('shw_selvedgemark', null,['class' => 'form-control',$attr,'id'=>'cd11']) !!}
    </div>

    {!! Form::label('colorstreaks', '色档(Colorstreaks)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('colorstreaks', null,['class' => 'form-control',$attr,'id'=>'cd12']) !!}
    </div>

    {!! Form::label('weftbar', '稀密路(Weftbar)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('weftbar', null,['class' => 'form-control',$attr,'id'=>'cd13']) !!}
    </div>

    {!! Form::label('beltweft', '带纬(Beltweft)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('beltweft', null,['class' => 'form-control',$attr,'id'=>'cd14']) !!}
    </div>

    {!! Form::label('foreignyarn', '三丝(Foreignyarn)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('foreignyarn', null,['class' => 'form-control',$attr,'id'=>'cd15']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('knots', '结头(Knots)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('knots', null,['class' => 'form-control',$attr,'id'=>'cd16']) !!}
    </div>

    {!! Form::label('neps', '棉结(Neps)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('neps', null,['class' => 'form-control',$attr,'id'=>'cd17']) !!}
    </div>

    {!! Form::label('wrongdraft', '错综(Wrongdraft)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('wrongdraft', null,['class' => 'form-control',$attr,'id'=>'cd18']) !!}
    </div>

    {!! Form::label('tw', '脱纬(Tw)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('tw', null,['class' => 'form-control',$attr,'id'=>'cd19']) !!}
    </div>

    {!! Form::label('fh', '织飞花(Fh)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('fh', null,['class' => 'form-control',$attr,'id'=>'cd20']) !!}
    </div>

    {!! Form::label('cws', '错纬纱(Cws)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('cws', null,['class' => 'form-control',$attr,'id'=>'cd21']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('th', '条花(Th)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('th', null,['class' => 'form-control',$attr,'id'=>'cd22']) !!}
    </div>

    {!! Form::label('thn', '条痕(Thn)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('thn', null,['class' => 'form-control',$attr,'id'=>'cd23']) !!}
    </div>

    {!! Form::label('bsc', '边纱长(Bsc)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('bsc', null,['class' => 'form-control',$attr,'id'=>'cd24']) !!}
    </div>

    {!! Form::label('jb', '浆癍(Jb)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('jb', null,['class' => 'form-control',$attr,'id'=>'cd25']) !!}
    </div>

    {!! Form::label('totalpoints', '总罚分(Totalpoints)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('totalpoints', null, ['class' => 'form-control', 'readonly',$attr]) !!}
    </div>

    {!! Form::label('y100points', '总罚分(100yPoints)', ['class' => 'col-xs-1 col-sm-1 control-label' ]) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('y100points', null, ['class' => 'form-control', 'readonly',$attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('grade', '等级(Grade)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('grade', null, ['class' => 'form-control', 'readonly',$attr]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
        {!! Form::submit($submitButtonText, ['class' => $btnclass, 'id' => 'btnSubmit']) !!}
    </div>
</div>

