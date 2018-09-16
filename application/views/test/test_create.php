<div class="row">
    <?php if(!empty($result)){?>
        <div class="col-md-12 jumbotron">
            <h4>Results:</h4>
            <div class="col-md-3">
                <img class="col-md-12 picture" src="<?php echo $result['image'] ?>" />
            </div>
            <div class="col-md-8">
                <ul>
                    <?php foreach ($result['emotions'] as $emotion){ ?>
                        <li><?php echo $emotion['Type'] . '(' . $emotion['Confidence'] . '%)' ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php }?>
    <div class="col-md-9">
        <h4 class="page-header">Check images from file</b></h4>
    </div>
</div>

<div class="row col-md-12">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
            <div class="col-md-12" style="margin-top: 20px">
                <label for="picture" class="control-label">File* :</label>
                <input required type="file" id="picture" name="picture" />
            </div>
            <div class="form-group">
                <div class="col-md-10 col-md-offset-10">
                    <a class="btn btn-link" href="<?php echo site_url('/')?>">Back</a>
                    <button type="submit" class="btn btn-default">Check</button>
                </div>
            </div>
        </div>

    </form>

</div>
