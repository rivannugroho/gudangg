<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
	<link href="css/datatables.min.css" rel="stylesheet" type="text/css" />
 
	<style>
		.mybg{
			background:url(bg2.jpg);
			background-repeat:no-repeat;
			background-size:cover;			
		}
	</style>
	
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <title>Sepatuya</title>
  </head>
  <body class="">
  		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #56BBF1;">
		  <div class="container-fluid">
			<a class="navbar-brand" href="#">
			<img src="gambar/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">    Sepatuya</a>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="list-style-type: none;">
			  <li class="nav-item">
				  <a class="nav-link " href="?modul=?">Home</a>
				</li>	   
				<li class="nav-item">
				  <a class="nav-link" href="?modul=stokbarang">Stock Barang</a>
				</li>
			  </ul>
			  <?php 
				if(isset($_SESSION['nama'])!=''){ //jika isset $ sesson nama ada dan tidak sama dengan kosong 
				?>
				<li class="nav-item" style="list-style-type: none;">
				  <a class="btn btn-outline-primary" href="?modul=logout">
					Logout(<?php echo $_SESSION['group'];?>)</a>
				</li>
				<?php
				}
				else{
				?>
			  <form class="d-flex">
				<li class="nav-item" style="list-style-type: none;">
				  <a class="btn btn-outline-primary" href="?modul=login">Login</a>
				</li>
				</form>
			  <?php }?>
			</div>
		  </div>
		</nav>
	<div class="container pt-5">
	<?php echo $content;?> 
	</div>
    <script src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/datatables.min.js"></script>
	<script>
	$(document).ready( function () {
		$('#tabel-saya').DataTable({			
			dom: 'Bfrtip',
			buttons: [
				'copy', 'excel', 'pdf'
			],
		});
	} );//mengaktifkan data tabel
	</script>
  </body>
</html>