<?php
require_once '../../config/config.php';
require_once '../../function/function.php';
error_reporting(0);
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id']; 
                                                    
?>
 <table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
                                        <thead>
                                            <tr>
                                                <th> No. Transaksi </th>
                                                <th> Action Time  </th>
                                                <th> Nama User </th>
                                                <th> Keterangan </th>
                                                <th> Action </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                          
<?php
                                $query = " select * from log_trans  a ";
                                $query.= " left join user_account b on b.nik=a.id_user WHERE a.idtrans_out='$id' order by a.date_create desc ";

                                //echo $query;
                                //die();
                                $result=pg_query($connection,$query);
                                $i=1;
                                while ($row=pg_fetch_array($result)) {
                                   
                                    echo "<tr>";
                                    echo "<td width='10%' style='font-size:12px'> <b>$row[idtrans_out] </b></td>";
                                    echo "<td width='15%' style='font-size:12px'> <b>".date('d-m-Y H:i',strtotime($row['date_create']))." </b></td>";
                                    echo "<td width='15%' style='font-size:12px'> $row[nama_lengkap]  </td>";
                                    echo "<td width='40%' style='font-size:12px'> $row[keterangan]  </td>";
                                    echo "<td width='20%' style='font-size:12px'> $row[action_flag]  </td>";
                                    
                                    echo "</tr>";
                                    $i++;

                                    # code...
                                }


                                ?> 
                                            
                                    </tbody>
                                        </table>              



<?php
                                     
}

?>