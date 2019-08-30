<div class="modal fade" id="selectProcessinfoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">选择工艺信息</h4>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => '厂编号/合同号/花型号', 'id' => 'keyProcess']) !!}
                    <span class="input-group-btn">
                   		{!! Form::button('查找', ['class' => 'btn btn-default btn-sm', 'id' => 'btnSearchProcessinfo']) !!}
                   	</span>
                </div>
                {{--{!! Form::hidden('insheetno', null, ['id' => 'insheetno']) !!}--}}
                {{--{!! Form::hidden('id', null, ['id' => 'id']) !!}--}}
                {{--{!! Form::hidden('pattern', 0, ['id' => 'pattern']) !!}--}}
                {{--{!! Form::hidden('contractno', 0, ['id' => 'contractno']) !!}--}}
                <p>
                <div class="list-group" id="listprocessinfos">

                </div>
                </p>

            </div>

        </div>
    </div>
</div>
