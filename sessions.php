<?php 
include 'connection.php'; 
session_start();
$userId = $_REQUEST['userId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'link.php'?>
</head>
<body>
<?php include 'admin_nav.php'?>
<?php 
    /* create sessions */
    if($userId==-1)
    {
        ?>
            <div class="container">
                <h2>Register new sessions</h2>
                <form action="" method="post">
                    <div class="form-group mb-2">
                        <label for="">Name of sessions</label>
                        <input type="text" name="course_code" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="Submit_sessions">Ragister</button>
                    </div>
                </form>
            </div>
        <?php
        if(isset($_POST['Submit_sessions']))
        {
            $course_code = $_POST["course_code"];
            $s="INSERT INTO `sessions`(`session_name`) VALUES ('$course_code')";
            $q=mysqli_query($conn,$s);
            if($q)
            {
                header('Location: sessions.php?userId=-3');
            }
        }
    }
    /* show sessions */
    else if($userId==-3)
    {
        ?>
            <div class="container">
                <h1>All sessions</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sessions</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                <?php
                    $s="Select * from sessions";
                    $q=mysqli_query($conn,$s);
                    $k=1;
                    while($r=mysqli_fetch_array($q))
                    {
                        ?>
                            <tr>
                                <td scope="col"><?php echo $k ?></td>
                                <td scope="col"><?php echo $r['session_name'] ?></td>
                                <td><a href="sessions.php?userId=<?php echo $r['id']?>" class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                <td><a href="session_delete.php?userId=<?php echo $r['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        <?php
                        $k++;
                    }
                ?>
                </table>
            </div>
        <?php
    }
    /* edit sessions */
    else
    {
        $s="Select * from sessions";
        $q=mysqli_query($conn,$s);
        if($r=mysqli_fetch_assoc($q))
        {
            ?>
                <div class="container">
                    <form action="" method="post">
                        <div>
                            <h1>Edit sessions</h1>
                        </div>
                        <div class="form-group mb-2">
                            <label for="1">Sessions name</label>
                            <input type="text" name="session_name" class="form-control" value="<?php echo $r['session_name']?>" id="1">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            <?php
            if(isset($_POST['submitBtn']))
            {
                $session_name=$_POST['session_name'];
                $s="UPDATE `sessions` SET `session_name`='$session_name'";
                $q=mysqli_query($conn,$s);
                if($q)
                {
                    header('Location: sessions.php?userId=-3');
                }
            }
        }
    }
?>
</body>
</html>