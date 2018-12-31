<script type="text/javascript">
window.print();
window.onfocus=function(){window.close();}</script>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LAPORAN <?php echo date('Y-m-d');?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
   <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/4.1.0/css/font-awesome.min.css">
  
  <!-- Font Awesome -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">


  <style type="text/css" media="print">
        @page 
        {
            size: auto;   /* auto is the current printer page size */
			margin-top:0mm;
			margin-bottom:0mm;
			
              /* this affects the margin in the printer settings */
        }

        body 
        {
            background-color:#FFFFFF; 
            border: solid 1px white ;
            margin: 0px;  /* the margin on the content before printing */
       }
	   .bgcol{
		   background-color:#CCC}
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">

      <h1 align="center">
       LAPORAN KOMPOSISI BAHAN 
        <small>#<?php echo date('YmdHis');?></small>
      </h1>
  
<?php 
$no_bahan_jadi=1;
foreach($table->result() as $row){?>
<div class="bgcol">
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
             <?php echo $no_bahan_jadi++.'. '.$row->nama.' '.$row->satuan_komposisi.' '.$row->satuan;?>
            </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info" >
        <div class="col-sm-3 invoice-col">
          Tanggal Input
          <address>
           <?php
				  $car=$this->db->query('select nama from tab_karyawan where nik="'.$row->userinput.'" ');
				  foreach($car->result() as $ro){
					  echo $ro->nama;
					  }
				   echo ' '.$row->tglinput;
				   
				   ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
        Tanggal Update
          <address>
           <?php
				  $car=$this->db->query('select nama from tab_karyawan where nik="'.$row->userupdate.'" ');
				  foreach($car->result() as $ro){
					  echo $ro->nama;
					  }
				   echo ' '.$row->tglupdate;
				   
				   ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
         Tanggal Delete
          <address>
           <?php
				  $car=$this->db->query('select nama from tab_karyawan where nik="'.$row->userdelete.'" ');
				  foreach($car->result() as $ro){
					  echo $ro->nama;
					  }
				   echo ' '.$row->userdelete;
				   
				   ?>
          </address>
        </div>
        
        <div class="col-sm-3 invoice-col">
         Status Bahan
          <address>
           <?php
				  echo $row->stts;
				   
				   ?>
          </address>
        </div>
        
        
        
        
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
     
      <?php $no_bahan_set_jadi=1;
	  $tcas = $this->db->query("SELECT
    tab_set_jadi.*
    , tab_satuan.nama AS satuan
FROM
    ibenk_pantri.tab_set_jadi
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_set_jadi.satuan = tab_satuan.id_satuan)
WHERE tab_set_jadi.jadi='$row->id_jadi' ");
	  foreach($tcas->result() as $riw){?>
      <div class="row">
        <!-- accepted payments column -->
       
        <div class="col-xs-3">
          <p class="lead">- <?php echo $riw->nama;?></p>

          <div class="">
            <table class="table">
              <tr>
                <th style="width:20%">Tgl Input:</th>
                <td><?php
				  $caroia=$this->db->query('select nama from tab_karyawan where nik="'.$riw->userinput.'" ');
				  foreach($caroia->result() as $rosss){
					  echo $rosss->nama;
					  }
				   echo ' '.$riw->tglinput;
				   
				   ?></td>
              </tr>
              <tr>
                <th style="width:20%">Tgl Update:</th>
                <td><?php
				  $caroiass=$this->db->query('select nama from tab_karyawan where nik="'.$riw->userupdate.'" ');
				  foreach($caroiass->result() as $rxxosss){
					  echo $rxxosss->nama;
					  }
				   echo ' '.$riw->tglupdate;
				   
				   ?></td>
              </tr>
              <tr>
                <th style="width:50%">Tgl Delete:</th>
                <td><?php
				  $swsw=$this->db->query('select nama from tab_karyawan where nik="'.$riw->userdelete.'" ');
				  foreach($swsw->result() as $dfr){
					  echo $dfr->nama;
					  }
				   echo ' '.$riw->tgldelete;
				   
				   ?></td>
              </tr>
              
               <tr>
                <th style="width:50%">Status</th>
                <td><?php echo $riw->stts;
				   ?></td>
              </tr>
             
            </table>
          </div>
        </div>
        
        
        <div class="col-xs-9">
          <p class="lead">Bahan Dasar <?php echo $riw->nama;?></p>

          <div class="">
          
          <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Kode</th>
                  <th>Nama
                  </th>
                  <th>Satuan</th>
                  <th>User Input</th>
                  <th>User Delete</th>
                  <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
				$no=1;
				$data=$this->db->query("SELECT
    tab_mix.*
    , tab_dasar.nama AS dasar
    , tab_satuan.nama AS satuan
FROM
    ibenk_pantri.tab_dasar
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_dasar.satuan = tab_satuan.id_satuan)
    INNER JOIN ibenk_pantri.tab_mix 
        ON (tab_mix.id_dasar = tab_dasar.id_dasar)
        WHERE tab_mix.id_set_jadi='$riw->id_set_jadi';");
				if($data->num_rows()>0){
					foreach($data->result() as $rows){
					?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $rows->id_dasar;?></td>
                  <td><?php echo $rows->dasar; echo ' <p></p><i>';
				  if($rows->stts=="AKTIF"){
					  echo "";
					   }else{
						 echo "Di Nonaktifkan Oleh :";  
						 $carss=$this->db->query('select nama from tab_karyawan where nik="'.$rows->userdelete.'" ');
				  foreach($carss->result() as $ross){
					  echo $ross->nama;
					  }
				   echo ' '.$row->tgldelete;
						echo "</i> <a href='".base_url()."index.php/admin/dasar/sd/".$rows->id_dasar."'>Aktifkan Kembali</a>"; 
						   }?></td>
                  <td><?php echo $rows->qty.' '.$rows->satuan;
				
				  ?></td>
                  <td><?php
				  $car=$this->db->query('select nama from tab_karyawan where nik="'.$rows->userinput.'" ');
				  foreach($car->result() as $ro){
					  echo $ro->nama;
					  }
				   echo ' '.$row->tglinput;
				   
				   ?></td>
                  <td><?php
                  $cars=$this->db->query('select nama from tab_karyawan where nik="'.$rows->userdelete.'" ');
				  foreach($cars->result() as $ros){
					  echo $ros->nama;
					  }
				   echo ' '.$rows->tgldelete;
				  
				  ?></td>
                  <td><?php echo $rows->stts; ?></td>
                  </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
          
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<?php } ?>
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <hr>
      </div>
    </section>
    </div>
   <?php } ?>


</body>
<script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>






</html>
