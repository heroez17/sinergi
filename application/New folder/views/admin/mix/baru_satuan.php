<div class="input-group">
              
                 <input type="number" class="form-control" name="qty" id="qty" placeholder="Jumlah"> 
               <span class="input-group-addon text-red"><?php foreach($bahan->result() as $t){
	echo $t->nama;
	
	}?></span>
    
              </div>
              