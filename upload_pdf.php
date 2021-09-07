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
            $title = addslashes(trim($_POST['title']));
            $user = addslashes(trim($_POST['user']));
            $category = addslashes(trim($_POST['category']));
            $pdf = time() . '_' . $_FILES['pdf']['name'];
            $target = 'pdf/' . $pdf;

            $sql = "INSERT INTO `pdf` (`pdf_id`, `title`, `user`, `category`, `pdf`) VALUES (NULL, '$title', '$user', '$category', '$pdf')";
            $res = mysqli_query($this->link, $sql);
            if ($res) {
                move_uploaded_file($_FILES['pdf']['tmp_name'], $target);
                header('location:pdf_view.php');
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
    <script src="https://use.fontawesome.com/b4564248e6.js"></script>

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

    .frb-group {
        margin: 15px 0;
    }

    .frb~.frb {
        margin-top: 15px;
    }

    .frb input[type="radio"]:empty,
    .frb input[type="checkbox"]:empty {
        display: none;
    }

    .frb input[type="radio"]~label:before,
    .frb input[type="checkbox"]~label:before {
        font-family: FontAwesome;
        content: '\f096';
        position: absolute;
        top: 50%;
        margin-top: -15px;
        left: 15px;
        font-size: 22px;
    }

    .frb input[type="radio"]:checked~label:before,
    .frb input[type="checkbox"]:checked~label:before {
        content: '\f046';
    }

    .frb input[type="radio"]~label,
    .frb input[type="checkbox"]~label {
        position: relative;
        cursor: pointer;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f2f2f2;
    }

    .frb input[type="radio"]~label:focus,
    .frb input[type="radio"]~label:hover,
    .frb input[type="checkbox"]~label:focus,
    .frb input[type="checkbox"]~label:hover {
        box-shadow: 0px 0px 3px #333;
    }

    .frb input[type="radio"]:checked~label,
    .frb input[type="checkbox"]:checked~label {
        color: #fafafa;
    }

    .frb input[type="radio"]:checked~label,
    .frb input[type="checkbox"]:checked~label {
        background-color: #f2f2f2;
    }

    .frb.frb-default input[type="radio"]:checked~label,
    .frb.frb-default input[type="checkbox"]:checked~label {
        color: #333;
    }

    .frb.frb-primary input[type="radio"]:checked~label,
    .frb.frb-primary input[type="checkbox"]:checked~label {
        background-color: #337ab7;
    }

    .frb.frb-success input[type="radio"]:checked~label,
    .frb.frb-success input[type="checkbox"]:checked~label {
        background-color: #5cb85c;
    }

    .frb.frb-info input[type="radio"]:checked~label,
    .frb.frb-info input[type="checkbox"]:checked~label {
        background-color: #5bc0de;
    }

    .frb.frb-warning input[type="radio"]:checked~label,
    .frb.frb-warning input[type="checkbox"]:checked~label {
        background-color: #f0ad4e;
    }

    .frb.frb-danger input[type="radio"]:checked~label,
    .frb.frb-danger input[type="checkbox"]:checked~label {
        background-color: #d9534f;
    }

    .frb input[type="radio"]:empty~label span,
    .frb input[type="checkbox"]:empty~label span {
        display: inline-block;
    }

    .frb input[type="radio"]:empty~label span.frb-title,
    .frb input[type="checkbox"]:empty~label span.frb-title {
        font-size: 16px;
        font-weight: 700;
        margin: 5px 5px 5px 50px;
    }

    .frb input[type="radio"]:empty~label span.frb-description,
    .frb input[type="checkbox"]:empty~label span.frb-description {
        font-weight: normal;
        font-style: italic;
        color: #999;
        margin: 5px 5px 5px 50px;
    }

    .frb input[type="radio"]:empty:checked~label span.frb-description,
    .frb input[type="checkbox"]:empty:checked~label span.frb-description {
        color: #fafafa;
    }

    .frb.frb-default input[type="radio"]:empty:checked~label span.frb-description,
    .frb.frb-default input[type="checkbox"]:empty:checked~label span.frb-description {
        color: #999;
    }
    </style>

</head>

<body class="bg_image">
    <?php include('layout/navbar.php'); ?>

    <section>
        <div class="container  pr-4 pl-4  log_section pb-5">

            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <form action="" method="post" enctype="multipart/form-data" data-parsley-validate>
                        <a href="webmaster.php" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>

                        </a>
                        <div class="text-center">
                            <h2 class="font-weight-bold text-center"
                                style="color: #000; font-family: 'Lato', sans-serif;">
                                Upload PDF</h2>

                            <?php if ($objSignIn) { ?>
                            <?php if (strcmp($objSignIn, 'Wrong password') == 0) { ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Wrong Password!</strong>
                            </div>
                            <?php } ?>


                            <?php } ?>
                        </div>
                        <input type="text" name="title" class="form-control p-4 mt-3 border-0"
                            placeholder="Enter file title" required>
                        <div class="frb-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="frb frb-primary">
                                        <input type="radio" id="radio-button-0" name="user" value="staff" checked>
                                        <label for="radio-button-0">
                                            <span class="frb-title">Staff</span>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="frb frb-primary">
                                        <input type="radio" id="radio-button-1" name="user" value="client">
                                        <label for="radio-button-1">
                                            <span class="frb-title">Client</span>

                                        </label>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <select name="category" id="" class="custom-select border-0" required>
                            <option value="" selected disabled>Choose directory</option>
                            <option value="TAMAN SEMULA">TAMAN SEMULA</option>
                            <option value="PENGEMBANGAN">TPENGEMBANGAN</option>
                            <option value="USAHAWAN">USAHAWAN</option>
                            <option value="PRODUKTIVITI & PEMASARAN">PRODUKTIVITI & PEMASARAN</option>
                            <option value="KURSUS & LATIHAN">KURSUS & LATIHAN</option>
                            <option value="PENTADBIRAN">PENTADBIRAN</option>
                            <option value="KEWANGAN">KEWANGAN</option>
                            <option value="LAIN-LAIN">LAIN-LAIN</option>
                        </select>

                        <div class="custom-file mt-4">
                            <input type="file" accept=".pdf" class="custom-file-input" name="pdf" id="customFile"
                                required>
                            <label class="custom-file-label" for="customFile">Choose pdf</label>
                        </div>


                        <button type="submit" name="signIn"
                            class="btn btn-block font-weight-bold log_btn btn-lg mt-4">UPLOAD</button>



                    </form>
                </div>

                <!-- <form action="" method="post"> -->

                <!-- </form> -->
            </div>

        </div>

    </section>


    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>
    <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
</body>

</html>