<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
					<?php
						if (isset($id)){
								//print_r($data);
						?>
							<h2>Koreksi Hak Akses</h2>
						<?php
						} else { //add ?>
							<h2>Tambah Hak Akses</h2>
						<?php
						} //endif isset
						?>
						
					</div>
					<!-- End Box Head -->
					<?php
						if (isset($id)){
						
							echo form_open_multipart("permission/simpan/$id");
						
						} else { //add 
							echo form_open_multipart('permission/simpan/');
						
						} //endif isset
						define("chars", 160);
					
						/* echo form_open('site/simpanedit');
						echo form_hidden('id',$id);
						$data = $this->user_model->get($id); */
					?>
					
						
						<!-- Form -->
						<div class="form">
								<p>
									
									<label>Tipe <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'type',
													'id' => 'tipe',
													'class'=>"field size1");
										if (isset($data->permission_type)){
											$o['value'] = $data->permission_type;
											
										}
										echo form_input($o);
																				
									?>
									
								</p>
								
								<p>									
									<label>Modul <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'modul',
													'id' => 'modul',
													'class'=>"field size1");
										if (isset($data->permission_module)){
											$o['value'] = $data->permission_module;
											
										}
										echo form_input($o);
										
										
									?>
									
								</p>
																
								<p>								
									<label>Fungsi<span>(Required Field)</span></label>
									
									<?php 
										$o = array(
													'name'=>'fungsi',
													'class'=>"field size1");
										if (isset($data->permission_function)){
											$o['value'] = $data->permission_function;
											
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