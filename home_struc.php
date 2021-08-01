<div class="container col-6 register-form">
    <div class="row">
        <?php if(isset($posts) && count($posts) != 0){ for($i = 0;$i < count($posts);$i++){ ?>
            <div class="card" style="margin-top: 39px">
                <img src="<?php echo imagePath($posts[$i][5])?>" style="height: 200px" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $posts[$i][1]; ?></h5>
                    <p class="card-text"><?php echo $posts[$i][2]; ?></p>
                    <a href="like.php?like=<?php echo $posts[$i][0]; ?>" class="btn btn-primary"><?php echo Like::LikesCount($posts[$i][0]); ?>like<i style="margin-left: 5px" class="far fa-thumbs-up"></i></a>
                    <a href="profile.php?comment=<?php echo $posts[$i][0]; ?>" class="btn btn-primary">show comments <i style="margin-left: 5px" class="far fa-comment-alt"></i></a>
                </div>
                <div class="card-footer">
                    <form action="comment.php" method="post">
                        <div class="mb-3">
                            <input type="number" name="post_id" value="<?php echo $posts[$i][0]; ?>" class="form-control" id="post_id" hidden>
                            <input type="text" name="comment" class="form-control" id="comment">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">add comment</button>
                    </form>
                    <?php
                        $comments = Comment::getComments($posts[$i][0]);
                    ?>
                    <ul class="list-group list-group-flush">
                        <?php for($s=0;$s<count($comments);$s++){ ?>
                            <li class="list-group-item"><?php echo $comments[$s][1]; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } }?>
    </div>
</div>