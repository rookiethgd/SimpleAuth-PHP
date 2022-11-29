<?php

require_once("db/config.php");

if(isset($_POST['register'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    $sql = "INSERT INTO users (username, email, password) 
            VALUES (:username, :email, :password)";
    $stmt = $db->prepare($sql);

    $params = array(
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    $saved = $stmt->execute($params);

    if($saved) header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset='UTF-8'>
    <title>Register</title>
    <link rel='stylesheet' href='./assets/style.css' />
  </head>
  <body>
    <div id='main'>
      <div class='preloader'>
        <div class='preloader-inner'>
            <div class='preloader-icon'>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <form action="" method="POST">
    <section id='faq' class='faq section'>
        <div class='container'>
          <div class='row' style='background: #111114; border-radius: 5px;'>
                <div class='col-12'>
                    <div class='single-feature wow fadeInUp' style='min-height: 100px; visibility: visible; animation-name: fadeInUp; padding: 15px; '>
                      <h3>SimpleAuth-PHP</h3>
                      <p>Lorem ipsum.</p>
                      <br>
                      <input class='form-control-input' type='text' name="username" autocomplete='off' placeholder='Username' required>
                      <input class='form-control-input' type='email' name="email" autocomplete='off' placeholder='Email' required>
                      <input class='form-control-input' type='password' name="password" autocomplete='off' placeholder='Password' required>
						          <button type="submit" name="register">Sign up</button> 
      					      Already have an account? <a href="index.php">Sign In</a> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src='./assets/app.js'></script>
  </body>
</html>