<div class="row">
	<div class="col-md-9">
		<h4 class="page-header">Load images from Google</b></h4>
	</div>
</div>

<div class="row col-md-12">
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="col-md-12">
			<div class="form-group">
                <label for="url" class="col-md-2 control-label">Select emotion* :</label>
                <div class="col-md-10">
                    <select name="emotion" class="form-control">
                        <option selected value="anger">Anger</option>
                        <option selected value="contempt">Contempt</option>
                        <option selected value="disgust">Disgust</option>
                        <option selected value="fear">Fear</option>
                        <option selected value="happiness">Happiness</option>
                        <option selected value="sadness">Sadness</option>
                        <option selected value="surprise">Surprise</option>
                    </select>
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
