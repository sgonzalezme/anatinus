<div class="row">
	<div class="col-lg-9">
		<h4 class="page-header">Results for <?php echo urldecode($emotion) ?></h4>
	</div>
</div>

<div class="row col-md-12">
    <form action="<?php echo site_url('/loadfromgoogle/save') ?>" method="POST">
        <input type="hidden" name="emotion" value="<?php echo $emotion ?>">
        <p><?php if(!empty($results) ){
            foreach ($results as $key => $result){
                echo '<div class="col-md-4" style="border:1px lightgray dotted">';
                    echo "<img src='{$result['link']}' height='200px' class='col-md-12' />";
                    echo "<p>{$result['emotion']}</p>";
                    echo '<p class="col-md-12">
                        <input type="checkbox" value=\'' . json_encode($result) . '\' name="pics[]" />
                        Save
                    </p>';
                echo '</div>';
            }
        }?></p>

        <div class="form-group">
            <div class="col-md-7">
                <br/><br/>
                <label for="emotion">Save image(s):</label> <br/>
                <br/><br/>
                <button type="submit" class="btn btn-default">Save selected images</button>
            </div>
        </div>
    </form>
</div>
