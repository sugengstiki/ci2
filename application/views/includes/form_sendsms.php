<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Send SMS Form</h2>
					</div>
					<!-- End Box Head -->
					<?php
						echo form_open_multipart('site/sendbulksms');
						define("chars", 160);
					
						/* echo form_open('site/simpanedit');
						echo form_hidden('id',$id);
						$data = $this->user_model->get($id); */
					?>
					
						
						<!-- Form -->
						<div class="form">
								<p>
									<span class="req">max 50 character</span>
									<label>Title<span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'title',
															'maxlength' => 50,
															'class'=>"field size1"));
									?>
									
								</p>
								<p>
									<span class="req">Mobile Phone Number, comma-separated</span>
									<label>Send To<span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'sendto',															
															'class'=>"field size1"));
									?>
									
								</p>
								<p>Or</p>
								<p>
									<span class="req">Max 2 MB - Excel 2003 or Below (.xls)</span>
									<label>Recipient File<span>(Required Field)</span></label>
									<?php 
										echo form_upload(array(
															'name'=>'userfile',															
															'class'=>"field size1"));
									?>
									
								</p>
								<p> 
									<span id="char_count" class="req">max 100 character</span>
									<label>Message<span>(Required Field)</span></label>
									<?php 
										/* echo form_textarea(array(
															'name'=>'berita',															
															'rows'=>5,
															'cols'=> 30,
															'class'=>"field size1")); */
									?>
	<br /><textarea name="berita" class="field size1" id="textbox" rows="3" cols="60" onFocus="countChars('textbox','char_count',160)" onKeyDown="countChars('textbox','char_count',160)" onKeyUp="countChars('textbox','char_count',160)"></textarea>
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