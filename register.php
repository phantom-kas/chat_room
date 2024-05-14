<?php
$error = '';
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['Conf_password'])){
require_once './commons/mysql.php';

$res1 = $Db->query('SELECT * from users where username = ?' ,[$_POST['username']])->getRows();
if(count($res1) > 0){
    $error = 'User Already exists with the same name please chose another one';
}

if( $_POST['password'] !=  $_POST['Conf_password']){
    $error = "Passwords don't match";
}
if(!$error){

$res = $Db->query("INSERT INTO `users`
 (`username`, `password`, `fname`, `lname`) VALUES 
 (?,?,?,?);" ,
 [
    $_POST['username'],
    $_POST['password'],
    $_POST['fname'],
    $_POST['lname'],
]
    )->numAffectedRows();
    if($res > 0){
        header('Location: login.php');
    }
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/styles.css" />
</head>
<style>
.app{
    height: 100%;
    background-color: rgb(0, 0, 0);
    width: 100%;
    margin-inline: auto;
    margin-top: 4rem;
    color: aliceblue;
    padding: 2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: min(500px , calc(100% - 1rem));
    gap:1rem
}
.app>div{
    width:100%;
 
    font-size:1rem;
    display:flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.app>div>input{
    width: calc(100% - 2rem);
    height:2rem;
}
.app > button{
    width:calc(100% - 2rem);
    height:2.5rem;
    background:blue
}
div.error{
    width:calc(100% - 2rem);
    padding: 0.5rem 2rem;
}
</style>
<body>
    <form class='app'action='./register.php' method = 'post'>
    <h1>Register</h1>
    <div>
        <input type="text"  required value= "<?php echo $_POST['fname'] ?? '';?>" name= 'fname' placeholder='First name'>
    </div>
    <div>
        <input type="text" required value= "<?php echo $_POST['lname'] ?? '';?>" name= 'lname' placeholder='Last Name'>
    </div>
    <div>
        <input type="text" required value= "<?php echo $_POST['username'] ?? '';?>" name= 'username' placeholder='User Name'>
    </div>
    <div>
        <input type="text" required type = 'password' value= "<?php echo $_POST['password'] ?? '';?>"  name='password'  placeholder='Password'>
    </div>
    <div>
        <input type="text"  required type = 'password'value= "<?php echo $_POST['Conf_password'] ?? '';?>"  name='Conf_password'  placeholder='Confirm Password'>
    </div>


    <button type = 'submit'>
        Submit
    </button>


    <?php
   if($error) {
    ?>

    
    <div class = 'error'>
    <?php echo $error?>  
   </div>
    <?php 
}
?>
<div>
<span>
           <a href="login.php"> Already have an account click? here to sign in instead.</a>
        </span>
</div>
    </form>
</body>
</html>