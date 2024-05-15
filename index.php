<?php
require_once './session.php';
require_once './commons/env.php';
require_once './commons/function.php';

$page = '';
if(!isset($_GET['page'])){
    $page = './pages/rooms.php';
}
else{
    $page = './pages/'.$_GET['page'].'.php';
}
if(isset($_GET['page'])){
    if(!file_exists($page)){
        $page = './other_pages/not_found.php';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/styles.css" class="css">
</head>
<style>
#main {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-direction: column;
    width: 100%
}

.navbar>div {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding-block: 1rem;
    background: green;
    gap: 2rem
}

.logo {
    margin-right: auto;
}
</style>

<body>
    <header class='navbar'>
        <div class='page_padding'>
            <div class='logo'>
                Logo
            </div>
            <a href="?page=rooms" class=''>
                Rooms
            </a>
            <a href="?page=users" class=''>
                Users
            </a>
            <a href="?page=create_room" class=''>
                Create room
            </a>
            <a href="?page=profile_info">
                Profile info
            </a>
        </div>
    </header>
    <div id='main'>
        <?php
   // echo "welcome ".$_SESSION['username'];
    require_once $page
    ?>
    </div>

</body>

</html>