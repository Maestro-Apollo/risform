<?php
session_start();
if (isset($_SESSION['admin'])) {
} else {
    header('location:index.php');
}

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




    <div class="">
        <section>
            <div class="container">
                <h2 class="font-weight-bold text-center" style="color: #000; font-family: 'Lato', sans-serif;">
                    Welcome Webmaster!</h2>
                <div class="row text-center mt-5">
                    <div class="col-md-6 col-12 mt-4">
                        <a href="register_staff.php" style="text-decoration: none;">
                            <div class="p-5 bg-light">
                                <i class="fas fa-user-plus fa-5x"></i>
                                <h3 class="font-weight-bold text-center mt-3"
                                    style="color: #05445E; font-family: 'Lato', sans-serif;">Register User</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-12 mt-4">
                        <a href="edit_user.php" style="text-decoration: none;">
                            <div class="p-5 bg-light">
                                <i class="fas fa-users fa-5x"></i>
                                <h3 class="font-weight-bold text-center mt-3"
                                    style="color: #05445E; font-family: 'Lato', sans-serif;">View / Edit User</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-12 mt-4">
                        <a href="upload_pdf.php" style="text-decoration: none;">
                            <div class="p-5 bg-light">
                                <i class="fas fa-file-upload fa-5x"></i>
                                <h3 class="font-weight-bold text-center mt-3"
                                    style="color: #05445E; font-family: 'Lato', sans-serif;">Upload PDF</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-12 mt-4">
                        <a href="pdf_view.php" style="text-decoration: none;">
                            <div class="p-5 bg-light">
                                <i class="fas fa-file-pdf fa-5x"></i>

                                <h3 class="font-weight-bold text-center mt-3"
                                    style="color: #05445E; font-family: 'Lato', sans-serif;">View / Edit PDF</h3>
                            </div>
                        </a>
                    </div>


                </div>

            </div>
        </section>

    </div>







    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>


</body>

</html>