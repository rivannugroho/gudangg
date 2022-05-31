<?php 
include_once('db_func.php');

if(isset($_SESSION['nama']) && $_SESSION['nama']!=''){ 
	header('location:?modul=?');
}
else{
	login();
}

function login(){
	global $mysqli; //koneksi databese mysqli dari db fung
	$msg=''; 
	$data = $_POST['data']??[]; 
	if(!empty($data)){ 
		$user= $mysqli->real_escape_string($data['username']);// 
		$pass= $mysqli->real_escape_string($data['password']);
		$sql = "SELECT * FROM user where (userId)='$user' 
						and (userPassword)='$pass'";
		$user = select($sql); //select= hasil yang dikembalikan array asosiatif
		if(count($user)>0){
			$_SESSION['nama']=$user[0]['userNama'];//set isi dari sesion nama = $user aray ke 0 userNama 
			$_SESSION['group']=$user[0]['userGroup'];
			header('location:?modul=?'); //link ke modul=?
		}
		else{ //jika kosong  
			$msg = 'password atau user salah';
		}
}
	?>
	<style>

	.form-signin {
	  width: 100%;
	  max-width: 30%;
	  padding: 15px;
	  margin: auto;
	}

	.form-signin .checkbox {
	  font-weight: 400;
	}

	.form-signin .form-floating:focus-within {
	  z-index: 2;
	}

	.form-signin input[type="username"] {
	  margin-bottom: -1px;
	  border-bottom-right-radius: 0;
	  border-bottom-left-radius: 0;
	}

	.form-signin input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
	</style>
	<main class="form-signin">
	<div class="card">
		<div class="card-body">
		  <form method="post">
		  <?php
			 if($msg!=''){ //jika msg tidak sama dengan kosong
			echo "<div class=\"alert alert-danger\">$msg</div>";
			 }
			?>
			<h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>

			<div class="form-floating">
			  <input name="data[username]" type="text" class="form-control" id="floatingInput" placeholder="akun">
			  <label for="floatingInput">Username</label>
			</div>
			<div class="form-floating">
			  <input name="data[password]" type="password" class="form-control" id="floatingPassword" placeholder="Password">
			  <label for="floatingPassword">Password</label>
			</div>

			<button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
			<p class="mt-2">
				Belum Punya akun? <a href="?modul=registrasi"> Daftar disini!</a>
			</p>
			<p class="mt-5 mb-3 text-muted">&copy; <?=date('Y')?></p>
		  </form>
		</div>
	</div>
	</main>
<?php }?>