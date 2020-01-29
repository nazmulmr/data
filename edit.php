<?php
session_start();
if($_SESSION['brcode'] == NULL){
    header('Location:login.php');
}
//echo "Branch Code=".$_SESSION['brcode'];
require_once 'vendor/autoload.php';
use App\classes\Student;
use App\classes\Login;
$student = new Student();
$login = new Login();
//$result = $student->getStudentInfoById($_GET['sr']);
$result = $student->getEmpInfoById($_GET['sr']);
//getEmpInfoById($sr)
$data = mysqli_fetch_assoc($result);
//$data1 = mysqli_fetch_assoc($result1);

$message= '';
if(isset($_POST['btn'])){
   $message = $student->updateStudentInfo();
    // for sal-pf insert $message = $student->saveEmpSalPfById();
    }

if(isset($_GET['logout'])){
    $login->logout();
}

?>
<html lang="en">
<head>
    <title>Hr Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js" xmlns:background-color="http://www.w3.org/1999/xhtml"
            xmlns:background-color="http://www.w3.org/1999/xhtml" xmlns:background-color="http://www.w3.org/1999/xhtml"
            xmlns:background-color="http://www.w3.org/1999/xhtml" xmlns:background-color="http://www.w3.org/1999/xhtml"></script>

<body >
</head>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href=""><?php echo "branch code=".$_SESSION['brcode']; ?></a></li>
            <li class="active"><a href=""><?php echo $_SESSION['name'] ?></a></li>
        </ul>
        <button class="btn btn-danger navbar-btn"><a href="view.php" style="color:black"   >   View </a></button>
<!--        <button class="btn btn-danger navbar-btn"><a href="?logout=true" style="color:red"   >   Logout </a></button>-->
    </div>
</nav>

<div class="container">
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table" id="myTable" border="1" bgcolor="#f0ffff">
                <thead>
                <tr class="danger">

                    <th>Field</th>
                    <th>Data</th>

                </tr>
                </thead>
                <tbody>

                <tr style="font-weight: bold;">

                    <td>
                        <input type="hidden" name="sr" value="<?php echo $data['sr'] ?>">
                        <input type="hidden" name="brcode"  value ="<?php echo $_SESSION['brcode'] ?>"
                    </td>
                    <td> </td>
                </tr>

                <tr class="success" style="font-weight: bold;" >

                    <td>  Full Name :</td>
                    <td>
                        <input type="text" name="name" style="width: 100%;" value="<?php echo $data['name']   ?>"   align = "center">
                    </td>
                </tr>
                <tr class="success" style="font-weight: bold;" >

                    <td> Father Name :</td>
                    <td><input type="text" id="txt1"   name="fathername" style="width: 100%;" value="<?php echo $data['fathername']   ?>" align="center"></td>

                </tr>

                <tr class="danger" style="font-weight: bold;">

                    <td> Mother Name  :</td>
                    <td><input type="text" id="txt2"  name="mothername" style="width: 100%;" value="<?php echo $data['mothername']   ?>" required ></td>
                </tr>
<!--                <tr class="danger" style="font-weight: bold;">

                    <td> Employee Id  :</td>
                    <td><input type="text" id="txt2"  name="empid" style="width: 100%;" value="<?php /*echo $data['empid']   */?>" readonly ></td>
                </tr>-->
            </table>
            <table class="table" id="myTable" border="1" bgcolor="#f0ffff">
                <thead>
                <tr class="success">
                    <th>Field</th>
                    <th>Data</th>
                    <th>Field</th>
                    <th>Data</th>
                </tr>
                </thead>
                <tbody>

                <tr class="danger" style="font-weight: bold;">
                    <td> Mobile No  :</td>
                    <td><input type="text" name="cellno" value="<?php echo $data['cellno'] ?>"></td>
                    <td> National Id :</td>
                    <td><input type="text" name="nid" value="<?php echo $data['nid'] ?>"></td>
                </tr>

                <tr class="success" style="font-weight: bold;">
                    <td> Personal Information Number(PIMS No.):</td>
                    <td><input type="text" name="pimsno" value="<?php echo $data['pimsno'] ?>"></td>
                    <td>Home District   :</td>
                    <td><input type="text" name="homezilla" value="<?php echo $data['homezilla'] ?>"></td>
                </tr>
                <tr class="danger" style="font-weight: bold;">
                    <td>Home Upazilla : </td>
                    <td><input type="text" name="homeuzilla" value="<?php echo $data['homeuzilla'] ?>"></td>
                    <td> Present Post</td>
                    <td><select id="txt7" name="ppost" >
                            <option value="None"><?php echo $data['ppost'] ?></option>
                            <option value="Programmer">Programmer</option>
                            <option value="Asst. Programmer">Asst. Programmer</option>
                            <option value="Officer">Officer</option>
                            <option value="Accountant">Accountant</option>
                            <option value="Jr. Officer">Jr. Officer</option>
                            <option value="Data Entry Operator">Data Entry Operator</option>
                            <option value="Computer Operator">Computer Operator</option>
                            <option value="Field Supervisor">Field Supervisor</option>
                            <option value="Field Assistant">Filed Assistant</option>
                            <option value="Cash Assistant">Cash Assistant</option>
                            <option value="Office Assistant">Office Assistant</option>
                            <option value="MLSS">MLSS</option>
                            <option value="Driver">Driver</option>
                            <option value="Guard">Guard</option>
                            <option value="Night Guard">Night Guard</option>
                        </select></td>
                </tr>

                <tr class="success" style="font-weight: bold;">
                    <td> Date of Joining in Present Post:</td>
                    <td><input type="text" name="ppostdojoin" value="<?php echo $data['ppostdojoin'] ?>"></td>
                    <td>Date of Birth : </td>
                    <td><input type="text" name="dob" value="<?php echo $data['dob'] ?>"></td>
                </tr>

                <tr class="danger" style="font-weight: bold;">

                    <td>First Entry Post (ABAK): </td>
                    <td><input type="text" name="entrypost" value="<?php echo $data['entrypost'] ?>"></td>
                    <td>Date of Fisrt Join (ABAK): </td>
                    <td><input type="text" name="entrydojoin" value="<?php echo $data['entrydojoin'] ?>"></td>
                </tr>

                <tr class="success" style="font-weight: bold;">
                    <td> Highest Degree : </td>
                    <td><input type="text" name="highestdegree" value="<?php echo $data['highestdegree'] ?>"></td>
                    <td> Passing Year of Highest Degree : </td>
                    <td><input type="text" name="passingyear" value="<?php echo $data['passingyear'] ?>"></td>
                </tr>

                <tr class="danger" style="font-weight: bold;">
                    <td>ABEK to Bank Transfer Order No : </td>
                    <td><input type="text" name="orderno" value="<?php echo $data['orderno'] ?>"> </td>
                    <td>ABEK to Bank Transfer Date :</td>
                    <td><input type="text" name="transferdate" value="<?php echo $data['transferdate'] ?>"> </td>
                </tr>



                <tr class="success" style="font-weight: bold;">
                    <td>Present Place of Posting :</td>
                    <td><input type="text" name="pposting" value="<?php echo $data['pposting'] ?>"></td>
                    <td>Gender :</td>
                    <td><input type="text" name="gender" value="<?php echo $data['gender'] ?>"></td>
                </tr>


                <tr class="danger" style="font-weight: bold;">
                    <td>Blood Group:</td>
                    <td><input type="text"   name="bloodgroup"  value="<?php echo $data['bloodgroup']?>"   required></td>
                    <td>Matial Status : </td>
                    <td> <input type="text"   name="mstatus" value="<?php echo $data['mstatus']?>"  required> </td>
                </tr>

                <tr class="success" style="font-weight: bold;">
                    <td>Spouse:</td>
                    <td><input type="text"  name="spouse" value="<?php echo $data['spouse']?>" required></td>
                    <td>No of Child :</td>
                    <td><input type="text"     name="childno" value="<?php echo $data['childno']?>" required></td>
                </tr>
                <tr class="success" style="font-weight: bold;">
                    <td>Bank Account No (Salary Account):</td>
                    <td><input type="number"   name="accno" value="<?php echo $data['accno']?>" required></td>
                    <td>  Select image to upload:</td>
                    <td>     <input type="file" required name="imagefile"  id="demo" >
                        <img id="image_upload_preview" src="data:image/png;base64, <?php echo $data['image'] ?> "  height="100px" width="80px" "/>
                        <!--<img src="data:image/png;base64, <?php /*echo $data['image'] */?>  " height="100" width="80"/>-->
                    </td>

                </tr>

                </tbody>
            </table>
            <input type="submit" style="margin: 0 auto;display: block; width:200px; " name="btn"  value="Save">
        </form>
    </div>

</div>

</body>

<script type="text/javascript">
    function display(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(event) {
                $('#image_upload_preview').attr('src', event.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#demo").change(function() {
        display(this);
    });
</script>

<h2><?php echo $message; ?></h2>