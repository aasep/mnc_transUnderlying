<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id']; 
                                                    $query=" select * from nilai_kurs where id='$id' ";
                                                    $result=pg_query($connection,$query);
                                                        while ($row=pg_fetch_array($result)) {

                                                            //echo "$row[nilai_kurs]";
                                                            ?>

                                                            <span class="input-group-addon">
                                                            <i class="fa fa-money"></i>
                                                        </span>
                                                    <input type="text" name="nilai_kursx" id="nilai_kursx" data-required="1" class="form-control" value="<?php echo $row['nilai_kurs']?>" disabled/> 
                                                    <input type="hidden" name="nilai_kurs" id="nilai_kurs" data-required="1" class="form-control" value="<?php echo $row['nilai_kurs']?>"/>

                                                       <?php     
                                                        }

                                                       //echo " <option value='1001' selected='selected'> 1001 | JOHN DOE </option> ";
                                                       //echo " <option value='1002' > 1002 | JOHN DOE 2 </option> ";

                                     
}

?>