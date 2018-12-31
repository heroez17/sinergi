<div class="row">
        <!-- left column -->
  <div class="col-md-6">
          <!-- general form elements -->
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">LIHAT DATA</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal</label>
                  <input type="text" data-date-format="dd-mm-yyyy" id="tgl" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">S/d </label>
                  <input type="text" data-date-format="dd-mm-yyyy" class="form-control" id="tgl1" placeholder="">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" onclick="lihat()" class="btn btn-primary">Submit</button>
              </div>
            </form>
    </div>
    
    </div>
   
  <div class="col-md-6">
          <!-- Horizontal Form -->
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><button type="button" onclick="res()" class="btn btn-danger"><i class="fa fa-trash"></i> RESET</button> <i>Delete Semua Data Antrian</i></h3>
               <div class="box-body">
               <div align="center" id="del"></div>               
               </div>
               
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
    </div>
   
    </div>
      
      </div>
      
      
      <div class="row">
   
  <div class="col-md-12">
    <div class="box box-primary">
           <div align="center" id="showR"></div>
    </div>
    </div>
      
      </div>
    
    