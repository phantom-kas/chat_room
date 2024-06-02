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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
#main {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-direction: column;
    width: 100%;
    height: 100%;
    padding-top:  var(--navheight);
}

.navbar>div {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding-block: 0.3rem;
  
    gap: 2rem;
    
    
   
}

.navbar {
    background: gray;
    height: var(--navheight);
    position: fixed;
    width:100vw;
        top: 0px;
        left: 0px;
    -webkit-box-shadow: -1px 2px 5px 6px rgba(0,0,0,0.63);
-moz-box-shadow: -1px 2px 5px 6px rgba(0,0,0,0.63);
box-shadow: -1px 2px 5px 6px rgba(0,0,0,0.63);
}

.logo {
    margin-right: auto;
}

.profile_image{
    width:2.6rem;
    height:2.6rem;
    border-radius:50%
}
.imgcc{
    display: flex;
    align-items: center;
    justify-content: center;
    gap:0.5rem
}

.navbar>div>a{
    display: flex;
    align-items: center;
    flex-direction: column;
    gap: 0.1rem;
    text-decoration: none;
    color: white;
}

.navbar>div>a>i{
    font-size: 2rem;
    color: white;
}

@media screen and (max-width:800px) {
    .navbar>div>a>span{
        font-size: 0.7rem;
        text-align: center;
    } 
    .navbar{
        top:unset;
        bottom: 0vh;
        height: unset;
        
    }
    #main{
        padding-top: 1rem;
        margin-top: unset;
    }
    #main{
    height: calc(100% - var(--navheight));
}

}

</style>

<body>
    <header class='navbar'>
        <div class='page_padding'>
            <div class='logo'>
                <img src="" alt="">
            </div>
            <a href="?page=rooms" class=''>
            <i class="fa-solid fa-comments"></i>
                <span>Rooms</span>
            </a>
            <a href="?page=users" class=''>
            <i class="fa-solid fa-users"></i>
                <span>Users</span>
            </a>
            <a href="?page=create_room" class=''>
            <i class="fa-solid fa-plus"></i>
               <span>
               Create room
               </span>
            </a>
            <a href="?page=profile_info" class=imgcc>
                <img class='profile_image' src="<?php echo  $_SESSION['image_url']?>" alt="image">
                <span>
                Profile info
                </span>
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