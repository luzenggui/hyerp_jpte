@extends('navbarerp')
@section('title', '质量出货信息明细(Quantity and Output Detail Information)')
@section('main')

    <div class="panel-heading">
        <a href="{{ URL::to('ManufactureManage/Outputquantityitem/' . $id . '/create') }}" class="btn btn-sm btn-success">新建(New)</a>
        <a href="{{ URL::to('ManufactureManage/Outputquantityitem/' . $id . '/refresh') }}" class="btn btn-sm btn-success">刷新主数据(Refresh)</a>
    </div>

    <div class="panel-body">

    @if ($outputquantityitems->count())

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Fabricno</th>
                <th>Machineno</th>
                <th>Meter</th>
                <th>Mass</th>
                <th>Remark</th>
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
            @foreach($outputquantityitems as $outputquantityitem)
                <tr>
                    <td>
                        {{$outputquantityitem->fabricno}}
                    </td>
                    <td>
                        {{ $outputquantityitem->machineno }}
                    </td>
                    <td>
                        {{ $outputquantityitem->meter }}
                    </td>
                    <td>
                        {{ $outputquantityitem->mass }}
                    </td>
                    <td>
                        {{ $outputquantityitem->remark }}
                    </td>
                    <td>
                        {{$outputquantityitem->length}}
                    </td>
                    <td>
                        {{ $outputquantityitem->totalpoints }}
                    </td>
                    <td>
                        {{ $outputquantityitem->y100points }}
                    </td>
                    <td>
                        {{ $outputquantityitem->grade }}
                    </td>
                    @foreach($arrayflag as $key=>$value)
                        @if($value=='Y')
                            {!! Form::hidden($keylow=strtolower($key)) !!}
                            <td>
                                {{ $outputquantityitem->$keylow}}
                            </td>
                        @endif
                    @endforeach
                    <td>
                        <a href="{{ URL::to('/ManufactureManage/Outputquantityitem/'.$outputquantityitem->id.'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                        {!! Form::open(array('route' => array('Outputquantityitem.destroy', $outputquantityitem->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?");')) !!}
                            {!! Form::submit('Del', ['class' => 'btn btn-danger btn-sm pull-left']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
            {!! $outputquantityitems->links() !!}
    @else
    <div class="alert alert-warning alert-block">
        <i class="fa fa-warning"></i>
        {{'No record', [], 'layouts'}}
    </div>
    @endif

    </div>

@stop
