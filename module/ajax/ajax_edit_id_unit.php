<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id']; 

//########################## dari tabel jabatan ############################

$q_  =" select * from unit order by nama_unit asc ";
$res_=pg_query($connection,$q_);
	while ($r_=pg_fetch_array($res_)) {
		if ($id==$r_['id_unit']){
				echo "<option value='$r_[id_unit]' selected='selected'> $r_[nama_unit] </option>";
		} else {

				echo "<option value='$r_[id_unit]' > $r_[nama_unit] </option>";  

 			}

	}

}

?>