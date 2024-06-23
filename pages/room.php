<?php
require_once './commons/mysql.php';
if (!isset($_GET['id'])) {
    header('Location: ./index.php');
}
$room = $Db->query('SELECT r.title  ,
 r.id as id ,r.isclosed, r.discription , r.created_at , u.fname ,
  u.lname  from rooms  as r inner join users as u on u.id = r.created_by 
  where r.id = ?', [$_GET['id']])->getRows()[0];



// dd($room);
?>
<div class='body page_padding '>
    <div class='room'>
        <h1>
            Chat Room
        </h1>
        <div>
            <span>Title:</span>
            <h1> <?php echo $room['title'] ?> </h1>
        </div>


        <div>
            <span>Created by:</span>
            <h1> <?php echo $room['fname'] . " " . $room['lname'] ?> </h1>
        </div>

        <div>
            <span>Created at:</span>
            <h2> <?php echo $room['created_at'] ?> </h2>
        </div>

        <div>
            <span>Discription</span>
            <div> <?php echo $room['discription'] . $room['isclosed'] ?> </div>
        </div>
        <?php
        if ($room['isclosed'] == 1) {

        ?>

            <div class='cls_msg'>
                This room has been closed
            </div>
        <?php
        }
        ?>
        <a class='enter_room' href="./?page=room_chats&room=<?php echo $_GET['id'] ?>">
            Enter room
        </a>
    </div>
</div>

<style>
    .body {
        padding-top: 50px;
    }

    .enter_room {
        text-align: center;
        background-color: #2980b9;
        font-size: 1.5rem;
        border-radius: 2rem;
        margin-top: 2rem;
    }

    .enter_room:hover {
        background: blue;
        color: white;
    }

    .room {
        margin-inline: auto;
        width: min(500px, 100%);
        display: flex;
        flex-direction: column;
        gap: 1rem;
        color: white;
        background-color: #1D3159;
        padding: 40px;
        border-radius: 40px;
        /* border: 8px solid #463f3f; */
        ;

    }

    .cls_msg {
        text-align: center;
        text-align: center;
        background: #9b4c1e;
        color: white;
        font-size: 1.3rem;
        border-radius: 10px;
        padding: 2rem 1rem;
    }

    .room>div {
        display: flex;
        flex-direction: column;

    }

    .room>a {
        text-decoration: none;
        font-weight: 600;
        padding: 2rem 1rem;
        color: black;
    }
</style>