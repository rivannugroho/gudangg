<?php
include_once('modul/db_func.php'); 
$link = [
	['label'=>'Home','url'=>'?'],//$link berisi array label dan url
	['label'=>'Stock Barang','url'=>'?modul=stokbarang'],
	['label'=>'Ditail','url'=>'?modul=ditail&id='],
	
];
$cekgroup = [
	'admin'=>[
		'stokbarang'=>['edit','delete','add','daftar'],
		'ditail'=>['daftar'],
		

	],
	'customer'=>[
		'ditail'=>['daftar'],
		

	],	
	'member'=>[
		'stokbarang'=>['edit','daftar'],
		'ditail'=>['daftar'],
	],
];

ob_start();//mengimpan output buffer
	$modul = ($_GET['modul']??'');
	$act   = ($_GET['act']??'daftar'); 
	$group = ($_SESSION['group']??'');
	$filename = 'modul/'.$modul.'.php';
	
	if(is_file($filename)){
		$akses = ($cekgroup[$group])??[]; //isinya mereupakan acl yg berisi akses dari grub tadi
		$modulx = ($akses[$modul])??[];
		// cek validasi
		if(!empty($akses) && !empty($modulx) && in_array($act,$modulx) )
		{
			include_once($filename);
		}elseif($modul == "login"){
			include_once('modul/login.php');
		}elseif($modul=="registrasi"){
			include_once('modul/registrasi.php');
		}elseif($modul=="logout"){
			include_once('modul/logout.php');
		}else{
			echo '<div class="alert alert-danger" role="alert">
			Tidak Memiliki hak akses!
			<a href="?modul=?">Kembali</a>
		  	</div>';
		}	
	}
	else{
		include_once('modul/home.php');
	}
	$content= ob_get_contents();// untuk mengambil output buffer paling atas
ob_end_clean();//membersihkan output buffe
include_once('template/template.php');//masukkan tamplate