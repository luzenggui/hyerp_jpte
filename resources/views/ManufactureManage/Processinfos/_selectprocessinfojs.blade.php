<script type="text/javascript">
    jQuery(document).ready(function(e) {

        $('#selectProcessinfoModal').on('show.bs.modal', function (e) {
            $("#listprocessinfos").empty();

            var text = $(e.relatedTarget);
            var modal = $(this);
        });

        $('#selectProcessinfoModal').on('shown.bs.modal', function (e) {
            var text = $(e.relatedTarget);
            var modal = $(this);

            // modal.find('#listsupplierbanks').append("aaaa");

            $.ajax({
                type: "GET",
                url: "{!! url('/ManufactureManage/Processinfos/getitemsbyprocesskey/') !!}",
                success: function(result) {
                    var strhtml = '';
                    $.each(result.data, function(i, field) {
                        btnId = 'btnSelectProcess_' + String(i);
                        strhtml += "<button type='button' class='list-group-item' id='" + btnId + "'>" + "<h4>" + field.insheetno + "</h4><p>" + field.contractno + " | " + field.pattern + "</p></button>"
                    });
                    if (strhtml == '')
                        strhtml = 'No Record.';
                    modal.find('#listprocessinfos').empty().append(strhtml);

                    $.each(result.data, function(i, field) {
                        btnId = 'btnSelectProcess_' + String(i);
                        addBtnClickEvent(btnId, field);
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert('error');
                }
            });
        });

        $("#btnSearchProcessinfo").click(function() {
            if ($("#keyProcess").val() == "") {
                alert('Please input key value');
                return;
            }
            $.ajax({
                type: "GET",
                url: "{!! url('/ManufactureManage/Processinfos/getitemsbyprocesskey') !!}" +"/"  + $("#keyProcess").val(),
                success: function(result) {
                    var strhtml = '';
                    $.each(result.data, function(i, field) {
                        btnId = 'btnSelectProcess_' + String(i);
                        strhtml += "<button type='button' class='list-group-item' id='" + btnId + "'>" + "<h4>" + field.insheetno + "</h4><p>" + field.contractno + " | " + field.pattern + "</p></button>"
                    });
                    if (strhtml == '')
                        strhtml = 'No Record.';
                    $("#listprocessinfos").empty().append(strhtml);

                    $.each(result.data, function(i, field) {
                        btnId = 'btnSelectProcess_' + String(i);
                        addBtnClickEvent(btnId, field);
                    });
                    // addBtnClickEvent('btnSelectOrder_0');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert('error');
                }
            });
        });

        function addBtnClickEvent(btnId, field)
        {
            $("#" + btnId).bind("click", function() {
                $('#selectProcessinfoModal').modal('toggle');
                // $("#order_number").val(number);
                // $("#order_id").val(salesorderid);
                $("#insheetno").val(field.insheetno);
                $("#contractno").val(field.contractno);
                $("#density").val(field.density);
                $("#width").val(field.width);
                $("#specification").val(field.specification);
                $("#diliverydate").val(field.diliverydate);
                $("#processinfo_id").val(field.id);
                $("#pattern").val(field.pattern);
                $("#orderquantity").val(field.orderquantity);
            });
        }
    });
</script>
