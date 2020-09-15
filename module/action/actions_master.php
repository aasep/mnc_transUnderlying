<?php
	require_once '../../config/config.php';
	require_once '../../function/function.php';
	require_once '../session_login.php';

    //require_once '../session_group.php';
date_default_timezone_set("Asia/Jakarta"); 
################################################################################################################################################
#                                                         ADD USER                                                                             #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('102') && ($_GET['act']=='add_user')) {

$nik=strtolower($_POST['yusername']);
$password=hashEncrypted($_POST['password']);
$id_group=$_POST['group_user'];
$status=$_POST['status_account'];
$id_unit=$_POST['id_unit'];
$nama_karyawan=$_POST['nama_karyawan'];


//====> cek exist account <=======
    $q_cek=" select * from user_account where nik='$nik'  ";
    $res_cek=pg_query($connection,$q_cek);
    $found=pg_num_rows($res_cek);
    
      if( $found >=1 ) {
        logActivity("ADD USER","FAILED, Exist User");
        header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=exist");
      } else{

            $q_insert = " insert into user_account (nik,password,id_group,is_active,id_unit,nama_lengkap) ";
            $q_insert.= " values ('$nik','$password','$id_group','$status','$id_unit','$nama_karyawan') ";
            $result= pg_query($connection,$q_insert);
              if ($result ){
                   logActivity("ADD USER","SUCCESS, NIK=$nik, ID GROUP=$id_group, STATUS=$status");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                   logActivity("ADD USER","FAILED, NIK=$nik, ID GROUP=$id_group, STATUS=$status");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

        }




      }




}

################################################################################################################################################
#                                                         EDIT USER                                                                            #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('102') && ($_GET['act']=='edit_user')) {

$nik=strtolower($_POST['ed_yusername']);
$password=$_POST['ed_password'];
$id_group=$_POST['ed_group_user'];
$status=$_POST['ed_status_account'];

$id_unit=$_POST['ed_id_unit'];
$nama_karyawan=$_POST['ed_nama_karyawan'];



if(isset($password) && $password !="")  {
$new_password=hashEncrypted($password);
$var_password=" , password='$new_password' ";

} else {

$var_password="  ";
}

            $query = " update user_account set id_group='$id_group', is_active='$status',id_unit='$id_unit',nama_lengkap='$nama_karyawan'  $var_password where nik='$nik' ";

            $result= pg_query($connection,$query);
              if ($result ){
                   logActivity("UPDATE USER","SUCCESS, NIK=$nik ,id_group=$id_group, is_active=$status, $var_password ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("UPDATE USER","FAILED, NIK=$nik");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }





}




################################################################################################################################################
#                                                         DELETE USER                                                                          #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('102') && ($_GET['act']=='delete_user')) {

$nik=strtolower($_POST['nik']);




            $q_insert = " delete from user_account where nik='$nik' ";
            $result= pg_query($connection,$q_insert);
              if ($result ){
                   logActivity("DELETE USER","SUCCESS, NIK=$nik");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
              } else  {
                   logActivity("DELETE USER","FAILED, NIK=$nik");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failDel");

        }





}
################################################################################################################################################
#                                                         ADD GROUP USER                                                                       #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('103') && ($_GET['act']=='add_group_user')) {

$nama_group=$_POST['nama_group'];

   

            $q_insert = " insert into group_user (nama_group) ";
            $q_insert.= " values ('$nama_group') ";
            $result= pg_query($connection,$q_insert);
              if ($result ){
                   logActivity("ADD GROUP USER","SUCCESS, Nama Group = $nama_group ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                   logActivity("ADD GROUP USER","FAILED, NIK=$nik, ID GROUP=$id_group, STATUS=$status");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

                 }

}

################################################################################################################################################
#                                                         UPDATE GROUP USER                                                                    #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('103') && ($_GET['act']=='edit_group_user')) {

$id_group=$_POST['ed_id_group'];
$nama_group=$_POST['ed_nama_group'];

            $query = " update group_user set nama_group='$nama_group' where id_group='$id_group' ";
            $result= pg_query($connection,$query);
              if ($result ){
                   logActivity("UPDATE GROUP USER","SUCCESS, id_group=$id_group , nama_group=$nama_group ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("UPDATE GROUP USER","FAILED, id_group=$id_group , nama_group=$nama_group ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }





}


################################################################################################################################################
#                                                         DELETE GROUP USER                                                                    #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('103') && ($_GET['act']=='delete_group_user')) {

$id_group=$_POST['id_group'];

            $q_insert = " delete from group_user where id_group='$id_group' ";
            $result= pg_query($connection,$q_insert);
              if ($result ){
                   logActivity("DELETE GROUP USER","SUCCESS, id_group=$id_group ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
              } else  {
                   logActivity("DELETE GROUP USER","FAILED, id_group=$id_group ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failDel");

        }


}


################################################################################################################################################
#                                                         ADD MENU                                                                             #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('104') && ($_GET['act']=='add_menu')) {

$nama_menu=$_POST['nama_menu'];
$parent=$_POST['parent'];
   

            $q_insert = " insert into menu (nama_menu,parent) ";
            $q_insert.= " values ('$nama_menu','$parent') returning id_menu ";
            $result= pg_query($connection,$q_insert);
            $row=pg_fetch_array($result);
            $src=hashEncryptedMenu($row['id_menu']);
              if ($result ){
                   $q_update=" update menu set src='$src' where id_menu='$row[id_menu]' ";
                   $result_up= pg_query($connection,$q_update);
                   logActivity("ADD MENU","SUCCESS, Nama Menu = $nama_menu, id_menu=$row[id_menu] ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                   logActivity("ADD MENU","FAILED, Nama Menu = $nama_menu, id_menu=$row[id_menu]");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

                 }

}

################################################################################################################################################
#                                                         UPDATE MENU                                                                          #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('104') && ($_GET['act']=='edit_menu')) {

$id_menu=$_POST['ed_id_menu'];
$nama_menu=$_POST['ed_nama_menu'];
$parent=$_POST['ed_parent'];

            $query = " update menu set nama_menu='$nama_menu',parent='$parent' where id_menu='$id_menu' ";
            $result= pg_query($connection,$query);
              if ($result ){
                   logActivity("UPDATE MENU","SUCCESS, id_menu=$id_menu, nama_menu=$nama_menu, parent=$parent ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("UPDATE MENU","FAILED, id_group=$id_group , nama_group=$nama_group ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }





}
################################################################################################################################################
#                                                         DELETE MENU                                                                          #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('104') && ($_GET['act']=='delete_menu')) {

$id_menu=$_POST['id_menu'];

            $q_insert = " delete from menu where id_menu='$id_menu' ";
            //echo $q_insert;
            //die();
            $result= pg_query($connection,$q_insert);
              if ($result ){
                   logActivity("DELETE MENU","SUCCESS, id_menu=$id_group ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
              } else  {
                   logActivity("DELETE MENU","FAILED, id_menu=$id_group ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failDel");

        }


}

################################################################################################################################################
#                                                    PRIVILEGE MENU                                                                            #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('105') && ($_GET['act']=='prev_group_menu')) {

    $id_group=$_POST['id_group'];

    if(isset($_POST['hidup']))  {
      //echo "tombol hidup <br>";
      
          for($i=0;$i<count($_POST['checkbox']);$i++){
              $del_id=$_POST['checkbox'][$i];
              $query_cek="select id FROM group_menu  WHERE id_group=$id_group AND id_menu='$del_id'";
              $result_cek = pg_query($connection,$query_cek);
              $found_priv = pg_num_rows($result_cek);

                if ($found_priv >=1) {  
                    $result_priv=1;
                } else {

                    $sql_priv="insert into group_menu (id_group,id_menu) values ('$id_group','$del_id')";
                    $result_priv = pg_query($connection,$sql_priv);
                    logActivity("PRIVILEGE ACTIVE MENU","id_group=$id_group, id_menu=$del_id ");
                  }

          } // end loop for

          if($result_priv)  {
              //echo "<meta http-equiv=\"refresh\" content=\"0;URL=home?module=$module&id_group=$id_group\">";

                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&mode=$id_group&message=PrivActive");
          }
          
      } 


//==========jika tekan tombol non aktif   =========
    if(isset($_POST['mati']))  {
      
          for($i=0;$i<count($_POST['checkbox']);$i++){
              $del_id=$_POST['checkbox'][$i];
              $query_cek="select id FROM group_menu  WHERE id_group='$id_group' AND id_menu='$del_id' ";
              $result_cek = pg_query($connection,$query_cek);
              $found_priv = pg_num_rows($result_cek);

                if ($found_priv >=1)  {  //delete
                    $sql_priv="delete from group_menu where id_group='$id_group' AND id_menu='$del_id' ";
                    $result_priv = pg_query($connection,$sql_priv);
                    logActivity("PRIVILEGE INACTIVE MENU","id_group=$id_group, id_menu=$del_id ");
  
                } else {
                      $result_priv=1;
                      //$result_priv = pg_query($connection,$sql_priv);
                    }

          } 
        if($result_priv)  {
              header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&mode=$id_group&message=PrivInActive");
        }
        
    } 
        


}



################################################################################################################################################
#                                                         ADD KARYAWAN                                                                         #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('111') && ($_GET['act']=='add_karyawan')) {
// mandatory
$nik=$_POST['nik'];
$nama_karyawan=$_POST['nama_karyawan'];
$alamat=$_POST['alamat'];
$hp=$_POST['hp'];
$id_jabatan=  $_POST['id_jabatan'];                                             
$is_active=$_POST['is_active'];
$status_karyawan=$_POST['status_karyawan'];
$id_golongan=$_POST['id_golongan'];
$id_unit=$_POST['id_unit'];
$is_active=$_POST['is_active'];
$jenis_kelamin=$_POST['jenis_kelamin'];
// end mandatori.....

$no_ktp=$_POST['no_ktp'];
if (!isset($no_ktp)){
  $var_noktp="'NULL'";
}else{
  $var_noktp=$no_ktp;
}
$no_npwp= $_POST['no_npwp'];
if (!isset($no_npwp)){
  $var_nonpwp="'NULL'";
}else{
  $var_nonpwp=$no_npwp;
}                                                                          
$kd_absensi=  $_POST['kd_absensi'];  
if (!isset($kd_absensi)){
  $var_kdabsensi="'NULL'";
}else{
  $var_kdabsensi=$kd_absensi;
}
$email=$_POST['email'];  
if (!isset($email)){
  $var_email="'NULL'";
} else{
  $var_email=$email;
}                                       

// cek nik
$q_cek=" select * from karyawan where nik='$nik' ";
$rest_cek=pg_query($connection,$q_cek);
$found= pg_num_rows($rest_cek);

if ($found >=1 ){
                   logActivity("ADD KARYAWAN","FAILED, NIK EXIST, nik=$nik, nama=$nama_karyawan");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=exist");
              } 

//===========  cek upload file ==========================
      if(is_uploaded_file($_FILES['file_img']['tmp_name'])) {

        $image_temp=$_FILES['file_img']['tmp_name'];
        $nama=$_FILES['file_img']['name'];
        $type=$_FILES['file_img']['type'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        //echo $ext;

      }

        $query =" insert into karyawan (nik,nama_karyawan,alamat,hp,id_jabatan,id_golongan,id_unit,status_karyawan,status_akif,jenis_kelamin,email, ";
        $query.=" no_ktp,no_npwp,kode_absensi) ";
        $query.=" values ('$nik','$nama_karyawan','$alamat','$hp','$id_jabatan','$id_golongan','$id_unit','$status_karyawan','$is_active' ";
        $query.=" ,'$jenis_kelamin','$var_email','$var_noktp', '$var_nonpwp', '$var_kdabsensi' ) ";
        

        //echo $query;
        //die();

        $result=pg_query($connection, $query);

        $directory="../../images/profile/".$nik.".$ext";
        copy($image_temp,$directory);

        $query2=" update karyawan set image='$nik.$ext'  where nik='$nik' ";
        $result2=pg_query($connection, $query2);

              if ($result ){
                   logActivity("ADD KARYAWAN","SUCCESS, nik=$nik, nama=$nama_karyawan");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                   logActivity("ADD KARYAWAN","FAILED, nik=$nik, nama=$nama_karyawan");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

                 }

}

################################################################################################################################################
#                                                         DELETE KARYAWAN                                                                      #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('111') && ($_GET['act']=='delete_karyawan')) {

$nik=$_POST['nik'];

            $q_insert = " delete from karyawan where nik='$nik' ";
            //echo $q_insert;
            //die();
            $result= pg_query($connection,$q_insert);
              if ($result ){
                   logActivity("DELETE KARYAWAN","SUCCESS, nik=$nik ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
              } else  {
                   logActivity("DELETE KARYAWAN","FAILED, nik=$nik ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failDel");

        }


}



################################################################################################################################################
#                                                         EDIT KARYAWAN                                                                        #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('111') && ($_GET['act']=='edit_karyawan')) {
// mandatory
$nik=$_POST['ed_nik'];
$nama_karyawan=$_POST['ed_nama_karyawan'];
$alamat=$_POST['ed_alamat'];
$hp=$_POST['ed_hp'];
$id_jabatan=  $_POST['ed_id_jabatan'];                                             
$is_active=$_POST['ed_is_active'];
$status_karyawan=$_POST['ed_status_karyawan'];
$id_golongan=$_POST['ed_id_golongan'];
$id_unit=$_POST['ed_id_unit'];
$is_active=$_POST['ed_is_active'];
$jenis_kelamin=$_POST['ed_jenis_kelamin'];
// end mandatori.....

$no_ktp=$_POST['ed_no_ktp'];
if (!isset($no_ktp)){
  $var_noktp=" ";
}else{
  $var_noktp=", no_ktp='$no_ktp' ";
}
$no_npwp= $_POST['ed_no_npwp'];
if (!isset($no_npwp)){
  $var_nonpwp=" ";
}else{
  $var_nonpwp=",no_npwp='$no_npwp' ";
}                                                                          
$kd_absensi=  $_POST['ed_kd_absensi'];  
if (!isset($kd_absensi)){
  $var_kdabsensi=" ";
}else{
  $var_kdabsensi=", kode_absensi='$kd_absensi'";
}
$email=$_POST['ed_email'];  
if (!isset($email)){
  $var_email=" ";
} else{
  $var_email=", email='$email' ";
}                                       

// cek nik
$q_cek=" select * from karyawan where nik='$nik' ";

$rest_cek=pg_query($connection,$q_cek);
$found= pg_num_rows($rest_cek);

if ($found ==0 ){
                   logActivity("EDIT KARYAWAN","FAILED, NIK NOT EXIST, nik=$nik, nama=$nama_karyawan");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=noexist");
                   die();
              } 

//===========  cek upload file ==========================
      if(is_uploaded_file($_FILES['file_img']['tmp_name'])) {

        $image_temp=$_FILES['file_img']['tmp_name'];
        $nama=$_FILES['file_img']['name'];
        $type=$_FILES['file_img']['type'];
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        //echo $ext;

      }

        $query =" update karyawan set nama_karyawan='$nama_karyawan',alamat='$alamat',hp='$hp',id_jabatan='$id_jabatan'  ";
        $query.=" ,id_golongan='$id_golongan',id_unit='$id_unit', status_karyawan='$status_karyawan',status_akif='$is_active' ";
        $query.=" ,jenis_kelamin='$jenis_kelamin' $var_email  $var_noktp $var_nonpwp $var_kdabsensi where nik='$nik' ";
        
        

        //echo $query;
        //die();

        $result=pg_query($connection, $query);

        $directory="../../images/profile/".$nik.".$ext";
        if (isset($image_temp)  && $image_temp!="") {
            copy($image_temp,$directory);
            $query2=" update karyawan set image='$nik.$ext'  where nik='$nik' ";
            $result2=pg_query($connection, $query2);
        }
       
              if ($result ){
                   logActivity("EDIT KARYAWAN","SUCCESS, nik=$nik, nama=$nama_karyawan");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success3");
              } else  {
                   logActivity("EDIT KARYAWAN","FAILED, nik=$nik, nama=$nama_karyawan");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=error3");

                 }

}

################################################################################################################################################
#                                                         ADD JABATAN                                                                          #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('112') && ($_GET['act']=='add_jabatan')) {

$nama_jabatan=$_POST['nama_jabatan'];

            $q_insert = " insert into jabatan (nama_jabatan) values ('$nama_jabatan') ";
            $result= pg_query($connection,$q_insert);
            
              if ($result ){
                   logActivity("ADD JABATAN","SUCCESS, Nama Jabatan= $nama_jabatan ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                   logActivity("ADD JABATAN","FAILED, Nama Jabatan= $nama_jabatan ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

                 }

}

################################################################################################################################################
#                                                         DELETE JABATAN                                                                       #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('112') && ($_GET['act']=='delete_jabatan')) {

$id_jabatan=$_POST['id_jabatan'];

            $q_ = " delete from jabatan where id_jabatan='$id_jabatan' ";
            
            $result= pg_query($connection,$q_);
              if ($result ){
                   logActivity("DELETE JABATAN","SUCCESS, id_jabatan=$id_jabatan ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
              } else  {
                   logActivity("DELETE KARYAWAN","FAILED, id_jabatan=$id_jabatan ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failDel");

        }


}

################################################################################################################################################
#                                                         UPDATE JABATAN                                                                          #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('112') && ($_GET['act']=='edit_jabatan')) {

$id_jabatan=$_POST['ed_id_jabatan'];
$nama_jabatan=$_POST['ed_nama_jabatan'];

            $query = " update jabatan set nama_jabatan='$nama_jabatan' where id_jabatan='$id_jabatan' ";
            $result= pg_query($connection,$query);
              if ($result ){
                   logActivity("UPDATE JABATAN","SUCCESS, id_jabatan=$id_jabatan , nama_jabatan=$nama_jabatan ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("UPDATE JABATAN","FAILED, id_jabatan=$id_jabatan , nama_jabatan=$nama_jabatan ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }





}


################################################################################################################################################
#                                                         ADD UNIT                                                                             #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('113') && ($_GET['act']=='add_unit')) {

$nama_unit=$_POST['nama_unit'];

            $q_insert = " insert into unit (nama_unit) values ('$nama_unit') ";
            $result= pg_query($connection,$q_insert);
            
              if ($result ){
                   logActivity("ADD UNIT","SUCCESS, Nama unit= $nama_unit ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                   logActivity("ADD UNIT","FAILED, Nama unit= $nama_unit ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

                 }

}

################################################################################################################################################
#                                                         DELETE UNIT                                                                          #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('113') && ($_GET['act']=='delete_unit')) {

$id_unit=$_POST['id_unit'];

            $q_ = " delete from unit where id_unit='$id_unit' ";
            
            $result= pg_query($connection,$q_);
              if ($result ){
                   logActivity("DELETE UNIT","SUCCESS, id_unit='$id_unit' ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
              } else  {
                   logActivity("DELETE UNIT","FAILED, id_unit='$id_unit' ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failDel");

        }


}

################################################################################################################################################
#                                                         UPDATE UNIT                                                                          #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('113') && ($_GET['act']=='edit_unit')) {

$id_unit=$_POST['ed_id_unit'];
$nama_unit=$_POST['ed_nama_unit'];

            $query = " update unit set nama_unit='$nama_unit' where id_unit='$id_unit' ";
            $result= pg_query($connection,$query);
              if ($result ){
                   logActivity("UPDATE UNIT","SUCCESS, id_unit=$id_unit , nama_unit=$nama_unit ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("UPDATE UNIT","FAILED, id_unit=$id_unit , nama_unit=$nama_unit ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }





}




################################################################################################################################################
#                                                         ADD GOLONGAN                                                                         #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('114') && ($_GET['act']=='add_golongan')) {

$nama_golongan=$_POST['nama_golongan'];

            $q_insert = " insert into golongan (nama_golongan) values ('$nama_golongan') ";
            $result= pg_query($connection,$q_insert);
            
              if ($result ){
                   logActivity("ADD GOLONGAN","SUCCESS, Nama Golongan= $nama_golongan ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                   logActivity("ADD GOLONGAN","FAILED, Nama Golongan= $nama_golongan ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

                 }

}

################################################################################################################################################
#                                                         DELETE GOLONGAN                                                                      #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('114') && ($_GET['act']=='delete_golongan')) {

$id_golongan=$_POST['id_golongan'];

            $q_ = " delete from golongan where id_golongan='$id_golongan' ";
            
            $result= pg_query($connection,$q_);
              if ($result ){
                   logActivity("DELETE GOLONGAN","SUCCESS, id_golongan=$id_golongan ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
              } else  {
                   logActivity("DELETE GOLONGAN","FAILED, id_golongan=$id_golongan ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failDel");

        }


}

################################################################################################################################################
#                                                         UPDATE GOLONGAN                                                                      #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('114') && ($_GET['act']=='edit_golongan')) {

$id_golongan=$_POST['ed_id_golongan'];
$nama_golongan=$_POST['ed_nama_golongan'];

            $query = " update golongan set nama_golongan='$nama_golongan' where id_golongan='$id_golongan' ";
            $result= pg_query($connection,$query);
              if ($result ){
                   logActivity("UPDATE GOLONGAN","SUCCESS, id_golongan=$id_golongan , nama_golongan=$nama_golongan ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("UPDATE GOLONGAN","FAILED, id_golongan=$id_golongan , nama_golongan=$nama_golongan ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }

}



################################################################################################################################################
#                                                         ADD GAJI POKOK                                                                       #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('115') && ($_GET['act']=='add_gapok')) {

$id_golongan=$_POST['id_golongan'];
$id_jabatan=$_POST['id_jabatan'];
$nominal=$_POST['nominal_gaji'];

            $q_insert = " insert into gaji_pokok (id_jabatan,id_golongan,nominal) values ('$id_jabatan','$id_golongan',$nominal) ";
            $result= pg_query($connection,$q_insert);
            
              if ($result ){
                   logActivity("ADD GAJI POKOK","SUCCESS, id_golongan= $id_golongan, id_jabatan=$id_jabatan, nominal=$nominal ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                   logActivity("ADD GAJI POKOK","FAILED, id_golongan= $id_golongan, id_jabatan=$id_jabatan, nominal=$nominal ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

                 }

}


################################################################################################################################################
#                                                         DELETE GAJI POKOK                                                                    #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('115') && ($_GET['act']=='delete_gapok')) {

$id_gapok=$_POST['id_gapok'];


            $q_ = " delete from gaji_pokok where id_gapok='$id_gapok'  ";
            $result= pg_query($connection,$q_);
            
              if ($result ){
                   logActivity("DELETE GAJI POKOK","SUCCESS, id_gapok=$id_gapok ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
              } else  {
                   logActivity("DELETE GAJI POKOK","FAILED, id_gapok=$id_gapok ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failDel");

                 }

}


################################################################################################################################################
#                                                         UPDATE GAJI POKOK                                                                    #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('115') && ($_GET['act']=='edit_gapok')) {

$id_golongan=$_POST['ed_id_golongan'];
$id_jabatan=$_POST['ed_id_jabatan'];
$nominal=$_POST['ed_nominal_gaji'];
$id_gapok=$_POST['ed_id_gapok'];

            $query = " update gaji_pokok set id_golongan='$id_golongan',id_jabatan='$id_jabatan', nominal='$nominal' where id_gapok='$id_gapok' ";
            $result= pg_query($connection,$query);
              if ($result ){
                   logActivity("UPDATE GAJI POKOK","SUCCESS, id_gapok=$id_gapok nominal=$nominal ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("UPDATE GAJI POKOK","FAILED, id_gapok=$id_gapok nominal=$nominal ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }

}

################################################################################################################################################
#                                                         ADD TUJUAN TRANSAKSI                                                                 #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('124') && ($_GET['act']=='add_tujuan_transaksi')) {

$nama_transaksi=$_POST['nama_transaksi'];

            $q_insert = " insert into tujuan_transaksi (nama_tj_transaksi) values ('$nama_transaksi') ";
            $result= pg_query($connection,$q_insert);
            
              if ($result ){
                   logActivity("ADD TUJUAN TRANSAKSI","SUCCESS, nama_tj_transaksi= $nama_tj_transaksi ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                   logActivity("ADD TUJUAN TRANSAKSI","FAILED, nama_tj_transaksi= $nama_tj_transaksi ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

                 }

}

################################################################################################################################################
#                                                         DELETE TUJUAN TRANSAKSI                                                              #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('124') && ($_GET['act']=='delete_tujuan_transaksi')) {

$id_trans=$_POST['id_trans'];

            $q_ = " delete from tujuan_transaksi where id_trans='$id_trans' ";
            
            $result= pg_query($connection,$q_);
              if ($result ){
                   logActivity("DELETE TUJUAN TRANSAKSI","SUCCESS, id_trans='$id_trans' ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
              } else  {
                   logActivity("DELETE TUJUAN TRANSAKSI","FAILED, id_trans='$id_trans' ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failDel");

        }


}

################################################################################################################################################
#                                                         UPDATE TUJUAN TRANSAKSI                                                              #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('124') && ($_GET['act']=='edit_tujuan_transaksi')) {

$id_transaksi=$_POST['ed_id_transaksi'];
$nama_transaksi=$_POST['ed_nama_transaksi'];

            $query = " update tujuan_transaksi set nama_tj_transaksi='$nama_transaksi' where id_trans='$id_transaksi' ";
            $result= pg_query($connection,$query);
              if ($result ){
                   logActivity("UPDATE TUJUAN TRANSAKSI","SUCCESS, nama_tj_transaksi=$nama_transaksi where id_trans=$id_transaksi ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("UPDATE TUJUAN TRANSAKSI","FAILED, nama_tj_transaksi=$nama_transaksi where id_trans=$id_transaksi ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }





}



################################################################################################################################################
#                                                         ADD JENIS UNDERLYING                                                                 #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('125') && ($_GET['act']=='add_jenis_underlying')) {

$nama_jenis_underlying=$_POST['nama_jenis_underlying'];

            $q_insert = " insert into jenis_underlying (nama_js_underlying) values ('$nama_jenis_underlying') ";
            $result= pg_query($connection,$q_insert);
            
              if ($result ){
                   logActivity("ADD JENIS UNDERLYING","SUCCESS, nama_js_underlying= $nama_jenis_underlying ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                   logActivity("ADD JENIS UNDERLYING","FAILED, nama_js_underlying= $nama_jenis_underlying ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

                 }

}

################################################################################################################################################
#                                                         DELETE JENIS UNDERLYING                                                              #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('125') && ($_GET['act']=='delete_jenis_underlying')) {

$id_jenis=$_POST['id_jenis'];

            $q_ = " delete from jenis_underlying where id_jenis='$id_jenis' ";
            
            $result= pg_query($connection,$q_);
              if ($result ){
                   logActivity("DELETE JENIS UNDERLYING ","SUCCESS, id_jenis=$id_jenis ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
              } else  {
                   logActivity("DELETE JENIS UNDERLYING ","FAILED, id_jenis=$id_jenis ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failDel");

        }


}

################################################################################################################################################
#                                                         UPDATE JENIS UNDERLYING                                                               #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('125') && ($_GET['act']=='edit_jenis_underlying')) {

$id_jenis=$_POST['ed_id_jenis_underlying'];
$nama_jenis_underlying=$_POST['ed_jenis_underlying'];

            $query = " update jenis_underlying set nama_js_underlying='$nama_jenis_underlying' where id_jenis='$id_jenis' ";
            $result= pg_query($connection,$query);
              if ($result ){
                   logActivity("UPDATE TUJUAN TRANSAKSI","SUCCESS, nama_js_underlying=$nama_jenis_underlying where id_jenis=$id_jenis ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("UPDATE TUJUAN TRANSAKSI","FAILED, nama_js_underlying=$nama_jenis_underlying where id_jenis=$id_jenis ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }


}



################################################################################################################################################
#                                                         ADD LIST UNDERLYING                                                                 #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('126') && ($_GET['act']=='add_list_underlying')) {

$nama_list_underlying=$_POST['nama_list_underlying'];

            $q_insert = " insert into list_underlying (nama_ls_underlying) values ('$nama_list_underlying') ";
            $result= pg_query($connection,$q_insert);
            
              if ($result ){
                   logActivity("ADD LIST UNDERLYING","SUCCESS, nama_ls_underlying= $nama_list_underlying ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                   logActivity("ADD LIST UNDERLYING","FAILED, nama_ls_underlying= $nama_list_underlying ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

                 }

}

################################################################################################################################################
#                                                         DELETE LIST UNDERLYING                                                              #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('126') && ($_GET['act']=='delete_list_underlying')) {

$id_list=$_POST['id_list'];

            $q_ = " delete from list_underlying where id_list='$id_list' ";
            
            $result= pg_query($connection,$q_);
              if ($result ){
                   logActivity("DELETE LIST UNDERLYING ","SUCCESS, id_list=$id_list ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
              } else  {
                   logActivity("DELETE LIST UNDERLYING ","FAILED, id_list=$id_list ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failDel");

        }


}

################################################################################################################################################
#                                                         UPDATE LIST UNDERLYING                                                               #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('126') && ($_GET['act']=='edit_list_underlying')) {


$id_list=$_POST['ed_id_list_underlying'];
$nama_list_underlying=$_POST['ed_list_underlying'];

            $query = " update list_underlying set nama_ls_underlying='$nama_list_underlying' where id_list='$id_list' ";
            $result= pg_query($connection,$query);
              if ($result ){
                   logActivity("UPDATE LIST TRANSAKSI","SUCCESS, set nama_ls_underlying=$nama_list_underlying where id_list=$id_list ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("UPDATE LIST TRANSAKSI","FAILED, set nama_ls_underlying=$nama_list_underlying where id_list=$id_list ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }


}


####################################################### Add ,edit MAP PIC ######################################################################
if (($_GET['module'])==hashEncryptedMenu('127') && ($_GET['act']=='add_map_pic2')) {


  if (isset($_POST['id_trans2']) && ($_POST['id_trans2'])!="" && isset($_POST['id_jenis2']) && ($_POST['id_jenis2'])!=""){

    $query_delete =" delete from mapp_tujuan_trans where id_trans='$_POST[id_trans2]' and id_jenis='$_POST[id_jenis2]' ";
    $result_delete =pg_query($connection, $query_delete);

      foreach ($_POST['my_multi_select1'] as $id_list) {
   
 
            //insert into map
           $query =" insert into mapp_tujuan_trans (id_trans,id_jenis,id_list) ";
           $query.=" values ('$_POST[id_trans2]','$_POST[id_jenis2]','$id_list') ";
           $result=pg_query($connection, $query);

           logActivity("ADD MAPPING TRANSAKSI ","$_POST[id_trans2], $_POST[id_jenis2], $id_list ");
      }

          header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp&id_trans=$_POST[id_trans2]&id_jenis=$_POST[id_jenis2]");
    
    //die();
  } else {

          header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

    }

}


################################################################################################################################################
#                                                         INSERT TRANSAKSI OUTGOING                                                            #
################################################################################################################################################

if (($_GET['module'])==hashEncryptedMenu('129') && ($_GET['act']=='add_trans')) {

//$current_date=date('Ymd');
  $query_sequence=" select nextval('seq_cif_number') as seq_cif_number ";
  $rest_seq=pg_query($connection,$query_sequence);
  $r_sequence=pg_fetch_array($rest_seq);
  $idtrans_out=date('Ymd').$r_sequence['seq_cif_number'];

//|| (!isset($_POST['new_cifNumber'])) || $_POST['new_cifNumber']==''
  if (!isset($_POST['new_nama_pengirim']) || $_POST['new_nama_pengirim']=='' )
  {
    # CIF DARI SERVER STAGING
    $nama_pengirim=$_POST['nama_pengirim'];
    $cifNumber=$_POST['cifNumber'];
    insertMasterCif($cifNumber,$nama_pengirim,"FROM STAGING SERVER");

  } else {
    # CIF DARI CREAT BARU
    $nama_pengirim=$_POST['new_nama_pengirim'];
    $cifNumber=$r_sequence['seq_cif_number'];
     insertMasterCif($cifNumber,$nama_pengirim,"NEW CREATE");
  }


$identitas=$_POST['identitas'];
$no_identitas=$_POST['no_identitas'];
$tgl_lahir=date('Y-m-d',strtotime($_POST['tgl_lahir']));
$ibu_kandung=$_POST['ibu_kandung'];
if(isset($ibu_kandung)){
  $ibu_kandung=$_POST['ibu_kandung'];
}else{
  $ibu_kandung="NULL";
}

$mata_uang=$_POST['mata_uang'];
$nama_penerima=$_POST['nama_penerima'];
$nominal_trans=$_POST['nominal_trans'];
$nilai_kurs=$_POST['nilai_kurs'];
$nilai_ekivalen=$_POST['nilai_ekivalen'];
$id_cabang=$_POST['id_cabang'];
$id_trans=$_POST['id_trans'];
$id_jenis=$_POST['id_jenis'];
$tgl_terbit=date('Y-m-d',strtotime($_POST['tgl_terbit']));
$nominal_dok_underlying=$_POST['nominal_dok_underlying'];
$nama_out=$_POST['nama_out'];
$nama_tertera=$_POST['nama_tertera'];
$keterangan=$_POST['keterangan'];




//====>>> CEK NOMOR DOKUMEN UDERLYING  ==================

for ($z=1; $z <=$_POST['jml_dukumen'] ; $z++) { 

      if(isset($_POST["id_list_$z"]) && $_POST["id_list_$z"]!="" ){
            $clean_no=strtoupper($_POST["number_dok_$z"]);
            $clean_no = str_replace(array(':', '\\', '/', '*','.','-','_',' ','"','|',';'), '', $clean_no); 
            $no_dokumen=strtoupper($_POST["number_dok_$z"]);


            # DOC NUMBER CLEAN
            $q_cek_Dokumen1  =" select * from value_list_underlying a  ";
            $q_cek_Dokumen1 .=" left join transaksi_outgoing b on a.idtrans_out=b.idtrans_out ";
            $q_cek_Dokumen1 .=" where a.doc_number='$clean_no' and b.status <> '99' order by a.idtrans_out desc limit 1 ";
            $rest_cek_Dokumen1=pg_query($connection,$q_cek_Dokumen1);
            $found_dok1=pg_num_rows($rest_cek_Dokumen1);
            $label_dokumen1=pg_fetch_array($rest_cek_Dokumen1);

            # DOC NUMBER ORIGINAL
            $q_cek_Dokumen2  =" select * from value_list_underlying a ";
            $q_cek_Dokumen2 .=" left join transaksi_outgoing b on a.idtrans_out=b.idtrans_out ";
            $q_cek_Dokumen2 .=" where a.doc_number_ori='$no_dokumen' and b.status <> '99' order by a.idtrans_out desc limit 1 ";
            $rest_cek_Dokumen2=pg_query($connection,$q_cek_Dokumen2);
            $found_dok2=pg_num_rows($rest_cek_Dokumen2);
            $label_dokumen2=pg_fetch_array($rest_cek_Dokumen2);

            if( $found_dok1 >=1 || $found_dok2 >=1 ){

                  if(!isset($label_dokumen1['id_list']) && $label_dokumen1['id_list']=="" ) {
                    $id_dokumen=$label_dokumen2['id_list'];
                    $fix_idtrans=$label_dokumen2['idtrans_out'];
                  } else {
                    $id_dokumen=$label_dokumen1['id_list'];
                    $fix_idtrans=$label_dokumen1['idtrans_out'];
                  }

                   $status=99;
                   logActivity("INSERT TRANS OUTGOING","SAME DOCUMENT");
                   //header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=sameDok&nomorDok=$no_dokumen&namaDokumen=");
                   //die();
            




            }



      }

}
//====>>> END CEK NOMOR DOKUMEN UDERLYING  ==================


if (!isset($status) && $status==""){
$new_status=1;
} else {
$new_status=$status;  
}



$query  =" INSERT INTO transaksi_outgoing (idtrans_out,nama_pengirim,nama_penerima,cif_number,nominal_trans,nilai_kurs,nilai_ekivalen,id_trans,id_jenis, ";
$query .=" tgl_terbit,nominal_dokumen,nama_out,nama_tertera,keterangan,date_create,id_cabang,id_user,status,identitas,no_identitas,tgl_lahir,ibu_kandung,id_currency) ";
$query .=" VALUES ( '$idtrans_out','$nama_pengirim','$nama_penerima','$cifNumber','$nominal_trans','$nilai_kurs','$nilai_ekivalen',";
$query .=" '$id_trans','$id_jenis','$tgl_terbit','$nominal_dok_underlying','$nama_out','$nama_tertera','$keterangan', ";
$query .=" CURRENT_TIMESTAMP,'$id_cabang','".getUsername()."','$new_status','$identitas','$no_identitas','$tgl_lahir','$ibu_kandung','$mata_uang' ) ";
//echo $query;
//die();
$result=pg_query($connection,$query);

######### insert value_list_underlying list dokument ##########

for ($z=1; $z <=$_POST['jml_dukumen'] ; $z++) { 

      if(isset($_POST["id_list_$z"]) && $_POST["id_list_$z"]!="" ){
            $clean_no=strtoupper($_POST["number_dok_$z"]);
            $clean_no = str_replace(array(':', '\\', '/', '*','.','-','_',' ','"','|',';'), '', $clean_no); 
            $q_insert2 =" insert into value_list_underlying (idtrans_out,id_list,doc_number,doc_number_ori) ";
            $q_insert2.=" VALUES ('$idtrans_out','".$_POST["id_list_$z"]."','$clean_no','".strtoupper($_POST["number_dok_$z"])."') ";
            $rest_insert2=pg_query($connection,$q_insert2);


      }

}


###########  upload file #############


if(isset($_FILES['file_attach']['tmp_name']) && $_FILES['file_attach']['tmp_name']!="" && $_FILES['file_attach']['tmp_name']!=NULL) {

  $image_temp=$_FILES['file_attach']['tmp_name'];
  $nama=$_FILES['file_attach']['name'];
  $type=$_FILES['file_attach']['type'];
  $ext = pathinfo($nama, PATHINFO_EXTENSION);
  $file_name=$idtrans_out.".$ext";
  $directory="../../data/doc_transaksi/".$file_name;
  copy($image_temp,$directory);
  SaveDokFile($idtrans_out,$file_name);
  }

//die();

if ($result ) {   if ($new_status=='99'){

                      logActivity("INSERT TRANS OUTGOING","SAME DOCUMENT");
                      //logTrans($idtrans_out,$keterangan,"CREATED");
                      header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=sameDok&idtrans=$fix_idtrans&idtrans2=$idtrans_out&nomorDok=$no_dokumen&id_dokumen=$id_dokumen");
                      die();

                    } else if ($new_status=='1') {

                          logTrans($idtrans_out,$keterangan,"CREATED");
                          logActivity("INSERT TRANS OUTGOING","SUCCESS, idtrans_out= $idtrans_out  ");
                          header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
                       } else  {
                                  logActivity("INSERT TRANS OUTGOING","FAILED, idtrans_out= $idtrans_out  ");
                                  header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

                          }



}
}


################################################################################################################################################
#                                                         UPDATE STATUS TRANSAKSI  FROM SAME DOK                                               #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('129') && ($_GET['act']=='UpSttrans')) {



$idtrans_out=$_POST['idtrans_out_for_edit'];
//echo $idtrans_out;
//die();
//$keterangan=$_POST['keterangan'];

            $q_  = " insert into log_trans (idtrans_out,date_create,id_user,keterangan,action_flag)  ";
            $q_ .= " values ('$idtrans_out',CURRENT_TIMESTAMP,'".getUsername()."','Confirm With Same Document','CREATED')  ";
            //echo $q_;
            //die();
            $result= pg_query($connection,$q_);
              if ($result ){
                   updateStatusTrans($idtrans_out,"1");
                   //logTrans($idtrans_out,"With Same Document","CREATED");
                   logActivity("INSERT TRANS OUTGOING","SUCCESS, idtrans_out=$idtrans_out ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                   logActivity("INSERT TRANS OUTGOING","FAILED, idtrans_out=$idtrans_out  ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

        }






}


################################################################################################################################################
#                                                         UPDATE KURS                                                                          #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('131') && ($_GET['act']=='update_kurs')) {

$new_kurs=$_POST['new_kurs'];

            $q_ = " UPDATE kurs_rupiah set nominal_kurs='$new_kurs' ";
            
            $result= pg_query($connection,$q_);
              if ($result ){
                   logActivity("UPDATE KURS ","SUCCESS, nominal_kurs=$new_kurs ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("UPDATE KURS ","FAILED, nominal_kurs=$new_kurs  ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }


}



################################################################################################################################################
#                                                         CHECKER BRANCH                                                                       #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('133') && ($_GET['act']=='check_branch')) {

$idtrans_out=$_POST['idtrans_out'];
$keterangan=$_POST['keterangan'];

            $q_  = " insert into log_trans (idtrans_out,date_create,id_user,keterangan,action_flag)  ";
            $q_ .= " values ('$idtrans_out',CURRENT_TIMESTAMP,'".getUsername()."','$keterangan','CHECKED BRANCH')  ";
            //echo $q_;
            //die();
            $result= pg_query($connection,$q_);
              if ($result ){
                   updateStatusTrans($idtrans_out,"2");
                   logActivity("CHECKED BRANCH ","SUCCESS, idtrans_out=$idtrans_out ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("CHECKED BRANCH ","FAILED, idtrans_out=$idtrans_out  ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }


}



################################################################################################################################################
#                                                         CHECKER HO                                                                           #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('136') && ($_GET['act']=='check_ho')) {

$idtrans_out=$_POST['idtrans_out'];
$keterangan=$_POST['keterangan'];



switch ($_POST['var_a']) {
	case 'approve':
		$updated=2;
		$var_updated="CHECKED HO";
		$message1="succUp";
		$message2="failUp";
		break;
	case 'reject':
		$updated=3;
		$var_updated="REJECT HO";
		$message1="RejSucc";
		$message2="failRej";
		break;

}

//echo $updated."<br>";
//echo $var_updated."<br>";
//die();



            $q_  = " insert into log_trans (idtrans_out,date_create,id_user,keterangan,action_flag)  ";
            $q_ .= " values ('$idtrans_out',CURRENT_TIMESTAMP,'".getUsername()."','$keterangan','$var_updated')  ";
            //echo $q_;
            //die();
            $result= pg_query($connection,$q_);
              if ($result ){
                   updateStatusTrans($idtrans_out,"$updated");
                   logActivity("$var_updated ","SUCCESS, idtrans_out=$idtrans_out ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=$message1");
              } else  {
                   logActivity("$var_updated ","FAILED, idtrans_out=$idtrans_out  ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=$message2");

        }


}

################################################################################################################################################
#                                                         APPROVAL BRANCH                                                                      #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('135') && ($_GET['act']=='approval_branch')) {

$idtrans_out=$_POST['idtrans_out'];
$keterangan=$_POST['keterangan'];

            $q_  = " insert into log_trans (idtrans_out,date_create,id_user,keterangan,action_flag)  ";
            $q_ .= " values ('$idtrans_out',CURRENT_TIMESTAMP,'".getUsername()."','$keterangan','APPROVE BRANCH')  ";
            //echo $q_;
            //die();
            $result= pg_query($connection,$q_);
              if ($result ){
                   updateStatusTrans($idtrans_out,"3");
                   logActivity("APPROVE BRANCH ","SUCCESS, idtrans_out=$idtrans_out ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("APPROVE BRANCH ","FAILED, idtrans_out=$idtrans_out  ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }


}

################################################################################################################################################
#                                                         REJECT BRANCH                                                                      #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('135') && ($_GET['act']=='reject_branch')) {

$idtrans_out=$_POST['idtrans_out'];
$keterangan=$_POST['keterangan'];

            $q_  = " insert into log_trans (idtrans_out,date_create,id_user,keterangan,action_flag)  ";
            $q_ .= " values ('$idtrans_out',CURRENT_TIMESTAMP,'".getUsername()."','$keterangan','REJECT BRANCH')  ";
            //echo $q_;
            //die();
            $result= pg_query($connection,$q_);
              if ($result ){
                   updateStatusTrans($idtrans_out,"4");
                   logActivity("REJECT BRANCH ","SUCCESS, idtrans_out=$idtrans_out ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=RejSucc");
              } else  {
                   logActivity("REJECT BRANCH ","FAILED, idtrans_out=$idtrans_out  ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failRej");

        }


}


################################################################################################################################################
#                                                         APPROVAL BRANCH                                                                      #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('134') && ($_GET['act']=='approval_ho')) {

$idtrans_out=$_POST['idtrans_out'];
$keterangan=$_POST['keterangan'];

            $q_  = " insert into log_trans (idtrans_out,date_create,id_user,keterangan,action_flag)  ";
            $q_ .= " values ('$idtrans_out',CURRENT_TIMESTAMP,'".getUsername()."','$keterangan','APPROVE HO')  ";
            //echo $q_;
            //die();
            $result= pg_query($connection,$q_);
              if ($result ){
                   updateStatusTrans($idtrans_out,"3");
                   logActivity("APPROVE HO ","SUCCESS, idtrans_out=$idtrans_out ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("APPROVE HO ","FAILED, idtrans_out=$idtrans_out  ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }


}

################################################################################################################################################
#                                                         REJECT BRANCH                                                                      #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('134') && ($_GET['act']=='reject_ho')) {

$idtrans_out=$_POST['idtrans_out'];
$keterangan=$_POST['keterangan'];

            $q_  = " insert into log_trans (idtrans_out,date_create,id_user,keterangan,action_flag)  ";
            $q_ .= " values ('$idtrans_out',CURRENT_TIMESTAMP,'".getUsername()."','$keterangan','REJECT HO')  ";
            //echo $q_;
            //die();
            $result= pg_query($connection,$q_);
              if ($result ){
                   updateStatusTrans($idtrans_out,"4");
                   logActivity("REJECT HO ","SUCCESS, idtrans_out=$idtrans_out ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=RejSucc");
              } else  {
                   logActivity("REJECT HO ","FAILED, idtrans_out=$idtrans_out  ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failRej");

        }


}



################################################################################################################################################
#                                                         RECHECK BRANCH                                                                      #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('139') && ($_GET['act']=='recheck_branch')) {

$idtrans_out=$_POST['idtrans_out'];
$keterangan=$_POST['keterangan'];

            $q_  = " insert into log_trans (idtrans_out,date_create,id_user,keterangan,action_flag)  ";
            $q_ .= " values ('$idtrans_out',CURRENT_TIMESTAMP,'".getUsername()."','$keterangan','RECHECK BRANCH')  ";
            //echo $q_;
            //die();
            $result= pg_query($connection,$q_);
              if ($result ){
                   updateStatusTrans($idtrans_out,"3");
                   logActivity("RECHECK BRANCH ","SUCCESS, idtrans_out=$idtrans_out ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=RecSucc");
              } else  {
                   logActivity("RECHECK BRANCH ","FAILED, idtrans_out=$idtrans_out  ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failRec");

        }


}




################################################################################################################################################
#                                                         EDIT TRANSAKSI OUTGOING                                                              #
################################################################################################################################################

if (($_GET['module'])==hashEncryptedMenu('139') && ($_GET['act']=='edit_trans')) {

//$current_date=date('Ymd');

$idtrans_out=$_POST['no_trans_edit'];

$nama_penerima=$_POST['nama_penerima'];
$nominal_trans=$_POST['nominal_trans'];
$nilai_kurs=$_POST['nilai_kurs'];
$nilai_ekivalen=$_POST['nilai_ekivalen'];
$id_cabang=$_POST['id_cabang'];
$id_trans=$_POST['id_trans'];
$id_jenis=$_POST['id_jenis'];
//$no_dok=$_POST['no_dok'];
$tgl_terbit=date('Y-m-d',strtotime($_POST['tgl_terbit']));
$nominal_dok_underlying=$_POST['nominal_dok_underlying'];
$nama_out=$_POST['nama_out'];
$nama_tertera=$_POST['nama_tertera'];
$keterangan=$_POST['keterangan'];

$query  =" UPDATE transaksi_outgoing SET nama_penerima='$nama_penerima',nominal_trans='$nominal_trans',nilai_kurs='$nilai_kurs',nilai_ekivalen='$nilai_ekivalen', ";
$query .=" id_trans='$id_trans',id_jenis='$id_jenis',tgl_terbit='$tgl_terbit',nominal_dokumen='$nominal_dok_underlying',nama_out='$nama_out', ";
$query .=" nama_tertera='$nama_tertera',keterangan='$keterangan',id_cabang='$id_cabang',id_user='".getUsername()."' WHERE  idtrans_out='$idtrans_out' ";

//echo $query;
//die();
$result=pg_query($connection,$query);

######### insert value_list_underlying list dokument ##########
            $q_delete= " delete from value_list_underlying where idtrans_out='$idtrans_out' ";
            $rest_delete=pg_query($connection,$q_delete);

for ($z=1; $z <=$_POST['jml_dukumen'] ; $z++) { 

      if(isset($_POST["id_list_$z"]) && $_POST["id_list_$z"]!="" ){
            
            $clean_no=$_POST["number_dok_$z"];
            $clean_no = str_replace(array(':', '\\', '/', '*','.','-','_',' ','"'), '', $clean_no); 
            $q_insert2 =" insert into value_list_underlying (idtrans_out,id_list,doc_number,doc_number_ori) ";
            $q_insert2.=" VALUES ('$idtrans_out','".$_POST["id_list_$z"]."','$clean_no','".$_POST["number_dok_$z"]."') ";
            $rest_insert2=pg_query($connection,$q_insert2);


      }

}

###########  upload file #############


if(is_uploaded_file($_FILES['file_attach']['tmp_name'])) {

  $image_temp=$_FILES['file_attach']['tmp_name'];
  $nama=$_FILES['file_attach']['name'];
  $type=$_FILES['file_attach']['type'];
  $ext = pathinfo($nama, PATHINFO_EXTENSION);
  $file_name=$idtrans_out.".$ext";
  $directory="../../data/doc_transaksi/".$file_name;
  copy($image_temp,$directory);
  SaveDokFile($idtrans_out,$file_name);
  }

//die();

if ($result ){     logTrans($idtrans_out,"Update by Inputer","UPDATE TRANS");
                   logActivity("UPDATE TRANS OUTGOING","SUCCESS, idtrans_out= $idtrans_out  ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=SuccUp");
              } else  {
                   logActivity("UPDATE TRANS OUTGOING","FAILED, idtrans_out= $idtrans_out  ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

                 }



}


################################################################################################################################################
#                                                         ADD KURS                                                                          #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('142') && ($_GET['act']=='add_kurs')) {

//$new_kurs=$_POST['new_kurs'];
$nama_kurs=$_POST['nama_kurs'];
$inisial_kurs=$_POST['inisial_kurs'];
$nilai_kurs=$_POST['nilai_kurs'];

            //$q_ = " UPDATE kurs_rupiah set nominal_kurs='$new_kurs' ";
              $q_ = " INSERT into nilai_kurs (nama_kurs,inisial,nilai_kurs) values ('$nama_kurs','$inisial_kurs','$nilai_kurs') ";
              $result= pg_query($connection,$q_);

              if ($result ){
                   logActivity("ADD KURS ","SUCCESS, nama_kurs=$nama_kurs,inisial=$inisial_kurs,nilai_kurs=$nilai_kurs ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                   logActivity("ADD KURS ","FAILED, nama_kurs=$nama_kurs,inisial=$inisial_kurs,nilai_kurs=$nilai_kurs  ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failed");

        }


}



################################################################################################################################################
#                                                         UPDATE KURS                                                                          #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('142') && ($_GET['act']=='edit_kurs')) {

$ed_id_kurs=$_POST['ed_id_kurs'];
$nama_kurs=$_POST['ed_nama_kurs'];
$inisial_kurs=$_POST['ed_inisial_kurs'];
$nilai_kurs=$_POST['ed_nilai_kurs'];

            //$q_ = " UPDATE kurs_rupiah set nominal_kurs='$new_kurs' ";
              $q_ = " UPDATE nilai_kurs set nama_kurs='$nama_kurs',inisial='$inisial_kurs',nilai_kurs='$nilai_kurs' WHERE id='$ed_id_kurs' ";
              //echo $q_;
              //die();
              $result= pg_query($connection,$q_);

              if ($result ){
                   logActivity("EDIT KURS ","SUCCESS, nama_kurs=$nama_kurs,inisial=$inisial_kurs,nilai_kurs=$nilai_kurs, id=$ed_id_kurs ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
              } else  {
                   logActivity("EDIT KURS ","FAILED, nama_kurs=$nama_kurs,inisial=$inisial_kurs,nilai_kurs=$nilai_kurs, id=$ed_id_kurs ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failUp");

        }


}


################################################################################################################################################
#                                                         DELETE KURS                                                                          #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('142') && ($_GET['act']=='delete_kurs')) {

//$new_kurs=$_POST['new_kurs'];
$id_kurs=$_POST['id_kurs'];


            
              $q_ = " DELETE FROM nilai_kurs where id='$id_kurs' ";
              $result= pg_query($connection,$q_);

              if ($result ){
                   logActivity("DELETE KURS ","SUCCESS, id_kurs=$id_kurs");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
              } else  {
                   logActivity("DELETE KURS ","FAILED, id_kurs=$id_kurs  ");
                   header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=failDel");

        }


}


################################################################################################################################################
#                                                         EDIT MYPROFILE                                                                          #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('144') && ($_GET['act']=='edit_myprofile')) {

$nama_lengkap=$_POST['nama_lengkap'];
$nik=$_POST['nik'];


if(isset($_FILES['file_img']['tmp_name']) && $_FILES['file_img']['tmp_name'] !="") {

  $image_temp=$_FILES['file_img']['tmp_name'];
  $nama=$_FILES['file_img']['name'];
  $type=$_FILES['file_img']['type'];
  $ext = pathinfo($nama, PATHINFO_EXTENSION);
//echo $ext;
  $directory="../../images/profile/".$nik.".$ext";
  copy($image_temp,$directory);
  $_SESSION['SESS_IMG'] = $nik.".$ext";

  }


$query=" update user_account set nama_lengkap='$nama_lengkap', image='$_SESSION[SESS_IMG]' where nik='$nik' ";
$result=pg_query($connection, $query);

  if ($result)
      { 
        $_SESSION['SESS_NAMA_LENGKAP'] = $nama_lengkap;
        logActivity("Edit PROFILE","nama_lengkap=$nama_lengkap, nik=$nik , image='$_SESSION[SESS_IMG]' ");
        header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
    } else  {
        header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=errUp");

      }


}

################################################################################################################################################
#                                                         CHANGE PASSWORD                                                                          #
################################################################################################################################################
if (($_GET['module'])==hashEncryptedMenu('145') && ($_GET['act']=='edit_changepass')) {

$new_pass=$_POST['new_pass'];
$nik=$_POST['nik'];
$fix_newpass=hashEncryptedMenu($new_pass);

            
              $query=" update user_account set password='$fix_newpass' where nik='$nik' ";
              $result=pg_query($connection, $query);

  if ($result)
      { 
        logActivity("Edit PROFILE","nama_lengkap=$nama_lengkap, nik=$nik  ");
        header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
    } else  {
        header("location: ../../home?module=$_GET[module]&pm=$_GET[pm]&message=errUp");

      }


}


?> 