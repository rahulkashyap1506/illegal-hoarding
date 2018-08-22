<style>
	.hide {position :absolute; top: -1px; }
</style>



<div class="col-sm-10">
	<!-- <?php echo form_open_multipart('image_controller/do_upload'); ?> -->
	
	<div class="grid-form">
  	<div data-row-span="1">
     	<div data-field-span="1">
				<form enctype="multipart/form-data" action="http://192.168.43.30:5000/uploader" method = "post" id="myForm" target="hiddenframe">
					IMMEDIATE CHECK
					<input type="file" name="file" size="20" />
					<input type="hidden" name="latitude" id = "latitude">
					<input type="hidden" name="longitude" id="longitude">
					<input type="hidden" name="date" id="date">

					<br /><br />

					<input type="submit" name="submit" id="name">
				</form>
			</div>
		</div>
	</div>

	<div class="grid-form">
  	<div data-row-span="1">
     	<div data-field-span="1">
				<form enctype="multipart/form-data" action="http://localhost/hackwithinfi/index.php/image_controller/do_upload" method = "post" >
					DETAILED CHECK
					<input type="file" name="userfile" size="20" />
					<input type="hidden" name="longitude" id="longitude">
					<input type="hidden" name="latitude" id = "latitude">
					<input type="hidden" name="date" id="date">

					<br /><br />

					<input type="submit" name="submit" id="name2">
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(setPosition);
    } else { 
        console.log("Geolocation is not supported by this browser.");
    }
    function setPosition(position) {
    	$('#longitude').val(position.coords.longitude);
    	$('#latitude').val(position.coords.latitude);
    	var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1; //January is 0!
			var yyyy = today.getFullYear();
			var a = dd + '/' + mm + '/' + yyyy;
    	$('#date').val(a);
		}
	});
</script>