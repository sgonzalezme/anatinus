<div class="row">
	<div class="col-lg-9">
		<h4 class="page-header">Results for <?php echo $emotion ?></h4>
	</div>
</div>

<div class="row col-md-12">
    <form action="<?php echo site_url('/loadfromgoogle/save') ?>" method="POST">
        <p><?php if(!empty($results) ){
            foreach ($results as $key => $result){
                echo '<div class="col-md-4" style="border:1px lightgray dotted">';
                    echo "<img src='$result' height='200px' class='col-md-12' />";

                    echo '<p class="col-md-12">
                        <input type="checkbox" value="' . $result . '" name="pics[]" />
                        Save
                    </p>';
                echo '</div>';
            }
        }?></p>

        <div class="form-group">
            <div class="col-md-10 col-md-offset-10">
                <a class="btn btn-link" href="<?php echo site_url('/loadfromgoogle/create')?>">Volver</a>
                <button type="submit" class="btn btn-default">Save selected images</button>
            </div>
        </div>
    </form>
</div>
