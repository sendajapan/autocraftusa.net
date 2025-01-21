<?=$this->extend('admin/master/layout')?>
<?=$this->section('content')?>

<div class="main">
	<div class="main-inner">
	    <div class="container">
	      <div class="row">
	      	<div class="span12">

			
			
	      		<div class="widget ">
	      			<div class="widget-header">
	      				<i class="icon-cog"></i>
	      				<h3>Pages Content</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<div class="tabbable">
							<div class="tab-content">

								<form id="edit-profile" action="<?=base_url('admin/content/store')?>" method="post" class="form-horizontal" enctype="multipart/form-data">

									<fieldset>

										<div class="control-group">
											<label class="control-label" for="route">Route *</label>
											<div class="controls">
													<input type="text" class="span6" id="route" name="route" required>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">
											<label class="control-label" for="route">Criteria</label>
											<div class="controls">
													<input type="text" class="span6" id="criteria" name="criteria">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label" for="content">Content</label>
											<div class="controls">
												<div class="span6" style="margin:0;">
													<textarea name="content" rows="6" cols="50" style="width: 73%;"></textarea>
												</div> <!-- /controls -->
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->


										<div class="control-group">
											<label class="control-label" for="meta_title">Meta Title</label>
											<div class="controls">
													<input type="text" class="span6" id="meta_title" name="meta_title">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="meta_description">Meta Description</label>
											<div class="controls">
												<div class="span6" style="margin:0;">
													<textarea name="meta_description" rows="6" cols="50" style="width: 73%;"></textarea>
												</div> <!-- /controls -->
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">
											<label class="control-label" for="meta_h1">Meta H1</label>
											<div class="controls">
													<input type="text" class="span6" id="meta_h1" name="meta_h1">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label" for="noindex">No Index</label>
											
											<div class="controls">
												<select class="span5" id="noindex" name="noindex" style="width: 42%;">
													<option value="0">No</option>
													<option value="1">Yes</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

                    <div class="control-group">											
											<label class="control-label" for="visibility">Visibility</label>
											
											<div class="controls">
												<select class="span5" id="visibility" name="visibility" style="width: 42%;">
													<option value="1">Show</option>
													<option value="0">Hide</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
										
										 <br />
										
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Save</button> 
											<a href="<?=base_url('admin/content')?>" class="btn">Cancel</a>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								
								
							</div>
						  
						  
						</div>
						
					</div> <!-- /widget-content -->
				</div> <!-- /widget -->
		    </div> <!-- /span8 -->
	      	
	      </div> <!-- /row -->
	    </div> <!-- /container -->
	</div> <!-- /main-inner -->
</div> <!-- /main -->


<?=$this->endsection()?>


