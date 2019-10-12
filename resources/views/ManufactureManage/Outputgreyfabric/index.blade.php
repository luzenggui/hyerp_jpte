@extends('navbarerp')
@section('title', '坯布出货信息')
@section('main')
    @can('new_outputgreyfabric')
        <div class="panel-heading">
            <a href="/ManufactureManage/Outputgreyfabric/create" class="btn btn-sm btn-success">新建(New)</a>
        </div>
    @endcan
    <div class="panel-body">

            {!! Form::open(['url' => '/ManufactureManage/Outputgreyfabric/search', 'class' => 'pull-right form-inline', 'id' => 'frmSearch']) !!}
            <div class="form-group-sm">
                {!! Form::label('outputstartlabel', 'Date:', ['class' => 'control-label']) !!}
                {!! Form::date('outputsdate', null, ['class' => 'form-control']) !!}
                {!! Form::label('outputendlabel', '-', ['class' => 'control-label']) !!}
                {!! Form::date('outputedate', null, ['class' => 'form-control']) !!}

                {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => 'Fabirc/Contract No/Pattern','id'=>'key']) !!}
                {!! Form::submit('Search', ['class' => 'btn btn-default btn-sm']) !!}
            </div>
            {!! Form::close() !!}

        @if ($outputgreyfabrics->count())

            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Planedshipdate</th>
                        <th>Pattern</th>
                        <th>Fabric</th>
                        <th>PlannedQTY</th>
                        <th>SegmentQTY</th>
                        <th>QTYinspected</th>
                        <th>QTYoutput</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outputgreyfabrics as $outputgreyfabric)
                        <tr>
                            <td>
                                {{$outputgreyfabric->outputdate}}
                            </td>
                            <td>
                                {{ $outputgreyfabric->processinfo->diliverydate }}
                            </td>
                            <td>
                                {{ $outputgreyfabric->processinfo->pattern }}
                            </td>
                            <td>
                                {{ $outputgreyfabric->processinfo->insheetno }}
                            </td>
                            <td>
                                {{ $outputgreyfabric->processinfo->orderquantity }}
                            </td>
                            <td>
                                {{ $outputgreyfabric->segmentqty }}
                            </td>
                            <td>
                                {{ $outputgreyfabric->qtyinspected }}
                            </td>
                            <td>
                                {{ $outputgreyfabric->qtyoutput }}
                            </td>
                            <td>
                                @can('edit_outputgreyfabric')
                                    <a href="{{ URL::to('/ManufactureManage/Outputgreyfabric/'.$outputgreyfabric->id.'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                                @endcan
                                @can('del_outputgreyfabric')
                                    {!! Form::open(array('route' => array('Outputgreyfabric.destroy', $outputgreyfabric->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?");')) !!}
                                        {!! Form::submit('Del', ['class' => 'btn btn-danger btn-sm pull-left']) !!}
                                    {!! Form::close() !!}
                                @endcan
                                {{--<a href="{{ URL::to('/development/fabricdischarges/'.$fabricdischarge->id . '/export') }}" class="btn btn-success btn-sm pull-left">导出</a>--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
                {!! $outputgreyfabrics->setPath('/ManufactureManage/Outputgreyfabric')->appends($inputs)->links() !!}
            @else
            <div class="alert alert-warning alert-block">
                <i class="fa fa-warning"></i>
                {{'No Record', [], 'layouts'}}
            </div>
            @endif
    </div>

@stop

