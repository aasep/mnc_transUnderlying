<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);



if(isset($_GET['act']) && ($_GET['act']=='src')){

$id_trans=$_POST['id_trans'];
//$id_jenis="";
$id_jenis=$_POST['id_jenis'];


} else {
$id_trans="";
$id_jenis="";     
}







?>







         
             
 <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Data Added ....! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="failed")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data tidak berhasil diinput...!</strong> </div>";

	}

if (isset($_GET['message']) && ($_GET['message']=="succDel")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Deleted ....! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="failDel")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Dihapus...!</strong> </div>";

	}
if (isset($_GET['message']) && ($_GET['message']=="succUp")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Updated ....! </strong> </div>";
     $id_trans=$_GET['id_trans'];
     $id_jenis=$_GET['id_jenis'];

     }
	if (isset($_GET['message']) && ($_GET['message']=="failUp")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Diupdate...!</strong> </div>";

	}
	

?>





						<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase"> Mapping Tujuan Transaksi </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											


										</div>
									</div>
						<div class="portlet-body">


                            <div class="form-body">
                                <form action="<?php echo "$page&act=src";?>" id="form_sample_1" class="form-horizontal" method="POST" >
                                <div class="form-group">
                                        <label class="control-label col-md-2">Tujuan Transaksi <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control select2" name="id_trans" id="id_trans" required>
                                                <option value=""> Pilih Transaksi </option>
                                                <?php
                                                $query=" select * from tujuan_transaksi order by nama_tj_transaksi asc ";
                                                $r_product=pg_query($connection,$query);
                                                while ($row1=pg_fetch_array($r_product)){
                                                    if($id_trans==$row1['id_trans']){
                                                    echo " <option value='$row1[id_trans]' selected='selected'>$row1[nama_tj_transaksi]</option> ";
                                                } else {
                                                    echo " <option value='$row1[id_trans]'>$row1[nama_tj_transaksi]</option> ";
                                                }

                                                }
                                                


                                                ?>
                                                
                                                
                                            </select>
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="control-label col-md-2">Jenis Underlying <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control select2" name="id_jenis" id="id_jenis" onchange="this.form.submit();" required>
                                            <option value=""> Pilih Jenis </option>
                                                <?php
                                                $query=" select * from jenis_underlying order by nama_js_underlying asc ";
                                                $r_product=pg_query($connection,$query);
                                                while ($row1=pg_fetch_array($r_product)){
                                                    if($id_jenis==$row1['id_jenis']){
                                                    echo " <option value='$row1[id_jenis]' selected='selected'>$row1[nama_js_underlying]</option> ";
                                                } else {
                                                    echo " <option value='$row1[id_jenis]'>$row1[nama_js_underlying]</option> ";
                                                }

                                                }
                                                


                                                ?>
                                                
                                                
                                            </select>
                                        </div>
                                    </div>
                                    </form>
                                 <form action="<?php echo "module/action/actions_master.php?module=$module&pm=$pm&act=add_map_pic2"; ?>" id="form_sample_2" class="form-horizontal" method="POST">
                          
                                <div class="form-group last">
                                        
                                        <label class="control-label col-md-2">List Underlying </label>

                                        <div class="col-md-9" id="m_select">
                                        <select multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]">   
                                            <?php
                                           
                                                $query_m2=" select * from list_underlying order by nama_ls_underlying asc ";

                                                    $r_m2=pg_query($connection,$query_m2);
                                                    while ($row_m2=pg_fetch_array($r_m2)){

                                                        $query_cek=" select count(*) as jum from mapp_tujuan_trans where id_trans='$id_trans' and id_jenis='$id_jenis'  and id_list='$row_m2[id_list]'  ";

                                                        $result_cek=pg_query($query_cek);
                                                        $r_found=pg_fetch_array($result_cek);

                                                    if($r_found['jum'] >=1){
                                                        echo " <option value='$row_m2[id_list]' selected='selected' >$row_m2[nama_ls_underlying] </option> ";   
                                                    } else{
                                                         echo " <option value='$row_m2[id_list]'>$row_m2[nama_ls_underlying]</option> ";
                                                    }


                                                    }

                                           
                                                
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>   

                                    
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> <span class="required">
                                        </span>
                                        </label>
                                        <div class="col-md-4">
                                        <input type="hidden" name="id_trans2" id="id_trans2" value="<?php echo $id_trans;?>" class="form-control" required/>
                                        <input type="hidden" name="id_jenis2" id="id_jenis2" value="<?php echo $id_jenis;?>" class="form-control" required/>
                                        </div>
                                    </div>
                                     <hr>  
                                    <div class="form-group">
                                        <label class="control-label col-md-2"> <span class="required">
                                        </span>
                                        </label>
                                        <div class="col-md-9">
                                            <button type="submit" class="btn blue"> Submit >> </button>
                                        </div>
                                    </div>
                                     
                                    </form>

                                </div>

                                <br>
                                <br>
                           	    <br>
				   
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->

                            <div class="portlet box grey-gallery">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i> <b>List Of unit </b></div>
                                        
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                <br>
                                <br>
                                <br>
							<!-- <table class="table table-striped table-bordered table-hover" id="sample_2" width="100%"> -->
                            <table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
							<thead>
							<tr>
								
                                <th style="font-size:12px" width="20%">
                                     Nama Transaksi  
                                </th>
                                <th style="font-size:12px" width="30%">
                                     Jenis Transaksi  
                                </th>
								<th style="font-size:12px" width="50%">
									 List Transaksi Underlying 
								</th>
								
							
							</tr>
							</thead>
							<tbody>
							<?php
                            

                             ######## QUERY LIST UNDERLYING ############
                            $query_list =" select b.nama_tj_transaksi, c.nama_js_underlying, d.nama_ls_underlying from mapp_tujuan_trans a ";
                            $query_list.=" left join tujuan_transaksi b on a.id_trans=b.id_trans ";
                            $query_list.=" left join jenis_underlying c on a.id_jenis=c.id_jenis ";
                            $query_list.=" left join list_underlying d on a.id_list=d.id_list   ";
                            $query_list.=" order by  b.nama_tj_transaksi asc  ";

                            //echo $query_list."<br>";

                            $result_list=pg_query($connection,$query_list);
                            $found=pg_num_rows($result_list);

                            while ($row_list=pg_fetch_array($result_list)) {
                                 echo "<tr>";
                                 echo "<td style='font-size:12px'> <b>$row_list[nama_tj_transaksi]</b></td>";
                                 echo "<td style='font-size:12px'> $row_list[nama_js_underlying] </td>";
                                 echo "<td style='font-size:12px'> <i>$row_list[nama_ls_underlying]</i></td>";
                                 echo "</tr>";


							
							
							
							
							$i++;
							
									}
							?>


							</tbody>
							</table>
							   </div>
                            </div>

						</div>
					</div>





					</div>


					</div>
			
					<!-- END EXAMPLE TABLE PORTLET-->




<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->


<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

    <!--   VALIDATION FORM -->
<script type="text/javascript">
var FormValidation = function () {

    // basic validation
    var handleValidation1 = function() {
            var form1 = $('#form_sample_1');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                
                rules: {
                	id_trans: {
                        required: true
                    }
                },


                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
                    form[0].submit(); // submit the form
                }
            });
    }

    return {
        //main function to initiate the module
        init: function () {
            handleValidation1();     
        }

    };

}();

</script>

<script type="text/javascript">
$(document).ready(function() {

        $('#id_jenis').change(function() {
        
        var e = document.getElementById("id_trans");
        var id_trans = e.options[e.selectedIndex].value;
        var id_jenis=$(this).val();
        var dataString = 'id='+id_jenis+'&id2='+id_trans;
        
        //alert(dataString);
     
        //$('#my_multi_select1').multiSelect({ selectableOptgroup: true });
        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_map_transaksi.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            $("#my_multi_select1").html(html);
        } 
            }); 


        });


   $('.detailEdit').click(function() {

        var id_unit = $(this).attr('id-unit');
        var nama_unit = $(this).attr('id-nama');
        
        // alert(nama_unit);
       
        document.getElementById('ed_id_unit').value=id_unit;
        document.getElementById('ed_nama_unit').value=nama_unit;
        
         });

   $('.detailDelete').click(function() {

        var id_unit = $(this).attr('id-unit');
        var nama_unit = $(this).attr('id-nama');
        $("#delConfirm").empty();
        $("#delConfirm").append( 'Yakin Anda Akan Mendelete Unit : <b>, <i>'+ nama_unit +'</i>  </b><br>');
        $("#delConfirm").append( '<input type="hidden" name="id_unit" value="'+id_unit+'">');
      
        
    });


}); // document ready   $(document).ready(function() {

</script>


 