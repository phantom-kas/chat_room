<?php
require_once './commons/mysql.php';
$rooms = $Db->query('SELECT r.title  , r.id as id , r.discription , r.created_at , u.fname , u.lname  from rooms  as r inner join users as u on u.id = r.created_by' )->getRows();



//dd($rooms);
?>
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
<style>
.body {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: flex-start;
    gap: 2rem;
    padding-top: 50px;
}

.room {
    padding-inline: 2rem;
    padding-block: 2rem;
    background-color: blue;
    color:
        black;
}
</style>