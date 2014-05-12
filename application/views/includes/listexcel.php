<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Daftar Mahasiswa</h2>
						<div class="right">
								
						<?php
							echo form_open_multipart('site/filexls');
						?>
							<label>Excel File</label>
							<?php 										
								$data = array(
									'name'        => 'userfile',
									'class'       => '');
								echo form_upload($data);
								
								$data = array(
								'name'        => 'upload',
								'value'		=> 'Kirim',
								'class'          => 'button',              
								);
								echo form_submit($data);
								
								echo form_close();
						?>
							
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<?php
					
					echo form_open('site/sendsms');
						
					
					?>
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>Nama</th>
								<th>Path</th>
								<th>Added by</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
							$odd = 0;
							foreach($excels as $brs) : 
								
							?>
							<tr <?php echo ($odd++ % 2) ? 'class="odd"' : ''; ?>>
							
								<td><input type="checkbox" class="checkbox" name="chk[]" value="<?php echo $brs['excel_url']; ?>"/></td>
								<td><h3><a href="./showmhs/<?php echo $brs['filename']; ?>"><?php echo $brs['filename']; ?></a></h3></td>
								<td><?php echo $brs['excel_url']; ?></td>
								<td><a href="#">Administrator</a></td>
								<td><a href="#" class="ico del">Delete</a>
								<?php echo anchor("site/edit/".$brs['url'],"Edit",array('class'=>'ico edit')); ?>
								</td>
							</tr>
							<?php 
								
							endforeach; 
							?>
							
						</table>
						
						<!-- Pagging -->
						<div class="pagging">
							
							
							
							<div class="left">Showing 1-12 of 44</div>
							<div class="right">
							
								
									<input type="submit" class="button" value="Send SMS" />
								
							</div>
						</div>
						<!-- End Pagging -->
						
					</div>
					<!-- Table -->
					<?php 
					 
					echo form_close();
					?>
					
				</div>
				<!-- End Box -->
				
				