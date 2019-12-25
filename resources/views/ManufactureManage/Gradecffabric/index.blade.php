@extends('navbarerp')
@section('title', '成布C级布信息')
@section('main')
    @can('new_gradecfabric')
        <div class="panel-heading">
            <a href="/ManufactureManage/Gradecffabric/create" class="btn btn-sm btn-success">新建(New)</a>
        </div>
    @endcan
    <div class="panel-body">

            {!! Form::open(['url' => '/ManufactureManage/Gradecffabric/search', 'class' => 'pull-right form-inline', 'id' => 'frmSearch']) !!}
            <div class="form-group-sm">
                {!! Form::label('instartlabel', 'Date:', ['class' => 'control-label']) !!}
                {!! Form::date('insdate', null, ['class' => 'form-control']) !!}
                {!! Form::label('inendlabel', '-', ['class' => 'control-label']) !!}
                {!! Form::date('inedate', null, ['class' => 'form-control']) !!}

                {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => 'Fabirc/Contract No/Pattern','id'=>'key']) !!}
                {!! Form::submit('Search', ['class' => 'btn btn-default btn-sm']) !!}
            </div>
            {!! Form::close() !!}

        @if ($gradecffabrics->count())

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
                    @foreach($gradecffabrics as $gradecffabric)
                        <tr>
                            <td>
                                {{$gradecffabric->indate}}
                            </td>
                            <td>
                                {{ $gradecffabric->processinfo->contractno }}
                            </td>
                            <td>
                                {{ $gradecffabric->processinfo->pattern }}
                            </td>
                            <td>
                                {{ $gradecffabric->processinfo->insheetno }}
                            </td>
                            <td>
                                {{ $gradecffabric->processinfo->specification }}
                            </td>
                            <td>
                                {{ $gradecffabric->processinfo->width }}
                            </td>
                            <td>
                                {{ $gradecffabric->processinfo->diliverydate }}
                            </td>
                            <td>
                                {{ $gradecffabric->length }}
                            </td>
                            <td>
                                {{ $gradecffabric->remark1 }}
                            </td>
                            <td>
                                {{ $gradecffabric->remark2 }}
                            </td>
                            <td>
                                @can('edit_gradecffabric')
                                    <a href="{{ URL::to('/ManufactureManage/Gradecffabric/'.$gradecffabric->id.'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                                @endcan
                                @can('del_gradecffabric')
                                    {!! Form::open(array('route' => array('Gradecffabric.destroy', $gradecffabric->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?");')) !!}
                                        {!! Form::submit('Del', ['class' => 'btn btn-danger btn-sm pull-left']) !!}
                                    {!! Form::close() !!}
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
                {!! $gradecffabrics->setPath('/ManufactureManage/Gradecffabric')->appends($inputs)->links() !!}
            @else
            <div class="alert alert-warning alert-block">
                <i class="fa fa-warning"></i>
                {{'No Record', [], 'layouts'}}
            </div>
            @endif
    </div>

@stop

