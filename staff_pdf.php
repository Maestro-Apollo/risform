<?php
session_start();
error_reporting(0);
if (isset($_SESSION['staff'])) {
} else {
    header('location:index.php');
}
require_once('class/database.php');
class category extends database
{
    public function catFunction()
    {
        $title = $_GET['title'];
        $sql = "select * from pdf where title like '%$title%' AND user = 'staff' order by title";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        # code...
    }
}
$obj = new category;
$objCat = $obj->catFunction();
// $arr = [4, 6, 7, 2];
// if ((array_diff_assoc($arr, array_unique($arr)))) {
//     echo "Ho";
// } else {
//     echo "No";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('layout/style.php'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
    <style>
    body {
        font-family: 'Lato', sans-serif;
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

    th,
    td {
        font-family: 'Lato', sans-serif;
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
        <div class="container bg-white p-5  log_section">

            <a href="staff_category.php" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>

            </a>
            <?php $counter = 0;
            $firstrow = 0;
            $lastrow = 0;
            while ($row2 = mysqli_fetch_assoc($objCat)) {
                $numResults = mysqli_num_rows($objCat); ?>
            <?php if ($counter == 0) {
                    $firstrow = $row2['category'];
                } ?>


            <?php if (++$counter == $numResults) {
                    $lastrow = $row2['category'];
                }
                if (strcmp($firstrow, $lastrow) == 0) {
                    $final = $row2['category'];
                } else {
                    $final = 'Carian';
                }
            } ?>
            <h2 class="font-weight-bold text-center p-3 mb-0 mt-5" style="color: #fff; font-family: 'Lato', sans-serif; background: linear-gradient(90deg, rgba(17,5,231,1) 0%, rgba(200,29,214,1) 35%, rgba(255,0,0,1) 100%);
">
                Hi! <?php echo $_SESSION['staff']; ?>!</h2>
            <h4 class="font-weight-bold text-center mt-5" style="color: #000; font-family: 'Lato', sans-serif;">
                <?php echo $final; ?> </h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Pdf Title</th>
                            <th scope="col">Download</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($objCat) { ?>
                        <?php mysqli_data_seek($objCat, 0) ?>

                        <?php $i = 1;
                            while ($row = mysqli_fetch_assoc($objCat)) { ?>

                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row['title']; ?></td>
                            <td><a href="pdf/<?php echo $row['pdf']; ?>" class='btn btn-sm btn-info' download><i
                                        class='fas fa-download'></i></a></td>

                        </tr>


                        <?php $i++;
                            } ?>
                        <?php } else { ?>
                        <tr>
                            <td colspan="3">No Data</td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>



            <!-- <form action="" method=" post"> -->

            <!-- </form> -->
        </div>

        </div>

    </section>



    <?php include('layout/script.php') ?>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>




</body>

</html>