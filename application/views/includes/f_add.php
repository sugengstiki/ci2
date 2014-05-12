<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Add Article</h2>
					</div>
					<!-- End Box Head -->
					<?php 
						echo form_open('site/simpanbaru');					
						//$data = $this->user_model->get($id);
					?>
					
						
						<!-- Form -->
						<div class="form">
								<p>
									<span class="req">max 100 symbols</span>
									<label>Title <span>(Required Field)</span></label>
									<?php 
										echo form_input(array(
															'name'=>'name',
															'value'=>isset($data->name)?$data->name:'',
															'class'=>"field size1"));
									?>
									
								</p>
								<p>
									<span class="req">min 6 character</span>
									<label>Body <span>(Required Field)</span></label>
									<?php 
										echo form_textarea(array(
															'name'=>'gender',
															'value'=>isset($data->gender)?$data->gender:'',
															'class'=>"field size1"));
									?>
									
								</p>								
									
							<div class="buttons">
							<input type="button" class="button" value="preview" />
							<input type="submit" class="button" value="submit" />
						</div>
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						
						<!-- End Form Buttons -->
					</form>
				</div>
				<!-- End Box -->