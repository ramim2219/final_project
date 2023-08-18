<?php 
    include 'connection.php';
    session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php include 'link.php'?>
</head>
<body>
<div class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a href="student.php" class="navbar-brand">Student</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="home.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="enroll.php" class="nav-link">Enrollment</a>
                </li>
                <li class="nav-item">
                    <a href="enrolled_course.php" class="nav-link">Enrolled courses</a>
                </li>
                <li class="nav-item">
                    <a href="project_idea.php" class="nav-link">project_idea</a>
                </li>
                <li class="nav-item">
                    <a href="stdnt_inbox.php" class="nav-link">inbox</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <?php 
        $id=$_SESSION['id'];
        $str="SELECT * FROM `project_idea` WHERE stdnt_id=$id";
        $q=mysqli_query($conn,$str);
        if($q)
        {
            while($r=mysqli_fetch_array($q))
            {
                ?>
                    <form action="" method="post">
                        <div class="form-group mb-2">
                            <label for="floatingTextarea2">Message</label>
                            <input type="textarea" value="<?php echo $r['message'] ?>" class="form-control" id="floatingTextarea2" style="height: 100px" name="message">
                        </div>
                        <div>
                            <p><?php echo $r['coment'] ?></p>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">edit</button>
                        </div>
                    </form>
                <?php
            }
        }
    ?>
</div>
</body>
</html>
