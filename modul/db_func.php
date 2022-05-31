<?php 

session_start();
$mysqli = new mysqli(
	"localhost", 	//host 
	"root", 		//user
	"", 		//pass
	"gudang"			//nama database
);


function execute($sql){
	$mysqli = $GLOBALS['mysqli'];
	// insert terima $hasil 
	$hasil = $mysqli->query($sql);
	// select terima $data 
	if  (strtoupper(
			substr(
				trim($sql),0,6
			)
		)=="SELECT"){
		if($hasil==false){
			echo "<div><span style=\"color:red\">Terdapat Error:</span><hr><b>".$mysqli->error.'</b><br>Eksekusi :'.$sql.'<hr></div>';
			return [];
		}
		else{
			return $hasil->fetch_all(MYSQLI_ASSOC);
		}
	}
	else{
		if($hasil==false){
			echo "<div><span style=\"color:red\">Terdapat Error:</span><hr><b>".$mysqli->error.'</b><br>Eksekusi :'.$sql.'<hr></div>';
		}
		return $hasil;
	}
}

function input($data,$label,$index,$tipe="text"){
	$template = '
	<div style="margin-bottom:5px" class="mb-3">
				<label>%s</label>
				<input class="form-control" type="%s" name="data[%s]" 
		value="%s">
			</div>
	';
	return sprintf($template,
						$label,
						$tipe,
						$index,
						$data[$index]??'');
}

function select($nama_table){
	$sql = "SELECT * FROM $nama_table";
	if  (strtoupper(
			substr(
				trim($nama_table),0,6
			)
		)=="SELECT"){
		$sql = $nama_table;
	}
	
	$data = execute($sql);	
	return $data;
}

function save($nama_table,$data,$where=''){
	$a = [];
	foreach($data as $field=>$value){
		$a[]=" `$field` = '$value'";
	}
	
	$sql = "INSERT INTO $nama_table SET ".join(',',$a);
	if($where!='')
		$sql = "UPDATE $nama_table SET ".join(',',$a)." WHERE $where";
	return execute($sql);
}

function insert($nama_table,$data){		
	$a = [];
	foreach($data as $field=>$value){
		$a[]=" $field = '$value'";
	}

	$sql = "INSERT INTO $nama_table SET ".join(',',$a);
	execute($sql);
}

function update($nama_table,$data,$where){	
	$a = [];
	foreach($data as $field=>$value){
		$a[]=" $field = '$value'";
	}

	$sql = "UPDATE $nama_table SET ".join(',',$a)." WHERE $where";
	execute($sql);
}

function delete($nama_table,$where){	
	$sql = "DELETE FROM $nama_table WHERE $where";
	execute($sql);
}

function kelolafile($index_file,$folder){
	if(isset($_FILES[$index_file]) 
	     && !$_FILES[$index_file]['error']){
		$file_temp = $_FILES[$index_file]['tmp_name'];
		$file_nama = $folder.'/'.$_FILES[$index_file]['name'];
		move_uploaded_file(
			$file_temp,		//
			$file_nama
		);
		$_POST['data'][$index_file]=$file_nama;
	}
}

function tabel($header,$data,$pk){
	echo "\r\n<table  id=\"tabel-saya\" class=\"display table table-hover\">\r\n";
	echo "<thead>
			<tr>\r\n";
	echo "<th>No.</th>\r\n";
	foreach($header as $i=>$item){
		if(isset($item['label'])){
			echo "<th>".$item['label']."</th>\r\n";
		}
		else{
			echo "<th>".$item."</th>\r\n";
		}
	}
	echo "<th>Aksi</th>\r\n";
	echo "</tr>\r\n
	</thead>
	
	<tbody>";
	$no=1;
	$modulx = ($_GET['modul']??'');
	foreach($data as $val){
		echo "<tr>\r\n";
		echo "<td>".$no."</td>\r\n";
		$no++;
		foreach($header as $i=>$item){
			if(isset($item['tipe']) && $item['tipe']=='img')
				echo "<td><img src=\"".$val[$i]."\" style=\"width:100px;\"></td>\r\n";
			else
				echo "<td>".$val[$i]."</td>\r\n";
		}
		echo "<td>
		<ul>
			<a class=\"btn btn-primary\" href=\"?modul=$modulx&act=edit&id=".$val[$pk]."\"><i class=\"bi bi-pen-fill\"></i></a>
			</ul>
			<ul>
			<a class=\"btn btn-primary\" href=\"?modul=$modulx&act=delete&id=".$val[$pk]."\"><i class=\"bi bi-trash-fill\"></i></a>
			</ul>
			</td>\r\n";
		
		echo "</tr>\r\n";
	}
	echo "</tbody></table>\r\n";
}

function controller($namatabel,$pk,$namafile){	
	$act = $_GET['act']??'';
	$id  = $_GET['id']??'';
	$where = '';
	$data  = [0=>[]];
	if($id!=''){
		$where = "$pk = $id";
		$data = select("SELECT * FROM $namatabel WHERE $where");			
	}
	$modul = ($_GET['modul']??'');
	switch($act){
		case 'add':
		case 'edit':		
			if(isset($_POST['data'])){
				$data_post = $_POST['data'];
				if(save($namatabel,$data_post,$where)){
					header("Location: ?modul=$modul");
				}
				$data[0]=$data_post;
			}		
			form($data[0]);
			break;
		case 'delete':
			if($id!=''){
				delete($namatabel,$where);
				header("Location: ?modul=$modul");
			}	
			break;
		default:		
			daftar();
			break;
	}
}