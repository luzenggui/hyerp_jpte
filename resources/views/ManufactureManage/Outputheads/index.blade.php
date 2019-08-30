@extends('navbarerp')
@section('title', '坯布产量信息(Production Information)')
@section('main')

    <div class="panel-heading">
        <a href="Outputheads/create" class="btn btn-sm btn-success">新建(New)</a>
    </div>

    <div class="panel-body">

    @if ($outputheads->count())

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Date</th>
                <th>Plandshipdate</th>
                <th>Customer pattern</th>
                <th>Fabric</th>
                <th>Orderquantity</th>
                {{--<th>Syarntype</th>--}}
                {{--<th>Density</th>--}}
                {{--<th>Width</th>--}}
                <th>Colorspecification</th>
                <th>Detail</th>
                {{--<th>Note</th>--}}
                {{--<th>Createname</th>--}}
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outputheads as $outputhead)
                <tr>
                    <td>
                        {{$outputhead->outputdate}}
                    </td>
                    <td>
                        {{$outputhead->processinfo->diliverydate}}
                    </td>
                    <td>
                        {{ $outputhead->processinfo->pattern }}
                    </td>
                    <td>
                        {{ $outputhead->processinfo->insheetno }}
                    </td>
                    <td>
                        {{ $outputhead->processinfo->orderquantity }}
                    </td>
                    {{--<td>--}}
                        {{--{{ $outputhead->processinfo->syarntype }}--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--{{ $outputhead->processinfo->density }}--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--{{ $outputhead->processinfo->width }}--}}
                    {{--</td>--}}
                    <td>
                        {{ $outputhead->processinfo->specification }}
                    </td>
                    {{--<td>--}}
                        {{--{{ $outputhead->note }}--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--{{ $outputhead->createname }}--}}
                    {{--</td>--}}
                    <td>
                        <a href="{{ URL::to('/ManufactureManage/Outputheads/' . $outputhead->id . '/detail') }}" target="_blank">Detail</a>
                    </td>
                    <td>
                        <a href="{{ URL::to('/ManufactureManage/Outputheads/'.$outputhead->id.'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                        {!! Form::open(array('route' => array('Outputheads.destroy', $outputhead->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?");')) !!}
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