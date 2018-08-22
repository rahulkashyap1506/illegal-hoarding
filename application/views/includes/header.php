<html>
	<?php
		if (isset($this->session->userdata['loggedin'])) {
			$username = ($this->session->userdata['loggedin']['username']);
		} else {
			header("location: login");
		}
	?>
	<head>
		<title>HackWithInfi</title>
		 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"> 
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
		<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('css/side_bar.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('css/grid_form.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
    <link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">

    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
		<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
		<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
		<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
		<script src="<?php echo base_url('JS/grid_form.js')?>"></script>
		<script type="text/javascript" src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
		<script type="text/javascript" src="https://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"></script>
		<script src="http://localhost/roopray/assets/js/bootstrap-select.min.js"></script>
	</head>
	<body>
		<div class="header_div">
			<div id="profile">
				
				Hello <b id='welcome'><i><a href="<?php echo base_url('index.php/user_authentication/user_login_process')?>">
				<?php
					echo $username . "!</a></i></b>";
					echo "";
				?>
				<b id="logout"><a href="<?php echo base_url('index.php/user_authentication/logout')?>">Logout</a></b>
			</div>
		</div>
		<br>
		<div class="main_content_div">
			<div class="container-fluid">
			  <div class="row content" style="min-height: 90%;">
