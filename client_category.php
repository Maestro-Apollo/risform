<?php
session_start();
require_once('class/database.php');
class category extends database
{
    public function catFunction()
    {
        if (isset($_POST['submit'])) {
            $file = trim($_POST['file']);
            header('location:client_pdf.php?title=' . $file);
        }
        # code...
    }
}
$obj = new category;
$objCat = $obj->catFunction();

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

    .dis h3 {
        font-size: 20px;
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

    .bg_color {
        background-color: #F3F1EF !important;
        padding: 60px;
    }

    .header {
        position: relative;
    }

    .logout {
        position: absolute;
        right: 20px;
        top: 23px;
        color: #fff;
    }

    @media (max-width: 575.98px) {
        .navbar-brand {
            width: 30%;
        }



        .dis h3 {
            font-size: 16px;
        }


    }
    </style>


</head>

<body class="bg_image">




    <div class="">
        <section>
            <div class="container">
                <div class="header">
                    <h2 class="font-weight-bold text-center  p-3 mb-0" style="color: #fff; font-family: 'Lato', sans-serif; background: linear-gradient(90deg, rgba(17,5,231,1) 0%, rgba(200,29,214,1) 35%, rgba(255,0,0,1) 100%);
">
                        Hi! Client!</h2>
                    <a class="logout text-white font-weight-bold" href="logout.php"><i class="fas fa-power-off"></i></a>
                </div>
                <div class="bg_color">

                    <form action="" method="post" class="d-block mx-auto">
                        <input type="text" name="file" placeholder="Search File Name"
                            class="form-control  d-block mx-auto">
                        <input type="submit" class="btn btn-block  font-weight-bold log_btn mx-auto mt-4" value="Search"
                            name="submit">

                    </form>
                    <div class="row text-center mt-5">
                        <div class="col-md-6 col-12 mt-4">
                            <a href="client_pdf_default.php?category=TAMAN SEMULA" style="text-decoration: none;">
                                <div class="p-5 bg-white dis">
                                    <i class="fas fa-leaf fa-5x" style="color: #296e01"></i>
                                    <h3 class="font-weight-bold text-center mt-3"
                                        style="color: #05445E; font-family: 'Lato', sans-serif;">TAMAN SEMULA</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-12 mt-4">
                            <a href="client_pdf_default.php?category=PENGEMBANGAN" style="text-decoration: none;">
                                <div class="p-5 bg-white dis">
                                    <i class="fas fa-leaf fa-5x" style="color: #296e01"></i>
                                    <h3 class="font-weight-bold text-center mt-3"
                                        style="color: #05445E; font-family: 'Lato', sans-serif;">PENGEMBANGAN</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-12 mt-4">
                            <a href="client_pdf_default.php?category=USAHAWAN" style="text-decoration: none;">
                                <div class="p-5 bg-white dis">
                                    <i class="fas fa-leaf fa-5x" style="color: #296e01"></i>
                                    <h3 class="font-weight-bold text-center mt-3"
                                        style="color: #05445E; font-family: 'Lato', sans-serif;">USAHAWAN</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-12 mt-4">
                            <a href="client_pdf_default.php?category=PRODUKTIVITI & PEMASARAN"
                                style="text-decoration: none;">
                                <div class="p-5 bg-white dis">
                                    <i class="fas fa-leaf fa-5x" style="color: #296e01"></i>
                                    <h3 class="font-weight-bold text-center mt-3"
                                        style="color: #05445E; font-family: 'Lato', sans-serif;">PRODUKTIVITI &
                                        PEMASARAN
                                    </h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-12 mt-4">
                            <a href="client_pdf_default.php?category=KURSUS & LATIHAN" style="text-decoration: none;">
                                <div class="p-5 bg-white dis">
                                    <i class="fas fa-leaf fa-5x" style="color: #296e01"></i>
                                    <h3 class="font-weight-bold text-center mt-3"
                                        style="color: #05445E; font-family: 'Lato', sans-serif;">KURSUS & LATIHAN</h3>
                                </div>
                            </a>
                        </div>


                    </div>
                </div>

            </div>
        </section>

    </div>








    <?php include('layout/script.php') ?>


</body>

</html>