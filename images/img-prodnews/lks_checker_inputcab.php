<?php 
include('../librari/config.php');
include('../librari/cek-login.php');

?>
<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../img/favicon.png" />
<title>ORES</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/tabel.css" />


</head>

<body>


		<div id="header"><?php include "../site/header_in.php";?>
        </div><!-- #header -->
      
<table width="100%" height="10" align="center">
<tr>
 <td width="310" align="center"><div align="left"><font face="Calibri"> <a href="index.php?page=inputlks2"></a></div></td>
  <td width="310" align="center"><font face="Calibri" color="#00CCFF"> </font></td>
  <td width="310" align="center"><div align="right"><form action=''method="POST">

</form></div></td><br/>
</table>
<?php 
//fungsi pagination
    $BatasAwal = 20;
    if (!empty($_GET['page'])) {
        $hal = $_GET['page'] - 1;
        $MulaiAwal = $BatasAwal * $hal;
    } else if (!empty($_GET['page']) and $_GET['page'] == 1) {
        $MulaiAwal = 0;
    } else if (empty($_GET['page'])) {
        $MulaiAwal = 0;
    }
?>
<table width="100%" height="10" align="center" cellpadding="5" cellspacing="0">
    	<tr class="head" align="center">
        	<th>No.Lks</th>
            <th>Jenis Kejadian level 1</th>
            <th>Jenis Kejadian level 2</th>
            <th>Jenis Kejadian level 3</th>
            <th>Jumlah Kerugian</th>
            <th>jenis Kerugian</th>
            <th>Nama Penginput</th>
         
  
            <th>Pilihan</th>
			</tr>
<?php
require_once('../librari/config.php');

$query1="SELECT
lks.id_jns,
lks.jenis_kejadian,
lks.id_lks1,
lks.id_lks,
lks.tgl,
lks.deskripsi,
lks.Jml_kerugian,
lks.jns_kerugian,
lks.nama_cabang,
lks.kode_cabang,
lks.rencana,
lks.target_date,
lks.tgl_input,
jenis_kejadian.id_jns,
jenis_kejadian.jns_kejadian1,
jenis_kejadian21.jns_kejadian21,
unit.kd_cabang,
lks.id_lks1,
lks.ka,
lks.nama_lengkap,
lks.lks
FROM
lks,jenis_kejadian,jenis_kejadian21,user,unit
where
jenis_kejadian.id_jns=lks.id_jns
and
lks.id_ores=jenis_kejadian21.id_ores
and lks.user_id2=user.id_unit
and lks.ka in (4,0)
and lks.lks in (2,1)



group by lks.id_lks
LIMIT  $MulaiAwal,$BatasAwal ";



if(isset($_POST['qcari'])){
	$qcari=$_POST['qcari'];
	$query1="SELECT
lks.id_jns,
lks.jenis_kejadian,
lks.id_lks1,
lks.id_lks,
lks.tgl,
lks.deskripsi,
lks.Jml_kerugian,
lks.jns_kerugian,
lks.nama_cabang,
lks.kode_cabang,
lks.rencana,
lks.target_date,
lks.tgl_input,
jenis_kejadian.id_jns,
jenis_kejadian.jns_kejadian1,
jenis_kejadian21.jns_kejadian21,
lks.nama_lengkap

FROM
lks,jenis_kejadian,jenis_kejadian21
where
jenis_kejadian.id_jns=lks.id_jns
and
lks.id_ores=jenis_kejadian21.id_ores


 like nama_cabang '%$qcari%'
	   ";
}
$result=mysql_query($query1) or die(mysql_error());
$no=$MulaiAwal+1; //penomoran 
$cek=mysql_num_rows($result);
if($cek){
while($rows=mysql_fetch_array($result)){
	
			?>
    	<tr>

			<tr class="dua" align="center">
        	<td><?php echo $rows['id_lks1']; ?><?php echo $rows['id_lks']; ?></td>
            <td align="left"><?php echo $rows['jns_kejadian1']; ?></td>
            <td align="left"><?php echo $rows['jns_kejadian21']; ?></td>
            <td align="left"><?php echo $rows['jenis_kejadian']; ?></td>         
             <td align='left'>Rp <?php echo number_format($rows['Jml_kerugian'],0,",",".");?></td>
            <td><?php echo $rows['jns_kerugian']; ?></td>  
            <td><?php echo $rows['nama_lengkap']; ?></td>  
            <td nowrap="nowrap"> <a href="editlks_ores5.php?ID=<?php echo $rows['id_lks']; ?>">EDIT</a> </td>
             
        </tr>
         <?php } ?>
    <?php 

	}else
	?>
    </font>
</table>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br />
<?php include"../site/footer.php";?>
		</div><!-- #footer -->
</div><!-- #wrapper -->
</body>
</html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
