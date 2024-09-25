<?php require("../includes/header.php");
    require("../config/config.php");

    if(!isset($_POST["submit"])){
        if(empty($_POST['f_name']) OR 
        empty($_POST['l_name']) OR
        empty($_POST['email']) OR
        empty($_POST['username']) OR
        empty($_POST['password'])) {
            echo "<script>alert('please make sure to fill out all the blanks ')</script>;";
        } else {

            if($_POST['password'] == $_POST['confirm_password']){
                $f_name = $_POST['f_name'];
                $l_name = $_POST['l_name'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                $insert = $conn->prepare("INSERT INTO users(f_name,l_name,email,username,pass) 
                VALUES (:f_name,:l_name,:email,:username,:pass)");

                $insert->execute([
                    ':f_name' => $f_name,
                    ':l_name' => $l_name,
                    ':email' => $email,
                    ':username' => $username,
                    ':pass' => password_hash($password,PASSWORD_DEFAULT),
                ]);

                header("location: ".APPURL."auth/login.php");
            }else {
                echo "<script>alert('password does not match')</script>;";
            }
            
        }
    }
?>

<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">
                    Register Page
                </h1>
                <p class="lead">
                    Save time and leave the groceries to us.
                </p>

                <div class="card card-login mb-5">
                    <div class="card-body">
                        <form class="form-horizontal" method="$_POST" action="register.php">
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" 
                                    name="f_name" type="text" 
                                    required="" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" 
                                    name="l_name" type="text" 
                                    required="" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" 
                                    name="email" type="email" 
                                    required="" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" 
                                    name="username" type="text" 
                                    required="" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input class="form-control" 
                                    name="password" type="password" 
                                    required="" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input class="form-control" 
                                    name="confirm_password" type="password" 
                                    required="" placeholder="Confirm Password">
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <input id="checkbox0" type="checkbox" name="terms">
                                        <label for="checkbox0" class="mb-0">I Agree with <a href="terms.html" class="text-light">Terms & Conditions</a> </label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group row text-center mt-4">
                                <div class="col-md-12">
                                    <button type="submit" 
                                    name="submit" class="btn btn-primary btn-block text-uppercase">
                                    Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "../includes/footer.php"; ?>