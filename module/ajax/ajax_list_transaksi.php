
<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];
$id2=$_POST['id2'];


#--------

                                                        
                                                   
		

				$query_m2  =" select c.id_list,c.nama_ls_underlying from mapp_tujuan_trans a  ";
				$query_m2 .=" left join jenis_underlying b on a.id_jenis=b.id_jenis ";
				$query_m2 .=" left join list_underlying c on a.id_list=c.id_list WHERE a.id_trans='$id2' and a.id_jenis='$id' order by  c.nama_ls_underlying asc  ";
				//echo $query_m2;
				//die();
				//echo "<div class='checkbox-list' data-error-container='#form_2_services_error'>";
				$r_m2=pg_query($connection,$query_m2);
				$i=1;
				while ($row_m2=pg_fetch_array($r_m2)){

							echo 	"<div class='md-checkbox'>
                                    <input type='checkbox' id='checkbox$i' class='md-check'  value='$row_m2[id_list]' name='id_list[]'>
                                        <label for='checkbox$i'>
                                            <span></span>
                                            <span class='check'></span>
                                            <span class='box'></span> $row_m2[nama_ls_underlying] 
                                        </label>
                                    <input type='text' name='number_dok_$i' class='form-control' placeholder='No. Dokumen' required/>    
                                </div>";

						//echo "<label> <input type='checkbox'  value='$row_m2[id_list]' name='id_list[]' /> $row_m2[nama_ls_underlying] </label>";	
                 $i++;               
				}
				echo "</div>";

			//echo "ok.........";


}

?>
