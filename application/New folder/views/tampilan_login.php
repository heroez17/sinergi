<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $pro['nama'];?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page" style="background-color:#999">
<div class="login-box">

  <!-- /.login-logodfsdf -->
  <div class="login-box-body">
    
     <p class="login-box-msg"><img align="center" width="150" src="<?php echo base_url()?>assets/dist/img/<?php echo $pro['photo'];?>" /></p>
    <p class="login-box-msg"><?php echo $login;?></p>
      
    <form action="<?php echo base_url()?>index.php/login/getlogin" onSubmit="return cekz()" method="post">
      <div class="form-group has-feedback">
        <input type="text" id="uu" name="uu" required class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="pp" name="pp" required class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
     
      <div class="row">
        <div class="col-xs-8">
          
            <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
         
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
   
    <?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo '<i class="red">'.$info.'</i>';
																 
																 
																 }
															?>
    </div>
    <!-- /.social-auth-links -->
<li><?php echo $pro['alamat'];?>
</li>
<li><?php echo $pro['telpon'];?></li>
<li><?php echo $pro['email'];?></li>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js"></script>



</body>
</html>
