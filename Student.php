<?php

namespace App\classes;

class Student
{
    public function saveStudentInfo(){
       //echo "branch code=".$_SESSION['brcode'];
        extract($_POST);
       $image = $_FILES['imagefile']['tmp_name'];
        $file =$_SESSION['brcode'].$_FILES['imagefile']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir .$_GET['sr']. basename($_FILES["imagefile"]["name"]);
        move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);

         $image = base64_encode(file_get_contents(addslashes($image)));
         echo $image;
        $link = mysqli_connect('localhost','root','','test');
        $sql = "  INSERT INTO `hrdata` (`brcode`, `name`,`file`,`image`, `cellno`, `nid`, `pimsno`, `homezilla`, `homeuzilla`, `ppost`, `ppostdojoin`,
 `dob`, `entrypost`, `entrydojoin`, `highestdegree`, `passingyear`, `orderno`, `transferdate`, `pposting`) 
 VALUES ('$brcode','$name', '$file','$image', '$cellno','$nid', '$pimsno', '$homezilla', '$homeuzilla', '$ppost', '$ppostdojoin', '$dob', '$entrypost', 
 '$entrydojoin', '$highestdegree', '$passingyear', N'$orderno', '$transferdate', '$pposting');";
//        echo "".$sql;
      //  $sql = "INSERT INTO students(student_name,mobile_no,email_address) VALUES ('$student_name','$mobile_no','$email_address')";
        if(mysqli_query($link,$sql)){
            header('location:successful.php');
                       return 'Branch Data saved successfully';
        } else {
            die('Query Problem'.mysqli_error($link));
        };

    }
    //
    public function saveEmpInfo(){
        //echo "branch code=".$_SESSION['brcode'];
        extract($_POST);
        $image = $_FILES['imagefile']['tmp_name'];
        $file =$_SESSION['brcode'].$_FILES['imagefile']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir .$_GET['sr']. basename($_FILES["imagefile"]["name"]);
        move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);

        $image = base64_encode(file_get_contents(addslashes($image)));
        echo $image;
        $link = mysqli_connect('localhost','root','','test');
        $sql = "  INSERT INTO `hr` (`brcode`, `name`,`file`,`image`, `cellno`, `nid`, `pimsno`, `homezilla`, `homeuzilla`, `ppost`, `ppostdojoin`,
 `dob`, `entrypost`, `entrydojoin`, `highestdegree`, `passingyear`, `orderno`, `transferdate`, `pposting`,`accno`, `fathername`, `mothername`, `bloodgroup`, `mstatus`,
  `gender`, `spouse`, `childno` ) 
 VALUES ('$brcode','$name', '$file','$image', '$cellno','$nid', '$pimsno', '$homezilla', '$homeuzilla', '$ppost', '$ppostdojoin', '$dob', '$entrypost', 
 '$entrydojoin', '$highestdegree', '$passingyear', N'$orderno', '$transferdate', '$pposting','$accno','$fathername','$mothername','$bloodgroup','$mstatus','$gender','$spouse','$childno');";
        if(mysqli_query($link,$sql)){
            header('location:successful.php');
            return 'Branch Data saved successfully';
        } else {
            die('Query Problem'.mysqli_error($link));
        };
    }

    //
    public function saveEmpInfoById(){
        //echo "branch code=".$_SESSION['id'];
        echo " info Input Serial No=".$_GET['sr'];
        extract($_POST);
        $link = mysqli_connect('localhost','root','','test');
        $sql = "  INSERT INTO `info` (`sr`, `brcode`,`accno`, `fathername`, `mothername`,  `bloodgroup`,`mstatus`, `spousename`,  `childno`) 
 VALUES ('$sr','$brcode','$accno','$fathername','$mothername','$bloodgroup','$mstatus','$spousename','$childno');";
        echo "sql=".$sql;
        //  $sql = "INSERT INTO students(student_name,mobile_no,email_address) VALUES ('$student_name','$mobile_no','$email_address')";
        if(mysqli_query($link,$sql)){
            header('location:successful.php');
            return 'Branch Data saved successfully';
        } else {
            die('Query Problem'.mysqli_error($link));
        };
    }
//Save Sal and pf branchwise
     public function saveEmpSalPfById(){
        //echo "branch code=".$_SESSION['id'];
        echo " info Input Serial No=".$_GET['sr'];
        extract($_POST);
        $link = mysqli_connect('localhost','root','','test');
        $sql = "  INSERT INTO `sal` (`brcode`, `empid`, `accno`,`pimsno`, `month`,`basic`,`pf`) 
 VALUES ('$brcode','$empid' ,'$accno','$pimsno','$month','$basic','$pf');";
        echo "sql=".$sql;
        //  $sql = "INSERT INTO students(student_name,mobile_no,email_address) VALUES ('$student_name','$mobile_no','$email_address')";
        if(mysqli_query($link,$sql)){
            header('location:successful.php');
            return 'Branch Data saved successfully';
        } else {
            die('Query Problem'.mysqli_error($link));
        };
    }

    public function viewStudentInfo($brcode){
        // echo "Branch Code=".$_SESSION['brcode'];
        $link = mysqli_connect('localhost','root','','test');
        $sql = "SELECT * FROM hrdata WHERE  brcode = $brcode";
        if($result = mysqli_query($link,$sql)){
            return $result;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }
    //view Emp/
    public function viewEmpInfo($brcode){
        // echo "Branch Code=".$_SESSION['brcode'];
        $link = mysqli_connect('localhost','root','','test');
        $sql = "SELECT * FROM hrdata  WHERE  brcode = $brcode";
        if($result = mysqli_query($link,$sql)){
            return $result;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }

    //

    public function getStudentInfoById($sr){
        // echo "branch code=".$_SESSION['id'];
       //  echo " || Input Serial No=".$_GET['sr'];
        $link = mysqli_connect('localhost','root','','test');
        $sql = "SELECT * FROM hrdata WHERE  sr = $sr";
        if($result = mysqli_query($link,$sql)){
            return $result;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }
//sal
    public function getStudentInfoById11($brcode){
        // echo "Branch Code=".$_SESSION['brcode'];
        $link = mysqli_connect('localhost','root','','test');
        $sql = "SELECT * FROM hrdata  WHERE  brcode = $brcode";
        if($result = mysqli_query($link,$sql)){
            return $result;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }



    public function getEmpInfoById($sr){
        // echo "branch code=".$_SESSION['id'];
        //  echo " || Input Serial No=".$_GET['sr'];
        $link = mysqli_connect('localhost','root','','test');
        $sql = "SELECT * FROM hr WHERE  sr = $sr";
        if($result = mysqli_query($link,$sql)){
            return $result;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }



    public function updateStudentInfo(){
        // echo "branch code=".$_SESSION['id'];

        extract($_POST);
        $image = $_FILES['imagefile']['tmp_name'];
        $file =$_GET['sr'].$_FILES['imagefile']['name'];
        //(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
        $image = base64_encode(file_get_contents(($image)));

        $link = mysqli_connect('localhost','root','','test');
 /*       $sql = "UPDATE hrdata SET name = '$name', file='$file', image='$image', cellno= '$cellno', nid= '$nid', pimsno= '$pimsno', homezilla = '$homezilla', homeuzilla= '$homeuzilla',ppost='$ppost',ppostdojoin='$ppostdojoin',dob='$dob',entrypost='$entrypost', entrydojoin='$entrydojoin',
highestdegree='$highestdegree',passingyear='$passingyear',orderno ='$orderno',transferdate ='$transferdate', pposting='$pposting'    WHERE sr = '$sr'"; `accno`, `fathername`, `mothername`, `bloodgroup`, `mstatus`, `gender`, `spousename`, `childno`*/

        $sql = "UPDATE hr SET name = '$name', file='$file', image='$image', cellno= '$cellno', nid= '$nid', pimsno= '$pimsno', homezilla = '$homezilla', homeuzilla= '$homeuzilla',ppost='$ppost',ppostdojoin='$ppostdojoin',dob='$dob',entrypost='$entrypost', entrydojoin='$entrydojoin',
highestdegree='$highestdegree',passingyear='$passingyear',orderno ='$orderno',transferdate ='$transferdate', pposting='$pposting',accno='$accno', fathername='$fathername', mothername='$mothername', bloodgroup='$bloodgroup',mstatus='$mstatus',gender='$gender',spouse='$spouse',
childno='$childno'     WHERE sr = '$sr'";
        if(mysqli_query($link,$sql)){
            header('Location:view.php');
        } else {
            die('Query Problem'.mysqli_error($link));
        };
    }


    public function updateStudentInfo1(){
        // echo "branch code=".$_SESSION['id'];
        extract($_POST);
        /*      $image = $_FILES['imagefile']['tmp_name'];
              $file =$_GET['sr'].$_FILES['imagefile']['name'];
              //(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
              $image = base64_encode(file_get_contents(($image)));*/
        $link = mysqli_connect('localhost','root','','test');
        /*       $sql = "UPDATE hrdata SET name = '$name', file='$file', image='$image', cellno= '$cellno', nid= '$nid', pimsno= '$pimsno', homezilla = '$homezilla', homeuzilla= '$homeuzilla',ppost='$ppost',ppostdojoin='$ppostdojoin',dob='$dob',entrypost='$entrypost', entrydojoin='$entrydojoin',
       highestdegree='$highestdegree',passingyear='$passingyear',orderno ='$orderno',transferdate ='$transferdate', pposting='$pposting'    WHERE sr = '$sr'"; `accno`, `fathername`, `mothername`, `bloodgroup`, `mstatus`, `gender`, `spousename`, `childno`*/
        $sql = "UPDATE sal SET name = '$name', brcode='$brcode' ,basic='$basic', pf='$pf',month='$month',accno='$accno', pimsno='$pimsno' WHERE brcode = '$brcode'";
        if(mysqli_query($link,$sql)){
            header('Location:view.php');
        } else {
            die('Query Problem'.mysqli_error($link));
        };
    }

    /* will work here for info */
    public function updateEmpInfo(){
        // echo "branch code=".$_SESSION['id'];

        extract($_POST);
       /* $image = $_FILES['imagefile']['tmp_name'];
        $file =$_GET['sr'].$_FILES['imagefile']['name'];
        //(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
        $image = base64_encode(file_get_contents(($image)));*/

        $link = mysqli_connect('localhost','root','','test');
        $sql = "UPDATE info SET name ='$sr', '$name', transferdate ='$transferdate', pposting='$pposting'    WHERE sr = '$sr'";
        if(mysqli_query($link,$sql)){
            header('Location:view.php');
        } else {
            die('Query Problem'.mysqli_error($link));
        };
    }


    public function deleteStudentInfo($sr){
        $link = mysqli_connect('localhost','root','','test');
        $sql = "DELETE FROM hrdata WHERE sr = $sr";
        if(mysqli_query($link,$sql)){
            header('Location:view.php');
        }else {
            die('Query Problem'.mysqli_error($link));
        };
    }

    public function searchStudentInfo(){
        extract($_POST);
        $link = mysqli_connect('localhost','root','','test');
//        $sql = "SELECT * FROM students WHERE student_name = '$search_text' || mobile_no = '$search_text'";
        $sql = "SELECT * FROM hrdata WHERE brcode LIKE '%$search_text%' || mobile_no LIKE '%$search_text%' || email_address LIKE '%$search_text%'";
        if($result = mysqli_query($link,$sql)){
            return $result;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }
}