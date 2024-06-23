<?php
$error = '';
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['Conf_password'])) {
  require_once './commons/mysql.php';
  require_once './commons/function.php';

  $res1 = $Db->query('SELECT * from users where username = ?', [$_POST['username']])->getRows();
  if (count($res1) > 0) {
    $error = 'User Already exists with the same name please chose another one';
  }

  if ($_POST['password'] !=  $_POST['Conf_password']) {
    $error = "Passwords don't match";
  }
  if (!$error) {

    $res = $Db->query(
      "INSERT INTO `users`
 (`username`, `password`, `fname`, `lname`) VALUES 
 (?,?,?,?);",
      [
        $_POST['username'],
        $_POST['password'],
        $_POST['fname'],
        $_POST['lname'],
      ]
    )->lastId();
    $t = time();
    if ($res) {
      if (upload('image', './src/profileimages/' . $t . '.jpg')) {

        $Db->query("UPDATE `users` SET `profile_image_filename` = ? WHERE `users`.`id` = ?;", [$t . '.jpg', $res]);
      } else {
        $error = 'Upload error';
      }
    }
    if ($res  & !$error) {
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
    padding: 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: min(500px, calc(100% - 1rem));
    gap: 1rem;
    border-radius: 10px;
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
    border-radius: 10px;
    border: none;
  }

  .app>button:hover {
    background-color: rgb(99, 91, 117)
  }

  div.error {
    width: calc(100% - 2rem);
    padding: 0.5rem 2rem;
  }

  .profile-picture {
    opacity: 0.75;
    height: 250px;
    width: 250px;
    position: relative;
    overflow: hidden;

    /* default image */
    background: url('https://qph.cf2.quoracdn.net/main-qimg-f32f85d21d59a5540948c3bfbce52e68');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    box-shadow: 0 8px 6px -6px black;
  }

  .file-uploader {
    /* make it invisible */
    opacity: 0;
    /* make it take the full height and width of the parent container */
    height: 100%;
    width: 100%;
    cursor: pointer;
    /* make it absolute */
    position: absolute;
    top: 0%;
    left: 0%;
  }

  .upload-icon {
    position: absolute;
    top: 45%;
    left: 50%;
    transform: translate(-50%, -50%);
    /* initial icon state */
    opacity: 0;
    transition: opacity 0.3s ease;
    color: #ccc;
    -webkit-text-stroke-width: 2px;
    -webkit-text-stroke-color: #bbb;
  }

  .profile-picture:hover .upload-icon {
    opacity: 1;
  }
</style>

<body>
  <form class='app' action='./register.php' method='post' enctype="multipart/form-data">
    <h1>Register</h1>
    <label for='upp' class="profile-picture">
      <h1 class="upload-icon">
        <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
      </h1>
      <input class="file-uploader" type="file" id='upp' onchange="upload()" accept="image/*" required name='image' />
    </label>
    <h2>
      Profile Image
    </h2>

    <div>
      <input type="text" required value="<?php echo $_POST['fname'] ?? ''; ?>" name='fname' placeholder='First name'>
    </div>
    <div>
      <input type="text" required value="<?php echo $_POST['lname'] ?? ''; ?>" name='lname' placeholder='Last Name'>
    </div>
    <div>
      <input type="text" required value="<?php echo $_POST['username'] ?? ''; ?>" name='username' placeholder='User Name'>
    </div>
    <div>
      <input type="text" required type='password' value="<?php echo $_POST['password'] ?? ''; ?>" name='password' placeholder='Password'>
    </div>
    <div>
      <input type="text" required type='password' value="<?php echo $_POST['Conf_password'] ?? ''; ?>" name='Conf_password' placeholder='Confirm Password'>
    </div>


    <button type='submit'>
      Submit
    </button>


    <?php
    if ($error) {
    ?>


      <div class='error'>
        <?php echo $error ?>
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
  <script>
    function upload() {

      const fileUploadInput = document.querySelector('.file-uploader');

      // using index [0] to take the first file from the array
      const image = fileUploadInput.files[0];

      // check if the file selected is not an image file
      if (!image.type.includes('image')) {
        return alert('Only images are allowed!');
      }

      // check if size (in bytes) exceeds 10 MB
      if (image.size > 10_000_000) {
        return alert('Maximum upload size is 10MB!');
      }
      const fileReader = new FileReader();
      fileReader.readAsDataURL(image);

      fileReader.onload = (fileReaderEvent) => {
        const profilePicture = document.querySelector('.profile-picture');
        profilePicture.style.backgroundImage = `url(${fileReaderEvent.target.result})`;
      }
    }
  </script>
</body>

</html>