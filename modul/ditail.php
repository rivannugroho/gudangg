<?php
$namatabel ='stock';
$pk = 'idbarang';
$id = $_GET['id']??"";
$namafile = "stokbarang.php";
$data = select($namatabel);

if ($id!='') {
    $where = "$pk = '$id'";
    $data = select("select * from $namatabel where $where"); //select= hasil yang dikembalikan array asosiatif
} elseif($id=='') {
    echo '<div class="alert alert-danger" role="alert">Data tidak ditemukan</div>';
}
$template = '
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="%s" alt="" class="img-responsive" width="700px">
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <h2>%s</h2>
                <h4>%s</h4>
                <br>
                <h6>%s<h6>
                        <hr>
                        <a href="https://wa.me/082286544322?text=urlencodedtext" class="btn btn-primary">Beli</a>
                        <a href="?modul=?" class="btn btn-primary">Kembali</a>

            </div>
        </div>
    
    ';
    
foreach($data as $k){
	echo sprintf($template,
          $k['gmbr_barang'],
		    $k['namabrg'],
			"Rp.".$k['harga'].",-",
            $k['deskripsi'],
                "?modul=ditail&id=".$k[$pk],
					'?');
}


echo '</div>';
?>

