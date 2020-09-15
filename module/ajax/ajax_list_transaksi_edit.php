
<?php
require_once '../../config/config.php';
error_reporting(0);
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];
$id2=$_POST['id2'];
$id3=$_POST['id3'];

#--------value_list_underlying




				$query_m2  =" select c.id_list,c.nama_ls_underlying from mapp_tujuan_trans a  ";
				$query_m2 .=" left join jenis_underlying b on a.id_jenis=b.id_jenis ";
				$query_m2 .=" left join list_underlying c on a.id_list=c.id_list WHERE a.id_trans='$id2' and a.id_jenis='$id' order by  c.nama_ls_underlying asc  ";
				//echo $query_m2;
				//die();
				//echo "<div class='checkbox-list' data-error-container='#form_2_services_error'>";
				$r_m2=pg_query($connection,$query_m2);
				$i=1;
				while ($row_m2=pg_fetch_array($r_m2)){

					$query_checked= " select * from  value_list_underlying where idtrans_out='$id3' and id_list='$row_m2[id_list]' ";

					//echo $query_checked;
					//die();
					$result_checked=pg_query($connection,$query_checked);
					$row_checked=pg_num_rows($result_checked);
					$result_dokumen=pg_fetch_array($result_checked);
					if ($row_checked >=1) {
						$var_check=" checked ";
					} else{
						$var_check=" ";
					}
/*
							echo 	"<div class='md-checkbox'>
                                    <input type='checkbox' id='checkbox$i' class='md-check'  value='$row_m2[id_list]' name='id_list[]' $var_check >
                                        <label for='checkbox$i'>
                                            <span></span>
                                            <span class='check'></span>
                                            <span class='box'></span> $row_m2[nama_ls_underlying] 
                                        </label>
                                </div>";
*/
							echo 	"<div class='md-checkbox'>
                                    <input type='checkbox' id='checkbox$i' class='md-check'  value='$row_m2[id_list]' name='id_list_$i' $var_check>
                                        <label for='checkbox$i'>
                                            <span></span>
                                            <span class='check'></span>
                                            <span class='box'></span> <i class='fa fa-book'> </i> <i> $row_m2[nama_ls_underlying] </i>  
                                        </label>
                                        <div class='input-group'>
                                                        <span class='input-group-addon'>
                                                            <i class='fa fa-tags'></i>
                                                        </span>
                                    <input type='text' name='number_dok_$i' id='number_dok_$i' class='form-control input-medium ' placeholder='Nomor Dokumen' value='$result_dokumen[doc_number_ori]' />
                                    </div>    
                                </div>";


                 $i++;               







						//echo " <input type='text' name='number_dok_$i' id='number_dok_$i' class='form-control input-medium ' placeholder='Nomor Dokumen'  />";	
                 //$i++;               
				}
				//echo "</div>";
				//echo "</div>";
				echo "<input type='hidden' name='jml_dukumen' value='".($i-1)."' >";
			//echo "ok.........";


}

?>
