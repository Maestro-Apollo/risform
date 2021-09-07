<?php
session_start();

include('class/database.php');
class signInUp extends database
{
    protected $link;

    public function signInFunction()
    {
        if (isset($_POST['signIn'])) {
            $userNumber = addslashes(trim($_POST['userNumber']));
            $password = addslashes(trim($_POST['password']));

            $sql = "select * from staff where staff_number = '$userNumber' ";
            $res = mysqli_query($this->link, $sql);
            $sql2 = "select * from admin where username = '$userNumber' ";
            $res2 = mysqli_query($this->link, $sql2);
            if (mysqli_num_rows($res) > 0 || mysqli_num_rows($res2) > 0) {
                $row = mysqli_fetch_assoc($res);
                $pass = $row['staff_password'];
                $row2 = mysqli_fetch_assoc($res2);
                $pass2 = $row2['password'];
                //password verify will check the hashed password from database and match with users password
                if (password_verify($password, $pass) == true) {
                    $_SESSION['staff'] = $row['staff_name'];
                    header('location:staff_category.php');
                } else if (password_verify($password, $pass2) == true) {
                    $_SESSION['admin'] = $row2['admin_id'];
                    header('location:webmaster.php');
                } else {
                    $msg = "Wrong password";
                    return $msg;
                }
            } else {
                $msg = "Invalid Information";
                return $msg;
            }
        }
        # code...
    }
}
$obj = new signInUp;
$objSignIn = $obj->signInFunction();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('layout/style.php'); ?>
    <style>
    body {
        font-family: 'Raleway', sans-serif;
    }

    .navbar-brand {
        width: 15%;
    }

    .bg_color {
        background-color: #fff !important;
    }

    .bg_image {
        background-image: url('images/bground.png');

    }

    @media (max-width: 575.98px) {
        .navbar-brand {
            width: 30%;
        }
    }
    </style>

</head>

<body class="bg_image">

    <section>
        <div class="container  pr-4 pl-4 mt-4  log_section pb-5">

            <div class="row">
                <div class="col-12 col-md-4 border offset-md-4 pl-4 pr-4 pt-5 pb-5 bg-white">
                    <form action="" method="post" data-parsley-validate>

                        <div class="text-center">
                            <img src="images/logo.png" class="img-fluid" alt="">

                            <?php if ($objSignIn) { ?>
                            <?php if (strcmp($objSignIn, 'Wrong password') == 0) { ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Wrong Password!</strong>
                            </div>
                            <?php } ?>
                            <?php if (strcmp($objSignIn, 'Invalid Information') == 0) { ?>
                            <div class="alert alert-warning alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Please Sign Up!</strong>
                            </div>
                            <?php } ?>

                            <?php } ?>
                        </div>
                        <input type="text" name="userNumber" class="form-control  p-4 mt-3 border bg-light"
                            placeholder="Enter your username or staff ID" required>
                        <input type="password" class="form-control mt-4 p-4 border bg-light" name="password"
                            placeholder="Enter your password" required>


                        <button type="submit" name="signIn"
                            class="btn btn-block font-weight-bold log_btn  mt-4">LOGIN</button>

                        <hr>
                        <a href="client_category.php" class="btn btn-block font-weight-bold log_btn  mt-4">PEKEBUN
                            KECIL</a>

                    </form>

                </div>

                <!-- <form action="" method="post"> -->

                <!-- </form> -->
            </div>

        </div>
        <p class="text-center">2021 RISTRACK - JFORCE (PRNJ)</p>

    </section>




    <?php include('layout/script.php') ?>
</body>

</html>