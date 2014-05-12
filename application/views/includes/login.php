<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Login Page</h2>
					</div>
					<!-- End Box Head -->
					<?php 
						echo form_open('login/validasi');					
						//$data = $this->user_model->get($id);
					?>
					
						
						<!-- Form -->
						<div class="form">
								<p>
									
									<label>Username <span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'username1',
															'class'=>"field size1"));
									?>
									
								</p>
								<p>
									<span class="req">min 6 character</span>
									<label>Password <span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'password1',
															'class'=>"field size1"));
									?>
									
								</p>								
									
							<div class="buttons">							
							<input type="submit" class="button" value="Login" />
						</div>
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						
						<!-- End Form Buttons -->
					</form>
				</div>
				<!-- End Box -->