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
        $sql = "SELECT * from staff";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
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
        background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/bground.png');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
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

<body class="bg-light">
    <?php include('layout/navbar.php'); ?>

    <section>
        <div class="container bg-white p-5  log_section">
            <a href="webmaster.php" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>

            </a>
            <h4 class="font-weight-bold text-center" style="color: #000; font-family: 'Lato', sans-serif;">
                View Users</h4>

            <table id="example" class="display cell-border" style="width:100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($objSignIn) { ?>
                    <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($objSignIn)) { ?>
                    <tr>
                        <th><?php echo $i; ?></th>
                        <th><?php echo $row['staff_name']; ?></th>
                        <th><a class="btn btn-danger " href="deleteUser.php?id=<?php echo $row['staff_id']; ?>"><i
                                    class="fas fa-user-slash"></i></a>
                        </th>

                        <?php $i++;
                        } ?>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>

            <!-- <form action="" method="post"> -->

            <!-- </form> -->
        </div>

        </div>

    </section>


    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script>
    $(document).ready(function() {

        let table = $('#example').DataTable({

            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true,



        });

    })

    // $(document).ready(function() {
    //     var userDataTable = $('#example').DataTable({
    //         'processing': true,
    //         'serverSide': true,
    //         'serverMethod': 'post',
    //         rowReorder: {
    //             selector: 'td:nth-child(2)'
    //         },
    //         responsive: true,
    //         'ajax': {
    //             'url': 'show.php'
    //         },
    //         'columns': [{
    //                 data: 'title'
    //             },

    //             {
    //                 data: 'action'
    //             },
    //         ]
    //     });
    // });
    </script>



</body>

</html>