<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id']; 

//########################## dari tabel jabatan ############################

$q_  =" select * from golongan order by nama_golongan asc ";
$res_=pg_query($connection,$q_);
	while ($r_=pg_fetch_array($res_)) {
		if ($id==$r_['id_golongan']){
				echo "<option value='$r_[id_golongan]' selected='selected'> $r_[nama_golongan] </option>";
		} else {

				echo "<option value='$r_[id_golongan]' > $r_[nama_golongan] </option>";  

 			}

	}

}

?>