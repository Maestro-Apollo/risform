<?php
session_start();
if (isset($_SESSION['admin'])) {
} else {
    header('location:index.php');
}

include('class/database.php');
class signInUp extends database
{
    protected $link;

    public function signInFunction()
    {
        if (isset($_POST['signIn'])) {
            $name = addslashes(trim($_POST['name']));
            $staff_id = addslashes(trim($_POST['staff_id']));
            $password = addslashes(trim($_POST['password']));

            $pass = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_number`, `staff_password`) VALUES (NULL, '$name', '$staff_id', '$pass')";
            $res = mysqli_query($this->link, $sql);
            if ($res) {
                header('location:edit_user.php');
            } else {
                echo "Not Added";
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
        background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/bground.png');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    @media (max-width: 575.98px) {
        .navbar-brand {
            width: 30%;
        }
    }
    </style>

</head>

<body class="bg_image">
    <?php include('layout/navbar.php'); ?>

    <section>
        <div class="container  pr-4 pl-4  log_section pb-5">

            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <form action="" method="post" data-parsley-validate>
                        <a href="webmaster.php" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>

                        </a>
                        <div class="text-center">
                            <h2 class="font-weight-bold text-center"
                                style="color: #000; font-family: 'Lato', sans-serif;">
                                Register Staff</h2>

                            <?php if ($objSignIn) { ?>
                            <?php if (strcmp($objSignIn, 'Wrong password') == 0) { ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Wrong Password!</strong>
                            </div>
                            <?php } ?>


                            <?php } ?>
                        </div>
                        <input type="text" name="name" class="form-control p-4 mt-3 border-0 bg-light"
                            placeholder="Enter staff name" required>
                        <input type="text" name="staff_id" class="form-control p-4 mt-3 border-0 bg-light"
                            placeholder="Enter staff ID no." required>
                        <input type="password" class="form-control mt-4 p-4 border-0 bg-light" name="password"
                            placeholder="Enter staff password" required>


                        <button type="submit" name="signIn"
                            class="btn btn-block font-weight-bold log_btn btn-lg mt-4">REGISTER</button>



                    </form>
                </div>

                <!-- <form action="" method="post"> -->

                <!-- </form> -->
            </div>

        </div>

    </section>


    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>
</body>

</html>