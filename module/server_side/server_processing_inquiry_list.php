<?php
require_once('../../config/config.php');
require_once('../../function/function.php');
//require_once('../session_login.php');

    //require_once '../session_group.php';
date_default_timezone_set("Asia/Jakarta"); 
$current_date = date('Y-m-d');

if (!$connection) {
echo "connection Failed";
exit;
}


################   SRCKEY   ########################


if (isset($_GET['srckey']) ) {
    $srckey=$_GET['srckey'];
} else  {
    $srckey=" "; 
}




if (isset($_GET['srcby']) && ($_GET['srcby'])!="" ) {


    switch ($_GET['srcby']) {
         case '1' : $var_srcby=" AND a.idtrans_out='$srckey' "; break; //Id Transaksi
         case '2' : $var_srcby=" AND a.cif_number ='$srckey' "; break; //CIF Number
         case '3' : $var_srcby=" AND a.nama_pengirim ILIKE '%$srckey%' "; break; //Nama Pengirim
         case '4' : $var_srcby=" AND a.nama_penerima ILIKE '%$srckey%' "; break; //Nama Penerima
         case '5' : $var_srcby=" AND a.nominal_trans ='$srckey' "; break; //Nominal Transaksi
         }



} else {
    $var_srcby=" ";  //no filter
}








    $aColumns = array('ticket_number','channel','customer','sla', 'status', 'action' );
	$aColumns_sorting = array('idtrans_out','tgl_terbit','nominal_dokumen','nama_penerima', 'status','idtrans_out');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "idtrans_out";

  
    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sLimit = "LIMIT ".intval( $_GET['iDisplayLength'] )." OFFSET ".
            intval( $_GET['iDisplayStart'] );
    }

    /*
     * Ordering
     */
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY  ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns_sorting[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc').", ";
            }
        }

        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" )
        {
            $sOrder = "";
        }
    }

   



	$no=$_GET['iDisplayStart'];
    /*
	$sQuery  = " select *, c.name as nama_masalah, c.priority,c.satuan,d.name as nama_channel from laporan_kerja a ";
	$sQuery .=" left join master_channel d on d.id_channel=a.id_channel ";
    $sQuery .=" left join map_pic b on b.id_case=a.id_case ";
    $sQuery .=" left join master_case c on c.id_case=a.id_case  ".
*/
    $sQuery = " select * from transaksi_outgoing  a ";
    $sQuery.= " left join tujuan_transaksi b on b.id_trans=a.id_trans  ";
    $sQuery.= " left join jenis_underlying c on c.id_jenis=a.id_jenis  ";
    $sQuery.= " left join unit d on d.id_unit=a.id_cabang  ";
    $sQuery.= " left join user_account e on e.nik=a.id_user WHERE a.status <> '99' $var_srcby ".


    // $searchticket.
	// $searchcustomer.
    $sOrder." ".
	$sLimit;
    $rResult = pg_query( $connection, $sQuery ) or die(pg_last_error());

	/*
	$sQuery  = " select a.$sIndexColumn from laporan_kerja a ";
	$sQuery .=" left join master_channel d on d.id_channel=a.id_channel ";
    $sQuery .=" left join map_pic b on b.id_case=a.id_case ";
    $sQuery .=" left join master_case c on c.id_case=a.id_case   ";
    */
    $sQuery = " select a.$sIndexColumn from transaksi_outgoing  a ";
    $sQuery.= " left join tujuan_transaksi b on b.id_trans=a.id_trans  ";
    $sQuery.= " left join jenis_underlying c on c.id_jenis=a.id_jenis  ";
    $sQuery.= " left join unit d on d.id_unit=a.id_cabang  ";
    $sQuery.= " left join user_account e on e.nik=a.id_user WHERE a.status <> '99' $var_srcby ";


    //	$searchticket.
	//    $searchcustomer." " ;
			 	 
	$rResultTotal = pg_query( $connection, $sQuery ) or die(pg_last_error());
    $iTotal = pg_num_rows($rResultTotal);
    pg_free_result($rResultTotal);
    $iFilteredTotal = $iTotal;

    /*
     * Output
     */
    $output = array(
        "sEcho" => intval($_GET['sEcho']),
        "iTotalRecords" => $iTotal,
        "iTotalDisplayRecords" => $iFilteredTotal,
        "aaData" => array()
    );

    while ( $aRow = pg_fetch_array($rResult, null, PGSQL_ASSOC) )
    {
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( $aColumns[$i] == "version" )
            {
                /* Special output formatting for 'version' column */
                $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
            }
			else if ( $aColumns[$i] == "ticket_number" )
            {
               $ticket="<i class='fa fa-ticket'></i> <b>".$aRow['idtrans_out']."</b><br><i class='fa fa-user'></i> ".$aRow['nama_pengirim']."<br><i class='fa fa-credit-card'></i> CIF : ".$aRow['cif_number']." ";							
			   $row[] = $ticket; 
            }
			else if ($aColumns[$i] == "channel")
			{
               

               $column3 =" <i class='fa fa-shopping-cart'></i> ".$aRow['nama_tj_transaksi']."<br> ";    
			   $column3.=" <i class='fa fa-calendar'></i> ".date('Y-m-d',strtotime($aRow['tgl_terbit']))."<br>";	
               $column3.=" <i class='fa fa-money'></i> ".formatUSD($aRow['nominal_trans']);    						
			   $row[] = $column3;
			}
			
			else if ($aColumns[$i] == "customer")
			{
			   $column4 =" <i class='fa fa-shopping-cart'></i> ".$aRow['nama_js_underlying']."<br> ";    
               $column4.=" <i class='fa fa-building'></i> ".$aRow['nama_unit']."<br>";    
               $column4.=" <i class='fa fa-money'></i> ".$aRow['nominal_dokumen'];

			   $row[] = $column4;
			}
			else if ($aColumns[$i] == "sla")
			{    

			   $column5 =" <i class='fa fa-user' style='font-size:10px'></i> ".$aRow['nama_penerima']."<br> ";    
               $column5.=" <i class='fa fa-user'></i> ".$aRow['nama_lengkap']."<br>";    
               $column5.=" <i class='fa fa-cogs'></i> <i>".$aRow['keterangan']."</i>";

			   $row[] = $column5;
			}
			
			else if ($aColumns[$i] == "status") 
			{	
				//$jml_intval=$aRow['sla']+$aRow['nama_penerima'];
                //$date_sla=$aRow['nama_penerima'];

                switch ($aRow['status']) {
                                case '1' : $status_lap= "  <span class='label label-info'> <i class='fa fa-houzz'></i> Created </span>  "; break; //ticket_number
                                case '2' : $status_lap= "  <span class='label label-warning'> <i class='fa fa-check-square'></i>  checked </span> "; break; //customer_name
                                case '3' : $status_lap= "  <span class='label label-success'> <i class='fa fa-check-square-o'></i> Approved </span> "; break; //account_number
                                case '4' : $status_lap= "  <span class='label label-danger'><i class='fa fa-warning'></i>  Reject </span> "; break; //account_number
                                    }

			   $nama_sla=" ".$status_lap."";							
			   $row[] = $nama_sla; 
			}
			else if ($aColumns[$i] == "action") 
			{				
			   $nama_action="<a href='#' class='detailRecheck' data-toggle='modal' data-target='#check_modal' id='coba'  
id-idtrans='".$aRow['idtrans_out']."'  ><button class='btn btn-sm green'><i class='fa fa-check-square-o'></i> Detail Trans </button></a>  <a href='#'  class='detailLog' data-toggle='modal' data-target='#log_transaksi'  id-idtrans='".$aRow['idtrans_out']."' > <button class='btn btn-sm blue'><i class='fa fa-commenting'></i> Status Trans </button> </a>";							
			   $row[] = $nama_action; 
			}		
				
			
			
			
            else if ( $aColumns[$i] != ' ' )
            {
                /* General output */
                $row[] = $aRow[ $aColumns[$i] ];
            }
        }
        $output['aaData'][] = $row;

    }

    echo json_encode( $output );

    // Free resultset
    pg_free_result( $rResult );

    // Closing connection
    pg_close( $connection );



?>
