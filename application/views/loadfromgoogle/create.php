<div class="row">
	<div class="col-md-9">
		<h4 class="page-header">Load images from Google</b></h4>
	</div>
</div>

<div class="row col-md-12">
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="col-md-12">
			<div class="form-group">
                <label for="url" class="col-md-2 control-label">Search an emotion* :</label>
                <div class="col-md-10">
                    <input class="form-control" required name="emotion" id="emotion" placeholder="happy child" value="happy child" />
                </div>
			</div>
			
			<div class="form-group">
				<div class="col-md-10 col-md-offset-10">
					<a class="btn btn-link" href="<?php echo site_url('/')?>">Back</a>
					<button type="submit" class="btn btn-default">Search</button>
				</div>
			</div>
		</div>
		
	</form>	

</div>
