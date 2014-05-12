<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
					<?php
						if (isset($id)){
								//print_r($data);
						?>
							<h2>Koreksi Saran &amp; Ide</h2>
						<?php
						} else { //add ?>
							<h2>Saran &amp; Ide</h2>
						<?php
						} //endif isset
						?>
						
					</div>
					<!-- End Box Head -->
					<?php
						if (isset($id)){
						
							echo form_open_multipart("saran/simpan/$id");
						
						} else { //add 
							echo form_open_multipart('saran/simpan/');
						
						} //endif isset
						
						define("chars", 160);
					
						/* echo form_open('site/simpanedit');
						echo form_hidden('id',$id);
						$data = $this->user_model->get($id); */
					?>
					
						
						<!-- Form -->
						<div class="form">
								<p>
									
									<label>Tentang <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'title',
													'class'=>"field size1");
										if (isset($data->saran_title)){
											$o['value'] = $data->saran_title;
											
										}
										echo form_input($o);
																				
									?>
									
								</p>
								
								<p>									
									<label>Kategori <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'kategori',
													'class'=>"field size1");
										if (isset($data->saran_kategori_id)){
											$o['value'] = $data->saran_kategori_id;
											
										}
										echo form_input($o);
										
										
									?>
									
								</p>
																
								<p>								
									<label>Saran atau ide <span>(Required Field)</span></label>
									
									<?php 
										$o = array(
													'name'=>'body',
													'class'=>"field size1");
										if (isset($data->saran_body)){
											$o['value'] = $data->saran_body;
											
										}
										echo form_textarea($o);
										
										
									?>
									
								</p>
																
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
							<?php
							if (isset($id)){
							?>
								<input type="submit" class="button" name="mode" value="Koreksi" />
							<?php
							} else { //add ?>
								<input type="submit" class="button" name="mode" value="Simpan" />
							<?php
							} //endif isset
							?>
							
						</div>
						<!-- End Form Buttons -->
					</form>
				</div>
				<!-- End Box -->