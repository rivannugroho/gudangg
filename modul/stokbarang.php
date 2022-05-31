<?php 
$namatabel ='stock'; // di set stok
$pk = 'idbarang';
$namafile = "$namatabel.php";

kelolafile('gmbr_barang','gambar');
controller($namatabel,$pk,$namafile);


function daftar(){
	global $namatabel,$pk; // maukkan global $namatabel,$pk karena fungsi bersifat lokal
	$data = select($namatabel);// $data = select namatable= stock
	?>
	<h3>Pengelolaan <?=ucwords($namatabel)?></h3>
	<hr>
	<?php 
	echo '<a href="?modul=stokbarang&act=add" class="btn btn-primary mb-2">Tambah '.ucwords($namatabel).'</a>';
	tabel([
		//'idbarang'=>'ID',
		'namabrg'  =>'Nama Barang',
		'merek' =>'Merek',
        'harga' =>'Harga',
		'gmbr_barang'=>['label'=>'Gambar','tipe'=>'img'],
		'deskripsi'=>'Deskripsi',
	],
	$data,$pk);
	
}
function form($data){	
	?>
	<div class="container bg-light">
		<h1>Tambah Data</h1>
		<form method="post" enctype="multipart/form-data">
			<?=input($data,'Nama Barang','namabrg')?>
			<?=input($data,'Merek','merek')?>
            <?=input($data,'Harga','harga')?>
			Upload Gambar<input type='file' name="gmbr_barang" class="form-control"><br>
			<?=input($data,'Deskripsi','deskripsi')?>
			<input type="submit" value="Simpan" class="btn btn-success">
		</form> 
</div>
		<?php
}
?>