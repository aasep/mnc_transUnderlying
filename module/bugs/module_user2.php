<!-- BEGIN CONTENT -->

                
                    <!-- END PAGE TITLE-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Page Layouts</span>
                            </li>
                        </ul>
                       
                    </div>
<br>


 <a class="btn blue" data-toggle="modal" href="#basic">Add User <i class="fa fa-plus"></i> </a> </br> </br>
             
 <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
    echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data User Berhasil ditambahkan ...! </strong> </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="error")){
    echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data tidak berhasil diinput...!</strong> </div>";

    }

if (isset($_GET['message']) && ($_GET['message']=="success2")){
    echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Berhasil dihapus ...! </strong> </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="error2")){
    echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Dihapus...!</strong> </div>";

    }
if (isset($_GET['message']) && ($_GET['message']=="success3")){
    echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Berhasil Diupdate ...! </strong> </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="error3")){
    echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Diupdate...!</strong> </div>";

    }




?>
            <!-- BEGIN PAGE CONTENT-->
            
            <!-- END PAGE CONTENT-->
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <!--<div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-globe"></i>List Of Users 
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="reload">
                                </a>
                                <a href="javascript:;" class="remove">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                        -->
                        <div class="portlet light bg-inverse">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> List Of Users </span>
                                            <span class="caption-helper"> </span>
                                        </div>
                                        <div class="actions">
                                            
                                        </div>
                                    </div>

                        <div class="portlet-body form">
                        
                        
                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                            <tr>
                                <th>
                                     No
                                </th>
                                <th>
                                     NIK
                                </th>
                                <th>
                                     Status Account
                                </th>
                                <th>
                                     Group User
                                </th>
                                <th>
                                     Cabang
                                </th>
                                <th>
                                     Channel
                                </th>
                                <th>
                                     Jabatan
                                </th>
                                <th>
                                     Date Create
                                </th>
                                <th>
                                     Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select a.nama_lengkap,a.email,a.tlp,a.id_karyawan,b.name as nama_group,a.adddt,a.status_account,a.id_group_type,c.id_cabang,e.id_jabatan,g.id_pic,d.id_channel,f.id_unit,c.name as cabang,d.name as channel,e.name as jabatan from user_account a ";
                            $query.=" left join  group_type b on a.id_group_type=b.id_group_type ";
                            $query.=" left join  master_branch c on c.id_cabang=a.id_cabang ";
                            $query.=" left join  master_channel d on d.id_channel=a.id_channel ";
                            $query.=" left join  master_jabatan e on e.id_jabatan=a.id_jabatan ";
                            $query.=" left join  master_unit f on f.id_unit=a.id_unit ";
                            $query.=" left join  master_pic g on g.id_pic=a.id_pic ";
                            $result=pg_query($connection,$query);
                            while ($row=pg_fetch_array($result)) {
                             if ($row['status_account']=='1'){
                                $status="Active";
                             } else { $status="InActive"; }
                             //class='detail-sumRO'

                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$row[id_karyawan]</td>";
                            echo "<td>$status</td>";
                            echo "<td>$row[nama_group]</td>";
                            echo "<td>$row[cabang]</td>";
                            echo "<td>$row[channel]</td>";
                            echo "<td>$row[jabatan]</td>";
                            echo "<td>".date('d-m-Y H:i',strtotime($row['adddt']))."</td>";
                            echo "<td><a class='detailEdit' data-toggle='modal' data-target='#view-edit' href='#' id-username='$row[id_karyawan]' 
id-group='$row[id_group_type]' id-cabang='$row[id_cabang]' id-jabatan='$row[id_jabatan]' id-pic='$row[id_pic]' id-channel='$row[id_channel]' id-unit='$row[id_unit]' id-fullname='$row[nama_lengkap]' id-email='$row[email]' id-tlp='$row[tlp]' id-status_account='$row[status_account]'><button class='btn default'>Edit</button></a></a> <a href='#'  data-toggle='modal' id-username='$row[id_karyawan]' data-target='#delete-modal' class='detailDelete' > <button class='btn red'>Delete</button></a></td>";
                            echo "</tr>";
                            $i++;
                            
                                    }
                            ?>


                            </tbody>
                            </table>
                        </div>
                    </div>
