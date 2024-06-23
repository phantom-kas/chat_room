<?php
$error = '';
if (isset($_POST['username']) && isset($_POST['password'])) {
    require_once './commons/mysql.php';
    $res = $Db->query('SELECT * from users where username = ? && password = ?', [$_POST['username'], $_POST['password']])->getRows();
    if (count($res) < 1) {
        $error = 'Incorrect username or password';
    } else {
        session_unset();
        session_start();
        $_SESSION['user_id'] = $res[0]['id'];
        $_SESSION['username'] = $res[0]['username'];
        $_SESSION['image_url'] = IMG_DIR . '/' . $res[0]['profile_image_filename'];
        $_SESSION['fname'] = $res[0]['fname'];
        $_SESSION['lname'] = $res[0]['lname'];
        $_SESSION['role'] = $res[0]['role'];
        header('Location: ./index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <!-- styles -->
    <link rel="stylesheet" href="./styles/styles.css" />
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgb(99, 91, 117) !important;
        background: url(pages/aa.jpg);
        background-size: cover;
    }

    .app {
        background: rgba(194, 179, 179, 0.21);
        backdrop-filter: blur(10px);
        /* background-color: rgb(0, 0, 0); */
        width: 100%;
        margin-inline: auto;
        /* margin-top: 4rem; */
        color: black;
        padding: 4rem;
        border-radius: 10px;
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
        border-radius: 10px;
        padding: 0 10px;
        border: none;
    }

    .app>button {
        width: calc(100% - 2rem);
        height: 2.5rem;
        background: blue;
        border: none;
        border-radius: 15px;
    }

    .app>button:hover {
        background-color: rgb(99, 91, 117)
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
            <input type="text" value="<?php echo $_POST['username'] ?? ''; ?>" name='username' placeholder='User Name'>
        </div>
        <div>
            <input type="password" value="<?php echo $_POST['password'] ?? ''; ?>" name='password' placeholder='password'>
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
        if ($error) {
        ?>
            <div class='error'>
                <?php echo $error ?>
                <div>
                <?php
            }
                ?>
    </form>
</body>

</html>