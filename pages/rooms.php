<?php
require_once './commons/mysql.php';
$rooms = $Db->query('SELECT r.title  , r.id as id , r.discription , r.created_at , u.fname , u.lname  from rooms  as r inner join users as u on u.id = r.created_by' )->getRows();



//dd($rooms);
?>
<div class="container" >
   
<div class='body page_padding '>

    <?php
    foreach ($rooms as $key => $value) {
      ?>


    <a href="./?page=room&id= <?php echo $value['id'] ?>" class=" room">

        <?php
        echo  $value['title'];
        ?> </a>

    <?php
    }
    ?>


</div>
</div>
<style>
/* .body {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: flex-start;
    gap: 2rem;
    padding-top: 50px;
} */

.picture{

}
.body {
    /* background-color: #4b0082; */
    
    justify-content:center;
    padding: 95px;
    text-align: center;
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
    border-radius: 10px;
    border: 5px solid red;
    background-color: linear-gradient (to bottom right , #000000,#000000)
}
.container{    
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
    /* background: linear-gradient(to bottom right, #FFFFFF,#67B9ff) */
    background-imgage: url(pages/pic.jpg);
    background-size:cover;
}

/* .room {
    padding-inline: 2rem;
    padding-block: 2rem;
    background-color: pink;
    color:
        black;
} */
.room {
    display: flex;
    border-radius: 7%;
    justify-content: center;
    align-items: center;
    width: 150px;
    height: 150px;
    background-color: blue;
    color: black;
    font-size: 1.5rem; 

}

</style>