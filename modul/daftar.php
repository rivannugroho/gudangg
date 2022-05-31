
<h3>Data Siswa  yang telah mendaftar</h3>
<?php
include_once('db_func.php');

$namatabel ='daftar';
$pk        = 'idSiswa';
$namafile  = "$namatabel.php";

controller($namatabel,$pk,$namafile);
function daftar(){
	global $namatabel,$pk;
	// cek apakah user melakukan pencarian
	// dengan mencek post data 
	if(isset($_POST['data'])){
		$search = $_POST['data'];
		foreach($search as $field=>$value){
			// masukkan ke $a kalau $value tidak kosong 
			if($value!='')
				$a[]=" $field like '%$value%'";
		}
		$sql = "SELECT * FROM $namatabel ".
			   (isset($a)?' WHERE '.join(' and ' , $a):'');
		
		//echo $sql;die();
		$data = select($sql);
	}
	else{
		$data = select($namatabel);
	}
	echo '<a href="?modul=daftar&act=add" class="btn btn-primary mb-2">Daftar untuk menjadi siswa</a>';
	?>
	<form method="post">
		<?=input([],'Nama Siswa','namaSiswa')?>
		<input class="btn btn-primary" type="submit" value="Cari">
	</form>
	<?php 
	tabel([
		// 'idSiswa'=>'ID',
		'namaSiswa'=>'Nama',
		'jeniskelamin'=>'Jenis Kelamin',
		'alamat'=>'Alamat',
		'asalSekolah'=>'Asal Sekolah',
		'idBimbel'=>'id Bimbel',
	],
	$data,$pk);
	
}
function form($data){	
	?>
		<form method="post">
			<?=input($data,'Nama','namaSiswa')?>
			<?=input($data,'Jenis Kelamin','jeniskelamin')?>
			<?=input($data,'Alamat','alamat')?>
			<?=input($data,'Asal Sekolah','asalSekolah')?>
			<?=input($data,'id Bimbel','idBimbel')?>
			<input type="submit" value="Simpan">
		</form> 
		<?php
}
?>
