<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
					<?php
						if (isset($id)){
								//print_r($data);
						?>
							<h2>Perubahan data warga</h2>
						<?php
						} else { //add ?>
							<h2>Pendaftaran warga baru</h2>
						<?php
						} //endif isset
						?>
						
					</div>
					<!-- End Box Head -->
					<?php
						if (isset($id)){
						
							echo form_open_multipart("warga/simpan/$id");
						
						} else { //add 
							echo form_open_multipart('warga/simpan/');
						
						} //endif isset
						define("chars", 160);
						//print_r($data);
						/* echo form_open('site/simpanedit');
						echo form_hidden('id',$id);
						$data = $this->user_model->get($id); */
					?>
					
						
						<!-- Form -->
						<div class="form">								
								<p>									
									<label>Nomer KTP <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'noktp',
													'class'=>"field size1");
										if (isset($data->warga_noktp)){
											$o['value'] = $data->warga_noktp;
											
										}
										echo form_input($o);									
										?>
								</p>
								<p>									
									<label>Nama <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'nama',
													'class'=>"field size1");
										if (isset($data->warga_nama)){
											$o['value'] = $data->warga_nama;
											
										}
										echo form_input($o);
									?>
									
								</p>
								<p>									
									<label>Username <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'username',
													'class'=>"field size1");
										if (isset($data->warga_username)){
											$o['value'] = $data->warga_username;
											
										}
										echo form_input($o);
									?>
									
								</p>
								<p>									
									<label>Password <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'password',
													'class'=>"field size1");
										if (isset($data->warga_password)){
											$o['value'] = $data->warga_password;
											
										}
										echo form_password($o);
									?>
									
								</p>
								<p>									
									<label>Alamat <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'alamat',
													'class'=>"field size1");
										if (isset($data->warga_alamat)){
											$o['value'] = $data->warga_alamat;
											
										}
										echo form_input($o);										
									?>
									
								</p>
								<p>									
									<label>Telpon <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'telp',
													'class'=>"field size1");
										if (isset($data->warga_telp)){
											$o['value'] = $data->warga_telp;
											
										}
										echo form_input($o);
																				
									?>
									
								</p>


								<p>									
									<label>Tempat/Tanggal Lahir <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'ttl',
													'class'=>"field size1");
										if (isset($data->warga_ttl)){
											$o['value'] = $data->warga_ttl;
											
										}
										echo form_input($o);
									?>
									
								</p>
								
								<p>									
									<label>Agama <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'agama',
													'class'=>"field size1");
										if (isset($data->warga_agama)){
											$o['value'] = $data->warga_agama;
											
										}
										echo form_input($o);
										
										
									?>
									
								</p>
								<p>									
									<label>Pendidikan Tertinggi <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'pendidikan',
													'class'=>"field size1");
										
										if (isset($data->warga_pendidikan)){
											$o['value'] = $data->warga_pendidikan;
											
										}
										
										echo form_input($o);
										
									?>
									
								</p>
								<p>									
									<label>Pekerjaan <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'pekerjaan',
													'class'=>"field size1");
										
										if (isset($data->warga_pekerjaan)){
											$o['value'] = $data->warga_pekerjaan;
											
										}
										
										echo form_input($o);
										
										
									?>
									
								</p>
								<p>									
									<label>No KK <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'nokk',
													'class'=>"field size1");
										if (isset($data->warga_nokk)){
											$o['value'] = $data->warga_nokk;
											
										}
										echo form_input($o);
										
										
									?>
									
								</p>
								<p>									
									<label>RT <span>(Required Field)</span></label>
									<?php 
										$o = array(	'id' => 'rtrw',
													'name'=>'rtrw',
													'class'=>"field size1",
													'data-provide' => "typeahead",
													'autocomplete'=>"off");
										if (isset($data->warga_rt_id)){
											$o['value'] = $data->warga_rt_id;
											
										}
										echo form_input($o);
									?>
									
								</p>
								<p>									
									<label id="nama">Nama :</label>
									
									
								</p>
								<p>									
									<label>Jenis Kelamin <span>(Required Field)</span></label>
								</p>
								<p>
									<?php 
										$radio = array(
											'name'        => 'jk',											
											'value'       => 'Laki',
											'checked'     => TRUE,											
										);

										echo form_radio($radio);
									?>
								
									<label class="inline">Laki-laki</label>
								</p>
								<p>
									<?php
										$radio = array(
											'name'        => 'jk',											
											'value'       => 'Perempuan'					
										);

										echo form_radio($radio);
										
									?>
									<label class="inline">Perempuan </label>
								</p>
								
								<p>									
									<label>Status <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'status',
													'class'=>"field size1");
										if (isset($data->warga_status)){
											$o['value'] = $data->warga_status;
											
										}
										echo form_input($o);
										
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