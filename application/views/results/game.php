<div class="row">
	<div class="col-md-9">
        <h4 class="page-header">Results of game <b>#<?php echo $game_id ?></b> from <b><?php echo $username ?></b></h4>
	</div>
</div>

<div class="col-md-12">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Picture</th>
            <th scope="col">Emotion</th>
            <th scope="col">Answered</th>
            <th scope="col">Result</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($stats as $question){ ?>
            <tr class="table-active">
                <td>
                    <div class="col-md-2" style="border:1px lightgray dotted">
                        <img class="col-md-12 picture" src="<?php echo $question['image_url']?>" />
                    </div>
                </td>
                <td><?php echo $question['emotion'] ?></td>
                <td><?php echo $question['answer'] ?></td>
                <td>
                    <?php if($question['result']){
                        echo "<i class='text-success fa fa-check' />";
                    } 
                    else{
                        echo "<i class='text-danger fa fa-times' />";
                    }?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <div class="form-group">
        <div class="col-md-10 col-md-offset-10">
            <a class="btn btn-link" href="<?php echo site_url('/results/index')?>">Back</a>
        </div>
    </div>
</div>
