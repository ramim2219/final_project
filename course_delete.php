<?php 
    include 'connection.php';

    $userId = $_REQUEST['userId'];
    $s = "Delete from courses where id=$userId";
    if(mysqli_query($conn, $s)){
        header('Location: courses_form.php?userId=-3');
    }
?>