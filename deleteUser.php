<?php
session_start();

include('class/database.php');
class signInUp extends database
{
    protected $link;

    public function signInFunction()
    {
        $id = $_GET['id'];
        $sql = "DELETE from staff where staff_id = $id ";
        $res = mysqli_query($this->link, $sql);
        if ($res) {
            header('location:edit_user.php');
        } else {
            return false;
        }
        # code...
    }
}
$obj = new signInUp;
$objSignIn = $obj->signInFunction();