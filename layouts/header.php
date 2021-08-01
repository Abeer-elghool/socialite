<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="layouts/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Socialite</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if(strpos($_SERVER['PHP_SELF'], 'home') > 0){echo 'active';} ?>" aria-current="page" href="<?php echo webUrl('home.php'); ?>">Home</a>
                </li>
                <?php if(isset($user)){?>
                    <li class="nav-item">
                        <a class="nav-link <?php if(strpos($_SERVER['PHP_SELF'], 'profile') > 0){echo 'active';} ?>" href="<?php echo webUrl('profile.php'); ?>">My Posts</a>
                    </li>
                    <li class="nav-item d-flex dropdown nav-drop">
                        <img src="<?php echo imagePath($user['image']) ?>" class="nav-image" alt="">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $user['name'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo webUrl('profile.php'); ?>">profile</a></li>
                            <li><a class="dropdown-item" href="<?php echo webUrl('logout.php'); ?>">logout</a></li>
                        </ul>
                    </li>
                <?php }?>
            </ul>
            <!--<form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>-->
        </div>
    </div>
</nav>