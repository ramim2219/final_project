<?php 
    include 'connection.php';

    $userId = $_REQUEST['userId'];
    $s = "Delete from sessions where id=$userId";
    if(mysqli_query($conn, $s)){
        header('Location: sessions.php?userId=-3');
    }
?>