<div class="container col-8 register-form">
    <div class="row">
        <?php if(!isset($user_data)){?>
            <div class="col-md-2 profile-side">
                <div class="d-flex justify-content-center">
                    <a href="profile.php?edit_profile"><i class="fas fa-edit" style="position: absolute;margin-top: 90px;color: #04AA6B;margin-left: 90px"></i></a>
                    <img src="<?php echo imagePath($user['image']) ?>" class="profile-image" alt="">
                </div>
                <div class="d-flex justify-content-center">
                    <h4><?php echo $user['name']; ?></h4>
                </div>
                <div class="d-flex justify-content-center">
                    <p><?php echo $user['email']; ?></p>
                </div>
                <div class="d-flex justify-content-center">
                    <p><?php echo $user['phone']; ?></p>
                </div>
            </div>
            <div class="row col-md-9 profile-main">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary btn-sm" style="margin-left: 510px;margin-bottom: 15px" onclick="showForm()">add post</button>
                        <div class="card new-post" <?php if(!isset($post)){?>style="display: none"<?php } ?>>
                            <div class="card-body">
                                <h6>Add New Post</h6>
                                <form action="profile.php" method="post" enctype="multipart/form-data">
                                    <?php if(isset($post)){?>
                                        <input type="number" <?php if(isset($post)){?>value="<?php echo $post['id']; ?>" <?php } ?> name="id" class="form-control" id="exampleFormControlInput1" hidden>
                                    <?php } ?>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                                        <input type="text" <?php if(isset($post)){?>value="<?php echo $post['title']; ?>" <?php } ?> name="title" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Subject</label>
                                        <textarea class="form-control" name="subject" id="exampleFormControlTextarea1" rows="3"><?php if(isset($post)){echo $post['subject']; } ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload Image</label>
                                        <input class="form-control" type="file" id="formFile" name="postImage">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">save</button>
                                </form>
                            </div>
                        </div>
                        <?php if(isset($posts) && count($posts) != 0){ for($i = 0;$i < count($posts);$i++){ ?>
                            <div class="card" style="margin-top: 39px">
                                <img src="<?php echo imagePath($posts[$i][5])?>" style="height: 200px" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $posts[$i][1]; ?></h5>
                                    <p class="card-text"><?php echo $posts[$i][2]; ?></p>
                                    <a href="profile.php?edit=<?php echo $posts[$i][0]; ?>" class="btn btn-primary">edit</a>
                                    <a href="profile.php?delete=<?php echo $posts[$i][0]; ?>" class="btn btn-danger">delete</a>
                                </div>
                            </div>
                        <?php } }?>
                    </div>
                </div>
            </div>
        <?php } else if(isset($user_data)){?>
            <div class="d-flex justify-content-center">
                <div class="row col-8">
                    <h4>Update Profile</h4>
                    <form action="profile.php?update_profile" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" value="<?php echo $user_data['name']; ?>" name="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" value="<?php echo $user_data['phone']; ?>" name="phone" class="form-control" id="phone">
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-6">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="col-6">
                            <label for="inputCity" class="form-label">City</label>
                            <input type="text" name="city" class="form-control" id="inputCity">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Image</label>
                            <input class="form-control" type="file" id="formFile" name="postImage">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">save</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</div>