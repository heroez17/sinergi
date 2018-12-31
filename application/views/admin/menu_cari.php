<ul class="sidebar-menu">
<form action="#" method="get" class="sidebar-form" onsubmit="carii()">
        <div class="input-group">
          <input type="text" id="q" class="form-control" placeholder="Cari...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>

<?php if($listmenu->num_rows()>0){
			foreach($listmenu->result() as $row){
			?>
         <li class="header"> <a href="<?php echo base_url()?>index.php/admin/<?php echo $row->nama?>"><?php echo strtoupper($row->nama)?></a></li>
			<?php }
			}else{
				echo "";
				
				}?>
       
        
        
        
        
        
        
        
        
        
        
         
               

      
      </ul>
      