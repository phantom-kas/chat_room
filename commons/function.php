<?php

function dd($x)
{
    
        var_dump($x);
    
    die;
}

function upload($filename,$target){
    return move_uploaded_file($_FILES[$filename]["tmp_name"], $target);
}

function isAdmin():bool{
    if(!isset($_SESSION['role'])){
        return false;
    }
    if($_SESSION['role'] != 'admin'){
        return false;
    }
    return true;
}
function tohome(){
    $previous = "javascript:history.go(-1)";

    header('Location: ./index.php');

}
function toJson($data){
    return json_encode($data , true);
    }
    function goBack(){
        $previous = "javascript:history.go(-1)";
    if(isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    
      //  header('location:'$previous );
        header('Location: '.$previous);
    }
    }
?>