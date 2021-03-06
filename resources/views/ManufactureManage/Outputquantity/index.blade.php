@extends('navbarerp')
@section('title', '坯布生产质量信息')
@section('main')
    @can('new_outputquantity')
        <div class="panel-heading">
            <a href="/ManufactureManage/Outputquantity/create" class="btn btn-sm btn-success">新建(New)</a>
            {{--{!! Form::open(array('route' => array('Outputquantity.destroy', $outputquantity->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?")')) !!}--}}
                {{--{!! Form::submit('删除(Del)', ['class' => 'btn btn-danger btn-sm pull-left']) !!}--}}
            {{--{!! Form::close() !!}--}}
            {!! Form::button('删除(Del)', ['class' => 'btn btn-sm btn-danger', 'id' => 'btnDelOutputquantity']) !!}
        </div>
    @endcan
        <div class="panel-body">
            {!! Form::open(['url' => '/ManufactureManage/Outputquantity/search', 'class' => 'pull-right form-inline', 'id' => 'frmSearch']) !!}
            <div class="form-group-sm">
                {!! Form::label('outputstartlabel', 'Date:', ['class' => 'control-label']) !!}
                {!! Form::date('outputsdate', null, ['class' => 'form-control']) !!}
                {!! Form::label('outputendlabel', '-', ['class' => 'control-label']) !!}
                {!! Form::date('outputedate', null, ['class' => 'form-control']) !!}

                {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => 'Fabirc/Contract No/Pattern','id'=>'key']) !!}

                {!! Form::select('search_type', ['number' => '序号', 'fabricno' => '落布号', 'machineno' => '机台号'], null, ['class' => 'form-control', 'placeholder' => '--Search Key Type--']) !!}
                {!! Form::text('search_key', null, ['class' => 'form-control', 'placeholder' => 'Search Key Value']) !!}
                {!! Form::submit('Search', ['class' => 'btn btn-default btn-sm']) !!}
            </div>
            {!! Form::close() !!}

        @if ($outputquantitys->count())

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
                    @foreach($outputquantitys as $outputquantity)
                        <tr>
                            <td>
                                <input type="checkbox" class="qx" value="{{ $outputquantity->id }}" data-id="{{ $outputquantity->id }}">
                            </td>
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
                                @can('edit_outputquantity')
                                    <a href="{{ URL::to('/ManufactureManage/Outputquantity/'.$outputquantity->id .'/edit') }}" class="btn btn-success btn-sm pull-left">Edit</a>
                                @endcan
                                @can('del_outputquantity')
                                {!! Form::open(array('route' => array('Outputquantity.destroy', $outputquantity->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录(Confirm to delete this record)?")')) !!}
                                    {!! Form::submit('Del', ['class' => 'btn btn-danger btn-sm pull-left']) !!}
                                {!! Form::close() !!}
                                @endcan
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
    <script type="text/javascript">
        jQuery(document).ready(function(e) {
            $("#btnDelOutputquantity").click(function(e) {
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
                    url: "{!! url('/ManufactureManage/Outputquantity/items/delalloutputquantity') !!}",
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