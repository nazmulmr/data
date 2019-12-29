<?php
session_start();
if($_SESSION['id'] == NULL){
    header('Location:login.php');
}

require_once 'vendor/autoload.php';
use App\classes\Student;
use App\classes\Login;
$student = new Student();
$login = new Login();
$result = $student->viewStudentInfo();
$result1 = $student->getStudentInfoById($_SESSION['id']);

if(isset($_GET['status'])){
    $student->deleteStudentInfo($_GET['id']);
}

if(isset($_POST['btn'])){
    $result = $student->searchStudentInfo();
}

if(isset($_GET['logout'])){
    $login->logout();
}

if($_SESSION['id'] == '1001') {
    ?>
    <hr>
    <!--a href="add-student.php">Add Student</a> ||-->
    <a href="view.php">View</a> ||
    <a href=""><?php echo $_SESSION['name'] ?></a> ||
    <a href="?logout=true" style="color:red"   >   Logout</a>
    <hr>
    <form action="" method="post">
        <table>
            <tr>
                <td>Search Here</td>
                <td><input type="text" name="search_text"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btn"></td>
            </tr>
        </table>
    </form>
    <hr>
    <thead>

    <tr>
        <th>#</th>
        <th>
            Description (বিবরণ)
        </th>
        <th>
            Taka in English (লক্ষ টাকা)
        </th>

    </tr>
    </thead>


    <table border="1">
        <tr>
            <th>Action</th>
            <th>Branch Id</th>
            <th>Date</th>
            <th>CBSCash Deposit</th>
            <th>CBS SonaliBank</th>
            <th>MFS Disburse</th>
            <th>SME Disburse </th>
            <th>MFS ProjectRepay</th>
            <th>MFS BankRepay</th>
            <th>SME Repay</th>
            <th>MFSOverdue ProjectRepay</th>
            <th>MFOverdue BankRepay</th>
            <th>SMEOverdue Repay</th>
            <th>MFS LoanBal</th>
            <th>SME LoanBal</th>
            <th>MFS OverDuedBal</th>
            <th>SME OverDuedBal</th>
            <th>OverDue %</th>
            <th>MFS Overdue%</th>
            <th>Savings DepositBal</th>
            <th>SND DepositBal</th>
            <th>SonaliBank SndInterest</th>
            <th>Samittee SavingCharge</th>
            <th>Total Expense</th>
            <th>OverAll Profit</th>
            <th>AsOn Deposit</th>
            <th>Loan Calculation</th>
            <th>Transfer AgentBank</th>
        </tr>
        <?php while($student = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><a href="edit.php?id=<?php echo $student['id'];?>">Edit</a>
                    <!--a href="?status=delete&&id=<?php echo $student['id'];?>" onclick="return confirm('Are you sure to delete this data?')">Delete</a>
               --> </td>

                <td><?php echo $student['id'] ?></td>
                <td><?php echo $student['date'] ?></td>
                <td><?php echo $student['cbscashdeposit'] ?></td>
                <td><?php echo $student['cbssonalibank'] ?></td>
                <td><?php echo $student['mfsDisburse'] ?></td>
                <td><?php echo $student['smeDisburse'] ?></td>
                <td><?php echo $student['mfsProjectRepay'] ?></td>
                <td><?php echo $student['mfsBankRepay'] ?></td>
                <td><?php echo $student['smeRepay'] ?></td>
                <td><?php echo $student['mfsOdProjectRepay'] ?></td>
                <td><?php echo $student['mfOdBankRepay'] ?></td>
                <td><?php echo $student['smeOdRepay'] ?></td>
                <td><?php echo $student['mfsLoanBal'] ?></td>
                <td><?php echo $student['smeLoanBal'] ?></td>
                <td><?php echo $student['mfsOdBal'] ?></td>
                <td><?php echo $student['smeOdBal'] ?></td>
                <td><?php echo $student['odPercentage'] ?></td>
                <td><?php echo $student['mfsOdPercentage'] ?></td>
                <td><?php echo $student['savingsDepositBal'] ?></td>
                <td><?php echo $student['sndDepositBal'] ?></td>
                <td><?php echo $student['sonaliBankSndInterest'] ?></td>
                <td><?php echo $student['samitteeSavingCharge'] ?></td>
                <td><?php echo $student['totalExpense'] ?></td>
                <td><?php echo $student['overAllProfit'] ?></td>
                <td><?php echo $student['asOnDeposit'] ?></td>
                <td><?php echo $student['loanCalculation'] ?></td>
                <td><?php echo $student['transferAgentBank'] ?></td>
            </tr>
        <?php } ?>
    </table>
<?php }
elseif ($_SESSION['id'] != '1001'){

 //   echo "\n session =".$_SESSION['id'];
//header('Location:login.php');}
?>
<hr>
<!--a href="add-student.php">Add Student</a> ||
<a href="view-student.php">View Student</a> || -->
<a href=""><?php echo $_SESSION['name'] ?></a> ||
    <a href="?logout=true" style="color:red"   >   Logout</a>
<hr>
    <thead>

    <tr>
        <th>#</th>
        <th>
            Description (বিবরণ)
        </th>
        <th>
            Taka in English (লক্ষ টাকা)
        </th>

    </tr>
    </thead>

        <table border="1">
            <tr>
                <th>Action</th>
                <th>Branch Id</th>
                <th>Date</th>
                <th>CBSCash Deposit</th>
                <th>CBS SonaliBank</th>
                <th>MFS Disburse</th>
                <th>SME Disburse </th>
                <th>MFS ProjectRepay</th>
                <th>MFS BankRepay</th>
                <th>SME Repay</th>
                <th>MFSOverdue ProjectRepay</th>
                <th>MFOverdue BankRepay</th>
                <th>SMEOverdue Repay</th>
                <th>MFS LoanBal</th>
                <th>SME LoanBal</th>
                <th>MFS OverDuedBal</th>
                <th>SME OverDuedBal</th>
                <th>OverDue %</th>
                <th>MFS Overdue%</th>
                <th>Savings DepositBal</th>
                <th>SND DepositBal</th>
                <th>SonaliBank SndInterest</th>
                <th>Samittee SavingCharge</th>
                <th>Total Expense</th>
                <th>OverAll Profit</th>
                <th>AsOn Deposit</th>
                <th>Loan Calculation</th>
                <th>Transfer AgentBank</th>
            </tr>
            <?php while($student = mysqli_fetch_assoc($result1)) { ?>
                <tr>
                    <td><a href="edit.php?id=<?php echo $student['id'];?>">Edit</a>
                        <!--a href="?status=delete&&id=<?php echo $student['id'];?>" onclick="return confirm('Are you sure to delete this data?')">Delete</a>
               --> </td>
                    <td><?php echo $student['id'] ?></td>
                    <td><?php echo $student['date'] ?></td>
                    <td><?php echo $student['cbscashdeposit'] ?></td>
                    <td><?php echo $student['cbssonalibank'] ?></td>
                    <td><?php echo $student['mfsDisburse'] ?></td>
                    <td><?php echo $student['smeDisburse'] ?></td>
                    <td><?php echo $student['mfsProjectRepay'] ?></td>
                    <td><?php echo $student['mfsBankRepay'] ?></td>
                    <td><?php echo $student['smeRepay'] ?></td>
                    <td><?php echo $student['mfsOdProjectRepay'] ?></td>
                    <td><?php echo $student['mfOdBankRepay'] ?></td>
                    <td><?php echo $student['smeOdRepay'] ?></td>
                    <td><?php echo $student['mfsLoanBal'] ?></td>
                    <td><?php echo $student['smeLoanBal'] ?></td>
                    <td><?php echo $student['mfsOdBal'] ?></td>
                    <td><?php echo $student['smeOdBal'] ?></td>
                    <td><?php echo $student['odPercentage'] ?></td>
                    <td><?php echo $student['mfsOdPercentage'] ?></td>
                    <td><?php echo $student['savingsDepositBal'] ?></td>
                    <td><?php echo $student['sndDepositBal'] ?></td>
                    <td><?php echo $student['sonaliBankSndInterest'] ?></td>
                    <td><?php echo $student['samitteeSavingCharge'] ?></td>
                    <td><?php echo $student['totalExpense'] ?></td>
                    <td><?php echo $student['overAllProfit'] ?></td>
                    <td><?php echo $student['asOnDeposit'] ?></td>
                    <td><?php echo $student['loanCalculation'] ?></td>
                    <td><?php echo $student['transferAgentBank'] ?></td>
                </tr>
            <?php } ?>

    </table>


<?php } ?>

