@extends('navbarerp')
@section('title', '坯布生产质量信息')
@section('main')

    <div class="panel-heading">
        <a href="/ManufactureManage/Outputquantity/create" class="btn btn-sm btn-success">新建(New)</a>
    </div>

        <div class="panel-body">
            {!! Form::open(['url' => '/ManufactureManage/Outputquantity/search', 'class' => 'pull-right form-inline', 'id' => 'frmSearch']) !!}
            <div class="form-group-sm">
                {!! Form::label('outputstartlabel', 'Date:', ['class' => 'control-label']) !!}
                {!! Form::date('outputsdate', null, ['class' => 'form-control']) !!}
                {!! Form::label('outputendlabel', '-', ['class' => 'control-label']) !!}
                {!! Form::date('outputedate', null, ['class' => 'form-control']) !!}

                {!! Form::submit('Search', ['class' => 'btn btn-default btn-sm']) !!}
            </div>
            {!! Form::close() !!}

        @if ($outputquantitys->count())

            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Fabric</th>
                        <th>FabricNo</th>
                        <th>Machineno</th>
                        <th>Meter</th>
                        <th>Weaver NO</th>
                        <th>Length</th>
                        <th>Totalpoints</th>
                        <th>100ypoints</th>
                        <th>grade</th>
                        <th>Number</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outputquantitys as $outputquantity)
                        <tr>
                            <td>
                                {{$outputquantity->outputdate}}
                            </td>
                            <td>
                                {{ $outputquantity->processinfo->insheetno }}
                            </td>
                            <td>
                                {{ $outputquantity->fabricno }}
                            </td>
                            <td>
                                {{ $outputquantity->machineno }}
                            </td>
                            <td>
                                {{ $outputquantity->meter }}
                            </td>
                            <td>
                                {{ $outputquantity->note }}
                            </td>
                            <td>
                                {{ $outputquantity->length }}
                            </td>
                            <td>
                                {{ $outputquantity->totalpoints }}
                            </td>
                            <td>
                                {{ $outputquantity->y100points }}
                            </td>
                            <td>
                                {{ $outputquantity->grade }}
                            </td>
                            <td>
                                {{ $outputquantity->number }}
                            </td>
                            <td>
                                <a href="{{ URL::to('/ManufactureManage/Outputquantity/'.$outputquantity->id .'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                                {!! Form::open(array('route' => array('Outputquantity.destroy', $outputquantity->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?")')) !!}
                                    {!! Form::submit('Del', ['class' => 'btn btn-danger btn-sm pull-left']) !!}
                                {!! Form::close() !!}
                                {{--<a href="{{ URL::to('/development/fabricdischarges/'.$fabricdischarge->id . '/export') }}" class="btn btn-success btn-sm pull-left">导出</a>--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
                {!! $outputquantitys->setPath('/ManufactureManage/Outputquantity')->appends($inputs)->links() !!}

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