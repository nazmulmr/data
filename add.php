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

$message='';
if(isset($_POST['btn'])){
    $message = $student->saveStudentInfo();
}

if(isset($_GET['logout'])){
    $login->logout();
}


if($_SESSION['id'] != '1001') {
?>

<hr>
    <a href="add.php">Add শাখার প্রতিবেদন</a> ||
    <a href="view.php">View </a> ||
    <a href=""><?php echo $_SESSION['name'] ?></a> ||
    <a href="?logout=true" style="color:red"   >   Logout</a>
<hr>

    <form action="" method="post">
        <table id="myTable">
            <thead>
            <tr>
                <th> </th>
                <th>
                    Description (বিবরণ)
                </th>
                <th>
                    Taka in English (লক্ষ টাকা)
                </th>

            </tr>
            </thead>

            <tr>
                <td>১:-</td>
                <td>
                    30.12.2019 তারিখ পর্যন্ত জমা:
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <!--td>Branch code</td-->
                <td><input type="hidden" name="id"  value ="<?php echo $_SESSION['id'] ?>" ></td>
            </tr>

            <tr>
            <tr>
                <td></td>
                <td>(ক) ক্যাশে নগদ জমা</td>
                <td><input type="text" id="txt1"    name="cbscashdeposit" onkeyup="sum();"></td>
            </tr>
            <tr>
                <td></td>
                <td>(খ) সোনালী ব্যাংক/স্থানীয় ব্যাংকে জমা</td>
                <td><input type="text" id="txt2"  name="cbssonalibank" onkeyup="sum();"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>মোট (ক+খ)</td>
                <td><input type="text" id="txt3" />

                </td>
            </tr>

            <tr>
                <td>২:-</td>
                <td>
                    01.07.2019 হতে 30.12.2019  তারিখ পর্যন্ত ঋণ বিতরণ:
                </td>
                <td></td>
            </tr>
            <tr>
            <tr>
                <td></td>
                <td>(ক) মাইক্রোফাইন্যান্সে বিতরণ</td>
                <td><input type="text" id="txt4" name="mfsDisburse"  onkeyup="sum1();"></td>
            </tr>
            <tr>
                <td></td>
                <td>(খ) এসএমই ঋণ বিতরণ</td>
                <td><input type="text" id="txt5"  name="smeDisburse"  onkeyup="sum1();"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>মোট (ক+খ)</td>
                <td> <input type="text" id="txt6" /> </td>
            </tr>

            <tr>
                <td>৩:-</td>
                <td>
                    01.07.2019 হতে 30.12.2019 তারিখ পর্যন্ত ঋণ আদায়:
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    (ক) মাইক্রোফাইন্যান্সে হতে আদায়:
                </td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td>1 প্রকল্প কালীন সময় বিতরণ ঋণ হতে আদায়</td>
                <td><input type="text" id="txt7"  name="mfsProjectRepay" onkeyup="sum2();"></td>
            </tr>
            <tr>
                <td></td>
                <td>2 ব্যাংক আসার পর বিতরণ ঋণ হতে আদায়</td>
                <td><input type="text" id="txt8"  name="mfsBankRepay" onkeyup="sum2();"></td>
            </tr>
            <tr>
                <td></td>
                <td>(খ) এসএমই ঋণ আদায়</td>
                <td><input type="text"  id="txt9"  name="smeRepay" onkeyup="sum2();"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>মোট (ক+খ)</td>
                <td> <input type="text" id="txt10"> </td>
            </tr>
            <tr>
                <td>৪:-</td>
                <td>
                    01.07.2019 হতে 30.12.2019 পর্যন্ত মেয়াদউত্তীর্ণ ঋণ আদায়:
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    (ক) মাইক্রোফাইন্যান্সে হতে আদায়:
                </td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td>1 প্রকল্প কালীন সময়  ঋণ বিতরণ হতে আদায়</td>
                <td><input type="text" id="txt11"  name="mfsOdProjectRepay" onkeyup="sum3()"></td>
            </tr>
            <tr>
                <td></td>
                <td>2 ব্যাংক আসার প্রে ঋণ বিতরণ হতে আদায়</td>
                <td><input type="text" id="txt12" name="mfOdBankRepay" onkeyup="sum3()"></td>
            </tr>
            <tr>
                <td></td>
                <td>(খ) এসএমই ঋণ আদায়</td>
                <td><input type="text" id="txt13"  name="smeOdRepay" onkeyup="sum3()"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>মোট (ক+খ)</td>
                <td> <input type="text" id="txt14"></td>
            </tr>
            <tr>
                <td>৫</td>
                <td>
                    30.12.2019 তারিখে অনাদায়ী ঋণের স্থিতি
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>(ক) মাইক্রোফাইন্যান্সে ঋণের স্থিতি </td>
                <td><input type="text" id="txt15" name="mfsLoanBal" onkeyup="sum4()"></td>
            </tr>
            <tr>
                <td></td>
                <td>(খ) এসএমই ঋণের স্থিতি </td>
                <td><input type="text" id="txt16" name="smeLoanBal" onkeyup="sum4()"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td> </td>
                <td><input type="text" id="txt17"></td>
            </tr>
            <tr>
                <td>৬</td>
                <td>
                    30.12.2019 তারিখে মেয়াদউত্তীর্ণ ঋণের স্থিতি
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>(ক) মাইক্রোফাইন্যান্সে ঋণের স্থিতি </td>
                <td><input type="text" id="txt18"  name="mfsOdBal" onkeyup="sum5();"  ></td>
            </tr>
            <tr>
                <td></td>
                <td>(খ) এসএমই ঋণের স্থিতি </td>
                <td><input type="text" id="txt19"  name="smeOdBal" onkeyup="sum5();" ></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>মোট ঋণের স্থিতি (ক+খ)</td>
                <td><input type="text" id="txt20"></td>
            </tr>

            <tr style="font-weight: bold;">
                <td>৭</td>
                <td>মেয়াদউত্তীর্ণের হার %</td>
                <td> <input type="text" id="txt21" name="odPercentage"> </td>
            </tr>

            <tr style="font-weight: bold;">
                <td>৮</td>
                <td>মাইক্রোফাইন্যান্সের মেয়াদউত্তীর্ণের হার %</td>
                <td><input type="text" id="txt22" name="mfsOdPercentage"></td>
            </tr>

            <tr>
                <td>৯</td>
                <td>
                    আমানতের স্থিতি
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>(ক) 30.12.2019 তারিখে সঞ্চয়ী আমানতের স্থিতি</td>
                <td><input type="text" id="txt23"   name="savingsDepositBal" onkeyup="sum6();"></td>
            </tr>
            <tr>
                <td></td>
                <td>(খ) 30.12.2019 তারিখে এস.এন.ডি আমানতের স্থিতি</td>
                <td><input type="text" id="txt24"  name="sndDepositBal" onkeyup="sum6();"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td></td>
                <td><input type="text" id="txt25"></td>
            </tr>

            <tr>
                <td>১০</td>
                <td>
                    30.12.2019 তারিখ পর্যন্ত আয়
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>(ক) সোনালী ব্যাংকে রক্ষিত এসএনডি হিসাবের উপর নীট সুদ (প্রদানকৃত সুদ-উক্ত হিসাবের যাবতীয় কর্তণ)</td>
                <td><input type="text" id="txt26" name="sonaliBankSndInterest" onkeyup="sum7();"></td>
            </tr>
            <tr>
                <td></td>
                <td>(খ) সমিতির সার্ভিস চার্জ (Interest On Microcredit)</td>
                <td><input type="text" id="txt27" name="samitteeSavingCharge" onkeyup="sum7();"></td>
            </tr>

            <tr style="font-weight: bold;">
                <td></td>
                <td>মোট স্থিতি (ক+খ)</td>
                <td><input type="text" id="txt28" onkeyup="sub();"></td>
            </tr>

            <tr>
                <td>১১</td>
                <td>
                    30.12.2019 তারিখ পর্যন্ত শাখার মোট খরচ
                </td>
                <td><input id="txt29"  name="totalExpense" onkeyup="sub();"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td>১২</td>
                <td>
                    30.12.2019 তারিখ পর্যন্ত শাখার নীট লাভ (১0-১১)
                </td>
                <td><input type="text" id="txt30" name="overAllProfit"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td>১৩</td>
                <td>
                    ব্যাংক শুরু থেকে এ পর্যন্ত আদায়ঃ (৩০.১২.২০১৯ পর্যন্ত)
                </td>
                <td><input id="txt31"  name="asOnDeposit"></td>
            </tr>
            <tr>
                <td>১৪</td>
                <td>
                    ব্যাংকে স্থানান্তরের তথ্যাদিঃ
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>(ক) ঋণ হিসাবে</td>
                <td><input type="text" id="txt32"   name="loanCalculation" onkeyup="sum8();"></td>
            </tr>
            <tr>
                <td></td>
                <td>(খ) নগদ হিসাবে (এজেন্ট ব্যাংক থেকে স্থানান্তর)</td>
                <td><input type="text" id="txt33" name="transferAgentBank" onkeyup="sum8();"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td>মোট স্থিতি (ক+খ)</td>
                <td><input type="text" id="txt34"></td>
            </tr>

            <script>
                function sum() {
                    var txtFirstNumberValue = document.getElementById('txt1').value;
                    var txtSecondNumberValue = document.getElementById('txt2').value;
                    var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
                    if (!isNaN(result)) {
                        document.getElementById('txt3').value = result;
                    }
                }

                function sum1() {
                    var txtFirstNumberValue = document.getElementById('txt4').value;
                    var txtSecondNumberValue = document.getElementById('txt5').value;
                    var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
                    if (!isNaN(result)) {
                        document.getElementById('txt6').value = result;
                    }
                }
                function sum2() {
                    var txtFirstNumberValue = document.getElementById('txt7').value;
                    var txtSecondNumberValue = document.getElementById('txt8').value;
                    var txtThirdNumberValue = document.getElementById('txt9').value;
                    var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue)+parseFloat(txtThirdNumberValue);
                    if (!isNaN(result)) {
                        document.getElementById('txt10').value = result;
                    }
                }

                function sum3() {
                    var txtFirstNumberValue = document.getElementById('txt11').value;
                    var txtSecondNumberValue = document.getElementById('txt12').value;
                    var txtThirdNumberValue = document.getElementById('txt13').value;
                    var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue)+parseFloat(txtThirdNumberValue);
                    if (!isNaN(result)) {
                        document.getElementById('txt14').value = result;
                    }
                }
                function sum4() {
                    var txtFirstNumberValue = document.getElementById('txt15').value;
                    var txtSecondNumberValue = document.getElementById('txt16').value;
                    var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
                    if (!isNaN(result)) {
                        document.getElementById('txt17').value = result;
                    }
                }
                function sum5() {
                    var txtFirstNumberValue = document.getElementById('txt18').value;
                    var txtSecondNumberValue = document.getElementById('txt19').value;
                    var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
                    if (!isNaN(result)) {
                        document.getElementById('txt20').value = result;
                    }
                }

                function sum6() {
                    var txtFirstNumberValue = document.getElementById('txt23').value;
                    var txtSecondNumberValue = document.getElementById('txt24').value;
                    var result = parseFloat(txtFirstNumberValue) +parseFloat(txtSecondNumberValue);
                    if (!isNaN(result)) {
                        document.getElementById('txt25').value = result;
                    }
                }

                function sum7() {
                    var txtFirstNumberValue = document.getElementById('txt26').value;
                    var txtSecondNumberValue = document.getElementById('txt27').value;
                    var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
                    if (!isNaN(result)) {
                        document.getElementById('txt28').value = result;
                    }
                }

                function sum8() {
                    var txtFirstNumberValue = document.getElementById('txt32').value;
                    var txtSecondNumberValue = document.getElementById('txt33').value;
                    var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
                    if (!isNaN(result)) {
                        document.getElementById('txt34').value = result;
                    }
                }

                function sub() {
                    var txtFirstNumberValue = document.getElementById('txt28').value;
                    var txtSecondNumberValue = document.getElementById('txt29').value;
                    var result = parseFloat(txtFirstNumberValue) - parseFloat(txtSecondNumberValue);
                    if (!isNaN(result)) {
                        document.getElementById('txt30').value = result;
                    }
                }

            </script>

            <tr>
                <td></td>
                <td><input type="submit" name="btn" value="Save"></td>
            </tr>
        </table>
    </form>

<?php } else { ?>

<hr>
<a href="add.php">Add শাখার প্রতিবেদন</a> ||
<a href="view.php">View </a> ||
<a href=""><?php echo $_SESSION['name'] ?></a> ||
    <a href="?logout=true" style="color:red"   >   Logout</a>

<hr>

<h2><?php echo $message; ?></h2>
<form action="" method="post">
    <table id="myTable">
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

        <tr>
            <td>১:-</td>
            <td>
                30.06.2019 তারিখ জমা:
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <!--td>Branch code</td-->
            <td><input type="hidden" name="id"  value ="<?php echo $_SESSION['id'] ?>" ></td>
        </tr>

        <tr>
        <tr>
            <td></td>
            <td>(ক) ক্যাশে নগদ জমা</td>
            <td><input type="text" id="txt1"    name="cbscashdeposit" onkeyup="sum();"></td>
        </tr>
        <tr>
            <td></td>
            <td>(খ) সোনালী ব্যাংক/স্থানীয় ব্যাংকে জমা</td>
            <td><input type="text" id="txt2"  name="cbssonalibank" onkeyup="sum();"></td>
        </tr>
        <tr style="font-weight: bold;">
            <td></td>
            <td>মোট (ক+খ)</td>
            <td><input type="text" id="txt3" />

            </td>
        </tr>

     <tr>
            <td>২:-</td>
            <td>
                01.07.2018 হতে 30.06.2019  তারিখ পর্যন্ত ঋণ বিতরণ:
            </td>
            <td></td>
        </tr>
        <tr>
        <tr>
            <td></td>
            <td>(ক) মাইক্রোফাইন্যান্সে বিতরণ</td>
            <td><input type="text" id="txt4" name="mfsDisburse"  onkeyup="sum1();"></td>
        </tr>
        <tr>
            <td></td>
            <td>(খ) এসএমই ঋণ বিতরণ</td>
            <td><input type="text" id="txt5"  name="smeDisburse"  onkeyup="sum1();"></td>
        </tr>
        <tr style="font-weight: bold;">
            <td></td>
            <td>মোট (ক+খ)</td>
            <td> <input type="text" id="txt6" /> </td>
        </tr>

        <tr>
            <td>৩:-</td>
            <td>
                01.07.2018 হতে 30.06.2019 তারিখ পর্যন্ত ঋণ আদায়:
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>
                (ক) মাইক্রোফাইন্যান্সে হতে আদায়:
            </td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>1 project হতে ঋণ আদায়</td>
            <td><input type="text" id="txt7"  name="mfsProjectRepay" onkeyup="sum2();"></td>
        </tr>
        <tr>
            <td></td>
            <td>2 ব্যাংক হতে ঋণ আদায়</td>
            <td><input type="text" id="txt8"  name="mfsBankRepay" onkeyup="sum2();"></td>
        </tr>
        <tr>
            <td></td>
            <td>(খ) এসএমই ঋণ আদায়</td>
            <td><input type="text"  id="txt9"  name="smeRepay" onkeyup="sum2();"></td>
        </tr>
        <tr style="font-weight: bold;">
            <td></td>
            <td>মোট (ক+খ)</td>
            <td> <input type="text" id="txt10"> </td>
        </tr>
          <tr>
              <td>৪:-</td>
              <td>
                  01.07.2018 হতে 30.06.2019 পর্যন্ত মেয়াদউত্তীর্ণ ঋণ আদায়:
              </td>
              <td></td>
          </tr>
          <tr>
              <td></td>
              <td>
                  (ক) মাইক্রোফাইন্যান্সে হতে আদায়:
              </td>
              <td></td>
          </tr>

          <tr>
              <td></td>
              <td>1 project হতে ঋণ আদায়</td>
              <td><input type="text" id="txt11"  name="mfsOdProjectRepay" onkeyup="sum3()"></td>
          </tr>
          <tr>
              <td></td>
              <td>2 ব্যাংক হতে ঋণ আদায়</td>
              <td><input type="text" id="txt12" name="mfOdBankRepay" onkeyup="sum3()"></td>
          </tr>
          <tr>
              <td></td>
              <td>(খ) এসএমই ঋণ আদায়</td>
              <td><input type="text" id="txt13"  name="smeOdRepay" onkeyup="sum3()"></td>
          </tr>
          <tr style="font-weight: bold;">
              <td></td>
              <td>মোট (ক+খ)</td>
              <td> <input type="text" id="txt14"></td>
          </tr>
          <tr>
              <td>৫</td>
              <td>
                  30.06.2019 তারিখে অনাদায়ী ঋণের স্থিতি
              </td>
              <td></td>
          </tr>
          <tr>
              <td></td>
              <td>(ক) মাইক্রোফাইন্যান্সে ঋণের স্থিতি </td>
              <td><input type="text" id="txt15" name="mfsLoanBal" onkeyup="sum4()"></td>
          </tr>
          <tr>
              <td></td>
              <td>(খ) এসএমই ঋণের স্থিতি </td>
              <td><input type="text" id="txt16" name="smeLoanBal" onkeyup="sum4()"></td>
          </tr>
          <tr style="font-weight: bold;">
              <td></td>
              <td> </td>
              <td><input type="text" id="txt17"></td>
          </tr>
        <tr>
            <td>৬</td>
            <td>
                30.06.2019 তারিখে মেয়াদউত্তীর্ণ ঋণের স্থিতি
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>(ক) মাইক্রোফাইন্যান্সে ঋণের স্থিতি </td>
            <td><input type="text" id="txt18"  name="mfsOdBal" onkeyup="sum5();"  ></td>
        </tr>
        <tr>
            <td></td>
            <td>(খ) এসএমই ঋণের স্থিতি </td>
            <td><input type="text" id="txt19"  name="smeOdBal" onkeyup="sum5();" ></td>
        </tr>
        <tr style="font-weight: bold;">
            <td></td>
            <td>মোট ঋণের স্থিতি (ক+খ)</td>
            <td><input type="text" id="txt20"></td>
        </tr>

        <tr style="font-weight: bold;">
            <td>৭</td>
            <td>মেয়াদউত্তীর্ণের হার %</td>
            <td> <input type="text" id="txt21" name="odPercentage"> </td>
        </tr>

        <tr style="font-weight: bold;">
            <td>৮</td>
            <td>মাইক্রোফাইন্যান্সের মেয়াদউত্তীর্ণের হার %</td>
            <td><input type="text" id="txt22" name="mfsOdPercentage"></td>
        </tr>

        <tr>
            <td>৯</td>
            <td>
                আমানতের স্থিতি
            </td>
            <td></td>
        </tr>
                                <tr>
                                    <td></td>
                                    <td>(ক) 30.06.2019 তারিখে সঞ্চয়ী আমানতের স্থিতি</td>
                                    <td><input type="text" id="txt23"   name="savingsDepositBal" onkeyup="sum6();"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(খ) 30.06.2019 তারিখে এস.এন.ডি আমানতের স্থিতি</td>
                                    <td><input type="text" id="txt24"  name="sndDepositBal" onkeyup="sum6();"></td>
                                </tr>
                                <tr style="font-weight: bold;">
                                    <td></td>
                                    <td></td>
                                    <td><input type="text" id="txt25"></td>
                                </tr>

                           <tr>
                                    <td>১০</td>
                                    <td>
                                        30.06.2019 তারিখ পর্যন্ত আয়
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(ক) সোনালী ব্যাংকে রক্ষিত এসএনডি হিসাবের উপর নীট সুদ (প্রদানকৃত সুদ-উক্ত হিসাবের যাবতীয় কর্তণ)</td>
                                    <td><input type="text" id="txt26" name="sonaliBankSndInterest" onkeyup="sum7();"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(খ) সমিতির সার্ভিস চার্জ (Interest On Microcredit)</td>
                                    <td><input type="text" id="txt27" name="samitteeSavingCharge" onkeyup="sum7();"></td>
                                </tr>

                                <tr style="font-weight: bold;">
                                    <td></td>
                                    <td>মোট স্থিতি (ক+খ)</td>
                                    <td><input type="text" id="txt28" onkeyup="sub();"></td>
                                </tr>

                                <tr>
                                    <td>১১</td>
                                    <td>
                                        30.06.2019 তারিখ পর্যন্ত শাখার মোট খরচ
                                    </td>
                                    <td><input id="txt29"  name="totalExpense" onkeyup="sub();"></td>
                                </tr>
                                <tr style="font-weight: bold;">
                                    <td>১২</td>
                                    <td>
                                        30.06.2019 তারিখ পর্যন্ত শাখার নীট লাভ (১0-১১)
                                    </td>
                                    <td><input type="text" id="txt30" name="overAllProfit"></td>
                                </tr>
                                <tr style="font-weight: bold;">
                                    <td>১৩</td>
                                    <td>
                                        ব্যাংক শুরু থেকে এ পর্যন্ত আদায়ঃ (৩০.০৬.২০১৯ পর্যন্ত)
                                    </td>
                                    <td><input id="txt31"  name="asOnDeposit"></td>
                                </tr>
                    <tr>
                         <td>১৪</td>
                         <td>
                             ব্যাংকে স্থানান্তরের তথ্যাদিঃ
                         </td>
                         <td></td>
                     </tr>
                     <tr>
                         <td></td>
                         <td>(ক) ঋণ হিসাবে</td>
                         <td><input type="text" id="txt32"   name="loanCalculation" onkeyup="sum8();"></td>
                     </tr>
                     <tr>
                         <td></td>
                         <td>(খ) নগদ হিসাবে (এজেন্ট ব্যাংক থেকে স্থানান্তর)</td>
                         <td><input type="text" id="txt33" name="transferAgentBank" onkeyup="sum8();"></td>
                     </tr>
                     <tr style="font-weight: bold;">
                         <td></td>
                         <td>মোট স্থিতি (ক+খ)</td>
                         <td><input type="text" id="txt34"></td>
                     </tr>

        <script>
            function sum() {
                var txtFirstNumberValue = document.getElementById('txt1').value;
                var txtSecondNumberValue = document.getElementById('txt2').value;
                var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('txt3').value = result;
                }
            }

            function sum1() {
                var txtFirstNumberValue = document.getElementById('txt4').value;
                var txtSecondNumberValue = document.getElementById('txt5').value;
                var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('txt6').value = result;
                }
            }
            function sum2() {
                var txtFirstNumberValue = document.getElementById('txt7').value;
                var txtSecondNumberValue = document.getElementById('txt8').value;
                var txtSecondNumberValue = document.getElementById('txt9').value;
                var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue)+parseFloat(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('txt10').value = result;
                }
            }

            function sum3() {
                var txtFirstNumberValue = document.getElementById('txt11').value;
                var txtSecondNumberValue = document.getElementById('txt12').value;
                var txtSecondNumberValue = document.getElementById('txt13').value;
                var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue)+parseFloat(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('txt14').value = result;
                }
            }
            function sum4() {
                var txtFirstNumberValue = document.getElementById('txt15').value;
                var txtSecondNumberValue = document.getElementById('txt16').value;
                var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('txt17').value = result;
                }
            }
            function sum5() {
                var txtFirstNumberValue = document.getElementById('txt18').value;
                var txtSecondNumberValue = document.getElementById('txt19').value;
                var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('txt20').value = result;
                }
            }

            function sum6() {
                var txtFirstNumberValue = document.getElementById('txt23').value;
                var txtSecondNumberValue = document.getElementById('txt24').value;
                var result = parseFloat(txtFirstNumberValue) +parseFloat(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('txt25').value = result;
                }
            }

            function sum7() {
                var txtFirstNumberValue = document.getElementById('txt26').value;
                var txtSecondNumberValue = document.getElementById('txt27').value;
                var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('txt28').value = result;
                }
            }

            function sum8() {
                var txtFirstNumberValue = document.getElementById('txt32').value;
                var txtSecondNumberValue = document.getElementById('txt33').value;
                var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('txt34').value = result;
                }
            }

            function sub() {
                var txtFirstNumberValue = document.getElementById('txt28').value;
                var txtSecondNumberValue = document.getElementById('txt29').value;
                var result = parseFloat(txtFirstNumberValue) - parseFloat(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('txt30').value = result;
                }
            }

        </script>

        <tr>
            <td></td>
            <td><input type="submit" name="btn" value="Save"></td>
        </tr>
    </table>
</form>
</body>
<?php }  ?>