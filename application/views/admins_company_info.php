<div class="col-sm-10">

		<form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" value="" name="id"/> 
        <div class="grid-form">
            <div data-row-span="1">

                <div data-field-span="1">
                    <label>company name</label>
                    <select name="name" id="name">
                    	
                    </select>
                </div>
                
            </div>
        </div>
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
    </form>

</div>
<script type="text/javascript">
	$(document).ready(function() {
		$.ajax({
            url : "<?php echo site_url('company_controller/get_companies')?>",
            type: "POST",
            success: function(data)
            {
                console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
                console.log(jqXHR);
                console.log(errorThrown);
            }
        });
	});
</script>