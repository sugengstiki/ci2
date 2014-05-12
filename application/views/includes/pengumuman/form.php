<!-- ZC11326-C1B5-ZTFD Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<?php
						if (isset($id)){
						?>
							<h2>Ubah Pengumuman</h2>
						<?php
						} else { //add ?>
							<h2>Tambah Pengumuman</h2>
						<?php
						} //endif isset
						?>
						
					</div>
					<!-- End Box Head -->
					
					<?php
						if (isset($id)){
						
							echo form_open_multipart("pengumuman/simpan/$id");
						
						} else { //add 
							echo form_open_multipart('pengumuman/simpan/');
						
						} //endif isset
						
						
						define("chars", 160);
					
						/* echo form_open('site/simpanedit');
						echo form_hidden('id',$id);
						$data = $this->user_model->get($id); */
					?>
					
						
						<!-- Form -->
						<div class="form">
								<p>
									
									<label>Judul <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'title',
													'maxlength' => 256,														
													'class'=>"field size1");
										if (isset($data->pengumuman_title)){
											$o['value'] = $data->pengumuman_title;
											
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
										if (isset($data->pengumuman_kategori_id)){
												$o['value'] = $data->pengumuman_kategori_id;
												
										}
										
										echo form_input($o);
									?>
									
								</p>
																
								<p>								
									<label>Pengumuman <span>(Required Field)</span></label>
									
									<?php 
										$o = array(
													'name'=>'body',
													'class'=>"field size1");
										if (isset($data->pengumuman_body)){
											$o['value'] = $data->pengumuman_body;
											
										}

										echo form_textarea($o);
									?>
									
								</p>
								<p>
									<span class="req">jpg or gif or png</span>
									<label>File Pendukung <span>(Required Field)</span></label>
									<?php 			
										
										if (isset($data->pengumuman_image)){
											$o = array('f'=>$data->pengumuman_image);
											echo form_hidden($o);
										}
										
										$o = array(
													'name'=>'userfile',
													'class'=>"field size1");
										echo form_upload($o);
										

										
										
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