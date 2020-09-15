<?php

/*######################################################################*\
#            				FUNCTION LIBRARY			                 #
# -----------------------------------------------------------------------#
# 																		 #
#  																		 #
#  	Developed by:	Asep Arifyan						    			 #
#	License:		Commercial											 #
#  	Copyright: 		2016. All Rights Reserved.		                     #
#                                                                        #
#  	Additional modules (embedded): 										 #
#	-- Metronic (Themes) 												 #
#	-- DB Postgresql 5.1												 #
#																		 #
# -----------------------------------------------------------------------#
#	Designed and built with all the love and loyalty.					 #
\*######################################################################*/


date_default_timezone_set("Asia/Jakarta"); 
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];	  

function getUsername(){
		$username = $_SESSION['SESS_USERNAME'];
		return $username;
	}
function getStatusAccount(){
		$status = $_SESSION['SESS_STATUS_ACCOUNT'];
		return $status;
	}
function getPassword(){
		$pass = $_SESSION['SESS_PASSWORD'];
		return $pass;
	}
function getGroupUser(){
		$group = $_SESSION['SESS_GROUP_USER'];
		return $group;
	}
function getIdCabang(){
		$fix_id_cabang = $_SESSION['SESS_ID_CABANG'];
		return $fix_id_cabang;
	}
function getIdUnit(){
        $fix_id_unit= $_SESSION['SESS_ID_UNIT'];
        return $fix_id_unit;
    }
function getNamaLengkap(){
        $fix_nama_lengkap = $_SESSION['SESS_NAMA_LENGKAP'];
        return $fix_nama_lengkap;
    }
function getEmail(){
        $fix_email = $_SESSION['SESS_EMAIL'];
        return $fix_email;
    }
function getIdJabatan(){
        $fix_id_jabatan = $_SESSION['SESS_ID_JABATAN'];
        return $fix_id_jabatan;
    }
function getTlp(){
        $fix_tlp = $_SESSION['SESS_TLP'];
        return $fix_tlp;
    }
function getImage(){
        $fix_image = $_SESSION['SESS_IMG'];
        return $fix_image;
    }
function getStatusAktif(){
        $fix_status_aktif = $_SESSION['SESS_STATUS_AKTIF'];
        return $fix_status_aktif;
    }
function getIdGol(){
        $fix_id_gol = $_SESSION['SESS_ID_GOLONGAN'];
        return $fix_id_gol;
    }

function getJenisKelamin(){
        $fix_jk = $_SESSION['SESS_JENIS_KELAMIN'];
        return $fix_jk;
    }
function getStatusKaryawan(){
        $fix_status_karyawan = $_SESSION['SESS_STATUS_KARYAWAN'];
        return $fix_status_karyawan;
    }
function getKdAbsensi(){
        $fix_kode_absensi = $_SESSION['SESS_KODE_ABSENSI'];
        return $fix_kode_absensi;
    }



function getNamaUnit(){
		global $connection;
		$query=" SELECT nama_unit FROM unit  where id_unit='$_SESSION[SESS_ID_CABANG]' ";
		$result=pg_query($connection,$query);
		$found = pg_num_rows($result);
		if ($found >=1)
		{
			$row = pg_fetch_array($result);
			$nama=$row['nama_unit'];
			return $nama;
			}
	}

function getNamaJabatan(){
		global $connection;
		$query="SELECT nama_jabatan FROM jabatan  where id_jabatan='$_SESSION[SESS_ID_JABATAN]' ";
		$result=pg_query($connection,$query);
		$found = pg_num_rows($result);
		if ($found >=1)
		{
			$row = pg_fetch_array($result);
			$nama=$row['nama_jabatan'];
			return $nama;
			}
	}

function getNamaGolongan(){
		global $connection;
		$query=" SELECT nama_golongan FROM golongan  where id_golongan='$_SESSION[SESS_ID_GOLONGAN]' ";
		$result=pg_query($connection,$query);
		$found = pg_num_rows($result);
		if ($found >=1)
		{
			$row = pg_fetch_array($result);
			$nama=$row['nama_golongan'];
			return $nama;
			}
	}



function getGroupUserName(){
		global $connection;
		$query="SELECT nama_group FROM group_user  where id_group='$_SESSION[SESS_GROUP_USER]' ";
		$result=pg_query($connection,$query);
		$found = pg_num_rows($result);
		if ($found >=1)
		{
			$row = pg_fetch_array($result);
			$nama_group=$row['nama_group'];
			return $nama_group;
			}
	}

function getIp(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    		$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
   			 $ip = $_SERVER['REMOTE_ADDR'];
		}

return $ip;

	}

function getBrowser(){
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
   			$browser='Internet explorer';
 			elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
    			$browser='Internet explorer';
				 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
   					$browser='Mozilla Firefox';
 					elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
 					  $browser='Google Chrome';
						 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
   							$browser="Opera Mini";
 								elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
   									$browser="Opera";
 									elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
   										$browser="Safari";
 											else
  											 $browser='Browser Lain';
return $browser;

	}

function getBrowser2() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} 

function versionBrowser() { 
$ua=getBrowser2();
$yourbrowser= $ua['name'] . " " . $ua['version'] ;
return $yourbrowser;
}
function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

function logActivity($name,$info){




		global $connection;
		$query="insert into log_activity (nik,time_activity,ip,browser,name_activity,info,os,browser_ver) values ('$_SESSION[SESS_USERNAME]',CURRENT_TIMESTAMP,'".getIp()."','".getBrowser()."','$name','$info','".getOS()."','".versionBrowser()."')";
		$result=pg_query($connection,$query);
      // return $query;
	}

function logTrans($id_trans,$keterangan,$flag_status){

        global $connection;
        $query="insert into log_trans (idtrans_out,date_create,id_user,keterangan,action_flag) values ('$id_trans',CURRENT_TIMESTAMP,'$_SESSION[SESS_USERNAME]','$keterangan','$flag_status')";
        $result=pg_query($connection,$query);
      // return $query;
    }

function updateStatusTrans($id_trans,$status){

        global $connection;
        $query=" UPDATE transaksi_outgoing set status='$status' WHERE idtrans_out='$id_trans' ";
        $result=pg_query($connection,$query);
      // return $query;
    }

function getNominalDok($id_trans){

        global $connection;
        $query=" select * from transaksi_outgoing  WHERE idtrans_out='$id_trans' ";
        $result=pg_query($connection,$query);
        $row=pg_fetch_array($result);
        //echo $query;
       return $row['nominal_dokumen'];
    }
function getNominalTrans($id_trans){

        global $connection;
        $query=" select * from transaksi_outgoing  WHERE idtrans_out='$id_trans' ";
        $result=pg_query($connection,$query);
        $row=pg_fetch_array($result);
        //echo $query;
       return $row['nilai_ekivalen'];
    }

function logLogin($name,$user,$info){
        global $connection;
        $query="insert into log_activity (nik,time_activity,ip,browser,name_activity,info,os,browser_ver) values ('$user',CURRENT_TIMESTAMP,'".getIp()."','".getBrowser()."','$name','$info','".getOS()."','".versionBrowser()."')";
        $result=pg_query($connection,$query);
      // return $query;
    }

function SaveDokFile($idtrans_out,$file_name){
        global $connection;
        $query=" update transaksi_outgoing set file_attach='$file_name' WHERE idtrans_out='$idtrans_out' ";
        $result=pg_query($connection,$query);
      // return $query;
    }


function lastLogin(){
		global $connection;
		$query="select time_activity from log_activity where name_activity='login' order by time_activity desc limit 2";
		$result=pg_query($connection,$query);
		$found = pg_num_rows($result);
		if ($found >=1)
		{
			$i=1;
			while ($row = pg_fetch_array($result)){
			if ($i==2)
			$last_login=$row['time_activity'];
			$i++;
			}
			return $last_login;
			}

	}


function hashEncryptedMenu($password){

		$encrypted = hash('sha256',$password);
		return $encrypted;
	}
function hashEncrypted($password){

        $encrypted = hash('sha512',$password);
        return $encrypted;
    }




function shortNews( $str, $wordCount = 20 ) {
  return implode( 
    '', 
    array_slice( 
      preg_split(
        '/([\s,\.;\?\!]+)/', 
        $str, 
        $wordCount*2+1, 
        PREG_SPLIT_DELIM_CAPTURE
      ),
      0,
      $wordCount*2-1
    )
  );
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function formatRupiah($input) {

    $result = "Rp " . number_format($input,0,',','.');
    return $result;
}
function formatUSD($input) {

    $result = "USD " . number_format($input,0,',','.');
    return $result;
}

function nilaiKurs() {

    global $connection;
    $query=" select * from kurs_rupiah ";
        $result=pg_query($connection,$query);
        $row=pg_fetch_array($result);
        return $row['nominal_kurs'];
}

function kursUSD() {

    global $connection;
    $query=" select * from nilai_kurs where inisial='USD' ";
        $result=pg_query($connection,$query);
        $row=pg_fetch_array($result);
        return $row['nilai_kurs'];
}

function nilaiKurs2($id) {

    global $connection;
    $query=" select * from kurs_rupiah where id='$id' ";
        $result=pg_query($connection,$query);
        $row=pg_fetch_array($result);
        return $row['nilai_kurs'];
}

function clearSpecialChar() {
//spesial . _ - * + / 

$varReplace= " Replace(Replace(Replace(Replace(Replace(Replace(Replace(Replace(Replace(CFSSNO, '.',''),'/',''),'-',''),'*',''),'\',''),' ',''),'+',''),';',''),':','') ";
return $varReplace;

}

function insertMasterCif($cif_number,$nama_pengirim,$source){

        global $connection;
        $query="insert into master_CIF (cif_number,nama_pengirim,source) values ('$cif_number','$nama_pengirim','$source')";
        $result=pg_query($connection,$query);


    }
?>