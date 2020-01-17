<div class="form-group">
    {!! Form::label('insheetno', '厂编号(Fabric)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputfinishfabric))
            {!! Form::text('insheetno', $outputfinishfabric->processinfo->insheetno, ['class' => 'form-control', $attr,'data-toggle' => 'modal', 'data-target' => '#selectProcessinfoModal']) !!}
        @else
            {!! Form::text('insheetno', null, ['class' => 'form-control', $attr,'data-toggle' => 'modal', 'data-target' => '#selectProcessinfoModal']) !!}
        @endif
        {!! Form::hidden('processinfo_id', null, ['id' => 'processinfo_id']) !!}
    </div>

    {!! Form::label('contractno', '合同号(Contractno)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputfinishfabric))
            {!! Form::text('contractno', $outputfinishfabric->processinfo->contractno, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('contractno', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('pattern', '花型(Pattern)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputfinishfabric))
            {!! Form::text('pattern', $outputfinishfabric->processinfo->pattern, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('pattern', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>

    {!! Form::label('qty', '成布数量(Quantity)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('qty', null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('specification', '规格(Specification)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputfinishfabric))
            {!! Form::text('density', $outputfinishfabric->processinfo->density, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('density', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>

    {!! Form::label('ffwidth', '成布门幅(FFWidth)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputfinishfabric))
            {!! Form::text('width', $outputfinishfabric->processinfo->width, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('width', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('diliverydate', '交期(Plandshipdate)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputfinishfabric))
            {!! Form::text('diliverydate', $outputfinishfabric->processinfo->diliverydate, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('diliverydate', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
    </div>

    {!! Form::label('yarn100m', '百米用纱(Yarn100m)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        @if(isset($outputfinishfabric))
            {!! Form::text('yarn100m', $outputfinishfabric->processinfo->yarn100m, ['class' => 'form-control','readonly', $attr]) !!}
        @else
            {!! Form::text('yarn100m', null, ['class' => 'form-control', 'readonly', $attr]) !!}
        @endif
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
    {!! Form::label('checkdate', '验布日期(Checkdate)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::date('checkdate', isset($checkdate) ? $checkdate:null, ['class' => 'form-control', $attr]) !!}
    </div>
    {!! Form::hidden('createname', isset($createname) ? $createname:null, ['class' => 'form-control']) !!}

</div>

<h3><strong>生产数据/Production Data:</strong></h3>
<hr/>
<div class="form-group">
    {!! Form::label('machineno', '织机号(Machineno)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('machineno', null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('fabricno', '落布号(Fabricno)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('fabricno',null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('weavingno', '织布号 (Weavingno)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('weavingno', null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('meter', '验布长(Meter)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('meter', null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('vol_number', '卷号(Volume number)', ['class' => 'col-xs-2 col-sm-2 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('vol_number', null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('mass', '质量问题(Mass)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-4 col-sm-4'>
        {!! Form::text('mass', null, ['class' => 'form-control', $attr]) !!}
    </div>
</div>

<h3><strong>质量数据/Quantity Data:</strong></h3>
<hr/>
<div class="form-group">
    {!! Form::label('length', '码长(Length)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='ccol-xs-1 col-sm-1'>
        {!! Form::text('length',null, ['class' => 'form-control', $attr]) !!}
    </div>

    {!! Form::label('tearing', '撕裂(Tearing)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('tearing', null,['class' => 'form-control',$attr,'id'=>'cd1']) !!}
    </div>

    {!! Form::label('skew_bow', '纬斜/纬弧(Skew_bow)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('skew_bow', null,['class' => 'form-control',$attr,'id'=>'cd9']) !!}
    </div>

    {!! Form::label('stains', '污渍(Stains)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('stains', null,['class' => 'form-control',$attr,'id'=>'cd13']) !!}
    </div>

    {!! Form::label('color_spot', '色点(Color_spot)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('color_spot', null,['class' => 'form-control',$attr,'id'=>'cd19']) !!}
    </div>

    {!! Form::label('wrinkle_bar', '皱条(Wrinkle_bar)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('wrinkle_bar', null,['class' => 'form-control',$attr,'id'=>'cd10']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('streakness', '破边/卷边/荷叶边(Streakness)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('streakness', null,['class' => 'form-control',$attr,'id'=>'cd5']) !!}
    </div>

    {!! Form::label('narrow_width', '窄幅(Narrow_width)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('narrow_width', null,['class' => 'form-control',$attr,'id'=>'cd2']) !!}
    </div>

    {!! Form::label('elastoprint', '橡弹印(Elastoprint)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('elastoprint', null,['class' => 'form-control',$attr,'id'=>'cd3']) !!}
    </div>

    {!! Form::label('colorstreaks', '色档(Colorstreaks)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('colorstreaks', null,['class' => 'form-control',$attr,'id'=>'cd4']) !!}
    </div>

    {!! Form::label('weftbar', '稀密路(Weftbar)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('weftbar', null,['class' => 'form-control',$attr,'id'=>'cd6']) !!}
    </div>

    {!! Form::label('loosewarp', '松吊经(Loosewarp)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('loosewarp', null,['class' => 'form-control',$attr,'id'=>'cd7']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('hole', '破洞(Hole)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('hole', null,['class' => 'form-control',$attr,'id'=>'cd8']) !!}
    </div>

    {!! Form::label('float', '跳花(Float)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('float', null,['class' => 'form-control',$attr,'id'=>'cd11']) !!}
    </div>

    {!! Form::label('brokenend_fillings', '断经/纬(Brokenend_fillings)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('brokenend_fillings', null,['class' => 'form-control',$attr,'id'=>'cd12']) !!}
    </div>

    {!! Form::label('shirikend_pick', '经/纬起圈(Shirikend_pick)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('shirikend_pick', null,['class' => 'form-control',$attr,'id'=>'cd14']) !!}
    </div>

    {!! Form::label('wrongend_pick', '错格(Wrongend_pick)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('wrongend_pick', null,['class' => 'form-control',$attr,'id'=>'cd15']) !!}
    </div>

    {!! Form::label('wrong_draft', '穿错(Wrong_draft)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('wrong_draft', null,['class' => 'form-control',$attr,'id'=>'cd16']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('mendingmark', '修痕(Mendingmark)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('mendingmark', null,['class' => 'form-control',$attr,'id'=>'cd17']) !!}
    </div>

    {!! Form::label('ribbon_yarn', '带纱(Ribbon_yarn)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('ribbon_yarn', null,['class' => 'form-control',$attr,'id'=>'cd20']) !!}
    </div>

    {!! Form::label('tw', '脱纬(Tw)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('tw', null,['class' => 'form-control',$attr,'id'=>'cd21']) !!}
    </div>

    {!! Form::label('fh', '飞花(Fh)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('fh', null,['class' => 'form-control',$attr,'id'=>'cd22']) !!}
    </div>

    {!! Form::label('jb', '浆斑(Jb)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('jb', null,['class' => 'form-control',$attr,'id'=>'cd23']) !!}
    </div>

    {!! Form::label('oiledend_pick', '油经/纬(Oiledend_pick)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('oiledend_pick', null,['class' => 'form-control',$attr,'id'=>'cd24']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('neps', '棉点(Neps)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('neps', null,['class' => 'form-control',$attr,'id'=>'cd25']) !!}
    </div>

    {!! Form::label('knots', '结头(Knots)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('knots', null,['class' => 'form-control',$attr,'id'=>'cd26']) !!}
    </div>

    {!! Form::label('tgby', '条干不匀(Tgby)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('tgby', null,['class' => 'form-control',$attr,'id'=>'cd26']) !!}
    </div>

    {!! Form::label('th', '条花(Th)', ['class' => 'col-xs-1 col-sm-1 control-label']) !!}
    <div class='col-xs-1 col-sm-1'>
        {!! Form::text('th', null,['class' => 'form-control',$attr,'id'=>'cd26']) !!}
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
    @if($formtype=='new')
        <div class="col-sm-offset-1 col-sm-1 pull-left">
            {!! Form::button($submitButtonText1, ['class' => $btnclass, 'id' => 'btnSubmit1']) !!}
        </div>

        <div class="col-sm-offset-1 col-sm-1 pull-right">
{{--            {!! Form::button($submitButtonText2, ['class' => $btnclass2, 'id' => 'btnSubmit2']) !!}--}}
{{--            {!! Form::submit($submitButtonText2, ['class' => $btnclass2, 'id' => 'btnSubmit2']) !!}--}}
{{--            {!! Form::button($submitButtonText2, [ 'formmethod' => 'POST','formaction' => '\ManufactureManage\OutputquantityControll@storenew', 'class' =>  $btnclass2, 'id' => 'btnSubmit2']) !!}--}}
            <a href="{{ url('/ManufactureManage/Outputfinishfabric') }}"  class="btn btn-success btn-sm">返回(Return)</a>
        </div>
    @elseif($formtype=='update')
        <div class="col-sm-offset-1 col-sm-1 pull-left">
            {!! Form::submit($submitButtonText1, ['class' => $btnclass, 'id' => 'btnSubmit1']) !!}
        </div>
    @endif
</div>

