<?php
include 'config.php';

$request = 1;
if (isset($_POST['request'])) {
    $request = $_POST['request'];
}

// DataTable data
if ($request == 1) {
    ## Read value
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $category = $_POST['code'];

    $searchValue = mysqli_escape_string($con, $_POST['search']['value']); // Search value

    ## Search 
    $searchQuery = " ";
    if ($searchValue != '') {
        $searchQuery = " and (title like '%" . $searchValue . "%') and (user = 'client') ";
    }

    ## Total number of records without filtering
    $sel = mysqli_query($con, "select count(*) as allcount from pdf WHERE category = '$category' AND user = 'client'");
    $records = mysqli_fetch_assoc($sel);
    $totalRecords = $records['allcount'];

    ## Total number of records with filtering
    $sel = mysqli_query($con, "select count(*) as allcount from pdf WHERE category = '$category' " . $searchQuery);
    $records = mysqli_fetch_assoc($sel);
    $totalRecordwithFilter = $records['allcount'];

    ## Fetch records
    $empQuery = "select * from pdf WHERE user = 'client' and category = '$category' " . $searchQuery . " order by " . $columnName . " " . $columnSortOrder;
    $empRecords = mysqli_query($con, $empQuery);
    $data = array();
    $i = 1;

    while ($row = mysqli_fetch_assoc($empRecords)) {
        // Update Button


        // Delete Button

        $deleteButton = "<a href='pdf/" . $row['pdf'] . "' class='btn btn-sm btn-info' download><i
        class='fas fa-download'></i></a>";

        $action =  $deleteButton;

        $data[] = array(
            "pdf_id" => $i,
            "title" => $row['title'],
            "action" => $action
        );
        $i++;
    }

    ## Response
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );

    echo json_encode($response);
    exit;
}