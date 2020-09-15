<?php
require_once('../../config/config.php');
require_once('../../function/function.php');
//require_once('../session_login.php');

    //require_once '../session_group.php';
//error_reporting(0);
date_default_timezone_set("Asia/Jakarta"); 
$current_date = date('Y-m-d');

if (!$connection) {
echo "connection Failed";
exit;
}




    $aColumns = array('idtrans_out','tgl_terbit','nominal_dokumen', 'nama_penerima', 'status','action' );
	$aColumns_sorting = array('idtrans_out','tgl_terbit','nominal_dokumen', 'nama_penerima','status','idtrans_out');

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
    $sQuery = " select * from transaksi_outgoing  a ";
    $sQuery.= " left join tujuan_transaksi b on b.id_trans=a.id_trans  ";
    $sQuery.= " left join jenis_underlying c on c.id_jenis=a.id_jenis  ";
    $sQuery.= " left join unit d on d.id_unit=a.id_cabang  ";
    $sQuery.= " left join user_account e on e.nik=a.id_user WHERE a.status <> '99' ".
    //$sQuery.= " left join user_account e on e.nik=a.id_user WHERE a.status <> '99'  order by a.idtrans_out asc ";
/*
  vvvvvvvvvvvvv======================

	$sQuery  = " select *, c.name as nama_masalah, c.priority,c.satuan,d.name as nama_channel from laporan_kerja a ";
	$sQuery .=" left join master_channel d on d.id_channel=a.id_channel ";
    $sQuery .=" left join map_pic b on b.id_case=a.id_case ";
    $sQuery .=" left join master_case c on c.id_case=a.id_case  $varsrc ".
*/

    // $searchticket.
	// $searchcustomer.
    $sOrder." ".
	$sLimit;
    $rResult = pg_query( $connection, $sQuery ) or die(pg_last_error());

	$sQuery = " select a.$sIndexColumn from transaksi_outgoing  a ";
    $sQuery.= " left join tujuan_transaksi b on b.id_trans=a.id_trans  ";
    $sQuery.= " left join jenis_underlying c on c.id_jenis=a.id_jenis  ";
    $sQuery.= " left join unit d on d.id_unit=a.id_cabang  ";
    $sQuery.= " left join user_account e on e.nik=a.id_user WHERE a.status <> '99' ";
/*
	$sQuery  = " select a.$sIndexColumn from laporan_kerja a ";
	$sQuery .=" left join master_channel d on d.id_channel=a.id_channel ";
    $sQuery .=" left join map_pic b on b.id_case=a.id_case ";
    $sQuery .=" left join master_case c on c.id_case=a.id_case  $varsrc  ";
    */
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
			else if ( $aColumns[$i] == "idtrans_out" )
            {
               $id_transaksi="<i class='fa fa-ticket'></i> <b>".$aRow['idtrans_out']."</b><br><i class='fa fa-calendar'></i> ".$aRow['cif_number'];							
			   $row[] = $id_transaksi; 
            }
			else if ($aColumns[$i] == "tgl_terbit")
			{
			   $tanggal_terbit=$aRow['tgl_terbit'];							
			   $row[] = $tanggal_terbit;
			}
			
			else if ($aColumns[$i] == "nominal_dokumen")
			{
                ///$row[nama_js_underlying]
			   $nilai_dokumen="<b>".$aRow['nama_js_underlying']."<br>".$aRow['nominal_dokumen']."</b>";							
			   $row[] = $nilai_dokumen;
			}
			else if ($aColumns[$i] == "nama_penerima")
			{    
              
			
			   $nama_status="<p align='center'>".$aRow['nama_penerima']." <br> </p>";							
			   $row[] = $nama_status;
            

			}
			else if ($aColumns[$i] == "status")
            {    
              
            
               $status="<p align='center'>".$aRow['status']." <br> </p>";                           
               $row[] = $status;
            

            }
			
			else if ($aColumns[$i] == "action") 
			{	/*			
			   $nama_action="<a href='#'  data-toggle='modal' id-status='".$aRow['status']."' id-call_to_ask='".$aRow['call_to_ask']."' id-ticket='".$aRow['ticket_number']."' id-process='".$aRow['id_process']."' id-nama='".$aRow['name']."' nm-satuan='".$aRow['satuan']."'  data-target='#view-detail' class='detailLaporan' > <button class='btn blue btn-xs' type='button'> <i class='fa fa-check-circle'></i> Detail </button></a>";							
			   $row[] = $nama_action;
               */ 

               $nama_action="<a class='detailRecheck' data-toggle='modal' data-target='#check_modal' href='#'  
id-idtrans='".$aRow['idtrans_out']."'  ><button class='btn btn-sm green'><i class='fa fa-check-square-o'></i> Detail Trans </button></a>   <a class='detailLog' data-toggle='modal' data-target='#log_transaksi' href='#'  id-idtrans='".$aRow['idtrans_out']."' > <button class='btn btn-sm blue'><i class='fa fa-commenting'></i> Status Trans </button> </a>";
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
