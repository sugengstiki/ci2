<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Permohonan Surat Keterangan</h2>
					</div>
					<!-- End Box Head -->
					<?php
						echo form_open_multipart('permohonan/simpan');
						define("chars", 160);
					
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
										echo form_input(array(
															'name'=>'nosurat',
															'maxlength' => 50,
															'class'=>"field size1"));
									?>
									
								</p>
								<p>									
									<label>Nomer KTP <span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'noktp',															
															'class'=>"field size1"));
									?>
									
								</p>
								<p>									
									<label>Nama <span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'noktp',															
															'class'=>"field size1"));
									?>
									
								</p>
								<p>									
									<label>Tempat/Tanggal Lahir <span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'ttl',															
															'class'=>"field size1"));
									?>
									
								</p>
								<p>									
									<label>Jenis Kelamin <span>(Required Field)</span></label>
								</p>
								<p>
									<?php 
										$data = array(
											'name'        => 'jk',											
											'value'       => 'Laki',
											'checked'     => TRUE,											
										);

										echo form_radio($data);
									?>
								
									<label class="inline">Laki-laki</label>
								</p>
								<p>
									<?php
										$data = array(
											'name'        => 'jk',											
											'value'       => 'Perempuan'					
										);

										echo form_radio($data);
										
									?>
									<label class="inline">Perempuan </label>
								</p>
								<p>									
									<label>Pekerjaan <span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'pekerjaan',
															'class'=>"field size1"));
									?>
									
								</p>
								<p>									
									<label>Agama <span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'agama',
															'class'=>"field size1"));
									?>
									
								</p>
								<p>									
									<label>Status <span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'status',
															'class'=>"field size1"));
									?>
									
								</p>								
								<p>									
									<label>Pendidikan Tertinggi <span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'pendidikan',
															'class'=>"field size1"));
									?>
									
								</p>
								<p>									
									<label>Kewarganegaraan <span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'kewarganegaraan',
															'class'=>"field size1"));
									?>
									
								</p>
								<p>									
									<label>Alamat <span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'alamat',
															'class'=>"field size1"));
									?>
									
								</p>								
								<p>	<span class="req">Surat Keterangan ini diberikan untuk keperluan  </span>								
									<label>Peruntukan <span>(Required Field)</span></label>
									
									<?php 
										echo form_textarea(array(
															'name'=>'alamat',
															'class'=>"field size1"));
									?>
									
								</p>
																
									
							
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
						
							<input type="submit" class="button" value="Send" />
						</div>
						<!-- End Form Buttons -->
					</form>
				</div>
				<!-- End Box -->