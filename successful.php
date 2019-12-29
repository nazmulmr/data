<?php
session_start();
if(isset($_GET['logout'])){
$login->logout();
}
?>
<hr>
<!--a href="add-student.php">Add Student</a> ||-->
<a href="view.php">View</a> ||
<a href="?logout=true">Logout</a> ||
<a href=""><?php echo $_SESSION['name'] ?></a>
<hr>

<H1>Branch Data saved successfully</H1>
