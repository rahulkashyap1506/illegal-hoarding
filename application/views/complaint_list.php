<div class="col-sm-10">

	YOUR COMPLAINTS ARE

	<br><br>

	<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	    <thead>
	        <tr>
	            <th>Billboard</th>
	            <th>Status</th>
                <th>Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    </tbody>
	    <tfoot>
	        <tr>
	            <th>Billborad</th>
                <th>Status</th>
                <th>Action</th>
	        </tr>
	    </tfoot>
	</table>

</div>
<script type="text/javascript">
    var table;
     
    $(document).ready(function() {
     
        //datatables
        table = $('#table').DataTable({ 
     
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
     
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('complaint_list/ajax_list')?>",
                "type": "POST"
            },
     
            //Set column definition initialisation properties.
            "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            ],
     
        });
    });
     
    function reload_table(){
        table.ajax.reload(null,false); //reload datatable ajax 
    }

    function delete_person(id){
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('complaint_list/ajax_delete')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    //if success reload ajax table
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
     
        }
    }
</script>