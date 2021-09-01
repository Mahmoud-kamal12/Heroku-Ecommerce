<?php 
    session_start();
    
    $nonav="";
    $pageTitle = "Admin Login";

    if (isset($_SESSION['Admin_ID'])) {
        header('Location: dashboard.php');
    }

    include "init.php";

    // check if coming from http post request
    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
        
        $uEmail = $_POST['email'];
        $pass  = $_POST['password'];
        $hashPass = sha1($pass);

        // check if the user exist in db

        $stms = $con->prepare("SELECT *  FROM `users` WHERE User_Email =? AND User_Password_Hash =? AND GroupID = 1 LIMIT 1 ");

        $stms->execute(array($uEmail , $hashPass));
        $row = $stms->fetch();
        $count = $stms->rowCount();

        if ($count > 0) {

            $_SESSION['Admin_User_Email'] = $row['User_Email']; 
            $_SESSION['Admin_ID'] = $row['User_ID']; 
            $_SESSION['Admin_User_Name'] = $row['User_Name']; 


            header('Location: dashboard.php');
            exit();
        }

    }

?>
<!-- add your html code here -->

<!-- you can use this code or change it -->


<div class="container-fluid pb-5">
    <div class="row mt-5" >

        <div class="col-md-6 offset-md-3">
            <div class="card">
                <h5 class="card-header">Admin Login</h5>
                <div class="card-body">
                    <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                        <div class="form-group ">
                            <label for="username">User Name</label>
                            <input type="email" class="form-control" id="username" name="email" placeholder="Enter User Name">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                        </div>
                        <div class="submit">
                            <button type="submit" class="btn btn-primary btn-md mt-3" >Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end your html code -->

<?php 
    include $tpl . 'footer.php';
?>