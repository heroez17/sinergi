<div class="box box-primary">
          
          <div class="box-body">
            <div class="row">
        <div class="col-md-6">
          <!-- Box Comment -->
          <div class="box box-widget">
           
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-responsive pad" src="<?php echo base_url()?>assets/dist/img/<?php echo $pro['photo'];?>" >

            </div>
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
        <img class="img-circle" src="<?php echo base_url()?>assets/dist/img/<?php echo $pro['photo'];?>" alt="User Image">
                <span class="username"><a href="#"><?php echo $pro['nama'];?></a></span>
               
               
              </div>
              <!-- /.user-block -->
              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <p><b>Tentang</b> <p></p><?php echo $pro['tentang'];?>
</p>
<br />
<p><strong>Alamat</strong> <p></p>
<?php echo $pro['alamat'].', '.$pro['telpon'].', '.$pro['email'];?></p>
<br />
             
            </div>
     
     </div>
     
     
     </div>
     </div>
     </div>
     </div>
 
 
<div class="row">
        <!-- left column -->
  <div class="col-md-12">
          <!-- general form elements -->
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">UPDATE PROFILE</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="<?php echo base_url()?>index.php/admin/awal/simpan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">NAMA WEBSITE</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $pro['nama'];?>" required>
                   <input type="hidden" class="form-control" name="id" value="<?php echo $pro['id'];?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">ALAMAT WEBSITE</label>
                  <textarea class="form-control" required name="alamat"><?php echo $pro['alamat'];?></textarea>
                 
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">TELEPHONE WEBSITE</label>
                  <input type="text" class="form-control" name="telpon" value="<?php echo $pro['telpon'];?>" required>
                  <label for="exampleInputEmail1">EMAIL WEBSITE</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $pro['email'];?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">TENTANG WEBSITE</label>
                  <textarea class="form-control" required name="tentang"><?php echo $pro['tentang'];?></textarea>
                 
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Photo Website </label>
                  <input name="poto" type="file" >

                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
</div>
        <!-- /.box -->

        <!-- Form Element sizes --><!-- /.box --><!-- /.box -->

        <!-- Input addon --><!-- /.box -->

        </div>
    <!--/.col (left) -->
    <!-- right column --><!--/.col (right) -->
  </div>
      <!-- /.row -->
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
