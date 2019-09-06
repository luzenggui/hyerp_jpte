@extends('navbarerp')
@section('title', '坯布质量出货信息(Quantity and Output Information)')
@section('main')

    <div class="panel-heading">
        <a href="Outputquantityhead/create" class="btn btn-sm btn-success">新建(New)</a>
    </div>

    <div class="panel-body">
     {!! Form::open(['url' => '/ManufactureManage/Outputquantityhead/search', 'class' => 'pull-right form-inline', 'id' => 'frmSearch']) !!}
        <div class="form-group-sm">
            {!! Form::label('outputstartlabel', 'Date:', ['class' => 'control-label']) !!}
            {!! Form::date('outputsdate', null, ['class' => 'form-control']) !!}
            {!! Form::label('outputendlabel', '-', ['class' => 'control-label']) !!}
            {!! Form::date('outputedate', null, ['class' => 'form-control']) !!}

            {!! Form::submit('Search', ['class' => 'btn btn-default btn-sm']) !!}
        </div>
        {!! Form::close() !!}

    @if ($outputquantityheads->count())

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Date</th>
                <th>CheckNo</th>
                <th>Note</th>
                <th>Workshifts</th>
                <th>Pattern</th>
                {{--<th>MachineNo</th>--}}
                <th>Length</th>
                <th>TotalPoints</th>
                <th>100yPoints</th>
                <th>Grade</th>
                <th>Width</th>
                <th>Density</th>
                <th>Detail</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outputquantityheads as $outputquantityhead)
                <tr>
                    <td>
                        {{$outputquantityhead->outputdate}}
                    </td>
                    <td>
                        {{$outputquantityhead->checkno}}
                    </td>
                    <td>
                        {{ $outputquantityhead->note }}
                    </td>
                    <td>
                        {{ $outputquantityhead->manufactureshifts }}
                    </td>
                    <td>
                        {{ $outputquantityhead->processinfo->pattern }}
                    </td>
                    {{--<td>--}}
                        {{--{{ $outputquantityhead->machineno }}--}}
                    {{--</td>--}}
                    <td>
                        {{ $outputquantityhead->length }}
                    </td>
                    <td>
                        {{ $outputquantityhead->totalpoints }}
                    </td>
                    <td>
                        {{ $outputquantityhead->y100points }}
                    </td>
                    <td>
                        {{ $outputquantityhead->grade }}
                    </td>
                    <td>
                        {{ $outputquantityhead->processinfo->width }}
                    </td>
                    <td>
                        {{ $outputquantityhead->processinfo->density }}
                    </td>
                    <td>
                        <a href="{{ URL::to('/ManufactureManage/Outputquantityhead/' . $outputquantityhead->id . '/detail') }}" target="_blank">Detail</a>
                    </td>
                    <td>
                        <a href="{{ URL::to('/ManufactureManage/Outputquantityhead/'.$outputquantityhead->id.'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                        {!! Form::open(array('route' => array('Outputquantityhead.destroy', $outputquantityhead->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?");')) !!}
                            {!! Form::submit('Del', ['class' => 'btn btn-danger btn-sm pull-left']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>
            {!! $outputquantityheads->setPath('/ManufactureManage/Outputquantityhead')->appends($inputs)->links() !!}
    @else
    <div class="alert alert-warning alert-block">
        <i class="fa fa-warning"></i>
        {{'No Record', [], 'layouts'}}
    </div>
    @endif

    </div>
    @include('ManufactureManage.Processinfos._selectprocessinfomodal')
@stop

@section('script')
    @include('ManufactureManage.Processinfos._selectprocessinfojs')
@endsection