@extends('navbarerp')
@section('title', '工艺单信息')
@section('main')
    @can('new_processinfo')
    <div class="panel-heading">
        <a href="/ManufactureManage/Processinfos/create" class="btn btn-sm btn-success">新建(New)</a>
    </div>
    @endcan
    <div class="panel-body">
        {!! Form::open(['url' => '/ManufactureManage/Processinfos/search', 'class' => 'pull-right form-inline', 'id' => 'frmSearch']) !!}
        <div class="form-group-sm">
            {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => 'Fabirc/Contract No/Pattern','id'=>'key']) !!}
            {!! Form::submit('Search', ['class' => 'btn btn-default btn-sm']) !!}
        </div>
        {!! Form::close() !!}
        @if ($processinfos->count())

            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Fabric</th>
                        <th>Pattern</th>
                        <th>Density</th>
                        <th>Width</th>
                        <th>Syarntype</th>
                        <th>Contractno</th>
                        <th>Planedshipdate</th>
                        <th>Orderedquantity</th>
                        <th>Specification</th>
                        <th>Createdate</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($processinfos as $processinfo)
                        <tr>
                            <td>
                                {{$processinfo->insheetno}}
                            </td>
                            <td>
                                {{ $processinfo->pattern }}
                            </td>
                            <td>
                                {{ $processinfo->density }}
                            </td>
                            <td>
                                {{ $processinfo->width }}
                            </td>
                            <td>
                                {{ $processinfo->syarntype }}
                            </td>
                            <td>
                                {{ $processinfo->contractno }}
                            </td>
                            <td>
                                {{ $processinfo->diliverydate }}
                            </td>
                            <td>
                                {{ $processinfo->orderquantity }}
                            </td>
                            <td>
                                {{ $processinfo->specification }}
                            </td>
                            <td>
                                {{ $processinfo->created_at }}
                            </td>
                            <td>
                                @can('edit_peocessinfo')
                                    <a href="{{ URL::to('/ManufactureManage/Processinfos/'.$processinfo->id.'/copy') }}" class="btn btn-warning btn-sm pull-left">Copy</a>
                                @endcan
                                @can('del_processinfo')
                                    <a href="{{ URL::to('/ManufactureManage/Processinfos/'.$processinfo->id.'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                                    {!! Form::open(array('route' => array('Processinfos.destroy', $processinfo->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?");')) !!}
                                        {!! Form::submit('Del', ['class' => 'btn btn-danger btn-sm pull-left']) !!}
                                    {!! Form::close() !!}
                                @endcan
                                {{--<a href="{{ URL::to('/development/fabricdischarges/'.$fabricdischarge->id . '/export') }}" class="btn btn-success btn-sm pull-left">导出</a>--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

                {!! $processinfos->setPath('/ManufactureManage/Processinfos')->appends($inputs)->links() !!}
            @else
            <div class="alert alert-warning alert-block">
                <i class="fa fa-warning"></i>
                {{'No Record', [], 'layouts'}}
            </div>
            @endif
    </div>

@stop

@section('script')
<script type="text/javascript">
    jQuery(document).ready(function(e) {
        // alert('aa');
        $("#key").val("");
    });
  </script>
@endsection