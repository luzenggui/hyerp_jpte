@extends('navbarerp')
@section('title', '成布首落布信息')
@section('main')
    @can('new_firstffabric')
        <div class="panel-heading">
            <a href="/ManufactureManage/Firstffabric/create" class="btn btn-sm btn-success">新建(New)</a>
        </div>
    @endcan
    <div class="panel-body">

            {!! Form::open(['url' => '/ManufactureManage/Firstffabric/search', 'class' => 'pull-right form-inline', 'id' => 'frmSearch']) !!}
            <div class="form-group-sm">
                {!! Form::label('instartlabel', 'Date:', ['class' => 'control-label']) !!}
                {!! Form::date('insdate', null, ['class' => 'form-control']) !!}
                {!! Form::label('inendlabel', '-', ['class' => 'control-label']) !!}
                {!! Form::date('inedate', null, ['class' => 'form-control']) !!}

                {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => 'Fabirc/Contract No/Pattern','id'=>'key']) !!}
                {!! Form::submit('Search', ['class' => 'btn btn-default btn-sm']) !!}
            </div>
            {!! Form::close() !!}

        @if ($firstffabrics->count())

            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>ContractNo</th>
                        <th>Pattern</th>
                        <th>Fabric</th>
                        <th>Specification</th>
                        <th>Width</th>
                        <th>Planedshipdate</th>
                        <th>Length</th>
                        <th>Remark1</th>
                        <th>Remark2</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($firstffabrics as $firstffabric)
                        <tr>
                            <td>
                                {{$firstffabric->indate}}
                            </td>
                            <td>
                                {{ $firstffabric->processinfo->contractno }}
                            </td>
                            <td>
                                {{ $firstffabric->processinfo->pattern }}
                            </td>
                            <td>
                                {{ $firstffabric->processinfo->insheetno }}
                            </td>
                            <td>
                                {{ $firstffabric->processinfo->specification }}
                            </td>
                            <td>
                                {{ $firstffabric->processinfo->width }}
                            </td>
                            <td>
                                {{ $firstffabric->processinfo->diliverydate }}
                            </td>
                            <td>
                                {{ $firstffabric->length }}
                            </td>
                            <td>
                                {{ $firstffabric->remark1 }}
                            </td>
                            <td>
                                {{ $firstffabric->remark2 }}
                            </td>
                            <td>
                                @can('edit_firstffabric')
                                    <a href="{{ URL::to('/ManufactureManage/Firstffabric/'.$firstffabric->id.'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                                @endcan
                                @can('del_firstffabric')
                                    {!! Form::open(array('route' => array('Firstffabric.destroy', $firstffabric->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?");')) !!}
                                        {!! Form::submit('Del', ['class' => 'btn btn-danger btn-sm pull-left']) !!}
                                    {!! Form::close() !!}
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
                {!! $firstffabrics->setPath('/ManufactureManage/Firstffabric')->appends($inputs)->links() !!}
            @else
            <div class="alert alert-warning alert-block">
                <i class="fa fa-warning"></i>
                {{'No Record', [], 'layouts'}}
            </div>
            @endif
    </div>

@stop

