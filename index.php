<?php 

require_once("db/config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        if(password_verify($password, $user["password"])){
            session_start();
            $_SESSION["user"] = $user;
            header("Location: home.php");
        }
    }
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset='UTF-8'>
    <title>Login</title>
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
						          <input class='form-control-input' type='password' name="password" autocomplete='off' placeholder='Password' required>
						          <button type="submit" name="login">Sign in</button> 
					            Dont have an account? <a href="register.php">Sign Up</a> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src='./assets/app.js'></script>
  </body>
</html>