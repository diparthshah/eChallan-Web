<html>
<head>
    <title>R.T.O Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <!--link rel="stylesheet" type="text/css" href="rtochallan.css"-->
    <script src="../js/rto.js"></script>
</head>
<body>
<center>
        <br>
        <h1 style="font-weight: 900;"><b><i><font color="#4285f4">eChallan</font></i></b></h1><br>
        <h2 style="font-weight: 700;"><font color="#4285f4">Challan Receipt</font></h2><br>
<?php
    $vehicleNumber = $_POST["vehicleNumber"];
    $challanDateTime = $_POST["challanDateTime"];
    $rulesBroken = $_POST['rulesBroken'];

    $rulesBrokenList = array("Signal Violation", "No Driving Documents", "Speed Limit Violation", "Road Safety Violation");
    $actualRulesBroken = array();
    $actualRulesBrokenCount = -1;

    $N = count($rulesBroken);
    for($i=0; $i < $N; $i++) {
        $selectedIndex = $rulesBroken[$i];
        if($selectedIndex == "on") {
            $actualRulesBrokenCount = $actualRulesBrokenCount + 1;
            $actualRulesBroken[$actualRulesBrokenCount] = $rulesBrokenList[$i];
        }
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wdl";

    $totalFineAmount = 0;
    $officerID = "";
    $challanID = (string) mt_rand(1,100);
    $aadharid = "";
    $name = "";
    $vehiclemodel = "";
    $phonenum = "";
    $rulesBrokenString = "";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $civilquery = "SELECT aadharid, fname, lname, vehiclemodel, phonenum FROM civilian where vehiclenum = '$vehicleNumber' LIMIT 1";
    $civilResult = mysqli_query($conn, $civilquery);
    $civilRow = mysqli_fetch_row($civilResult);
    $aadharid = $civilRow[0];
    $name = $civilRow[1]. " ".$civilRow[2];
    $vehiclemodel = $civilRow[3];
    $phonenum = $civilRow[4];

    if($aadharid!='') {
        for($mycount = 0; $mycount <= $actualRulesBrokenCount; $mycount++) {
            $ruleName = $actualRulesBroken[$mycount];
            $rulesBrokenString = $rulesBrokenString.$ruleName.",";
            $fineAmountQuery = "SELECT fineamount FROM rules WHERE rulename = '$ruleName' ";
            $fineAmountResult = mysqli_query($conn, $fineAmountQuery);
            while($fineAmountRow = mysqli_fetch_assoc($fineAmountResult)) {
                $totalFineAmount = $totalFineAmount + (int) $fineAmountRow["fineamount"];
            }
        }
    
        $officerIDQuery = "SELECT rtoid FROM currentlogin WHERE islogin = '1' LIMIT 1 ";
        $officerIDResult = mysqli_query($conn, $officerIDQuery);
        while($officerIDRow = mysqli_fetch_assoc($officerIDResult)) {
            $officerID = $officerIDRow["rtoid"];
        }
    
        $newChallanQuery = "INSERT INTO challan VALUES ('$challanID', '$officerID', '$vehicleNumber', '$challanDateTime', '$rulesBrokenString', '$totalFineAmount', '0');";
        if (mysqli_query($conn, $newChallanQuery)) {
        }
    }
    else {
        echo '<script> alert("No record for vehicle '.$vehicleNumber.' exists, please try again with valid vehicle number"); </script>';
        return;
    }
    mysqli_close($conn);
?>
<font color="#4285f4"><b>Challan ID: <?php echo $challanID; ?></b> </font><br>
<font color="#4285f4"><b>Officer ID: <?php echo $officerID; ?></b></font><br>
<font color="#4285f4"><b>Rules Broken: <?php echo $rulesBrokenString; ?></b></font><br>
<font color="#4285f4"><b>Fine Amount: <?php echo $totalFineAmount; ?></b></font><br>
<font color="#4285f4"><b>Aadhar ID: <?php echo $aadharid; ?></b></font><br>
<font color="#4285f4"><b>Name: <?php echo $name; ?></b></font><br>
<font color="#4285f4"><b>Vehicle Model: <?php echo $vehiclemodel; ?></b></font><br>
<font color="#4285f4"><b>Contact Number: <?php echo $phonenum; ?></b></font><br><br>
<h3 style="font-weight: 700;"><font color="#4285f4">Challan Generated Successfully</font></h3><br>
</center>
</body>
</html>