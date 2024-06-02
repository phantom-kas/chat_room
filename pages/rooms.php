<?php
require_once './commons/mysql.php';
$rooms = $Db->query('SELECT r.title ,r.isclosed  , r.id as id , r.discription , r.created_at , u.fname , u.lname  from rooms  as r inner join users as u on u.id = r.created_by')->getRows();



//dd($rooms);
?>
<div class="container">

    <div class='body page_padding '>

        <?php
        foreach ($rooms as $key => $value) {
        ?>

            <div class='room_container'>

                <a href="./?page=room&id=<?php echo $value['id'] ?>" class=" room">

                    <?php
                    echo  $value['title'];
                    ?>


                </a>

                <div class='btc_wrapper'>

                    <?php
                    if ($value['isclosed'] == 0) {
                    ?>
                        <button id="action_<?php echo $value['id'] ?>" onclick="toogleClose('modal1');setRoomId(<?php echo $value['id'] ?>);closeRoomT()" class="btn fa-solid fa-lock close_room"></button>

                    <?php
                    } else {
                    ?>
                        <button id="action_<?php echo $value['id'] ?>" onclick="toogleClose('modal1');setRoomId(<?php echo $value['id'] ?>);openRoomT()" class="btn fa-solid fa-unlock open_room"></button>


                    <?php
                    }
                    ?>
                </div>
            </div>


        <?php
        }
        ?>


    </div>
</div>

<div id='modal1' class="modal">
    <div onclick="toogleClose('modal1')" class='overlay'></div>

    <div class='confirm content'>
        <div class='mtop'>
            <button onclick="toogleClose('modal1')" class="fa-solid fa-xmark"></button>
        </div>
        <div class='mdaltxt column_flex'>
            <i class="fa-solid fa-triangle-exclamation fa-beat-fade "></i>
            <span id='mmsg'>
                Are You sure you want to Close this room.No new messages can be sent in this room.
            </span>

        </div>
        <div class='buttoms'>
            <button onclick="closeOrOpenRoom()" class='yes'>
                Yes
            </button>
            <button class='no' onclick="toogleClose('modal1')">
                no
            </button>
            <form id='form'>
                <input type="hidden" id='action' value='close'>
                <input type="hidden" id='room_id' name="id" value="">
                <input type="hidden" name='user_id' value="<?php echo $_SESSION['user_id'] ?>">
            </form>
        </div>
    </div>
</div>

<script>
    const setRoomId = (id) => {
        document.querySelector('#room_id').value = id
    }

    function toogleClose(id) {
        var x = document.getElementById(id);
        //window.alert(x.style.display)
        if (x.style.display === "none" || x.style.display === '') {

            x.style.display = "flex";
        } else {
            x.style.display = "none";
        }
    }

    const closeRoom = async () => {
        var formData = new FormData(document.querySelector('#form'))
        let response = await fetch("http://localhost/chat_room/api/close_room.php", {
            method: "POST",
            body: formData,
        });
        let data = await response.json();
        if (data.status == 'success') {
            window.alert(data.message)
            toogleClose('modal1')
            document.querySelector(`#action_${formData.get('id')}`).outerHTML =
                `
            <button id='action_${formData.get('id')}' onclick="toogleClose('modal1');setRoomId(${formData.get('id')};openRoomT())" class="btn fa-solid fa-unlock open_room"></button>
            `
        }
        if (data.status == 'error') {
           window.alert(data.message)
        }
    }

    const openRoom = async () => {
        var formData = new FormData(document.querySelector('#form'))
        let response = await fetch("http://localhost/chat_room/api/open_room.php", {
            method: "POST",
            body: formData,
        });
        let data = await response.json();
        if (data.status == 'success') {
            window.alert(data.message)
            toogleClose('modal1')
            document.querySelector(`#action_${formData.get('id')}`).outerHTML =
                `
            <button id='action_${formData.get('id')}' onclick="toogleClose('modal1');setRoomId(${formData.get('id')};closeRoomT())" class="btn fa-solid fa-lock close_room"></button>
            `
        }
        if (data.status == 'error') {
            window.alert(data.message)
        }
    }
const closeOrOpenRoom = ()=>{
   // alert(document.querySelector('#action').value)
    if(document.querySelector('#action').value == 'open'){
        openRoom()
        //alert('open')
    }
    else{
        closeRoom()
       // alert('close')
    }
}
    const openRoomT = ()=>{
        document.querySelector('#mmsg').innerHTML = 'Are You sure you want to Open this room.'
        document.querySelector('#action').value='open'

    }
    const closeRoomT = ()=>{
        document.querySelector('#mmsg').innerHTML = 'Are You sure you want to Close this room.No new messages can be sent in this room.'
        document.querySelector('#action').value='close'
    }
</script>
<style>
    .mtop {
        display: flex;
        width: 100%;
        justify-content: flex-end;
        font-size: 3rem;
    }

    .mtop>button {
        font-size: 2rem;
        padding: 0.3rem 0.5rem;
        background: #e74c3c;
        color: white;
    }

    .mtop>button:hover {
        background-color: #ff8174;
    }

    .mdaltxt {
        gap: 1rem;

    }

    .mdaltxt>i {
        font-size: 6rem;
        margin-inline: auto;
        color: orange
    }

    #modal1 .buttoms {
        font-size: 1rem;

        font-size: 1rem;
        display: flex;
        gap: 0.7rem;

    }

    #modal1 {
        display: none;
    }

    button {
        padding: 0.5rem 0.7rem;
    }

    .yes {
        background-color: #27ae60;
    }

    .no {
        background: none;
    }

    .confirm {
        background: white;
        width: min(calc(100% - 2rem), 500px);
        z-index: 1000;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-self: center;
        padding: 2rem;
        gap: 1rem;
    }

    .picture {}

    .body {
        /* background-color: #4b0082; */

        justify-content: center;

        text-align: center;
        display: flex;
        gap: 2rem;
        flex-wrap: wrap;
        border-radius: 10px;

        background-color: linear-gradient (to bottom right, #000000, #000000)
    }

    .container {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        height: 100%;
        width: 100%;
        overflow: scroll;
        padding-top: 1rem;
        overflow-x: hidden;
        padding-bottom: 1rem;
        background-size: cover;
    }


    .room {
        display: flex;

        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;

        color: black;
        font-size: 1.5rem;
        text-decoration: none;
    }

    .room_container {
        width: 150px;
        height: 150px;
        position: relative;
    }

    .room_container .btn {
        padding: 0.5rem 0.9rem;
        cursor: pointer;

        border-radius: 5px;
        font-size: 1.4rem;
    }

    .btc_wrapper {
        position: absolute;
        bottom: 5px;
        right: 2px;
        width: 100%;
        display: flex;
        justify-content: center;
        gap: 0.3rem;
    }

    .room_container {
        border-radius: 7%;
        background: #34495e;
        box-shadow: 3px 3px 1px 2px;
    }

    .room_container:nth-child(2n) {
        background-color: #1abc9c;

    }

    .room_container:nth-child(3n) {
        background-color: #2ecc71;
    }

    .room_container:nth-child(4n) {
        background-color: #3498db;
    }

    .room_container:nth-child(5n) {
        background-color: #9b59b6;
    }

    .room_container:nth-child(6n) {
        background-color: #f1c40f;
    }

    .room_container:nth-child(7n) {
        background-color: #e67e22;
    }

    .room_container:nth-child(8n) {
        background-color: #f39c12;
    }

    /* .room_container:nth-child(2n){
        background-color: red;
    } */

    .close_room ,.open_room {
        background: #e74c3c;
        color: white;
        padding: 2rem;
    }
.open_room{
    background:#27ae60;
}

.open_room:hover{
    background:green;
}
    .close_room:hover {
        background: #c0392b;
    }
</style>