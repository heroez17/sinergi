  <div class="box-body">
   <section class="content-header">
     <h2> JUMLAH DATA <?php echo $jumlah?> </h2>
        </section>
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>ANTRIAN</th>
                  <th>TGL</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
				$no=1;
				if($data->num_rows()>0){
					foreach($data->result() as $row){
					?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $row->urut;?></td>
                  <td><?php echo $row->tgl.' '.$row->jam;?></td>
                  </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
              </div>