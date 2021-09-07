<?php
session_start();

include('class/database.php');
class signInUp extends database
{
    protected $link;

    public function signInFunction()
    {
        $id = $_GET['id'];
        $sql = "DELETE from pdf where pdf_id = $id ";
        $res = mysqli_query($this->link, $sql);
        if ($res) {
            header('location:pdf_view.php');
        } else {
            return false;
        }
        # code...
    }
}
$obj = new signInUp;
$objSignIn = $obj->signInFunction();