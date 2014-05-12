<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<?php
						if (isset($id)){
								//print_r($data);
						?>
							<h2>Resend SMS</h2>
						<?php
						} else { //add ?>
							<h2>Send SMS</h2>
						<?php
						} //endif isset
						?>
					</div>
					<!-- End Box Head -->
					<?php
						if (isset($id)){
						
							echo form_open_multipart("sms/simpan/$id");
						
						} else { //add 
							echo form_open_multipart('sms/simpan/');
						
						} //endif isset
						define("chars", 160);
						
					?>					
						<!-- Form -->
						<div class="form">
							<p>	
								<span class="req">max 50 character</span>
								<label>Title <span>(Required Field)</span></label>
								<?php 
									$o = array(
												'name'=>'title',
												'maxlength' => 50,
												'class'=>"field size1");
									if (isset($data->sms_title)){
										$o['value'] = $data->sms_title;										
									}
									
									echo form_input($o);									
								?>
							</p>
							<p>	
								<span class="req">Mobile Phone Number, comma-separated</span>
								<label>Send To <span>(Required Field)</span></label>
								<?php 
									$o = array(
												'name'=>'sendto',												
												'class'=>"field size1");
									if (isset($data->sms_sendto)){
										$o['value'] = $data->sms_sendto;
										
									}
									echo form_input($o);									
								?>
							</p>
							<p>Or</p>
								<p>
									<span class="req">Max 2 MB - Excel 2003 or Below (.xls)</span>
									<label>Recipient File<span>(Required Field)</span></label>
									<?php 			
										
										if (isset($data->sms_filename)){
											$o = array('f'=>$data->sms_filename);
											echo form_hidden($o);
										}
										
										$o = array(
													'name'=>'userfile',
													'class'=>"field size1");
										echo form_upload($o);
									?>
									
								</p>
								<p> 
									<span id="char_count" class="req">max 100 character</span>
									<label>Message<span>(Required Field)</span></label>
									<?php 
										$o = array(
													'name'=>'message',
													'rows'=>'3',
													'cols'=>'60',
													'id'=>'message',
													'maxlength' => 160,
													'class'=>"field size1");
												
										if (isset($data->sms_message)){
											$o['value'] = $data->sms_message;
											
										}

										echo form_textarea($o);
										//<textarea name="berita" class="field size1" id="textbox" rows="3" cols="60" onFocus="countChars('textbox','char_count',160)" onKeyDown="countChars('textbox','char_count',160)" onKeyUp="countChars('textbox','char_count',160)"></textarea>
									?>
	<br />
								</p>								
									
							
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
						<?php
						if (isset($id)){
						?>
							<input type="submit" class="button" name="mode" value="Kirim Ulang" />
						<?php
						} else { //add ?>
							<input type="submit" class="button" name="mode" value="Kirim" />
						<?php
						} //endif isset
						?>
							
						</div>
						<!-- End Form Buttons -->
					</form>
				</div>
				<!-- End Box -->