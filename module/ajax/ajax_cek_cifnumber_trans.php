<?php
require_once '../../config/config.php';
require_once '../../function/function.php';

if($_POST['identitas'])
{
$identitas=$_POST['identitas']; 
$no_identitas=$_POST['no_identitas'];
$no_identitas_ori=$_POST['no_identitas'];
$no_identitas = str_replace(array(':', '\\', '/', '*','.','-','_',' '), '', $no_identitas); 
$tgl_lahir=date('jmy',strtotime($_POST['tgl_lahir'])); 
$tgl_lahir2=date('Y-m-d',strtotime($_POST['tgl_lahir'])); 
$ibu_kandung=$_POST['ibu_kandung']; 

/*
					$query=" SELECT * FROM CURRENT_CFMAST where ".clearSpecialChar()."='$no_identitas' and CFBIR6='$tgl_lahir' and CFSSCD='$identitas' ";
					//echo $query;
					//die();
                    $result=odbc_exec($odbc_conn,$query);
                    $found=odbc_num_rows($result);

                    if ($found>=2){ 
                    $query2 =" SELECT * FROM CURRENT_CFMAST where ".clearSpecialChar()."='$no_identitas' and CFBIR6='$tgl_lahir' and CFSSCD='$identitas' ";
                    $query2.=" and CFMOTN like '%$ibu_kandung%' ";
                    	$result2=odbc_exec($odbc_conn,$query2);
                    	$row2=odbc_fetch_array($result2);
       					$nama_pengirim=$row2['CFSNME'];
      			    	$no_cif=$row2['CFCIF#'];
      			    
      			    } else if ($found =='1') {
      			    	$row=odbc_fetch_array($result);
       					$nama_pengirim=$row['CFSNME'];
      			    	$no_cif=$row['CFCIF#'];
      			    
      				} else {
                        $no_cif="";

      					}
*/
    $query_trans_out =" select * from transaksi_outgoing where identitas='$identitas' and no_identitas='$no_identitas_ori' and to_char(tgl_lahir, 'YYYY-MM-DD')='".$tgl_lahir2."' ";
    $query_trans_out.=" order by date_create desc limit 1 ";
//echo $query_trans_out;
//die();

    $result_trans= pg_query($connection,$query_trans_out);
    $found2=pg_num_rows($result_trans);
    //if ($found2 >=1 ) {
        $row_trans=pg_fetch_array($result_trans);
        $nama_pengirim=$row_trans['nama_pengirim'];
        $no_cif=$row_trans['cif_number'];
     // } else {


     // }


if (isset($no_cif) && $no_cif!="" ){
 ?>   
<table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
                                        <thead>
                                            <tr>
                                                <th> No. Transaksi </th>
                                                <th> Nama Pengirim / CIF  </th>
                                                <th> Jenis Transaksi / Tanggal Terbit </th>
                                                <th> Nama Penerima /  Nominal Transaksi /  Keterangan </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                          
<?php
                                $query = " select * from transaksi_outgoing  a ";
                                $query.= " left join tujuan_transaksi b on b.id_trans=a.id_trans WHERE a.cif_number='$no_cif' and a.status <> '99' order by date_create desc ";

                                //echo $query;
                                //die();
                                $result=pg_query($connection,$query);
                                $i=1;
                                while ($row=pg_fetch_array($result)) {
                                   
                                    echo "<tr>";
                                    echo "<td width='5%' style='font-size:12px'> <b>$row[idtrans_out] </b></td>";
                                    echo "<td width='20%' style='font-size:12px'> $row[nama_pengirim] <br>CIF : $row[cif_number] </td>";
                                    echo "<td width='30%' style='font-size:12px'> $row[nama_tj_transaksi] <br>".date('d-m-Y',strtotime($row['tgl_terbit']))." </td>";
                                    echo "<td width='45%' style='font-size:12px'> $row[nama_penerima] <br>".$row['nominal_trans']." <br> $row[keterangan] </td>";
                                    
                                    echo "</tr>";
                                    $i++;

                                    # code...
                                }


                                ?> 
                                            
                                    </tbody>
                                        </table> 
<?php    

} else {

echo " <div class='alert alert-danger'> Belum ada transaksi ... ! </div>";


}




                                                     
}





?>






