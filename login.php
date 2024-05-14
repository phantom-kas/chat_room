<?php
$error = '';
if(isset($_POST['username']) && isset($_POST['password'])){
require_once './commons/mysql.php';
$res = $Db->query('SELECT * from users where username = ? && password = ?' ,[$_POST['username'],$_POST['password']])->getRows();
if(count($res) < 1){
    $error = 'Incorrect username or password';
}
else{
    session_start();
    $_SESSION['user_id'] =$res[0]['id'];
    $_SESSION['username'] =$res[0]['username'];
    header('Location: ./index.php');
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
.app {
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
    width: min(500px, calc(100% - 1rem));
    gap: 1rem
}

.app>div {
    width: 100%;

    font-size: 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.app>div>input {
    width: calc(100% - 2rem);
    height: 2rem;
}

.app>button {
    width: calc(100% - 2rem);
    height: 2.5rem;
    background: blue
}

div.error {
    width: calc(100% - 2rem);
    padding: 0.5rem 2rem;
}
</style>

<body>
    <form class='app' action='./login.php' method='post'>
        <h1>Login</h1>
        <div>
            <input type="text" value="<?php echo $_POST['username'] ?? '';?>" name='username' placeholder='User Name'>
        </div>
        <div>
            <input type="password" value="<?php echo $_POST['password'] ?? '';?>" name='password' placeholder='assword'>
        </div>

        <button type='submit'>
            Submit
        </button>

        <div>
            <span>
                <a href="register.php"> Click here to register.</a>
            </span>
        </div>
        <?php
   if($error) {
    ?>
        <div class='error'>
            <?php echo $error?>
            <div>
                <?php
}
?>
    </form>
</body>

</html>