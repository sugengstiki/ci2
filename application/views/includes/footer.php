</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			<div id="sidebar">
				<?php 
				if (isset($right_sidebar)){
				
					if (is_array($right_sidebar)){
						foreach ($right_sidebar as $box){
							$this->load->view($box);
						}
					} else	$this->load->view($right_sidebar);
				}
				?>
				<!-- End Box -->
				
			</div>
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; 2010 - STIKI</span>
		<span class="right">
			Design by <a href="http://chocotemplates.com" target="_blank" title="The Sweetest CSS Templates WorldWide">Chocotemplates.com </a>
		</span>
	</div>
</div>
<!-- End Footer -->
<?php if (isset($script_foot)) echo $script_foot;?>
<?php echo put_scripts(); ?>

</body>
</html>