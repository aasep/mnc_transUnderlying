
<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];

$id_trans=$_POST['id2'];

//########################## CASE ############################

#--------

			
		

				$query_m2=" select * from list_underlying order by  nama_ls_underlying asc  ";
				//echo $query_m2;
				//die();
				$r_m2=pg_query($connection,$query_m2);
				while ($row_m2=pg_fetch_array($r_m2)){
					$query_cek=" select count(*) as jum from mapp_tujuan_trans where id_trans='$id_trans' and id_jenis='$id'  and id_list='$row_m2[id_list]'  ";

					//echo $query_cek;
					//die();
					$result_cek=pg_query($query_cek);
					$r_found=pg_fetch_array($result_cek);

						if($r_found['jum'] >=1){
							echo " <option value='$row_m2[id_list]' selected='selected' >$row_m2[nama_ls_underlying] </option> ";	
						} else{
							echo " <option value='$row_m2[id_list]'>$row_m2[nama_ls_underlying]</option> ";
							}

				}


			//echo "ok.........";


}

?>
