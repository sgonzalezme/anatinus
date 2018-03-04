<div class="row">
	<div class="col-md-9">
		<h4 class="page-header">Load images from file</b></h4>
	</div>
</div>

<div class="row col-md-12">
    <?php if(!empty($success) || !empty($result) ){?>
        <div class="col-md-12 <?php echo ($success? ' alert alert-success ' : 'alert alert-warning ') ?> ">
            <?php echo (!empty($result) ? $result : ''); ?>
        </div>
    <?php }?>
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="col-md-6">
            <div class ="col-md-12">
                <label for="url" class=" control-label">Emotion* :</label>
                <select name="emotion" class="col-md-8 form-control">
                    <option selected value="anger">Enfado</option>
                    <option selected value="contempt">Desprecio</option>
                    <option selected value="disgust">Asco</option>
                    <option selected value="fear">Miedo</option>
                    <option selected value="happiness">Felicidad</option>
                    <option selected value="sadness">Tristeza</option>
                    <option selected value="surprise">Sorpresa</option>
                </select>
			</div>
            <div class="col-md-12" style="margin-top: 20px">
                <label for="picture" class="control-label">File* :</label>
                <input type="file" id="picture" name="picture" />
            </div>
			<div class="form-group">
				<div class="col-md-10 col-md-offset-10">
					<a class="btn btn-link" href="<?php echo site_url('/')?>">Volver</a>
					<button type="submit" class="btn btn-default">Load</button>
				</div>
			</div>
		</div>
		
	</form>	

</div>