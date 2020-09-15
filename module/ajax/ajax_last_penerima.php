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
                                                <th> Nama Pengirim / CIF </th>
                                                <th> Jenis Transaksi / Tanggal Terbit </th>
                                                <th> Nama Penerima /  Nominal Transaksi /  Keterangan </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                          
<?php
                                $query = " select * from transaksi_outgoing  a ";
                                $query.= " left join tujuan_transaksi b on b.id_trans=a.id_trans WHERE a.cif_number='$id'  ";

                                //echo $query;
                                //die();
                                $result=pg_query($connection,$query);
                                $i=1;
                                while ($row=pg_fetch_array($result)) {
                                   
                                    echo "<tr>";
                                    echo "<td width='5%' style='font-size:12px'> <b>$row[idtrans_out] </b></td>";
                                    echo "<td width='20%' style='font-size:12px'> $row[nama_pengirim] <br> $row[cif_number] </td>";
                                    echo "<td width='30%' style='font-size:12px'> $row[nama_tj_transaksi] <br>".date('d-m-Y',strtotime($row['tgl_terbit']))." </td>";
                                    echo "<td width='45%' style='font-size:12px'> $row[nama_penerima] <br>".formatRupiah($row['nominal_trans'])." <br> $row[keterangan] </td>";
                                    
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