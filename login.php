<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title></title>
    <link href="./assets/style.css" rel="stylesheet"
          type="text/css">
</head>
<body ondragstart="return false" onselectstart="return false">
<table width="760" border="0" align="center" cellpadding="0"
       cellspacing="0">
    <tbody>
    <tr>
        <td height="10" align="center" valign="middle" bgcolor="#BEEA93"
            class="topbg">&nbsp;</td>
    </tr>

    <tr>
        <td height="100" align="left" valign="top" class="green"><table
                    width="100%" border="0" cellpadding="0" cellspacing="0"
                    class="white14bold">
                <tbody>
                <tr>
                    <td height="120" align="left" valign="top" class="green"><table
                                width="100%" border="0" cellpadding="0" cellspacing="0"
                                class="white14">
                            <tbody>
                            <tr>
                                <td width="16%" height="120" align="center" valign="middle"
                                    bgcolor="Green"><img src="./assets/3333.jpg"
                                                         width="760" height="180">
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="30" align="left" valign="middle" bgcolor="green"
                        class="black10"></td>
                </tr>

                <style>
                    #my-form{
                        width:50%;
                        height:300px;
                        margin:0 auto;
                        box-sizing: border-box;
                        box-shadow: 0 0 5px 5px gray;
                        padding-top: 120px;
                        padding-left: 150px;
                    }
                </style>

                <form id="my-form" action="" method="post">
                    <table>
                        <tr>
                            <td>branch code</td>
                            <td><input type="id" name="id"></td>
                        </tr>
                        <!--<tr>
                            <td>Password</td>
                            <td><input type="password" name="password"></td>
                        </tr>-->
                        <tr>
                            <td></td>
                            <td><input type="submit" name="btn"></td>
                        </tr>
                    </table>
                </form>

                </td>

                </tr>

                </tbody>
            </table>

</body>
</html>


<?php
session_start();
if(isset($_SESSION['id'])){
    header('Location:add.php');
}

require_once 'vendor/autoload.php';
use App\classes\Login;

if(isset($_POST['btn'])) {
    $login = new Login();
    $login->adminLoginCheck();
}
?>


