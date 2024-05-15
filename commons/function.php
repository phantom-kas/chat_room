<?php

function dd($x)
{
    
        var_dump($x);
    
    die;
}

function upload($filename,$target){
    return move_uploaded_file($_FILES[$filename]["tmp_name"], $target);
}
?>