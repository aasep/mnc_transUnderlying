
<?php
require_once '../../config/config.php';
//require_once '../../session_login.php';
//require_once '../../session_group.php';
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';
date_default_timezone_set("Asia/Bangkok");
$current_date = date('Y-m-d');

$status=$_POST['status'];

if ($status=='ALL'){
$var_status=" ";
}else if ($status=='1'){
$var_status=" and a.status='1' ";
}else if ($status=='2'){
$var_status=" and a.status='2' ";
}else if ($status=='3'){
$var_status=" and a.status='3' ";
}else {
$var_status=" and a.status='4' ";
}


$from=$_POST['from'];
$to=$_POST['to'];
//echo $from."<br>";
//echo $to;
//die();

	if ($from==$to){
				$varperiode=" where to_char(a.date_create, 'YYYY-MM-DD') ='".$from."'  $var_status ";
	}	else {
				$varperiode=" where to_char(a.date_create, 'YYYY-MM-DD') between '".$from."' and '".$to."'  $var_status ";
				}

$query =" select * from  transaksi_outgoing a ";
$query.=" left join tujuan_transaksi b on  a.id_trans=b.id_trans ";
$query.=" left join jenis_underlying c on a.id_jenis=c.id_jenis ";
$query.=" left join unit d on a.id_cabang=d.id_unit  ";
$query.=" left join nilai_kurs e on e.id=a.id_currency  $varperiode  and a.status <> '99' order by a.date_create asc ";


$result=pg_query($connection,$query);



$file_eksport=date('Y_m_d_H_i_s');

$objPHPExcel = new PHPExcel();


$styleArrayFont = array('font' => array('bold'  => true,'color' => array('rgb' => ''),'size'  => 11,'name'  => 'Calibri'));
$styleArrayAlignment = array('alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ));

//DIMENSION D
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);

$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(50);
$objPHPExcel->getActiveSheet()->getRowDimension(6)->setRowHeight(30);
// $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:F1');
// $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:F2');
// $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A3:F3');

$styleArrayFontBold = array('font' => array('bold'  => true,'color' => array('rgb' => ''),'size'  => 11,'name'  => 'Calibri'));
$styleArrayFontItalic = array('font' => array('italic'  => true,'color' => array('rgb' => ''),'size'  => 10,'name'  => 'Calibri'));
$styleArrayAlignment1 = array('alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ));
$styleArrayAlignment2 = array('alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        ));

$styleArrayColorFont = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => 'FFFFFF'),
        'size'  => 11,
        'name'  => 'Calibri'
    ));



$objPHPExcel->getActiveSheet()->getStyle('A1:R6')->applyFromArray($styleArrayFontBold);



$objPHPExcel->getActiveSheet()->getStyle('B6:R6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B6:R6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



//=======BORDER

$styleArrayBorder1 = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('argb' => ''),),),);
$styleArrayBorder2 = array('borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('argb' => ''),),),);



//FILL COLOR

$objPHPExcel->getActiveSheet()->getStyle('A1:Z500')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');

$objPHPExcel->getActiveSheet()->getStyle('B6:R6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('808080');


$objPHPExcel->setActiveSheetIndex(0);
//$objPHPExcel->getActiveSheet()->setCellValue('A1', "DASBOARD COMMONE  Periode $from s.d $to ");

$gdImage = imagecreatefromjpeg('../../images/new_logo_mc.jpg');
// Add a drawing to the worksheetecho date('H:i:s') . " Add a drawing to the worksheet\n";
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Sample image');
$objDrawing->setDescription('Sample image');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(50);
$objDrawing->setCoordinates('B2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());



//$objDrawing->setCoordinates('A15');







$objPHPExcel->getActiveSheet()->setCellValue('B3', 'TRANSAKSI OUT GOING');
$objPHPExcel->getActiveSheet()->setCellValue('B4', "");

  	 

$objPHPExcel->getActiveSheet()->setCellValue('B6', 'NO');
$objPHPExcel->getActiveSheet()->setCellValue('C6', 'TANGGAL');
$objPHPExcel->getActiveSheet()->setCellValue('D6', 'NAMA PENGIRIM');
$objPHPExcel->getActiveSheet()->setCellValue('E6', 'NAMA PENERIMA');
$objPHPExcel->getActiveSheet()->setCellValue('F6', 'TANGGAL TERBIT');
$objPHPExcel->getActiveSheet()->setCellValue('G6', 'CIF NUMBER');

$objPHPExcel->getActiveSheet()->setCellValue('H6', 'NOMINAL TRANSAKSI');
$objPHPExcel->getActiveSheet()->setCellValue('I6', 'CURRENCY');

$objPHPExcel->getActiveSheet()->setCellValue('J6', 'NILAI EKIVALEN');
$objPHPExcel->getActiveSheet()->setCellValue('K6', 'NOMINAL DOKUMEN');
$objPHPExcel->getActiveSheet()->setCellValue('L6', 'KETERANGAN');

$objPHPExcel->getActiveSheet()->setCellValue('M6', 'TUJUAN TRANS');
$objPHPExcel->getActiveSheet()->setCellValue('N6', 'JENIS UNDERLYING');
$objPHPExcel->getActiveSheet()->setCellValue('O6', 'IDENTITAS');
$objPHPExcel->getActiveSheet()->setCellValue('P6', 'NO IDENTITAS');
$objPHPExcel->getActiveSheet()->setCellValue('Q6', 'NAMA CABANG');
$objPHPExcel->getActiveSheet()->setCellValue('R6', 'NOMOR DOKUMEN');

##############################  PROSES EXCEL =================================================

		$i=7;
        $z=1;
		while ($row_mncpay=pg_fetch_array($result)) {

            $idtransaksi=$row_mncpay['idtrans_out'];
            $query_underlying=" select * from value_list_underlying where  idtrans_out='$idtransaksi' ";
            $result_underlying=pg_query($connection,$query_underlying);
                $nomer_dokumen="";
                while ($row_value=pg_fetch_array($result_underlying)) {

                         $nomer_dokumen.=$row_value['doc_number_ori']." ; ";

               
                     }

                $objPHPExcel->getActiveSheet()->setCellValue("B$i", $z);
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", date('d-m-Y',strtotime($row_mncpay['date_create'])));
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", $row_mncpay['nama_pengirim']);
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", $row_mncpay['nama_penerima']);
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", date('d-m-Y',strtotime($row_mncpay['tgl_terbit'])));
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", $row_mncpay['cif_number']);
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", $row_mncpay['nominal_trans']);
                $objPHPExcel->getActiveSheet()->setCellValue("I$i", $row_mncpay['inisial']);

                $objPHPExcel->getActiveSheet()->setCellValue("J$i", $row_mncpay['nilai_ekivalen']);
                $objPHPExcel->getActiveSheet()->setCellValue("K$i", $row_mncpay['nominal_dokumen']);
                $objPHPExcel->getActiveSheet()->setCellValue("L$i", $row_mncpay['keterangan']);
                $objPHPExcel->getActiveSheet()->setCellValue("M$i", $row_mncpay['nama_tj_transaksi']);
                $objPHPExcel->getActiveSheet()->setCellValue("N$i", $row_mncpay['nama_js_underlying']);
                $objPHPExcel->getActiveSheet()->setCellValue("O$i", $row_mncpay['identitas']);
                $objPHPExcel->getActiveSheet()->setCellValue("P$i", $row_mncpay['no_identitas']);
                $objPHPExcel->getActiveSheet()->setCellValue("Q$i", $row_mncpay['nama_unit']);
                $objPHPExcel->getActiveSheet()->setCellValue("R$i", $nomer_dokumen);


           $i++;
           $z++;
        }



$garis_akhir=$i-1;

$objPHPExcel->getActiveSheet()->getStyle("B6:R$garis_akhir")->applyFromArray($styleArrayBorder1);

$objPHPExcel->getActiveSheet()->setTitle('Transaksi Out Going');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save("../../data/download/Trans"."_".$file_eksport.".xls");




?>

										
<div class="center" style="font-size:12px">
	<a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/muds_ver2/data/download/Trans"."_".$file_eksport.".xls";?>" class="btn btn-sm green" download> Download Excel <i class="fa fa-arrow-circle-o-down"></i> </a> <br><br>
</div>
										
									
                        
                      