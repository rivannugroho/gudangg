
<h2> TOKO SEPATU </h2>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="gambar/promo2.jpg" class="d-block w-100" alt="..." style="width=700px">
    </div>

    <div class="carousel-item">
      <img src="gambar/promo3.png" class="d-block w-100" alt="...">
    </div>

 <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br>
</div>


<?php 
/*
act:
1. edit dan id!='' maka:1. form
						2. simpan kemudian 
						arahkan ke obat.php
2. add  1. form
		2. simpan kemudian arahkan ke obat.php
3. delete maka hapus'=>'',
			'kemudian arahkan ke obat.php
4. default tampilkan tabel 
*/
$namatabel ='stock';
$pk = 'idbarang';
$id = $_GET['id']??"";
$namafile = "$namatabel.php";
$data = select($namatabel);

if($id!=''){
  $where= "$pk = '$id'";
  $data = select("select * from $namatabel where $where");//data yg dikemnalikan arrray asosiatif
}

$template = '
</style>
<div class="col">
    <div class="card">
      <div class="card-body">
          <h3 class="card-title">%s</h3>
      <div class="card h-10">
        <img src="%s" style="width: 380px; height: 300px;">
        </div>
        <div class="card-footer">
          <h5 class="card-text">%s</h5>
          <a class="btn btn-primary mt-2" href="%s">Beli</a>
        </div>
      </div>
    </div>
</div>
';
echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
foreach($data as $k){
	echo sprintf($template,
          $k['namabrg'],
					$k['gmbr_barang'],
					"Rp.".$k['harga'].",-",
          "?modul=ditail&id=".$k[$pk],
					'?');
}
echo '</div>';
?>
<br>
<footer >
  <div class=" p-4" style="background-color: rgba(0, 0, 0, 0.2);">
    <a class="text-dark" href=""></a>
  </div>
</footer>

 
 

