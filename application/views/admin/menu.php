<script type="text/javascript">
function carii(){
	var nama = $('#q').val();
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/menu/')?>",
                        data: 'nama='+nama, 
						beforeSend : function(){
							
							$('.sidebar-menu').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('.sidebar-menu').html(msg);
	                              
									
							}
							
                    });
	
	}	
	
	</script>

<ul class="sidebar-menu">
 <!-- <li class="treeview">
          <a href="<?php echo base_url()?>index.php/admin/dashboard">
            <i class="fa fa-home"></i>
            <span>HOME</span>
            
          </a>
         
        </li>


  <li class="treeview">
          <a href="">
            <i class="fa fa-folder-open"></i>
            <span>DATA MASTER</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
         <ul class="treeview-menu">
       <li><a href="<?php echo base_url()?>index.php/admin/karyawan"><i class="fa fa-circle-o"></i> Karyawan</a></li> <li><a href="<?php echo base_url()?>index.php/admin/user"><i class="fa fa-circle-o"></i> User</a></li>
            <li><a href="<?php echo base_url()?>index.php/admin/kategori"><i class="fa fa-circle-o"></i> Kategori Barang</a></li>
             <li><a href="<?php echo base_url()?>index.php/admin/satuan"><i class="fa fa-circle-o"></i> Satuan Barang</a></li>
              <li><a href="<?php echo base_url()?>index.php/admin/supplier"><i class="fa fa-circle-o"></i> Supplier Barang</a></li>
  
         
           
          </ul>
        </li>
       
<li class="treeview">
          <a href="">
            <i class="fa fa-database"></i>
            <span>BARANG</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
         <ul class="treeview-menu">
           <li><a href="<?php echo base_url()?>index.php/admin/barang_gdg"><i class="fa fa-circle-o"></i> Data Barang</a>
           
           <li><a href="<?php echo base_url()?>index.php/admin/barang_gdg/pesan"><i class="fa fa-circle-o"></i> Kedatangan Barang</a>
            <li><a href="<?php echo base_url()?>index.php/admin/barang_gdg/stk"><i class="fa fa-circle-o"></i> Stock Barang</a>
  
         
           
          </ul>
        </li>




<li class="treeview">
          <a href="<?php echo base_url()?>index.php/admin/barang_etls/kasir/0">
            <i class="fa fa-cart-plus"></i>
            <span>KASIR</span>
            
          </a>
        </li>
        
        
 <li class="treeview">
          <a href="<?php echo base_url()?>index.php/admin/laporan">
            <i class="fa fa-folder"></i>
            <span>LAPORAN</span>
            
          </a>
        </li>       
        
        <li class="treeview">
          <a href="<?php echo base_url()?>index.php/admin/setting">
            <i class="fa fa-gear"></i>
            <span>SETTING</span>
            
          </a>
        </li>
  
  <li class="treeview">
          <hr />
        </li>
  -->
<?php if($listmenu->num_rows()>0){
			foreach($listmenu->result() as $row){
			?>
         
               <li class="treeview">
          <a href="">
            <i class="fa fa-database"></i>
            <span><?php echo $row->nama;
			$idmaster=$row->id;
			$iduser=$row->iduser;?></span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
         <ul class="treeview-menu">
          <?php $rt=$this->db->query("SELECT
    tab_menu_master.nama AS mas
    , tab_menu.nama
    , tab_menu.nama_lihat
FROM
    ibenk_kassir.tab_menu
    INNER JOIN ibenk_kassir.akses 
        ON (tab_menu.id_menu = akses.id_menu)
    INNER JOIN ibenk_kassir.tab_login 
        ON (akses.id_user = tab_login.user_id)
    INNER JOIN ibenk_kassir.tab_menu_master 
        ON (tab_menu_master.id_menu_master = tab_menu.id_menu_master)
        WHERE tab_menu_master.id_menu_master='$idmaster' AND akses.id_user='$iduser';");
		if($rt->num_rows()>0){
			foreach($rt->result() as $c){?>
        
           <li><a href="<?php echo base_url()?>index.php/admin/<?php echo $c->nama?>"><i class="fa fa-circle-o"></i> <?php echo $c->nama_lihat?></a>
           <?php }}else{
			   
			   }?>
           
          </ul>
        </li>
         
         
         
			<?php }
			}else{
				echo "";
				
				}?>
       
        
        
        
        
        


        
        
         
               

      
      </ul>
      
      
      
      
      
      
      
      