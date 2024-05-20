<?php
require_once './commons/mysql.php';
$rooms = $Db->query('SELECT r.title  , r.id as id , r.discription , r.created_at , u.fname , u.lname  from rooms  as r inner join users as u on u.id = r.created_by')->getRows();



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
                    <button onclick="toogleClose('modal1')" class="btn fa-solid fa-lock"></button>
                    <button class="btn fa-solid fa-pen-to-square"></button>
                </div>
            </div>


        <?php
        }
        ?>


    </div>
</div>

<div id = 'modal1' class="modal">
    <div onclick="toogleClose('modal1')" class='overlay'></div>

    <div class='confirm content'>
        <div>
        <button onclick="toogleClose('modal1')" class="fa-solid fa-xmark"></button>
        </div>
        <div>
            Are You sure you want to delete this room,
           
        </div>
        <div class=''>
            <button>
                Yes
            </button>
            <button onclick="toogleClose('modal1')">
                no
            </button>
        </div>
    </div>
</div>

<script>
    function toogleClose(id) {
  var x = document.getElementById(id);
  if (x.style.display === "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }
}
</script>
<style>
    #modal1{
        display: none;
    }
    .confirm {
        background: white;
        width: min(calc(100% - 2rem), 500px);
        z-index: 1000;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-self: center;
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
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;

        background-size: cover;
    }


    .room {
        display: flex;
        border-radius: 7%;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        background-color: blue;
        color: black;
        font-size: 1.5rem;
    }

    .room_container {
        width: 150px;
        height: 150px;
        position: relative;
    }

    .room_container .btn {
        padding: 0.3rem 0.3rem;
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
</style>