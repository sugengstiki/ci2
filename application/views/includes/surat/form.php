<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
					<?php
						if (isset($id)){
								//print_r($data);
						?>
							<h2>Perubahan surat Surat Keterangan</h2>
						<?php
						} else { //add ?>
							<h2>surat Surat Keterangan</h2>
						<?php
						} //endif isset
						?>
						
					</div>
					<!-- End Box Head -->
					<?php
						if (isset($id)){
						
							echo form_open_multipart("surat/simpan/$id");
						
						} else { //add 
							echo form_open_multipart('surat/simpan/');
						
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
									<span class="req">format : no/RT 3 RW 12/bulan/tahun</span>
									<label>Nomer Surat <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'nosurat',
													'class'=>"field size1");
										if (isset($data->surat_nomer)){
											$o['value'] = $data->surat_nomer;
											
										}
										echo form_input($o);
									?>
									
								</p>
								<p>									
									<label>Nomer KTP <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'noktp',
													'id'=>'noktp',
													'class'=>"field size1");
										if (isset($data->warga_noktp)){
											$o['value'] = $data->warga_noktp;
											
										}
										echo form_input($o);									?>
									
								</p>
								<p>									
									<label>Nama <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'nama',
													'id'=>'nama',
													'class'=>"field size1");
										if (isset($data->warga_nama)){
											$o['value'] = $data->warga_nama;
											
										}
										echo form_input($o);
									?>
									
								</p>
								<p>									
									<label>Tempat/Tanggal Lahir <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'ttl',
													'id'=>'ttl',
													'class'=>"field size1");
										if (isset($data->warga_ttl)){
											$o['value'] = $data->warga_ttl;
											
										}
										echo form_input($o);
									?>
									
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
								
								
								<p>	<span class="req">Surat Keterangan ini diberikan untuk keperluan  </span>								
									<label>Peruntukan <span>(Required Field)</span></label>
									
									<?php 
										$o = array(
													'name'=>'keterangan',
													'class'=>"field size1");
										
										if (isset($data->surat_untuk)){
											$o['value'] = $data->surat_untuk;
											
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