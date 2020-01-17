@extends('navbarerp')
@section('title', '成布生产质量信息')
@section('main')
    @can('new_outputquantity')
        <div class="panel-heading">
            <a href="/ManufactureManage/Outputfinishfabric/create" class="btn btn-sm btn-success">新建(New)</a>
            {{--{!! Form::open(array('route' => array('Outputquantity.destroy', $outputquantity->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?")')) !!}--}}
                {{--{!! Form::submit('删除(Del)', ['class' => 'btn btn-danger btn-sm pull-left']) !!}--}}
            {{--{!! Form::close() !!}--}}
            {!! Form::button('删除(Del)', ['class' => 'btn btn-sm btn-danger', 'id' => 'btnDelOutputfinishfabric']) !!}
        </div>
    @endcan
        <div class="panel-body">
            {!! Form::open(['url' => '/ManufactureManage/Outputfinishfabric/search', 'class' => 'pull-right form-inline', 'id' => 'frmSearch']) !!}
            <div class="form-group-sm">
                {!! Form::label('checkstartlabel', 'Date:', ['class' => 'control-label']) !!}
                {!! Form::date('checksdate', null, ['class' => 'form-control']) !!}
                {!! Form::label('checkendlabel', '-', ['class' => 'control-label']) !!}
                {!! Form::date('checkedate', null, ['class' => 'form-control']) !!}

                {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => 'Fabirc/Contract No/Pattern','id'=>'key']) !!}

                {!! Form::select('search_type', ['number' => '序号', 'fabricno' => '落布号', 'machineno' => '机台号'], null, ['class' => 'form-control', 'placeholder' => '--Search Key Type--']) !!}
                {!! Form::text('search_key', null, ['class' => 'form-control', 'placeholder' => 'Search Key Value']) !!}
                {!! Form::submit('Search', ['class' => 'btn btn-default btn-sm']) !!}
            </div>
            {!! Form::close() !!}

        @if ($outputfinishfabrics->count())

            <table class="table table-striped table-hover table-condensed" id="tbMain">
                <thead>
                    <tr>
                        <th></th>
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
                    @foreach($outputfinishfabrics as $outputfinishfabric)
                        <tr>
                            <td>
                                <input type="checkbox" class="qx" value="{{ $outputfinishfabric->id }}" data-id="{{ $outputfinishfabric->id }}">
                            </td>
                            <td>
                                {{$outputfinishfabric->outputdate}}
                            </td>
                            <td>
                                {{ $outputfinishfabric->processinfo->insheetno }}
                            </td>
                            <td>
                                {{ $outputfinishfabric->fabricno }}
                            </td>
                            <td>
                                {{ $outputfinishfabric->machineno }}
                            </td>
                            <td>
                                {{ $outputfinishfabric->meter }}
                            </td>
                            <td>
                                {{ $outputfinishfabric->note }}
                            </td>
                            <td>
                                {{ $outputfinishfabric->length }}
                            </td>
                            <td>
                                {{ $outputfinishfabric->totalpoints }}
                            </td>
                            <td>
                                {{ $outputfinishfabric->y100points }}
                            </td>
                            <td>
                                {{ $outputfinishfabric->grade }}
                            </td>
                            <td>
                                {{ $outputfinishfabric->number }}
                            </td>
                            <td>
                                @can('edit_outputfinishfabric')
                                    <a href="{{ URL::to('/ManufactureManage/Outputfinishfabric/'.$outputfinishfabric->id .'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                                @endcan
                                @can('del_outputfinishfabric')
                                {!! Form::open(array('route' => array('Outputfinishfabric.destroy', $outputfinishfabric->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?")')) !!}
                                    {!! Form::submit('Del', ['class' => 'btn btn-danger btn-sm pull-left']) !!}
                                {!! Form::close() !!}
                                @endcan
                                {{--<a href="{{ URL::to('/development/fabricdischarges/'.$fabricdischarge->id . '/export') }}" class="btn btn-success btn-sm pull-left">导出</a>--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
                {!! $outputfinishfabrics->setPath('/ManufactureManage/Outputfinishfabric')->appends($inputs)->links() !!}

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
    <script type="text/javascript">
        jQuery(document).ready(function(e) {
            $("#btnDelOutputfinishfabric").click(function(e) {
                var checkvalues = [];
                var checknumbers = [];
                $("#tbMain").find("input[type='checkbox']:checked").each(function (i) {
                    checkvalues[i] =$(this).val();
                    checknumbers[i] = $(this).attr('data-id');
                });
                if(checkvalues.length == 0)
                {
                    alert("请选择记录删除");
                    return;
                }
                // alert(checkvalues);
                $.ajax({
                    type: "GET",
                    data: "ids=" + checkvalues.join(","),
                    url: "{!! url('/ManufactureManage/Outputfinishfabric/items/delalloutputfinishfabric') !!}",
                    success: function(result) {
                        if(result.errcode == 0)
                        {
                            alert(result.errmsg);
                        }
                        else
                        {
                            alert(JSON.stringify(result));
                        }
                        // addBtnClickEvent('btnSelectOrder_0');
                        location.reload(true);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert('Failed to del' . JSON.stringify(xhr));
                    },
                });
            });
         });
    </script>
@endsection