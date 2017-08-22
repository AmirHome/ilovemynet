<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ url('paneladmin/js') }}/timepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
<script src="{{ url('paneladmin/js') }}/bootstrap.min.js"></script>
<script src="{{ url('paneladmin/js') }}/main.js"></script>

<script>

    $('.datepicker').datepicker({
        autoclose: true,
        dateFormat: 'yy-mm-dd'
    });

    $('.datetimepicker').datetimepicker({
        autoclose: true,
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
    });

    $('#datatable').dataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/English.json"
        }
    });

</script>
