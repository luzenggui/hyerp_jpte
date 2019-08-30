@extends('navbarerp')
@section('title', '工艺单信息')
@section('main')

    <div class="panel-heading">
        <a href="Processinfos/create" class="btn btn-sm btn-success">新建(New)</a>
    </div>

    <div class="panel-body">
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
                                <a href="{{ URL::to('/ManufactureManage/Processinfos/'.$processinfo->id.'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                                {!! Form::open(array('route' => array('Processinfos.destroy', $processinfo->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?");')) !!}
                                    {!! Form::submit('Del', ['class' => 'btn btn-danger btn-sm pull-left']) !!}
                                {!! Form::close() !!}
                                {{--<a href="{{ URL::to('/development/fabricdischarges/'.$fabricdischarge->id . '/export') }}" class="btn btn-success btn-sm pull-left">导出</a>--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
            {!! $processinfos->render() !!}
            @else
            <div class="alert alert-warning alert-block">
                <i class="fa fa-warning"></i>
                {{'No Record', [], 'layouts'}}
            </div>
            @endif
    </div>

@stop

