<?php


      if( isset($_GET['module']) ){

                  if($_GET['module']==hashEncryptedMenu('102')){  //      Module Add User 
				   include "module/module_user.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('103')){  // Module Group User 
				   include "module/module_group_user.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('104')){  // Module Menu
				   include "module/module_menu.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('105')){  // Module Group Menu 
				   include "module/module_group_menu.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('113')){  // Module Unit
				   include "module/module_unit.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('124')){  // Tujuan Transaksi
				   include "module/module_tujuan_transaksi.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('125')){  // Jenis Dok Underlying
				   include "module/module_jenis_dok_underlying.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('126')){  // List Dok Underlying
				   include "module/module_list_dok_underlying.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('127')){  // Mapp Tujuan Trans
				   include "module/module_mapp_tujuan_transaksi.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('129')){  // Input Transaksi
				   include "module/module_input_transaksi.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('130')){  // List transaksi
				   include "module/module_list_transaksi.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('131')){  // Kurs Dolar
				   include "module/module_kurs_dolar.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('133')){  // Checker Branch
				   include "module/module_checker_branch.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('136')){  // Checker HO
				   include "module/module_checker_ho.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('135')){  // Approval Branch
				   include "module/module_approve_branch.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('134')){  // Approval HO
				   include "module/module_approve_ho.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('139')){  // List Reject Branch
				   include "module/module_list_reject_branch.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('140')){  // List Transaction ss
				   include "module/module_list_transaksi_ss.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('141')){  // List Transaction ss2
				   include "module/module_list_transaksi_ss2.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('142')){  // Nilai Kurs
				   include "module/module_nilai_kurs.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('144')){  // My Profile
				   include "module/module_my_profile.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('145')){  // Change Password
				   include "module/module_change_password.php";				   
			     }else if($_GET['module']==hashEncryptedMenu('146')){  // Export Excel
				   include "module/module_export_excel.php";				   
			     }else {   //
				 include "module/notfound.php";
				 }
} else {
	 include "module/module_home.php";
	}


//module_upload_adjustment_fr.php
// 4 . 1	Jenis Dok Underlying	123	125	Edit  Delete
// 4 . 2	List Dok. Underlying	123	126	Edit  Delete
// 4 . 3	Mapp Tujuan Trans	123	127	Edit  Delete
// 4 . 4	Tujuan Transaksi	123	124	Edit 

?>