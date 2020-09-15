
<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];



#--------

			
		

				$query_m2  ="  select distinct b.id_jenis,b.nama_js_underlying from mapp_tujuan_trans a  ";
				$query_m2 .=" left join jenis_underlying b on a.id_jenis=b.id_jenis WHERE a.id_trans='$id' order by  b.nama_js_underlying asc  ";
				//echo $query_m2;
				//die();
				echo "<option value='' selected > Pilih Jenis Underlying </option> ";
				$r_m2=pg_query($connection,$query_m2);
				while ($row_m2=pg_fetch_array($r_m2)){
				
						echo "<option value='$row_m2[id_jenis]' >$row_m2[nama_js_underlying] </option> ";	

				}


			//echo "ok.........";


}

?>
