<?php 
include_once('db_func.php');


	global $mysqli; 
	$msg=''; //untuk pesan defoult nya kosong
	$data = $_POST['data']??[]; //$data = $_post data di ambil dari form jika ada kalau ada kalok gak ada kosong
	if(isset($data['userId']) && isset($data['userNama']) && isset($data['userPassword']) && isset($data['userGroup'])){
        $usernama = $data['userId']; 
        $user= select('SELECT userId FROM user WHERE userId = "'.$usernama.'"');
        if(count($user)>0){
            $msg = 'user sudah terdaftar';
        }else{ 
            $konfirmasi = $_POST['konfirmasi']??''; //set $konfirmasi dengan nilai post konfirmasi daru form jika gakada kosong
            if($konfirmasi == $data['userPassword']){
				if(save('user',$data)){// save data di tabel user
					header('location:?modul=login'); 
				}else {
					$msg = 'Gagal Registrasi';
				}
			}else{//jika konfirmasi pasword gak sama tampil
				$msg = 'konfirmasi password salah';
			}

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

	.form-signin input[type="text"] {
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
		<?php
			 if($msg!=''){ //jika msg tidak sama dengan kosong
				echo "<div class=\"alert alert-danger\">$msg</div>";
			 }
			?>
		  <form method="post">
			<h1 class="h3 mb-3 fw-normal">Registrasi</h1>
			<div class="form-floating">
			  <input name="data[userNama]" type="text" class="form-control" id="floatingNama" placeholder="Nama" required>
			  <label for="floatingInput">Nama</label>
			</div>
			<div class="form-floating">
			  <input name="data[userId]" type="text" class="form-control" id="floatingNama2" placeholder="User" required>
			  <label for="floatingNama">User</label>
			</div>
			<div class="form-floating">
			  <input name="data[userPassword]" type="password" class="form-control" id="floatingPass" placeholder="Password" required>
			  <label for="floatingPass">Password</label>
			</div>
			<div class="form-floating">
			  <input name="konfirmasi" type="password" class="form-control" id="floatingPass2" placeholder="Password" required>
			  <label for="floatingPass2">Konfirmasi Password</label>
			</div>
			<div class="form-floating">
			  <input name="data[userGroup]" type="group" class="form-control" id="floatinggroup" placeholder="group" required>
			  <label for="floatingPass2">group: member/customer</label>
			</div> 

			<button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>

			<p class="mt-5 mb-3 text-muted">&copy; <?=date('Y')?></p>
		  </form>
		</div>
	</div>
	</main>
