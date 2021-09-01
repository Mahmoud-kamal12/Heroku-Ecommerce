<?php

    require_once './vendor/autoload.php';
    // Global VAR
    $script = "";
    $noinsta = " ";
    $err = (isset($_GET['err'])) ? $_GET['err'] : 0 ;
    $msg = (isset($_GET['msg'])) ? $_GET['msg']:'';
    $pageTitle = "Register";

    ob_start();

    session_start();

    include 'init.php';
    
    geterr($msg);

    if (isset($_SESSION['ID']) && isset($_SESSION['User_Name'])) {
      header("Location: index.php");
    }else{
      require_once "./controllers/google-config.php";
    }

?>


<div class="content" style="margin: 100px auto;">
      <div class="container" >
        <div class="row justify-content-center">
          <div class="col col-4">
            <div class="alert-danger" id="error"></div>
            <form action="./controllers/register-controller.php" method="post">
              <div class="mb-3">
                <label for="User_Name" class="form-label">User Name *</label>
                <input type="text" class="form-control" id="User_Name" name="User_Name">
              </div>
              <div class="mb-3">
                <label for="User_Email" class="form-label">Email address *</label>
                <input type="email" class="form-control" id="User_Email" name="User_Email">
              </div>
              <div class="mb-3">
                <label for="User_Password" class="form-label">Password *</label>
                <input type="password" class="form-control" id="User_Password" name="User_Password">
              </div>
              <div class="mb-3">
                <label for="Confirm" class="form-label">Confirm Password *</label>
                <input type="password" class="form-control" id="Confirm" name="Confirm">
              </div>
              <div class="row justify-content-center" style="width: 70%;margin: 0 auto;">
                <button type="submit" class="btn btn-warning">REGISTER</button>
              </div>
              <div class="row justify-content-center" style="width: 70%;margin: 0 auto;">
                <a class = "btn btn-sm btn-google btn-block text-uppercase btn-outline mt-3" href = "<?=$client->createAuthUrl()?>">
                  Login Using Google <img src="https://img.icons8.com/color/16/000000/google-logo.png">
                </a>
              </div>
            </form>
            <div class="row justify-content-center">
              <a href="./login.php" class="orcreate">OR LOGIN</a>
            </div>
          </div>
      </div>
      </div>
  </div>



<?php

    if (!isset($noinsta)) {
        include $tpl . "insta.php";
    }
    include $tpl . 'footer.php';
    printScript();

    ob_end_flush();
?>