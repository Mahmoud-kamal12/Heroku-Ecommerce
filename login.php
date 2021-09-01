<?php
    
    require_once './vendor/autoload.php';
    // Global VAR
    $script = "";
    $noinsta = " ";
    $err = (isset($_GET['err'])) ? $_GET['err'] : 0 ;
    
    $msg = (isset($_GET['msg'])) ? $_GET['msg']:'';
    $pageTitle = "Login";


    ob_start();

    session_start();
    
    include 'init.php';

    if (isset($_SESSION['ID']) && isset($_SESSION['User_Name'])) {
      header("Location: index.php");
    }else{
      require_once "./controllers/google-config.php";
    }

    geterr($msg);

?>

<div class="content" style="margin: 100px auto;">

      <div class="container" >
        <div class="row justify-content-center">
          <div class="col col-4">
            <div class="alert-danger" id="error"></div>
            <form action="./controllers/login-controller.php" method="PoSt">
              <div class="mb-3">
                <label for="User_Email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="User_Email" name="User_Email">
              </div>
              <div class="mb-3">
                <label for="User_Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="User_Password" name="User_Password">
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <div class="row justify-content-center" style="width: 70%;margin: 0 auto;">
                <button type="submit" class="btn btn-warning">LOGIN</button>
              </div>
              <div class="row justify-content-center" style="width: 70%;margin: 0 auto;">
                <a class = "btn btn-sm btn-google btn-block text-uppercase btn-outline mt-3" href = "<?=$client->createAuthUrl()?>">
                  Login Using Google <img class="mb-1" style="margin-left: 10px;width: 20px;" src="https://img.icons8.com/color/16/000000/google-logo.png">
                </a>
              </div>

            </form>
            <div class="row justify-content-center">
              <a href="./register.php" class="orcreate">OR CREATE AN ACCOUNT</a>
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