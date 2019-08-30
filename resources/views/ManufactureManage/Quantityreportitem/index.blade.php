@extends('navbarerp')
@section('title', '质量信息明细(Quantity Detail Information)')
@section('main')

    <div class="panel-heading">
        <a href="{{ URL::to('ManufactureManage/Quantityreportitem/' . $id . '/create') }}" class="btn btn-sm btn-success">新建(New)</a>
        <a href="{{ URL::to('ManufactureManage/Quantityreportitem/' . $id . '/refresh') }}" class="btn btn-sm btn-success">刷新主数据(Refresh)</a>
    </div>

    <div class="panel-body">

    @if ($quantityreportitems->count())

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Length</th>
                <th>TotalPoints</th>
                <th>100yPoints</th>
                <th>Grade</th>
                @foreach($arrayflag as $key=>$value)
                    @if($value=='Y')
                        <th>{{$key}}</th>
                    @endif
                @endforeach
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quantityreportitems as $quantityreportitem)
                <tr>
                    <td>
                        {{$quantityreportitem->length}}
                    </td>
                    <td>
                        {{ $quantityreportitem->totalpoints }}
                    </td>
                    <td>
                        {{ $quantityreportitem->y100points }}
                    </td>
                    <td>
                        {{ $quantityreportitem->grade }}
                    </td>
                    @foreach($arrayflag as $key=>$value)
                        @if($value=='Y')
                            {!! Form::hidden($keylow=strtolower($key)) !!}
                            <td>
                                {{ $quantityreportitem->$keylow}}
                            </td>
                        @endif
                    @endforeach
                    <td>
                        <a href="{{ URL::to('/ManufactureManage/Quantityreportitem/'.$quantityreportitem->id.'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                        {!! Form::open(array('route' => array('Quantityreportitem.destroy', $quantityreportitem->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?");')) !!}
                            {!! Form::submit('Del', ['class' => 'btn btn-danger btn-sm pull-left']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <div class="alert alert-warning alert-block">
        <i class="fa fa-warning"></i>
        {{'No record', [], 'layouts'}}
    </div>
    @endif

    </div>

@stop
