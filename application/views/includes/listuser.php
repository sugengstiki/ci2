<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Current Articles</h2>
						<div class="right">
							<label>search articles</label>
							<input type="text" class="field small-field" id="input_keyword"/>
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>Title</th>
								<th>Date</th>
								<th>Added by</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
							$odd = 0;
							foreach($user as $brs) : 
							?>
							<tr <?php echo ($odd++ % 2) ? 'class="odd"' : ''; ?>>
							
								<td><input type="checkbox" class="checkbox" name="chk[]" value="<?php echo $brs->id; ?>"/></td>
								<td><h3><a href="#"><?php echo $brs->name; ?></a></h3></td>
								<td><?php echo $brs->dob; ?></td>
								<td><a href="#">Administrator</a></td>
								<td><a href="#" class="ico del">Delete</a>
								<?php echo anchor("site/edit/".$brs->id,"Edit",array('class'=>'ico edit')); ?>
								</td>
							</tr>
							<?php endforeach; ?>
							
						</table>
						
						<!-- Pagging -->
						<div class="pagging">
							
							
							
							<div class="left">Showing 1-12 of 44</div>
							<div class="right">
							<?php 
								echo $this->pagination->create_links();
							?>								
								<a href="#">View all</a>
							</div>
						</div>
						<!-- End Pagging -->
						<div id="datatables">
						</div>
					</div>
					<!-- Table -->
					
				</div>
				<!-- End Box -->
				
				