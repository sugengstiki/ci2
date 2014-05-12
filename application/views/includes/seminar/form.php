<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
					<?php
						if (isset($id)){
								//print_r($data);
						?>
							<h2>Perubahan data peserta seminar</h2>
						<?php
						} else { //add ?>
							<h2>Pendaftaran seminar</h2>
						<?php
						} //endif isset
						?>
						
					</div>
					<!-- End Box Head -->
					<?php
						if (isset($id)){
						
							echo form_open_multipart("seminar/simpan/$id");
						
						} else { //add 
							echo form_open_multipart('seminar/simpan/');
						
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
									<label>NRP <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'nrp',
													'id'=>'nrp',
													'class'=>"field size1");
										if (isset($data->seminar_nrp)){
											$o['value'] = $data->seminar_nrp;
											
										}
										echo form_input($o);									
										?>
								</p>
								<p>									
									<label >Nama :</label>
									<?php 
										$o = array(
													'name'=>'nama',
													'id'=>'nama',
													'readonly' => 'true',
													'class'=>"field size1");
										if (isset($data->seminar_nama)){
											$o['value'] = $data->seminar_nama;
											
										}
										echo form_input($o);									
										?>
								</p>
								
								<p>									
									<label>Sudah Bayar </label>
								</p>
								<p>
									<?php 
										$radio = array(
											'name'        => 'status',											
											'value'       => '1',
											'checked'     => TRUE,											
										);

										echo form_radio($radio);
									?>
								
									<label class="inline">Sudah Bayar</label>
								</p>
								<p>
									<?php
										$radio = array(
											'name'        => 'status',											
											'value'       => '0'					
										);

										echo form_radio($radio);
										
									?>
									<label class="inline">Belum Bayar </label>
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