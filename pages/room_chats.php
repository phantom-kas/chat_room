<?php
require_once './commons/mysql.php';
if (!isset($_GET['room'])) {
    header('Location: ./index.php');
}
$roomData = $Db->query("SELECT title FROM rooms where id = ?", [$_GET['room']])->getRows();
$messages = $Db->query('SELECT r.title,rm.from_user,
 rm.messages,rm.created_at, rm.image_file_name ,
  u.fname,u.lname,u.username,u.profile_image_filename FROM `room_messages`
   as rm inner join users as u on rm.from_user = u.id
    inner join rooms as r on rm.room_id = r.id where r.id = ? ORDER by rm.id asc;
', [$_GET['room']])->getRows();
?>
<div class='body page_padding  chats '>
    <div class='chat_room_title row_flex'>
        <h2>
            <?php
            echo $roomData[0]['title']
            ?>
        </h2>
    </div>
    <div class='  chats_body'>
        <div id=mmmmmm class='ch column_flex'>
            <?php
            for ($i = 0; $i < count($messages); $i++) {
                $class = $messages[$i]['from_user'] == $_SESSION['user_id'] ? 'mine' : '';
            ?>

                <div class='chat column_flex <?php echo $class ?>'>
                    <div class='user_avater row_flex'>
                        <img src="./src/profileimages/<?php echo $messages[$i]['profile_image_filename'] ?>" alt="">
                        <span><?php echo $messages[$i]['username'] ?></span>
                    </div>
                    <div class='msg'>
                        <?php echo $messages[$i]['messages'] ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <form id='form' onsubmit="handleSubmit();return false" class='chat_input row_flex'>
            <input type="hidden" name="uid" value=<?php
                                                    echo "{$_SESSION['user_id']}";
                                                    ?>>
            <input type="hidden" name="room_id" value=<?php
                                                        echo "{$_GET['room']}";
                                                        ?>>
            <textarea name="message" id="message_input" cols="30" rows="10"></textarea>
            <div class='column_flex'>
                <button class='send_btn'>send</button>
            </div>
        </form>
    </div>
</div>
<?php
$id = $_SESSION['user_id'];
$username = "'" . $_SESSION['username'] . "'";
$image = "'" . $_SESSION['image_url'] . "'";
?>

<script type="text/javascript">
    var userid = <?php echo $id; ?>;
    var username = <?php echo $username; ?>;
    var imageurl = <?php echo $image; ?>;
    var room = <?php echo $_GET['room']; ?>;
</script>

<script src="https://localhost:8181/socket.io/socket.io.js"></script>
<script src='./src/js/connect_socket.js'>
</script>
<script src='./src/js/handle_sockets.js'>
</script>
<script src='./src/js/functions.js'></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
        scrollToBottom('mmmmmm')
    })

    console.log(userid + username + imageurl);
    const handleSubmit = async () => {
        var formData = new FormData(document.querySelector('form'))
        let response = await fetch("http://localhost/chat_room/api/?route=sendmessage", {
            method: "POST",
            body: formData,
        });
        let data = await response.json();
        if (data.status == 'success') {
            // var div = document.createElement('div'); //container to append to
            // div.classList.add('chat', 'column_flex', 'mine')
            // div.innerHTML = `
            //         <div class='user_avater row_flex'>
            //             <img src="${imageurl} " alt="">
            //             <span> ${username}</span>
            //         </div>
            //         <div class='msg'>
            //           ${formData.get('message')} 
            //         </div>`;
            // document.querySelector('.ch').append(div)

            addMessage( formData.get('message'),imageurl,username,true)
            document.querySelector('#message_input').value = ''
            scrollToBottom('mmmmmm')
            socket.emit('send',{message:formData.get('message'),userid,room,imageurl,username})
        }
    }
</script>
<style>
    .chat {
        background: white;
        padding: 2rem 1rem;
        box-shadow: -1px 6px 4px 0px #00000078;
        border-radius: 0.7rem;
        margin-inline: 0.5rem;
        width: min(500px, 100%);
    }

    .mine .user_avater {
        flex-direction: row-reverse;
    }

    .user_avater {
        align-items: center;
        gap: 0.5rem;
    }

    .user_avater img {
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
    }

    .ch {
        gap: 1rem;
        display: flex;
        flex-direction: column;
        height: calc(100% - 5rem);
        overflow: scroll;
        padding-bottom: 1rem;
        overflow-y: scroll;
        overflow-x: hidden;
        width: 100%;
    }

    .chats {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        height: 100%;

    }

    .mine {
        align-items: flex-end;
        align-self: end;

    }

    .mine>.msg {
        text-align: right;
    }

    .chat_room_title {
        width: 100%;

        padding-bottom: 0.5rem;
    }

    .chats_body {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .chats_body {
        justify-content: space-between;
        height: calc(100% - 3rem);
        width: 100%;
    }

    .chat_input {
        height: 4rem;
        width: 100%;
        gap: 1rem
    }

    .chat_input>* {
        height: 100%
    }

    .chat_input>textarea {
        flex-grow: 1;
    }

    .chat_input>div {
        justify-content: center;
    }

    .send_btn {
        padding-inline: 1rem;
        padding-block: 0.5rem;
        background: blue;
        height: 100%
    }
</style>