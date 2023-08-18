<?php 
include 'connection.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'link.php'?>
</head>
<body>
<?php include 'admin_nav.php' ?>
<?php 
    $userId = $_REQUEST['userId'];
    /* Create courses */
    if($userId==-1)
    {
        ?>
            <div class="container">
                <h2>Courses</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Course code</label>
                        <input type="text" name="course_code" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Course title</label>
                        <input type="text" name="course_title" class="form-control" id="">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Course credit</label>
                        <input type="number" name="course_credit" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="Submit_courses">Submit course</button>
                    </div>
                </form>
            </div>
        <?php
        if(isset($_POST['Submit_courses'])){
            $course_code = $_POST["course_code"];
            $course_title = $_POST["course_title"];
            $course_credit = $_POST["course_credit"];
            $s="INSERT INTO `courses`(`course_code`, `course_title`, `course_credit`) VALUES ('$course_code','$course_title','$course_credit')";
            $q=mysqli_query($conn,$s);
            header('Location: courses_form.php?userId=-3');
        }
    }
    /* Show courses */
    else if($userId==-3)
    {
        ?>
            <div class="container">
                <h2>Courses</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Course code</th>
                            <th scope="col">Course title</th>
                            <th scope="col">Credit</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $s="SELECT * FROM `courses`";
                            $q=mysqli_query($conn,$s);
                            while($r=mysqli_fetch_array($q))
                            {
                                ?>
                                    <div class="form-group">
                                        <tr>
                                            <td><?php echo $r['course_code']?></td>
                                            <td><?php echo $r['course_title']?></td>
                                            <td><?php echo $r['course_credit']?></td>
                                            <td><a href="courses_form.php?userId=<?php echo $r['id']?>" class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                            <td><a href="course_delete.php?userId=<?php echo $r['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr>
                                    </div>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
    }
    /* Edit courses */
    else
    {
        $s="SELECT * FROM `courses` Where id=$userId";
        $q=mysqli_query($conn,$s);
        if($r=mysqli_fetch_assoc($q))
        {
            ?>
                <form action="" class="container" method="post">
                    <div>
                        <h1>Edit courses</h1>
                    </div>
                    <div class="form-group">
                        <label for="1">Course code</label>
                        <input type="text" name="course_code" class="form-control" value="<?php echo $r['course_code']?>" id="1" >
                    </div>
                    <div class="form-group mb-2">
                        <label for="2">Course title</label>
                        <input type="text" name="course_title" class="form-control" value="<?php echo $r['course_title']?>" id="2">
                    </div>
                    <div class="form-group mb-2">
                        <label for="3">Course credit</label>
                        <input type="text" name="course_credit" class="form-control" value="<?php echo $r['course_credit']?>" id="3">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            <?php
            if(isset($_POST['submitBtn'])){
                $course_code = $_POST["course_code"];
                $course_title = $_POST["course_title"];
                $course_credit = $_POST["course_credit"];
                $s="UPDATE `courses` SET `course_code`='$course_code',`course_title`='$course_title',`course_credit`='$course_credit' WHERE `id`=$userId";
                $q=mysqli_query($conn,$s);
                header('Location: admin.php');
            }
        }
    }
?>
</body>
</html>