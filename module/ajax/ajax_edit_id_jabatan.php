<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id']; 

//########################## dari tabel jabatan ############################

$q_  =" select * from jabatan order by nama_jabatan asc ";
$res_=pg_query($connection,$q_);
	while ($r_=pg_fetch_array($res_)) {
		if ($id==$r_['id_jabatan']){
				echo "<option value='$r_[id_jabatan]' selected='selected'> $r_[nama_jabatan] </option>";
		} else {

				echo "<option value='$r_[id_jabatan]' > $r_[nama_jabatan] </option>";  

 			}

	}

}

?>