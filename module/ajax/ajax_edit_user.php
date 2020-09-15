<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id']; //id_product

//########################## nik dan nama karyawan ############################

$q_karyawan  =" select nik,nama_karyawan from karyawan order by nama_karyawan asc ";
$res_karyawan=pg_query($connection,$q_karyawan);
	while ($r_karyawan=pg_fetch_array($res_karyawan)) {
		if ($id==$r_karyawan['nik']){
				echo "<option value='$r_karyawan[nik]' selected='selected'>$r_karyawan[nik] || $r_karyawan[nama_karyawan] </option>";
		} else {

				echo "<option value='$r_karyawan[nik]' >$r_karyawan[nik] || $r_karyawan[nama_karyawan] </option>";  

 			}

	}

}

?>