@extends('navbarerp')
@section('title', '坯布质量信息(Quantity Information)')
@section('main')

    <div class="panel-heading">
        <a href="Quantityreporthead/create" class="btn btn-sm btn-success">新建(New)</a>
    </div>

    <div class="panel-body">

    @if ($quantityreportheads->count())

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>DateOfInspection</th>
                <th>CheckNo</th>
                <th>Note</th>
                <th>Workshifts</th>
                <th>Pattern</th>
                <th>MachineNo</th>
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
            @foreach($quantityreportheads as $quantityreporthead)
                <tr>
                    <td>
                        {{$quantityreporthead->djdate}}
                    </td>
                    <td>
                        {{$quantityreporthead->checkno}}
                    </td>
                    <td>
                        {{ $quantityreporthead->note }}
                    </td>
                    <td>
                        {{ $quantityreporthead->manufactureshifts }}
                    </td>
                    <td>
                        {{ $quantityreporthead->processinfo->pattern }}
                    </td>
                    <td>
                        {{ $quantityreporthead->machineno }}
                    </td>
                    <td>
                        {{ $quantityreporthead->length }}
                    </td>
                    <td>
                        {{ $quantityreporthead->totalpoints }}
                    </td>
                    <td>
                        {{ $quantityreporthead->y100points }}
                    </td>
                    <td>
                        {{ $quantityreporthead->grade }}
                    </td>
                    <td>
                        {{ $quantityreporthead->processinfo->width }}
                    </td>
                    <td>
                        {{ $quantityreporthead->processinfo->density }}
                    </td>
                    <td>
                        <a href="{{ URL::to('/ManufactureManage/Quantityreporthead/' . $quantityreporthead->id . '/detail') }}" target="_blank">Detail</a>
                    </td>
                    <td>
                        <a href="{{ URL::to('/ManufactureManage/Quantityreporthead/'.$quantityreporthead->id.'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                        {!! Form::open(array('route' => array('Quantityreporthead.destroy', $quantityreporthead->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?");')) !!}
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
        {{'No Record', [], 'layouts'}}
    </div>
    @endif

    </div>
    @include('ManufactureManage.Processinfos._selectprocessinfomodal')
@stop

@section('script')
    @include('ManufactureManage.Processinfos._selectprocessinfojs')
@endsection