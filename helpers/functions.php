<?php

# Session Started ...
//session_start();

# Clean input ...
function CleanInputs($input){

    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);

    return $input != null ? $input : false;
}


# Validate Inputs ....
function Validator($input,$flag,$length=3){

    $status = true;

    if(empty($input)){
        $status = false;
    }

    switch ($flag) {
        case 2:
            if(strlen($input) < $length){
                $status = false;
            }
            break;

        case 3:
            if(!filter_var($input,FILTER_VALIDATE_INT)){
                $status = false;
            }
            break;

        case 4:
            if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
                $status = false;
            }
            break;

        case 5:
            $allowedExtension = ['png','jpg'];

            if(!(in_array($input,$allowedExtension))){
                $status = false;
            }
            break;

    }

    return $status;
}



# SANITIZE INPUTS ...
function Sanitize($input,$flag){

    $sanitize_var = $input;

    switch ($flag) {
        case 1:

            $sanitize_var = filter_var($sanitize_var,FILTER_SANITIZE_NUMBER_INT);
            break;

        case 2:
            $sanitize_var = filter_var($sanitize_var,FILTER_SANITIZE_STRING);
            break;

    }

    return $sanitize_var;
}


/**
 * @param $dis
 * @return string
 */
function dashboardUrl($dis){
    return "http://".$_SERVER['HTTP_HOST']."/group4/Blog/Admin/".$dis;
}

/**
 * @param $dis
 * @return string
 */
function webUrl($dis){
    return "http://".$_SERVER['HTTP_HOST']."/socialite/".$dis;
}

function imagePath($image){
    return "http://".$_SERVER['HTTP_HOST']."/socialite/layouts/imgs/".$image;
}


function uploadImage($image){
    if(!empty($image)){
        $tmp_path = $image['tmp_name'];
        $name     = $image['name'];

        $nameArray = explode('.',$name);
        $FileExtension = strtolower($nameArray[1]);

        $FinalName = rand().time().'.'.$FileExtension;

        $allowedExtension = ['png','jpg','pdf','mp4'];

        if(in_array($FileExtension,$allowedExtension)){
            $disFolder = './layouts/imgs/';
            $disPath  = $disFolder.$FinalName;
            move_uploaded_file($tmp_path,$disPath);
        }
        return $FinalName;
    }
}

?>