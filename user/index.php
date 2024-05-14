<?php
require_once '../session.php';
require_once '../commons/env.php';

$page = '';
if(!isset($_GET['page'])){
    $page = './home.php';
}
else{
    $page = './'.$_GET['page'].'.php';
}

if(!file_exists($page)){
    $page = '../other_pages/not_found.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "welcome ".$_SESSION['username'];
    require_once $page
    ?>
</body>
</html>