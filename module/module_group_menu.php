<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

if(isset($_POST['group_user'])){

$id_group=$_POST['group_user'];   
} else {
$id_group=$_GET['mode'];    

}
##################### For developer #######################

if ($_SESSION['SESS_GROUP_USER']=='1'){
$var_q=" ";
} else {
$var_q=" where id_group not in ('1') ";

}

###########################################################

?>

<div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold uppercase">Form  Group Menu </span>
                                                    <span class="caption-helper"> Management Group Menu or privilege...</span>
                                                </div>
                                                <div class="tools">
                                                    
                                                    <a href="" class="collapse" data-original-title="" title=""> </a>
                                                   
                                                    
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                               
                                                    <div class="form-body">
                                                      <!--  <a href="#large" data-toggle="modal" class="btn green"> Add Menu <i class="fa fa-plus"></i> </a> -->



                                            <form action="<?php echo "$page"; ?>" id="form_sample_3" class="form-horizontal" method="POST">

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Group User <span class="required">* </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                    <select class="form-control select2" name="group_user" id="group_user">
                                                        <option value=""> - Pilih Group User - </option>
                                                             <?php
                                                            $query="select * from group_user $var_q order by nama_group asc";
                                                            $result=pg_query($connection, $query);
                                                            while ($row=pg_fetch_array($result)){
                                                                if ($id_group==$row['id_group']){
                                                                      echo "<option value='$row[id_group]' selected='selected' >$row[nama_group]</option>"; 
                                                                } else {
                                                                       echo "<option value='$row[id_group]' >$row[nama_group]</option>"; 
                                                                    }
                                                             }

                                                             ?>
                                                
                                                    </select>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3"> <span class="required"> </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                    <button type="submit" class="btn green"> Submit </button>
                                                    </div>
                                                </div>
                                                <br><br>
                            
                           <!---  COMMENT CONFIRM FORM-->     
    <?php

    if (isset($_GET['message']) && ($_GET['message']=="PrivActive")){
    echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Mode Active Menu Success...! </strong> </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="PrivInActive")){
    echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Mode InActive Menu Success...!</strong> </div>";
    }
   

     ?>
                                                </form>
                            <hr>   
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box grey-gallery">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i> <b>List Of Menu </b></div>
                                        
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                <br>
                                <br>
                                <br>
                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=prev_group_menu"?>" id="form_sample_1" class="form-horizontal" method="POST" > 
                                    <table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
                              <thead>
                            <tr>
                            <th>
                                    No
                                </th>
                                <th>
                                    # 
                                </th>
                                <th>
                                
                                </th>
                                <th>
                                Nama menu
                                </th>
                                <th>
                                    Status
                                </th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                             if (isset($id_group) ){
                            $no=1;
                            $no_parent=1;
                            $query="select * from menu where parent='0' ";
                            $result=pg_query($connection, $query);
                            while ($row=pg_fetch_array($result)) {
                            //<input type="checkbox" class="checkboxes" value="1"/>
                            $no_sub=1;  
                            echo "<tr bgcolor='#F0F0F0'>";
                            echo "<td>$no</td>";
                            echo "<td>$no_parent</td>";
                            echo "<td></td>";
                            echo "<td><b>$row[nama_menu]</b></td>";
                            echo "<td></td></tr>";
                            
                            
                            $query2="select * from menu where parent='$row[id_menu]' ";
                            $result2=pg_query($connection, $query2);
                            while ($row2=pg_fetch_array($result2)) {
                                

                            $query3="select id from group_menu where id_menu='$row2[id_menu]' and id_group='$id_group' ";
                            $result3=pg_query($connection, $query3);
                            $found=pg_num_rows($result3);

                            if($found >=1){
                                //$check="checked='checked'";
                                $status="<a class='btn green disabled' href='$page&act=edit_menu&nama_menu=$row2[name]&parent=$row2[parent]&id_menu=$row2[id_menu] disable='disabled''>Active</a>";

                            } else {
                                //$check="";
                                $status="<a href='#'  data-toggle='modal' id-menu='$row2[id_menu]' id-nama='$row2[name]' data-target='#delete-modal' class='detailDelete' > <button class='btn red disabled' >In Active</button></a>";
                            }



                            $no++;
                            echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td>$no_parent.$no_sub</td>";
                            echo "<td> <input type='checkbox' name='checkbox[]' class='checkboxes' value='$row2[id_menu]'  /></td>";
                            echo "<td>$row2[nama_menu]</td>";
                            echo "<td> $status</td></tr>";

                                $no_sub++;
                                

                            } 
                               $no_parent++;
                                $no++;

                            }  
                                
                            }
                            ?>
                            
                            
                            </tbody>
                            </table>
                                </div>
                            </div>
                            <div class="form-group">
                                        <label class="control-label col-md-3">.
                                        </label>
                                        <div class="col-md-3">
                                            <input type="submit" value=" Active " name="hidup" id="hidup" class="btn green "/>  
                                        </div>
                                        <div class="col-md-3">
                                            <input type="submit" value=" In Active " name="mati" id="mati"  class="btn red"/>
                                             <input type="hidden" name="id_group" value="<?php echo $id_group;?>">
                                        </div>
                                    </div>
                                    <br>
                                    </form>
                            <!-- END EXAMPLE TABLE PORTLET-->
                                                       
                                                    </div>
                                                   
                                                
                                            </div>
                                        </div>




 










 