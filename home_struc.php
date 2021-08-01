<div class="container col-6 register-form">
    <div class="row">
        <?php if(isset($posts) && count($posts) != 0){ for($i = 0;$i < count($posts);$i++){ ?>
            <div class="card" style="margin-top: 39px">
                <img src="<?php echo imagePath($posts[$i][5])?>" style="height: 200px" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $posts[$i][1]; ?></h5>
                    <p class="card-text"><?php echo $posts[$i][2]; ?></p>
                </div>
            </div>
        <?php } }?>
    </div>
</div>