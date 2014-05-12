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
						
					// memisahkan header row dengan data
					if (empty($user)) {
						echo "Data belum ada, silahkan upload file";
					} else {
					//print_r($user);
					$header = array_values(array_shift($user));
					?>
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th><?=strtoupper($header[0])?></th>
								<th><?=strtoupper($header[1])?></th>
								<th>Added by</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
							$odd = 0;
							
							
							foreach($user as $brs) : 
								$brs = array_values($brs);
							?>
							<tr <?php echo ($odd++ % 2) ? 'class="odd"' : ''; ?>>
							
								<td><input type="checkbox" class="checkbox" name="chk[]" value="<?php echo $brs[1]; ?>"/></td>
								<td><h3><a href="#"><?php echo $brs[0]; ?></a></h3></td>
								<td><?php echo $brs[1]; ?></td>
								<td><a href="#">Administrator</a></td>
								<td><a href="#" class="ico del">Delete</a>
								<?php echo anchor("site/edit/".$brs[0],"Edit",array('class'=>'ico edit')); ?>
								</td>
							</tr>
							<?php 
								
							endforeach; 
							?>
							
						</table>
						<p>
									<span class="req">max 100 symbols</span>
									<label>Berita <span>(Required Field)</span></label>
									<?php 
										echo form_textarea(array(
															'name'=>'berita',															
															'rows'=>5,
															'cols'=> 30,
															'class'=>"field size1"));
									?>
									
								</p>
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
					} 
					echo form_close();
					?>
					
				</div>
				<!-- End Box -->
				
				