<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id']; 

//########################## dari tabel jabatan ############################

$q_  =" select * from tujuan_transaksi order by nama_tj_transaksi asc ";
$res_=pg_query($connection,$q_);
	while ($r_=pg_fetch_array($res_)) {
		if ($id==$r_['id_trans']){
				echo "<option value='$r_[id_trans]' selected='selected'> $r_[nama_tj_transaksi] </option>";
		} else {

				echo "<option value='$r_[id_trans]' > $r_[nama_tj_transaksi] </option>";  

 			}

	}

}

?>