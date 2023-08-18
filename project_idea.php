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
    <form action="" method="post">
        <h1>Enter your project idea</h1>
        <div class="form-floating mb-2">
            <textarea class="form-control" placeholder="Enter your message" id="floatingTextarea2" style="height: 100px" name="message"></textarea>
            <label for="floatingTextarea2">Message</label>
        </div>
        <div class="form-group mb-2">
            <label for="">Submit to</label>
            <select name="teacher_id" id="" class="form-control">
                <option value="">Teacher</option>
                <?php 
                    $str = "SELECT * FROM `users` WHERE role='Teacher';";
                    $q = mysqli_query($conn,$str);
                    while($r=mysqli_fetch_array($q))
                    {
                        ?>
                            <option value="<?php echo $r['id'] ?>"><?php echo $r['name'] ?></option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <div class="from-group">
            <button type="submit" class="btn btn-success" name="send">Send</button>
        </div>
    </form>
</div>
</body>
</html>

<?php
if(isset($_POST['send']))
{
    $stdnt_id=$_SESSION['id'];
    $teacher_id=$_POST['teacher_id'];
    $message = $_POST['message'];
    $str="INSERT INTO `project_idea`(`stdnt_id`, `message`, `teacher_id`) VALUES ('$stdnt_id','$message','$teacher_id')";
    $q=mysqli_query($conn,$str);
    if($q)
    {
        ?>
            <script>
                alert("Insert successful");
            </script>
        <?php
    }
    else
    {
        ?>
            <script>
                alert("Insert unsuccessful");
            </script>
        <?php
    }
}
?>