<div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          
          
                <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php 		if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
$d = date("l");
 
        if ($d=='Monday'){
            echo '&nbsp; Senin';
        }elseif($d=='Tuesday'){
            echo 'Selasa  &nbsp;';
        }elseif($d=='Wednesday'){
            echo 'Rabu  &nbsp;';
        }elseif($d=='Thursday'){
            echo 'Kamis  &nbsp;';
        }elseif($d=='Friday'){
            echo 'Jumat &nbsp;';
        }elseif($d=='Saturday'){
            echo 'Sabtu  &nbsp;';
        }elseif($d=='Sunday'){
            echo 'Minggu  &nbsp;';
        }else{
            echo 'ERROR!';
        }
echo  date('d/m/Y');
        ?>
             <span id="demo"></span>
        <span id="demonew"></span>
              
            </a>
            
          </li>
          
          
          
          
          
          
          
          
          
          
          
          <li class="dropdown user user-menu">
          
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <img src="<?php 
			 $pp = $this->session->userdata('photo');
			 if(empty($pp)){
				 $pp = "logo.jpg";
				 }
			 echo base_url()?>assets/images/<?php echo $pp; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $username;?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
              <img src="<?php 
			 $pp = $this->session->userdata('photo');
			 if(empty($pp)){
				 $pp = "logo.png";
				 }
			 echo base_url()?>assets/images/<?php echo $pp; ?>" class="img-circle" alt="User Image">
               <p>
                 <?php echo $username;?>
                  <small>
                 
                  
                  </small>
                </p>
              </li>
              <li class="user-footer">
               
                <div class="pull-right">
                  <a href="<?php echo base_url()?>index.php/admin/awal/logout" class="btn btn-default btn-flat primary">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
           
          </li>
        </ul>
      </div>