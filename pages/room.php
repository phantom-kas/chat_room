<?php
require_once './commons/mysql.php';
if(!isset($_GET['id'])){
    header('Location: ./index.php');
}
$room = $Db->query('SELECT r.title  ,
 r.id as id , r.discription , r.created_at , u.fname ,
  u.lname  from rooms  as r inner join users as u on u.id = r.created_by 
  where r.id = ?',[$_GET['id']] )->getRows()[0];



// dd($room);
?>
<div class='body page_padding '>
    <div class='room'>
        <h1>
            Chat Room
        </h1>
        <div>
            <span>Title</span>
            <span> <?php  echo $room['title']?> </span>
        </div>


        <div>
            <span>Created by</span>
            <span> <?php  echo $room['fname']." ". $room['lname']?> </span>
        </div>

        <div>
            <span>Created at</span>
            <span> <?php  echo $room['created_at']?> </span>
        </div>

        <div>
            <span>Discription</span>
            <div> <?php  echo $room['discription']?> </div>
        </div>

        <a href='./?page=room_chats'>
            Enter room
        </a>
    </div>
</div>

<style>
.body {
    padding-top: 50px;
}

.room {
    margin-inline: auto;
    width: min(500px, 100%);
    display: flex;
    flex-direction: column;
    gap: 1rem;


}

.room>div {
    display: flex; 
    flex-direction: column; 

}

.room>a {
    background: blue;
    padding: 2rem 1rem;
    color: black;
}
</style>