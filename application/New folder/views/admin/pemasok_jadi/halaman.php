 <?php foreach($data->result() as $row){?>
                <li><a onclick="GetDDetail('<?php echo $row->id_pemasok?>')" href="#"><i class="fa fa-circle-o"></i> <?php echo $row->nama?></a></li>
                <?php } ?>