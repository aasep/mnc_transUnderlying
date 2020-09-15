<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id']; 
                                                    $query=" select * from master_cif_pengirim order by  nama_pengirim asc ";
                                                            echo "<option value=''>Pilih Penerima ...</option>";
                                                        $result=pg_query($connection,$query);
                                                        while ($row=pg_fetch_array($result)) {

                                                            echo "<option value='$row[cif_number]'>$row[cif_number] | $row[nama_pengirim]</option>";
                                                            
                                                        }

                                                       //echo " <option value='1001' selected='selected'> 1001 | JOHN DOE </option> ";
                                                       //echo " <option value='1002' > 1002 | JOHN DOE 2 </option> ";

                                     
}

?>