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
<?php
if($_SESSION['status']==0)
{
    ?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <h1 class="text-danger">You are not approved Yet!</h1>
        </div>
    <?php
}
else
{
    ?>
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
                    </ul>
                </div>
            </div>
        </div>
    <?php
}
?>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Course code</th>
                <th scope="col">Course title</th>
                <th scope="col">Course credit</th>
                <th scope="col">Select</th>
            </tr>
        </thead>
        <tbody>
            <form action="" method="post">
                <?php
                    $s="Select * from courses";
                    $q=mysqli_query($conn,$s);
                    while($r=mysqli_fetch_array($q))
                    {
                        ?>
                        <tr class="from-group">
                            <td scope="col" >
                                <input type="checkbox" name="checkb[]" value="<?php echo $r['id']?>">
                            </td>
                            <td scope="col"><?php echo $r['course_code'] ?></td>
                            <td scope="col"><?php echo $r['course_title'] ?></td>
                            <td scope="col"><?php echo $r['course_credit'] ?></td>
                            <td scope="col">
                                <select name="type[]"  class="form-control">
                                    <option value="regular">Regular</option>
                                    <option value="retake">Retake</option>
                                    <option value="recourse">Recourse</option>
                                </select>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
                <tr class="from-group">
                    <td>
                        <button type="submit" name="submit_btn" class="btn btn-primary">submit</button>
                    </td>
                </tr>
            </form>
        </tbody>
    </table>
    <?php
    if(isset($_POST['submit_btn']))
    {
        $u_id=$_SESSION['id'];
        $check= $_POST['checkb'];
        $type = $_POST['type'];
        if(!empty($_POST['checkb'])) {
            $cnt=0;
            foreach($_POST['checkb'] as $value){
                $q="INSERT INTO `enrollment`(`course_id`, `stdnt_id`,`type`) VALUES ('$value','$u_id','$type[$cnt]')";
                mysqli_query ($conn, $q);
                $cnt++;
            }
        }
    }
    ?>
</div>
</body>
</html>

