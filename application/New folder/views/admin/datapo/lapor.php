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
       LAPORAN PO BAHAN 
        <small>Periode <?php echo $tgl.' - '.$tgl1?></small>
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
             <?php echo '#'.$row->id_po;?>
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
     
      <?php ?>
      <div class="row">
        <!-- accepted payments column -->
       
       
        
        
        <div class="col-xs-12">
         

          <div class="">
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama Bahan</th>
                  <th>Qty</th>
                 
                 
                  </tr>
                </thead>
                <tbody>
               <?php 
			   $no=1;
			   $cr=$this->db->query("SELECT
    tab_po_detail.qty
    , tab_jadi.nama
    , tab_satuan.nama AS satuan
FROM
    ibenk_pantri.tab_po_detail
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_po_detail.id_jadi = tab_jadi.id_jadi)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po_detail.id_po='$row->id_po'");
		if($cr->num_rows()>0)
		{ foreach($cr->result() as $ro)
		{?> 
                <tr>
                <td><?php echo $no++?></td>
                 <td><?php echo $ro->nama?></td>
                  <td><?php echo $ro->qty.' '.$ro->satuan?></td>
                 
                
                </tr>
                <?php }} ?>
                </tbody>
                </table>
          
          
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
     
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
