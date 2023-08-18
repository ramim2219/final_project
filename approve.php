<?php 
    include 'connection.php';
    $userId = $_REQUEST['userId'];
    $id=$_REQUEST['id'];
    $s;
    if($id==-1)
    {
        $s = "update users set status=1 where id=$userId";
    }
    else if($id==-2)
    {
        $s = "DELETE FROM `users` WHERE id='$userId'";
    }
    if(mysqli_query($conn, $s)){
        header('Location: approval.php');
    }
?>