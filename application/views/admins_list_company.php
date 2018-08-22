<div class="col-sm-10">


    <form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" value="" name="id"/> 
        <div class="grid-form">
            <div data-row-span="3">

                <div data-field-span="1">
                    <label>name</label>
                    <input type="text" name="name" id="name">
                </div>
                <div data-field-span="1">
                    <label>pending complaints</label>
                    <select name="pending_complaints" id="pending_complaints">
                        <option value="0">no complaints</option>
                        <option value="1">pending coamplaints</option>
                    </select>
                </div>

                <div data-field-span ="1" id="image" name = "image">
                   <!--  upload logo<input type="file" name="userfile" size="20" /> -->
                </div>
            </div>
        </div>
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
    </form>


    <br><br><br>

	YOUR COMPANIES ARE

	<br><br>

	<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	    <thead>
	        <tr>
	            <th>Logo</th>
                <th>company name</th>
	            <th>Status</th>
                <th>Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    </tbody>
	    <tfoot>
	        <tr>
	            <th>Logo</th>
                <th>company name</th>
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
                "url": "<?php echo site_url('admins_list_company/ajax_list')?>",
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

    function edit_person(id){
        save_method = 'update';
        $('#btnSave').text('update');
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('admins_list_company/ajax_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.id);
                $('[name="name"]').val(data.name);
                $("#pending_complaints").val(data.pending_complaints);
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function view_person(id){
        $('#btnSave').attr('disabled','disabled');
        $('#btnok').show();
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('admins_list_company/ajax_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.id);
                $('[name="name"]').val(data.name);
                $("#pending_complaints").val(data.pending_complaints);
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function ok() {
        $('#btnSave').prop('disabled', false);
        save_method = 'add';
        epmty_form();
    }
     
    function reload_table(){
        table.ajax.reload(null,false); //reload datatable ajax 
    }
     
    function save(){
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
     
        if(save_method == 'add') {
            url = "<?php echo site_url('admins_list_company/ajax_add')?>";
        } else  {
            url = "<?php echo site_url('admins_list_company/ajax_update')?>";
        }
     
        // ajax adding data to database
            $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                reload_table();
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            }
        });

        save_method = 'add';
        epmty_form();
    }
     
    function delete_person(id){
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('admins_list_company/ajax_delete')?>/"+id,
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