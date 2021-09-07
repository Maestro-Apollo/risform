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
                View PDF</h4>

            <table id='userTable' class='display dataTable' width='100%'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>

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
        var userDataTable = $('#userTable').DataTable({
            'processing': true,
            'serverSide': true,

            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true,

            'serverMethod': 'post',
            'ajax': {
                'url': 'show.php'
            },
            'columns': [{
                    data: 'pdf_id'
                },
                {
                    data: 'title'
                },
                {
                    data: 'action'
                },
            ]
        });
        $('#userTable').on('click', '.deleteUser', function() {
            var id = $(this).data('id');

            var deleteConfirm = confirm("Are you sure?");
            if (deleteConfirm == true) {
                // AJAX request
                $.ajax({
                    url: 'show.php',
                    type: 'post',
                    data: {
                        request: 4,
                        id: id
                    },
                    success: function(response) {

                        if (response == 1) {
                            alert("Record deleted.");

                            // Reload DataTable
                            userDataTable.ajax.reload();
                        } else {
                            alert("Invalid ID.");
                        }

                    }
                });
            }

        });
    });
    </script>



</body>

</html>