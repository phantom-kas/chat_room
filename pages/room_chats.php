<?php
require_once './commons/mysql.php';
if (!isset($_GET['room'])) {
    header('Location: ./index.php');
}
$roomData = $Db->query("SELECT isclosed,title FROM rooms where id = ?", [$_GET['room']])->getRows();
$messages = $Db->query('SELECT  r.title,rm.from_user,
 rm.messages,rm.created_at, rm.image_file_name ,
  u.fname,u.lname,u.username,u.profile_image_filename FROM `room_messages`
   as rm inner join users as u on rm.from_user = u.id
    inner join rooms as r on rm.room_id = r.id where r.id = ? ORDER by rm.id asc;
', [$_GET['room']])->getRows();
?>
<style>
    .chat {


        margin-inline: 0.5rem;
        width: min(250px, 100%);
        gap: 1rem;
    }

    .mine .user_avater {
        flex-direction: row-reverse;
    }

    .mine {
        flex-direction: row-reverse;
    }

    .user_avater {
        align-items: center;
        gap: 0.5rem;
    }

    .user_avater img {
        width: 2.3rem;
        height: 2.3rem;
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

    .msg>span {
        font-size: 0.7rem;
        color: blue;
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

    .msg {
        box-shadow: -1px 6px 4px 0px #00000078;
        background-color: white;
        padding: 0.7rem 1rem;

        border-radius: 0.7rem;
    }

    .mine>.msg {
        text-align: right;
    }

    .chat_room_title {
        width: 100%;

        padding-block: 0.7rem;
        padding-bottom: 0.5rem;
        width: 100%;
        padding-bottom: 0.5rem;
        text-align: center;

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
        border-radius: 1rem;
        padding: 1rem;
        font-size: 1.1rem;
    }

    .chat_input>div {
        justify-content: center;
    }

    .send_btn {
        background: #2980b9;
    }

    .send_btn {

        padding-inline: 1rem;
        padding-block: 0.5rem;

        height: 100%;
        font-size: 2rem;
        color: white;
        border-radius: 1rem;
    }

    .send_btn:hover {
        background-color: blue;
    }

    .cccc {
        display: flex;
        justify-content: center;
        text-align: center;
        padding: 0.3rem 2rem;
        color: white;
        margin-left: 1rem;
        background: #ff3030;
        border-radius: 10px;
        font-weight: 700;
    }
</style>
<div class='body page_padding  chats '>
    <div class='chat_room_title row_flex'>
        <h2>
            <?php
            echo $roomData[0]['title']
            ?>
        </h2>

        <?php
        if ($roomData[0]['isclosed'] == 1) {
            echo "  <span class='cccc'> CLosed</span>";
        }
        ?>

    </div>
    <div class='  chats_body'>
        <div id=mmmmmm class='ch column_flex'>
            <?php
            for ($i = 0; $i < count($messages); $i++) {
                $class = $messages[$i]['from_user'] == $_SESSION['user_id'] ? 'mine' : '';
            ?>

                <div class='chat row_flex <?php echo $class ?>'>
                    <div class='user_avater row_flex'>
                        <img src="./src/profileimages/<?php echo $messages[$i]['profile_image_filename'] ?>" alt="">

                    </div>
                    <div class='msg'>
                        <span><?php echo $messages[$i]['username'] ?></span>
                        <div>
                            <?php echo $messages[$i]['messages'] ?>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>

        <?php
        if ($roomData[0]['isclosed'] != 1) {
        ?>
            <form id='form' onsubmit="handleSubmit();return false" class='chat_input row_flex'>
                <input type="hidden" name="uid" value=<?php
                                                        echo "{$_SESSION['user_id']}";
                                                        ?>>
                <input type="hidden" name="room_id" value=<?php
                                                            echo "{$_GET['room']}";
                                                            ?>>
                <textarea name="message" id="message_input" cols="30" rows="10"></textarea>
                <div class='column_flex'>
                    <button class='send_btn fa-solid fa-paper-plane'></button>

                </div>
            </form>
        <?php
        }
        ?>
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

            addMessage(formData.get('message'), imageurl, username, true)
            document.querySelector('#message_input').value = ''
            scrollToBottom('mmmmmm')
            socket.emit('send', {
                message: formData.get('message'),
                userid,
                room,
                imageurl,
                username
            })
        }
    }
</script>