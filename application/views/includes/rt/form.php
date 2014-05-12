<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<?php
						if (isset($id)){
						?>
							<h2>Ubah Data RT</h2>
						<?php
						} else { //add ?>
							<h2>Pendaftaran RT</h2>
						<?php
						} //endif isset
						?>
						
					</div>
					<!-- End Box Head -->
					
					<?php
						if (isset($id)){
						
							echo form_open_multipart("rt/simpan/$id");
						
						} else { //add 
							echo form_open_multipart('rt/simpan/');
						
						} //endif isset
						
						
						define("chars", 160);
					
						/* echo form_open('site/simpanedit');
						echo form_hidden('id',$id);
						$data = $this->user_model->get($id); */
					?>
					
						
						<!-- Form -->
						<div class="form">
								<p>
									
									<label>Nama <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'nama',
													'maxlength' => 256,														
													'class'=>"field size1");
										if (isset($data->rt_nama)){
											$o['value'] = $data->rt_nama;
											
										}
										
										echo form_input($o);
									?>
									
								</p>
								
								<p>
									
									<label>Keterangan Tambahan <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'desc',
													'maxlength' => 256,														
													'class'=>"field size1");
										if (isset($data->rt_desc)){
											$o['value'] = $data->rt_desc;
											
										}
										
										echo form_input($o);
									?>
									
								</p>
								
								<p>
									
									<label>Telp <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'telp',
													'maxlength' => 256,														
													'class'=>"field size1");
										if (isset($data->rt_telp)){
											$o['value'] = $data->rt_telp;
											
										}
										
										echo form_input($o);
									?>
									
								</p>
								
								<p>
									
									<label>Email <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'email',
													'maxlength' => 256,														
													'class'=>"field size1");
										if (isset($data->rt_email)){
											$o['value'] = $data->rt_email;
											
										}
										
										echo form_input($o);
									?>
									
								</p>
								
								<p class="inline-field">
									
									<label>RT/RW <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'rt',
													'maxlength' => 256,														
													'class'=>"field size2");
										if (isset($data->rt_rt)){
											$o['value'] = $data->rt_rt;
											
										}
										
										echo form_input($o);
									?>
									<?php 
										$o = array(
													'name'=>'rw',
													'maxlength' => 256,														
													'class'=>"field size2");
										if (isset($data->rt_rw)){
											$o['value'] = $data->rt_rw;
											
										}
										
										echo form_input($o);
									?>
									
								</p>
								
								<p>
									
									<label>Kelurahan <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'kelurahan',
													'maxlength' => 256,														
													'class'=>"field size1");
										if (isset($data->rt_kelurahan)){
											$o['value'] = $data->rt_kelurahan;
											
										}
										
										echo form_input($o);
									?>
									
								</p>
								
								<p>
									
									<label>Kecamatan <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'kecamatan',
													'maxlength' => 256,														
													'class'=>"field size1");
										if (isset($data->rt_kecamatan)){
											$o['value'] = $data->rt_kecamatan;
											
										}
										
										echo form_input($o);
									?>
									
								</p>
								
								<p>
									
									<label>Kota <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'kota',
													'maxlength' => 256,														
													'class'=>"field size1");
										if (isset($data->rt_kota)){
											$o['value'] = $data->rt_kota;
											
										}
										
										echo form_input($o);
									?>
									
								</p>
								
								<p>
									
									<label>Propinsi <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'propinsi',
													'maxlength' => 256,														
													'class'=>"field size1");
										if (isset($data->rt_propinsi)){
											$o['value'] = $data->rt_propinsi;
											
										}
										
										echo form_input($o);
									?>
									
								</p>
								<?php
									if (!isset($id)):
								?>
								<p>
									
									<label>Admin Username <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'username',
													'maxlength' => 256,														
													'class'=>"field size1");
										if (isset($data->warga_username)){
											$o['value'] = $data->warga_username;
											
										}
										
										echo form_input($o);
									?>
									
								</p>
						
								<p>
									
									<label>Admin Password <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'password',
													'maxlength' => 256,														
													'class'=>"field size1");
										if (isset($data->warga_password)){
											$o['value'] = $data->warga_username;
											
										}
										
										echo form_input($o);
									?>
									
								</p>
								<?php endif; ?>
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