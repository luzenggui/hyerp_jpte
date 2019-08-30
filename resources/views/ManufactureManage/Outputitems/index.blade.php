@extends('navbarerp')
@section('title', '产量纸信息(Production Information)')
@section('main')

    <div class="panel-heading">
        <a href="{{ URL::to('ManufactureManage/Outputitems/' . $id . '/create') }}" class="btn btn-sm btn-success">新建(New)</a>
    </div>

    <div class="panel-body">

    @if ($outputitems->count())

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Fabricno</th>
                <th>Machineno</th>
                <th>Meter</th>
                <th>Mass</th>
                <th>Remark</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outputitems as $outputitem)
                <tr>
                    <td>
                        {{$outputitem->fabricno}}
                    </td>
                    <td>
                        {{ $outputitem->machineno }}
                    </td>
                    <td>
                        {{ $outputitem->meter }}
                    </td>
                    <td>
                        {{ $outputitem->mass }}
                    </td>
                    <td>
                        {{ $outputitem->remark }}
                    </td>
                    <td>
                        <a href="{{ URL::to('/ManufactureManage/Outputitems/'.$outputitem->id.'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                        {!! Form::open(array('route' => array('Outputitems.destroy', $outputitem->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?");')) !!}
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
        {{'无记录', [], 'layouts'}}
    </div>
    @endif

    </div>

@stop
