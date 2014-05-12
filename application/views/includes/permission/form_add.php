<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Saran &amp; Ide</h2>
					</div>
					<!-- End Box Head -->
					<?php
						echo form_open_multipart('saran/simpan');
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
										echo form_input(array(
															'name'=>'title',
															'maxlength' => 50,
															'class'=>"field size1"));
									?>
									
								</p>
								
								<p>									
									<label>Kategori <span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'kategori',															
															'class'=>"field size1"));
									?>
									
								</p>
																
								<p>								
									<label>Saran atau ide <span>(Required Field)</span></label>
									
									<?php 
										echo form_textarea(array(
															'name'=>'body',
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