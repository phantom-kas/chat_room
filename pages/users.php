<?php
require_once './commons/mysql.php';
require_once './commons/function.php';
require_once './session.php';

// if(!isAdmin()){
//   header('Location: ./index.php');
//   die();
// }

$users = $Db->query("SELECT * FROM users")->getRows();
//echo toJson($users);
?>
<style>
  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td,
  #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #customers tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  #customers tr:nth-child(odd) {
    background-color: white;
  }

  #customers tr:hover {
    background-color: #ddd;
    
  }

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }
</style>

<div class="max700 page_padding body uuu">
 

<div class='uvcucc' >


  <?php
  foreach ($users as $key => $value) {
  ?>
 


    <div class='user'>
      <div class='imgc'>
        <img src="<?php echo IMG_DIR.'/'.$value['profile_image_filename']?>" alt="">
      </div>
      <div class='imc'>
        <div>
          <span>Username:</span><h2><?php echo $value['username'] ?></h2>
        </div>
        <div>
          <span>First name:</span><h2><?php echo $value['fname'] ?></h2>
        </div>
        <div>
          <span>Last name:</span><h2><?php echo $value['lname'] ?></h2>
        </div>
        <div>
          <span>Created at:</span><h4><?php echo $value['created_at'] ?></h4>
        </div>
      </div>
    </div>
  <?php
  }
  ?>

</div>

</div>

<style>
  .user {
    display: flex;
    flex-direction: column;
    width: min(400px, 100%);
    background-color: white;
    padding: 0;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 3px 3px 1px 2px;
    transition: all 0.3s;
  }
  .user:hover {
    transform: translateY(-14px);
    box-shadow: 0px 9px 8px 9px;
  }
  .user:hover img {
    transform: scale(1.3);
  }
  .uvcucc{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    gap:2rem;
    width: 100%;
  }

  .user.imgc {
    width: min(100px, 100%);

  }

  .user .imgc img {
    width: 100%;
    transition: all 0.5s;

  }

  .imc {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    padding: 2rem 2rem;
  }
  .imc > div {
    display: flex;
    gap: 1rem;
  }
  .uuu{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    height: 100%;
    overflow: scroll;
    padding-top: 1.7rem;
  }
</style>