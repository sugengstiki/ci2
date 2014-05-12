<!-- ZC11326-C1B5-ZTFD Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<?php
						if (isset($id)){
						?>
							<h2>Ubah keuangan</h2>
						<?php
						} else { //add ?>
							<h2>Tambah keuangan</h2>
						<?php
						} //endif isset
						?>
						
					</div>
					<!-- End Box Head -->
					
					<?php
						if (isset($id)){
						
							echo form_open_multipart("keuangan/simpan/$id");
						
						} else { //add 
							echo form_open_multipart('keuangan/simpan/');
						
						} //endif isset
						
						
						define("chars", 160);
					
						/* echo form_open('site/simpanedit');
						echo form_hidden('id',$id);
						$data = $this->user_model->get($id); */
					?>
					
						
						<!-- Form -->
						<div class="form">
								<p>
									
									<label>Tanggal <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'tgl',
													'id'=>'tgl',													
													'class'=>"field size3");
										if (isset($data->keuangan_tgl)){
											$o['value'] = $data->keuangan_tgl;
											
										}
										
										echo form_input($o);
									?>
									
								</p>
								
								<p>									
									<label>Debit / Kredit </label>
								</p>
								<p>
									<?php 
										$radio = array(
											'name'        => 'debit_kredit',											
											'value'       => 'D',
											'checked'     => TRUE,											
										);

										echo form_radio($radio);
									?>
								
									<label class="inline" for="debit_kredit">Debit</label>
								</p>
								<p>
									<?php
										$radio = array(
											'name'        => 'debit_kredit',											
											'value'       => 'K'					
										);

										echo form_radio($radio);
										
									?>
									<label class="inline">Kredit </label>
								</p>
								<p>									
									<label>Jumlah <span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'jumlah',														
													'class'=>"field size3");
										if (isset($data->keuangan_jumlah)){
												$o['value'] = $data->keuangan_jumlah;
												
										}
										
										echo form_input($o);
									?>
									
								</p>								
								<p>								
									<label>Keterangan <span>(Required Field)</span></label>
									
									<?php 
										$o = array(
													'name'=>'desc',
													'class'=>"field size1");
										if (isset($data->keuangan_desc)){
											$o['value'] = $data->keuangan_desc;
											
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